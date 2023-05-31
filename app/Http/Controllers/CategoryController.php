<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class CategoryController extends Controller
{
    public function Category(Request $request)
    {
        $shopnow = $request->input('shopnow');
        
        // Merender tampilan order_detail.blade.php
        session(['shop_now' => $shopnow]);
        
        // Mengembalikan isi tampilan sebagai respons JSON
        return response()->json(['success' => true, 'shopnow' => $shopnow]);
    }
}
