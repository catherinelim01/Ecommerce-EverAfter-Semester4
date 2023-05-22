<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Register;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    public function login(Request $request)
{
    $credentials = $request->only('customer_email', 'customer_password');
    $credentials['password'] = $credentials['customer_password'];

    // Hapus kunci 'customer_password' jika diperlukan
    unset($credentials['customer_password']);

    // Periksa apakah elemen 'password' ada dan tidak null
    if (isset($credentials['password']) && !is_null($credentials['password'])) {
        // Cetak nilai password
        

        // Verifikasi kredensial pengguna
        if (Auth::attempt($credentials)) {
            // Log in berhasil, hapus pesan error jika ada
            $request->session()->forget('errors');
            
            return redirect()->intended('/profile');
        } else {
            // Log in gagal
            dd($credentials['password']);
            return redirect()->back()->withInput()->withErrors('Invalid email or password');
        }
    } else {
        // Jika elemen 'password' tidak ada atau null
    }}

    
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