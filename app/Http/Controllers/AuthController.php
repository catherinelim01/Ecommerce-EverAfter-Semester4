<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class AuthController extends Controller
{
    
   
    public function login(Request $request)
    {
        $email = $request->input('customer_email');
        $password = $request->input('customer_password');
    
        $customer = DB::table('customer')
    ->where('customer_email', $email)
    ->where('customer_password', $password)
    ->select('customer_id')
    ->first();

if ($customer && isset($customer->customer_id)) {
    // Store customer information in the session
    Session::put('customer_id', $customer->customer_id);
    Session::put('login_time', time()); // Store the login time

    // Redirect the user to the profile page
    return redirect('/profile');
} else {
    // Credentials are invalid, display an error message
    return back()->withErrors(['message' => 'Invalid email or password']);
}

            
    }
    

 
    
    
    public function register(Request $request)
{
    // Validasi form
    $this->validate($request, [
        'customer_name' => 'required',
        'customer_email' => 'required|email',
        'customer_password' => 'required',
    ]);

    // Mengambil nilai dari form
    $name = $request->input('customer_name');
    $email = $request->input('customer_email');
    $password = $request->input('customer_password');

    // Check if customer email already exists
    $existingCustomer = Register::where('customer_email', $email)->first();
    if ($existingCustomer) {
        // Jika email sudah terdaftar, kirimkan pesan kesalahan
        return redirect()->back()->withInput()->withErrors('Email already exists');
    }

    // Mengambil customer_id terakhir
    $lastCustomerId = DB::table('customer')
        ->select('customer_id')
        ->orderBy('customer_id', 'desc')
        ->limit(1)
        ->value('customer_id');

    // Menginisialisasi nomor awal
    $newNumber = 1;

    if ($lastCustomerId) {
        // Jika ada customer sebelumnya, ambil nomor dari customer_id terakhir
        $lastNumber = (int) substr($lastCustomerId, 1);

        // Increment nomor
        $newNumber = $lastNumber + 1;
    }

    // Format nomor dengan nol di depan
    $formattedNumber = str_pad($newNumber, 5, '0', STR_PAD_LEFT);

    // Gabungkan dengan prefix "C" untuk customer_id baru
    $newCustomerId = 'C' . $formattedNumber;

    // Buat instansi model Customer
    $customer = new Register();
    $customer->customer_id = $newCustomerId;
    $customer->customer_name = $name;
    $customer->customer_email = $email;
    $customer->customer_password = $password;
    $customer->delete_customer = 0;

    // Simpan data pengguna ke dalam tabel "customer"
    $customer->save();

    // Redirect ke halaman sukses pendaftaran
    return redirect('/profile');
}

    
}    