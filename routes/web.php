<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;



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
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/linksess', function () {
    return view('linksess');
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
Route::post('/shop', [App\Http\Controllers\CategoryController::class, 'Category']);


// Route::get('/shop', function () {
//     return view('shop');
// });

Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/profile', function () {
    return view('profile');
});
// Route::group(['prefix' => '/'], function () {
//     Route::get('/shop', function () {
//         return view('shop');
//     });

//     Route::get('/product_details', function () {
//         return view('product_details');
//     });
// });
Route::get('/shop', function () {
    // Logika penanganan halaman utama shop
    return view('shop');
})->name('shop');

Route::get('/shop/page/{page}', function ($page) {
    // Logika penanganan halaman berikutnya
    return view('shop', ['page' => $page]);
})->name('shop.page');

// Route::get('/product/{product_name}', function ($product_name) {
//     // Logika penanganan halaman "product_details"
//     return view('product_details', ['product_name' => $product_name]);
// })->name('product.details');

// Route::post('/product-details', function () {
//     // Logika penanganan permintaan POST untuk mengambil detail produk
//     $link = $_POST['link'];
//     session(['link_tes' => $link]);
//     return response('Data berhasil disimpan ke session.');
// })->name('product.details.post');



Route::post('/product_details', [App\Http\Controllers\ProductController::class, 'getProductDetails']);

// Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register');


Route::get('/product_details', function () {
    return view('product_details');
});











