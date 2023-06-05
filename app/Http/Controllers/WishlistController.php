<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class WishlistController extends Controller
{
    public function insertWishlist(Request $request)
    {
        // Mendapatkan nilai wishlist_id dan product_id dari permintaan POST
        $wishlist_id = $request->input('wishlist_id');
        $product_id = $request->input('product_id');

        // Melakukan insert ke dalam tabel WISHLIST_PRODUCT menggunakan Query Builder
        DB::table('WISHLIST_PRODUCT')->insert([
            'WISHLIST_ID' => $wishlist_id,
            'PRODUCT_ID' => $product_id,
        ]);

        return 'Data berhasil diinsert ke database.';
    }

    public function deleteWishlist(Request $request)
    {
        // Mendapatkan nilai wishlist_id dan product_id dari permintaan POST
        $wishlist_id = $request->input('wishlist_id');
        $product_id = $request->input('product_id');

        // Menghapus data dari tabel WISHLIST_PRODUCT menggunakan Query Builder
        DB::table('WISHLIST_PRODUCT')
            ->where('WISHLIST_ID', $wishlist_id)
            ->where('PRODUCT_ID', $product_id)
            ->delete();

        return 'Data berhasil dihapus dari database.';
    }
}
