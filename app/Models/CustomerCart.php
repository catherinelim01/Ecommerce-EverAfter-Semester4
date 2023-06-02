<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'CUSTOMER';
    protected $primaryKey = 'CUSTOMER_ID';
    public $timestamps = false;

    // Hubungan dengan model Address
    public function addresses()
    {
        return $this->hasMany(Address::class, 'CUSTOMER_ID', 'CUSTOMER_ID');
    }
}
