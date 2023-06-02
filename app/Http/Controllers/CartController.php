<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CartController extends Controller
{
    public function getCart(Request $request)
    {
        $value = $request->input('value');
        session(['value' => $value]);
        return response()->json(['success' => true, 'value' => $value]);
    }
}
