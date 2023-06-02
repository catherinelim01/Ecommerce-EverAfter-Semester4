<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table = 'voucher';
    protected $primaryKey = 'voucher_id';
    // Atur kolom-kolom yang dapat diisi secara massal
    protected $fillable = ['voucher_name'];
    // Atur timestamp agar terlihat di model
    public $timestamps = false;
}
