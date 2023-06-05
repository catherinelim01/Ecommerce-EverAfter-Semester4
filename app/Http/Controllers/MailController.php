<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Illuminate\Console\View\Components\Alert;

class MailController extends Controller
{
    public function create()
    {
        return view('email');
    }

    public function sendEmail(Request $request)
    {

        echo '<script>alert("Email successfully sent!");</script>';

        $data = [
          'subject' => $request->subject,
          'name' => $request->name,
          'email' => $request->email,
          'content' => $request->content
        ];

        Mail::send('email-template', $data, function($message) use ($data) {
          $message->from($data['email']);
          $message->to('everafter.essentials@gmail.com');
          $message->subject($data['subject']);
        });

        return back()->with(['message' => 'Email successfully sent!']);
    }
}