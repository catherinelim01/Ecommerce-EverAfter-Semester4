<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Hash;


class PaymentController extends Controller
{

    // public function orderDetail(Request $request)
    // {
    //     $orderid = $request->input('orderid');
        

    //     return response()->json(['success' => true, 'orderid' => $orderid]);
    // }
    

    public function getPayment(Request $request)
    {
        $subtotalpayment = $request->input('subtotalpayment');
        $pajakpayment = $request->input('pajakpayment');
        $diskonpayment = $request->input('diskonpayment');
        $shippingpayment = $request->input('shippingpayment');
        $totalshipment = $request->input('totalshipment');
        session(['subtotalpayment' => $subtotalpayment]);
        session(['pajakpayment' => $pajakpayment]);
        session(['diskonpayment' => $diskonpayment]);
        session(['shippingpayment' => $shippingpayment]);
        session(['totalshipment' => $totalshipment]);

        return response()->json(['subtotalpayment' => $subtotalpayment ,'pajakpayment' => $pajakpayment,'diskonpayment' => $diskonpayment,'shippingpayment' => $shippingpayment,'totalshipment' => $totalshipment]);
    }


}