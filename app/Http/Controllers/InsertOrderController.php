<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class InsertOrderController extends Controller
{
    public function placeOrder(Request $request)
    {

        // $request->validate([
        //     'ORDER_ID' => 'required',
        //     'CUSTOMER_ID' => 'required',
        //     'PAYMENT_ID' => 'required',
        //     'DELIVERY_ID' => 'required',
        //     'VOUCHER_ID' => 'required',
        //     'ORDER_DATE' => 'required',
        //     'total_qty' => 'required',
        //     'GRAND_TOTAL' => 'required',
        //     'TOTAL_POTONGAN' => 'required',
        //     'TOTAL_PAJAK' => 'required',
        //     'DELETE_ORDER' => 'required',
        //     'ADDRESS_ID' => 'required',
        //     'STATUS'=>'required',
        // ]);
        // $voucherName = Session::get('voucherCode');

        

        // $voucherId = $voucher ? $voucher->voucher_id : null;
        // $orderId = $request->input('ORDER_ID');
        // $customerId = request()->session()->get('customer_id');
        // $paymentId = $request->input('PAYMENT_ID');
        // $voucherId = request()->session()->get('voucherCode');
 
        // $deliveryId = $request->input('DELIVERY_ID');
        // $voucherId = "HAPPY20";
        // $orderDate = "2022-10-01 10:00:00";
        // $totalQty = $request->input('total_qty');
        // $grandTotal = request()->session()->get('subtotalpayment');
        // $totalPotongan = request()->session()->get('diskonpayment');
        // $totalPajak = request()->session()->get('pajakpayment');
        // $address = $request->input('ADDRESS_ID');
        // $deleteOrder = $request->input('DELETE_ORDER');
        // $statusDeliv = $request->input('STATUS');

        $orderId = "ORD00026";
        $customerId = request()->session()->get('customer_id');
        $paymentId = "PMT14";
        $voucherId = "request()->session()->get('voucherCode')";
 
        $deliveryId = "D00001";
        $voucherId = "VCH001";
        $orderDate = "2022-10-01 10:00:00";
        $totalQty = "4";
        $grandTotal = "762000";
        
        $totalPotongan = "74000";
        $totalPajak = "33000";
        $address = "A00002";
        $deleteOrder = "0";
        $statusDeliv = "0";

        DB::table('order')->insert([
            'ORDER_ID' => $orderId,
            'CUSTOMER_ID' => $customerId,
            'PAYMENT_ID' => $paymentId,
            'DELIVERY_ID' => $deliveryId,
            'VOUCHER_ID' => $voucherId,
            'ORDER_DATE' => $orderDate,
            'total_qty' => $totalQty,
            'GRAND_TOTAL' => $grandTotal,
            'TOTAL_POTONGAN' => $totalPotongan,
            'TOTAL_PAJAK' => $totalPajak,
            'DELETE_ORDER' => $deleteOrder,
            'ADDRESS_ID' => $address,
            'status' =>$statusDeliv , 
        ]);


        return response()->json(['message' => $orderId]);
    }
}
