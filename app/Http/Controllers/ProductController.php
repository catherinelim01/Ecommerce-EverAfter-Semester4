<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
<<<<<<< Updated upstream
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\View;
=======
use App\Models\Product; // Assuming your product model is named "Product"
use Illuminate\Support\Facades\DB;
>>>>>>> Stashed changes

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
<<<<<<< Updated upstream
        $view = View::make('product_details')->render();
      
    //     // Contoh: Mengembalikan tampilan atau respon JSON
        // return response()->json(['success' => true, 'link' => $link]);
        return response()->json(['success' => true, 'link' => $link, 'content' => $view]);
=======
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
>>>>>>> Stashed changes
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('searching');
        
        // Perform your search query using $searchTerm

        // Example: Searching in the 'product' table using product_name column
        $results = DB::table('product')
            ->where('product_name', 'LIKE', "%{$searchTerm}%")
            ->get();

        // Pass the search results to the view
        // echo "<script>alert('Search term: $results->product_name');</script>";
        return view('search-results', compact('results'));
    }
}
