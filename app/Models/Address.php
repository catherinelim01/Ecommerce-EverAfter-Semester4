<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'ADDRESS';
    protected $primaryKey = 'ADDRESS_ID';
    public $timestamps = false;

    // Hubungan dengan model Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'CUSTOMER_ID', 'CUSTOMER_ID');
    }
}
