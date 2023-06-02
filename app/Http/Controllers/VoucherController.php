<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class VoucherController extends Controller
{

public function showCart(Request $request)
{
    $voucher = $request->input('voucherInput');

    // Retrieve other cart data or calculations if needed
    $vouchers = DB::table('voucher')
    ->where('voucher_name', $voucher)
    ->select('discount')
    ->first();
    
if ($voucher && isset($voucher->discount)) {
    // return view('cart')->with('vouchers', $vouchers);
    return redirect('/cart');
} else {
    // Credentials are invalid, display an error message
    return redirect('/cart');
}   
}
public function applyVoucher(Request $request)
{
    $voucherInput = $request->input('voucherInput');
    $subtotal = $data[0]["total"];
    $tax = $data[0]["pajak"];
    
    // Retrieve the voucher from the database based on the voucher name
    $voucher = Voucher::where('voucher_name', $voucherInput)->first();
    
    if ($voucher) {
        $discount = $subtotal * ($voucher->discount / 100); // Calculate the discount based on the voucher's discount percentage
        $total = $subtotal + $tax - $discount;
    } else {
        $total = $subtotal + $tax;
    }
    
    // Pass the total value back to the view
    return view('your_view')->with(['total' => $total]);
}
// public function login(Request $request)
// {
   
//     $password = $request->input('customer_password');

//     $customer = DB::table('customer')
// ->where('customer_email', $email)
// ->where('customer_password', $password)
// ->select('customer_id')
// ->first();

// if ($customer && isset($customer->customer_id)) {
// // Store customer information in the session
// echo '<div class="alert alert-success">';
// echo 'Login successful! You are now logged in.';
// echo '</div>';
// Session::put('customer_id', $customer->customer_id);
// Session::put('login_time', time()); // Store the login time

// // Redirect the user to the profile page
// return redirect('/profile');
// } else {
// // Credentials are invalid, display an error message
// return back()->withErrors(['message' => 'Invalid email or password']);
// }

        
// }
    
}

