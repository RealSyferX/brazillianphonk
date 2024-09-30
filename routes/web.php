<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect("shop");
});

// Authentication Routes
Route::get('/register', function () {
    return view('auth.register');
})->name('register.form');

Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', function () {
    return view('auth.login');
})->name('login.form');

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Product Routes
Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/seller-panel', [ProductController::class, 'create'])->name('seller.panel');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/purchase-history', [CheckoutController::class, 'showPurchaseHistory'])->name('purchase.history');
//Route::get('/history', [CartController::class, 'history'])->name('history')->middleware('auth');;

// Cart Routes
Route::post('/cart/{product}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');


Route::middleware(['auth'])->group(function () {
    Route::post('/cart/{product}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
});

// Route for showing the checkout page
Route::get('/checkout', [CartController::class, 'showCheckout'])->name('checkout');

// Route for processing the checkout (e.g., handling payment, order creation)
Route::post('/checkout', [CartController::class, 'processCheckout'])->name('checkout.process');
