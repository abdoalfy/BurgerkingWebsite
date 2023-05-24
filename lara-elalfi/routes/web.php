<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PaymentController;

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

Route::get('/',[ProjectController::class,'index'])->name('home'); 

Route::get('/products',[ProjectController::class,'products'])->name('products');

Route::get('/products/{category}',[ProjectController::class,'category'])->name('category');

Route::get('/single_product/{id}', [ProjectController::class,'single_product'])->name('single_product');
Route::get('/cart',[CartController::class,'cart'])->name('cart');
Route::get('/single_product', function () {
    return redirect('/');
});

Route::post('/add_to_cart',[CartController::class,'add_to_cart'])->name('add_to_cart');
Route::get('add_to_cart', function () {
    return redirect('/');
});
Route::post('/remove_from_cart',[CartController::class,'remove_from_cart'])->name('remove_from_cart');
Route::get('/remove_from_cart', function () {
    return redirect('/');
});

Route::get('/user_orders',[ProjectController::class,'user_orders'])->name('user_orders');

Route::get('/user_order_details/{id}', [ProjectController::class,'user_order_details'])->name('user_order_details');

Route::post('/edit_quantity',[CartController::class,'edit_quantity'])->name('edit_quantity');
Route::get('/edit_quantity', function () {
    return redirect('/');
});
Route::post('/place_order',[CartController::class,'place_order'])->name('place_order');

Route::get('/checkout',[CartController::class,'checkout'])->name('checkout');

Route::get('/payment',[PaymentController::class,'payment'])->name('payment');

Route::get('/about', function () {
    return view('about');
});


Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
 Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
