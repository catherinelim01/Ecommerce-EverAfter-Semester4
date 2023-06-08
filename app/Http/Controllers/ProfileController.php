<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
// use Illuminate\Support\Facades\Request;

class ProfileController extends Controller
{
    public function editProfile(Request $request)
    {
        if ($request->has('action')) {
            $first_name = $request->input('first_name');
            $last_name = $request->input('last_name');
            $customer_email = $request->input('customer_email');
            $password = $request->input('password');
            $new_password = $request->input('new_password');
            $confirm_password = $request->input('confirm_password');
            
            // Mengganti nilai null dengan ""
            $first_name = $first_name ?? "";
            $last_name = $last_name ?? "";
            $customer_email = $customer_email ?? "";
            
            // Cek jika last_name null atau kosong, maka jangan lakukan CONCAT
            $name = $last_name ? "$first_name $last_name" : $first_name;
            
            // Pengecekan password
            $passwordMatched = false;
            if ($password) {
                $customer_id = session('customer_id');
                $result = DB::select("SELECT customer_password FROM customer WHERE customer_id = ?", [$customer_id]);
                
                foreach ($result as $row) {
                    $dbPassword = $row->customer_password;
                    if ($password === $dbPassword) {
                        if($new_password === $password){
                            return back()->with('error', 'Masukkan password yang berbeda');
                        }
                        else if ($new_password === $confirm_password && $new_password!=null && $new_password!=""){
                            $passwordMatched = true;
                            break;
                        }else{
                            $passwordMatched = false;
                            return back()->with('error', 'Masukkan password yang berbeda');
                        }
                    }
                }
                if ($passwordMatched) {
                    $sql = "UPDATE CUSTOMER
                            SET CUSTOMER_NAME = ?,
                                CUSTOMER_EMAIL = ?,
                                CUSTOMER_PASSWORD = ?
                            WHERE CUSTOMER_ID = ?";
                                    
                    DB::update($sql, [$name, $customer_email, $new_password, session('customer_id')]);
                                
                    return redirect('/profile');
                }else{
                    return back()->with('error', 'Password yang Anda masukkan salah.');
                }
            }            
            else {
                $sql = "UPDATE CUSTOMER
                        SET CUSTOMER_NAME = ?,
                            CUSTOMER_EMAIL = ?
                        WHERE CUSTOMER_ID = ?";
                                
                DB::update($sql, [$name, $customer_email, session('customer_id')]);
                return redirect('/profile');
               
            }
        }
    }
    public function logout(Request $request)
    {
            session()->forget('customer_id'); // Ganti "user" dengan nama kunci session yang sesuai dalam aplikasi Anda
        
            // Redirect ke halaman login atau halaman lain setelah log out
            return redirect('/index'); // Ganti "login" dengan rute yang sesuai dalam aplikasi Anda
    }
    public function city(Request $request)
    {
        $selectedTitle = $request->input('selectedTitle');
        session(['selectedTitle' => $selectedTitle]);
        $view = View::make('profile-city')->render();
        // Berikan respons atau lakukan tindakan lain yang diinginkan
        return response()->json(['success' => true, 'link' => $selectedTitle, 'content' => $view]);
    }
}
