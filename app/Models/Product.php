<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;


class Product extends Model
{

    protected $table = "product";
    protected $fillable = ['product_name'];
    protected $primaryKey = 'product_id';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
