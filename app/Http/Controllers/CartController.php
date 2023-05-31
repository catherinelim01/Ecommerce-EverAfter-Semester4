<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CartController extends Controller
{
    public function getCart(Request $request)
    {
        $cart = $request->input('cart');
        session(['cart_isi' => $cart]);
        return response()->json(['success' => true, 'cart' => $cart]);
    }
}
