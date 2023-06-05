<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    // Your model code here
    protected $table = 'PAYMENT';

    protected $fillable = [
        'PAYMENT_METHOD',
        'DELETE_PAYMENT',
        'PAYMENT_DETAIL',
    ];
}

