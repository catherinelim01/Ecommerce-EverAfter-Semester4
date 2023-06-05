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

Route::get('/index', function () {
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
<<<<<<< Updated upstream
Route::get('/payment', function () {
    return view('payment');
});
Route::get('/profile', function () {
    return view('profile');
});
Route::get('/profile.php', function () {
    return view('profile');
});
=======
// Route::get('/wishlist', function () {
//     return view('wishlist');
// });

// Route::get('/wishlist/page/{page}', function ($page) {
//     return view('wishlist', ['page' => $page]);
// })->name('wishlist.page');
use App\Http\Controllers\WishlistController;

Route::match(['get', 'post'], '/wishlist', [WishlistController::class, 'insertWishlist']);
Route::match(['get', 'post'], '/wishlistdelete', [WishlistController::class, 'deleteWishlist']);

Route::get('/wishlist', function () {
    return view('wishlist');
})->name('wishlist');

Route::get('/wishlist/page/{page}', function ($page) {
    return view('wishlist', ['page' => $page]);
})->name('wishlist.page');
  
use App\Http\Controllers\MailController;

Route::get('/email', [App\Http\Controllers\MailController::class, 'create']);
Route::match(['get', 'post'], '/email', [App\Http\Controllers\MailController::class, 'sendEmail'])->name('send.email');

//Route::get('/shop/search', [App\Http\Controllers\ProductController::class, 'search'])->name('shop.search');
Route::get('/shop/search/{search}', function ($search) {
    return view('shop', ['search' => $search]);
})->name('shop.search');

>>>>>>> Stashed changes
Route::get('/order_detail', function () {
    return view('order_detail');
});
// Route::get('/order_detail', function () {
//     return view('order_detail');
// });

Route::post('/order_detail', [App\Http\Controllers\OrderController::class, 'orderDetail']);

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

Route::get('/product_details', function () {
    return view('product_details');
<<<<<<< Updated upstream
});
=======
})->name('product_details');

Route::get('/product_details/{product_name}', [App\Http\Controllers\ProductController::class, 'showProductDetails']);
>>>>>>> Stashed changes


Route::post('/product_details', [App\Http\Controllers\ProductController::class, 'getProductDetails']);

// Route::post('/login', [App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register');













