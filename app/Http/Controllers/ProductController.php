<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::all();
        return view('shop', compact('products'));
    }

    public function create()
    {
        $user = Auth::user();
        if(!$user)
        {
            return redirect('/login');
        }
        return view('products.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'image' => 'required|image',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        $imagePath = $request->file('image')->store('products', 'public');


        Product::create([
            'name' => $request->name,
            'image' => $imagePath,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        return redirect('/shop');
    }
}
