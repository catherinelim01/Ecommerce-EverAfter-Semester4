<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\ProductCart;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CartController extends Controller
{

    public function cartVoucher(Request $request)
    {
        $voucherCode = $request->input('voucherCode');
        session(['voucherCode' => $voucherCode]);
 
        return response()->json(['success' => true, 'voucherCode' => $voucherCode]);
    }

    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
    
        // Dapatkan customer_id dari session
        $customerId = Session::get('customer_id');
    
        if (empty($customerId)) {
            // Jika customer_id tidak tersedia dalam session, kembalikan respon error
            return response()->json(['message' => 'User not logged in'], 403);
        }
    
        // Cari cart terakhir berdasarkan customer_id
        $cart = Cart::where('customer_id', $customerId)->orderBy('cart_id', 'desc')->first();
    
        if ($cart) {
            // Jika cart terakhir ada, tambahkan 1 pada angka cart_id
            $lastCartId = intval(substr($cart->cart_id, 4));
            $nextCartId = $lastCartId + 1;
            $cartId = 'CART' . sprintf('%05d', $nextCartId);
        } else {
            // Jika tidak ada cart sebelumnya, buat cart baru
            $cart = new Cart;
            $cart->customer_id = $customerId;
            $cart->cart_status = 0;
            $cart->delete_cart = 0;
            $cart->save();
    
            $cartId = 'CART00001';
        }
    
        // Lakukan operasi INSERT ke dalam tabel product_cart
        $productCart = new ProductCart;
        $productCart->product_id = $productId;
        $productCart->cart_id = $cartId;
        $productCart->save();
    
        return response()->json(['message' => 'Product added to cart successfully']);
    }
}


