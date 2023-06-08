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


    public function saveAddress(Request $request)
{
    // Validasi inputan jika diperlukan
    $validatedData = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'country' => 'required',
        'province' => 'required',
        'city' => 'required',
        'subdistrict' => 'required',
        'postal_code' => 'required',
        'street' => 'required',
        'phone' => 'required|numeric',
    ]);

    // Mendapatkan nilai input
    $addressid = $request->input('addressid');
    $phone = $request->input('phone');
    $country = $request->input('country');
    $province = $request->input('province');
    $city = $request->input('city');
    $subdistrict = $request->input('subdistrict');
    $postalCode = $request->input('postal_code');
    $street = $request->input('street');

    // Menggabungkan alamat menjadi satu string
    $address =  $street . ',' . $subdistrict . ', ' . $province . ', ' . $city . ', ' . $postalCode . ', ' . $country;
    // Melakukan proses penyimpanan alamat ke database atau operasi lain yang diinginkan
    // Misalnya, menghasilkan ID alamat baru menggunakan metode tertentu

    // Melakukan insert ke dalam tabel address
    DB::table('address')->insert([
        'address_id' => 'A00001',
        'customer_id' => session('customer_id'),
        'phone' => $phone,
        'address' => $address,
        'is_primary' => 0,
    ]);

    // Setelah selesai, Anda dapat mengembalikan respons atau melakukan pengalihan halaman jika perlu
    return redirect()->back()->with('success', 'Address saved successfully.');
}


}