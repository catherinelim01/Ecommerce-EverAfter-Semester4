<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\CustomerCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AddressController extends Controller
{
    public function showAddresses()
    {
        // Mengambil data alamat dari database menggunakan model Address dan Customer pada Laravel
        $addresses = Address::join('CUSTOMER', 'ADDRESS.CUSTOMER_ID', '=', 'CUSTOMER.CUSTOMER_ID')
            ->select('CUSTOMER.CUSTOMER_NAME', 'ADDRESS.ADDRESS', 'ADDRESS.PHONE')
            ->get();

        return view('address.index', compact('address'));
    }
}