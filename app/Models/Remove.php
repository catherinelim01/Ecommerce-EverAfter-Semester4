<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Remove extends Model
{
    protected $table = 'product_cart';
    protected $primaryKey = null; // Karena tabel memiliki composite primary key (PRODUCT_ID, CART_ID)
    public $incrementing = false;
}
?>