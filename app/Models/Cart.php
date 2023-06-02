<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'cart_id';
    public $timestamps = false;

    protected $fillable = [
        'customer_id',
        'cart_status',
        'delete_cart',
    ];

    // Definisikan relasi antara Cart dengan model Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    // Definisikan relasi antara Cart dengan model ProductCart
    public function productCarts()
    {
        return $this->hasMany(ProductCart::class, 'cart_id', 'cart_id');
    }
}