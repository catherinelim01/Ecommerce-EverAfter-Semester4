<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{

    // public function orderDetail(Request $request)
    // {
    //     $orderid = $request->input('orderid');
        

    //     return response()->json(['success' => true, 'orderid' => $orderid]);
    // }
    

    public function orderDetail(Request $request)
    {
        $orderid = $request->input('orderid');
        
        // Merender tampilan order_detail.blade.php
        $view = View::make('order_detail')->render();
        
        // Mengembalikan isi tampilan sebagai respons JSON
        return response()->json(['success' => true, 'orderid' => $orderid, 'content' => $view]);
    }


}