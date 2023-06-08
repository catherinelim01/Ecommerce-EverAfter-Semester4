<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UpdateQty extends Model
{
    protected $table = 'PRODUCT_CART';
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;
}