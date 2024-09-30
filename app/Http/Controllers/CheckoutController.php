<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\HistoricalPurchase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    // Fetch the purchase history
    public function showPurchaseHistory()
    {
        $user = Auth::user();

        if(!$user)
        {
            return redirect('/login');
        }

        // Fetch purchase history with associated product details
        $purchaseHistory = HistoricalPurchase::where('user_id', $user->id)
            ->with('product')
            ->get();

        return view('history', compact('purchaseHistory'));
    }
}
