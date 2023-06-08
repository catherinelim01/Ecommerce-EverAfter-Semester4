<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\RajaOngkir;

// use App\Models\UpdateQty;
// use Illuminate\Support\Facades\Request;

class DeliveryController extends Controller
{
  public function getDeliveryCost(Request $request)
  {
    $deliveryName = $request->input('deliveryName');

    // Query database untuk mendapatkan harga pengiriman berdasarkan nama pengiriman
    $deliveryCost = DB::table('DELIVERY')
      ->where('DELIVERY_NAME', $deliveryName)
      ->value('DELIVERY_COST');

    return response()->json(['deliveryCost' => $deliveryCost]);
  }

  public function getProvinces()
{
    $rajaOngkir = new RajaOngkir();
 
    // Manipulasi atau tampilkan data provinsi yang didapatkan
}
}