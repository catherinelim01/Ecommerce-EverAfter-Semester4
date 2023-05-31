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
//     public function getRelatedProducts(Request $request)
// {
//     $productName = $request->input('product_name');
//     $sessionProduct = session('product_name');

//     $whereClause = [];
//     if (!empty($productName) || !empty($sessionProduct)) {
//         $productNames = [$productName, $sessionProduct];
//         $categoryIds = Product::whereIn('product_name', $productNames)
//             ->pluck('category_id')
//             ->toArray();

//         if (!empty($categoryIds)) {
//             $whereClause[] = ['p2.category_id', '=', $categoryIds[0]];
//             if (count($categoryIds) > 1) {
//                 $whereClause[] = ['p2.category_id', '<>', $categoryIds[1]];
//             }
//         }
//     }

//     $relatedProducts = Product::from('product as p1')
//         ->distinct()
//         ->select('p2.product_name', 'p2.product_price', 'p2.product_url', 'p2.product_detail')
//         ->join('product as p2', 'p1.category_id', '=', 'p2.category_id')
//         ->join('category as c', 'p2.category_id', '=', 'c.category_id')
//         ->where($whereClause)
//         ->orderByRaw('RAND()')
//         ->limit(4)
//         ->get();

//     $html = view('product_details.related_products')
//         ->with('relatedProducts', $relatedProducts)
//         ->render();

//     return response()->json(['success' => true, 'html' => $html]);
// }

    public function showProductDetails($product_name)
    {
        $related_products = Product::where('product_name', '!=', $product_name)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('product_details', compact('product', 'related_products'));
    }
    
    
}
