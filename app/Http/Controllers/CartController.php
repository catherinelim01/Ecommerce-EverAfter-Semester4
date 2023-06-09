<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\ProductCart;
use App\Models\Cart;
use App\Models\Product;
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
        $link_tes = request()->session()->get('link_tes');
        $customer_id = request()->session()->get('customer_id');
        $btnSize = $request->input('btnSize');
        $quantity = $request->input('quantity');
        if (empty($customer_id)) {
            return back()->withErrors(['message' => 'User not logged in']);
        }
    
        // $productId = Product::select('product_id')->where('product_name', $link_tes)->first();
        // $query = Cart::where('customer_id', $customer_id);
        // // Cari cart terakhir berdasarkan customer_id
        // $cart = Cart::where('customer_id', $customer_id)->pluck('cart_id');
        
        // Query untuk mendapatkan idcart dan sqlqty
       
        $result = DB::select("SELECT pc.CART_ID AS idcart,p.product_id AS idproduct, pc.qty AS sqlqty FROM product_cart pc, cart c, product p WHERE pc.cart_id = c.cart_id AND p.product_name = :product_name AND p.product_id = pc.product_id", ['product_name' => $link_tes]);
        $result2 = DB::select("SELECT pc.CART_ID AS idcart FROM product_cart pc, cart c, product p WHERE pc.cart_id = c.cart_id AND c.customer_id = :customer_id AND p.product_id = pc.product_id", ['customer_id' => $customer_id]);
        $idcart = $result2[0]->idcart;
        $idproduct = $result[0]->idproduct;
        $sqlqty = $result[0]->sqlqty;
        
        if(!empty($btnSize)){
            $result = DB::select("SELECT CONCAT(SUBSTRING( '{$idproduct}', 1, 4), '{$btnSize}', SUBSTRING('{$idproduct}', 6)) AS idproduct, pc.qty AS sqlqty FROM product_cart pc, cart c, product p WHERE pc.cart_id = c.cart_id AND p.product_name = :product_name AND p.product_id = pc.product_id", ['product_name' => $link_tes]);
            $result2 = DB::select("SELECT pc.CART_ID AS idcart FROM product_cart pc, cart c, product p WHERE pc.cart_id = c.cart_id AND c.customer_id = :customer_id AND p.product_id = pc.product_id", ['customer_id' => $customer_id]);

            $idcart = $result2[0]->idcart;
            $idproduct = $result[0]->idproduct;
            $sqlqty = $result[0]->sqlqty;
        }
        
        if (!empty($result)) {
            // Query untuk mendapatkan sql1
            $sql1 = DB::select("SELECT p.product_name , p.product_id FROM product_cart pc, cart c, product p WHERE pc.cart_id = c.cart_id AND pc.product_id = p.product_id AND c.customer_id = :customer_id", ['customer_id' => $customer_id]);
            $cek = 0;   
            foreach ($sql1 as $pname) {
            // Jika $sql1 = $link_tes, jalankan perintah UPDATE
            if (!empty($sql1) && $pname->product_id === $idproduct) {
                $newQty = (int) $sqlqty + $quantity;
                DB::update("UPDATE product_cart SET QTY =  {$newQty} WHERE cart_id = :cart_id and product_id = :product_id ", ['cart_id' => (string) $idcart, 'product_id'=> (string) $idproduct]);
                $cek = 1;
                return response()->json(['message' => $btnSize, 'message' => $idproduct]);
                // DB::update("UPDATE product_cart SET QTY = :qty WHERE cart_id = :cart_id", ['qty' => $sqlqty, 'cart_id' => (string) $idcart]);
            }
        }
        if($cek === 0){
            DB::insert("INSERT INTO product_cart (PRODUCT_ID, CART_ID, QTY) VALUES (?, ?, ?)", [$idproduct, $idcart, $quantity]);
            return response()->json(['message' => 'Data inserted successfullyyyyyyy']);
        }
        }
        
 
    }

    
}


