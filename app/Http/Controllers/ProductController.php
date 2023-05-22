<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    // public function showProductDetails($product_name)
    // {
    //     // Logika penanganan halaman "product_details" di sini
    //     return view('product_details', ['product_name' => $product_name]);
    // }

    public function getProductDetails(Request $request)
    {
        $link = $request->input('link');
        $view = View::make('product_details')->render();
      
    //     // Contoh: Mengembalikan tampilan atau respon JSON
        // return response()->json(['success' => true, 'link' => $link]);
        return response()->json(['success' => true, 'link' => $link, 'content' => $view]);
    }
}
