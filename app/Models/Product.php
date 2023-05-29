<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
