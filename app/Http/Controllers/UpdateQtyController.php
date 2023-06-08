<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UpdateQty;
// use Illuminate\Support\Facades\Request;

class UpdateQtyController extends Controller
{
    public function UpdateQty(Request $request)
    {
        $productId = $request->input('productId');
        $quantity = $request->input('quantity');

        // Cek apakah produk ada dalam keranjang
        $productCart = UpdateQty::where('PRODUCT_ID', $productId)->first();
        if ($productCart) {
            // Update nilai kuantitas di database
            DB::table('PRODUCT_CART')
                ->where('PRODUCT_ID', $productId)
                ->update(['QTY' => $quantity]);

                return redirect('/cart');
        }

        return response()->json(['message' => 'Produk tidak ditemukan dalam keranjang.'], 404);
    
        }
    
}
