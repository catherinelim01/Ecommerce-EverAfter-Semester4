<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Product; // Assuming your product model is named "Product"
use Illuminate\Support\Facades\DB;


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
      
        // Contoh: Mengembalikan tampilan atau respon JSON
        // return response()->json(['success' => true, 'link' => $link]);
        session(['link_tes' => $link]);
        return response()->json(['success' => true, 'link' => $link, 'content' => $view]);
        //return response()->json(['success' => true, 'link' => $link]);
    }

    public function showProductDetails($product_name)
    {
        $related_products = Product::where('product_name', '!=', $product_name)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('product_details', compact('product', 'related_products'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('searching');
        session(['searchTerm' => $searchTerm]);

        return redirect()->route('shop');
    }
    

}