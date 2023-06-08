<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCart extends Model
{
    protected $table = 'product_cart';
    protected $primaryKey = 'cart_id';
    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'cart_id',
    ];

    // Definisikan relasi antara ProductCart dengan model Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    // Definisikan relasi antara ProductCart dengan model Cart
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id', 'cart_id');
    }
}