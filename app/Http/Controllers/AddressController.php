<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\CustomerCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Alert;


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


    public function saveAddress(Request $request)
{
    // Validasi inputan jika diperlukan
    // $validatedData = $request->validate([
    //     'country' => 'required',
    //     'province' => 'required',
    //     'CityTes' => 'required',
    //     'subdistrict' => 'required',
    //     'postal_code' => 'required',
    //     'street' => 'required',
    //     'phone' => 'required|numeric',
    // ]);

    // Mendapatkan nilai input
    $phone = $request->input('phone');
    $country = $request->input('country');
    $province = $request->input('province');
    $city = $request->input('CityTes');
    $subdistrict = $request->input('subdistrict');
    $postalCode = $request->input('postalcode');
    $street = $request->input('street');
    $phone = $request->input('phone');

    // Menggabungkan alamat menjadi satu string
    $address =  $street . ',' . $subdistrict . ', ' . $province . ', ' . $postalCode . ', ' . $country;
    // Melakukan proses penyimpanan alamat ke database atau operasi lain yang diinginkan
    // Misalnya, menghasilkan ID alamat baru menggunakan metode tertentu
    

    // Melakukan insert ke dalam tabel address
    DB::table('address')
    ->where('address_id', 'A00002')
    ->update([
        'customer_id' => session('customer_id'),
        'phone' => $phone,
        'address' => $address,
        'delete_address' => 0,
    ]);


    // Setelah selesai, Anda dapat mengembalikan respons atau melakukan pengalihan halaman jika perlu
    return redirect('/profile')->with('success', 'Address saved successfully.');

}


}