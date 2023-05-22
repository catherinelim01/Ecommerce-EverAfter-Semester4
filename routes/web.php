<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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
    return view('index');
});
Route::get('/index', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/payment', function () {
    return view('payment');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/profile.php', function () {
    return view('profile');
});
Route::get('/order_detail', function () {
    return view('order_detail');
});
// Route::get('/order_detail', function () {
//     return view('order_detail');
// });

Route::post('/order_detail', [App\Http\Controllers\OrderController::class, 'orderDetail']);



