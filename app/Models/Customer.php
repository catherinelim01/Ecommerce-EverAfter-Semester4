<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

<<<<<<< Updated upstream
class Customer extends Model implements AuthenticatableContract
{
=======
class Customer extends Model implements AuthenticatableContract{
>>>>>>> Stashed changes
    use Authenticatable;

    protected $table = 'customer';
    protected $primaryKey = 'customer_id';
    protected $fillable = ['customer_email', 'customer_password'];
    
    // ...
}
