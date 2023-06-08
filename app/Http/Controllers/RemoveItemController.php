<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class RemoveItemController extends Controller
{
    public function Remove(Request $request)
    {
        $productId = $request->input('product_id');
        $customerId = session('customer_id');
    
        // Lakukan operasi penghapusan produk dari tabel product_cart berdasarkan product_id dan customer_id
        DB::table('product_cart')
            ->where('PRODUCT_ID', $productId)
            ->where('CART_ID', function ($query) use ($customerId) {
                $query->select('CART_ID')
                    ->from('cart')
                    ->where('CUSTOMER_ID', $customerId);
            })
            ->delete();
    
            return redirect('/cart');
    }
}
