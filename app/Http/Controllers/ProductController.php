<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // Assuming your product model is named "Product"

class ProductController extends Controller
{
    public function getProductDetails(Request $request)
    {
        $link = $request->input('link');
        session(['link_tes' => $link]);
 
        return response()->json(['success' => true, 'link' => $link]);
    }

    public function showProductDetails($product_name)
    {
        $related_products = Product::where('product_name', '!=', $product_name)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('product_details', compact('product', 'related_products'));
    }
}
