<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $productId,
            'quantity' => $request->quantity ?? 1,
        ]);

        return redirect('/cart');
    }

    public function showCheckout()
    {
        $user = Auth::user();
        $cartItems = $user->cart()->with('product')->get();

        $total = $cartItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        return view('checkout', [
            'cartItems' => $cartItems,
            'total' => $total
        ]);
    }

    public function processCheckout(Request $request)
    {
        // Retrieve the current authenticated user
        $user = Auth::user();

        // Fetch the user's cart items with associated product details
        $cartItems = $user->cart()->with('product')->get();

        // Start a database transaction to ensure data consistency
        DB::beginTransaction();

        try {
            // Iterate through each cart item to process the purchase
            foreach ($cartItems as $item) {
                // Deduct the product quantity from the inventory
                $product = $item->product;

                // Check if the product has enough stock for the purchase
                if ($product->quantity >= $item->quantity) {
                    // Deduct the purchased quantity from the product's stock
                    $product->quantity -= $item->quantity;
                    $product->save(); // Save the updated product quantity

                    // Insert the purchase details into the "historicalpurchase" table
                    DB::table('historical_purchase')->insert([
                        'user_id' => $user->id, // Storing user ID
                        'product_id' => $product->id, // Storing product ID
                        'quantity' => $item->quantity, // Storing purchased quantity
                        'price' => $product->price, // Storing product price
                        'total' => $product->price * $item->quantity, // Total cost
                        'purchase_date' => now(), // Storing the current date/time of purchase
                        'created_at' => now(), // Created timestamp
                        'updated_at' => now()  // Updated timestamp
                    ]);

                } else {
                    // If there's not enough stock, rollback and show an error
                    DB::rollBack();
                    return redirect()->back()->with('error', "Not enough stock for product: {$product->name}");
                }
            }

            // Clear the user's cart
            $user->cart()->delete();

            // Commit the transaction if all operations were successful
            DB::commit();

            // Redirect to the shop page with a success message
            return redirect('/shop')->with('success', 'Order placed successfully!');

        } catch (\Exception $e) {
            // Rollback the transaction if something goes wrong
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function viewCart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        return view('cart', compact('cartItems'));
    }
    public function history()
    {
        return view('history');
    }
    public function showPurchaseHistory()
    {
        $user = Auth::user();

        // Fetch purchase history with associated product details
        $purchaseHistory = HistoricalPurchase::where('user_id', $user->id)
            ->with('product')
            ->get();

        return view('purchase-history', compact('purchaseHistory'));
    }
    public function checkout()
    {
        // Handle purchase logic here
        return view('checkout');
    }
}


