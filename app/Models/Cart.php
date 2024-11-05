<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Create relationship between 'cart' and 'user' table
    public function user()
    {
        // user_id -> primary key
        // id -> foreign key
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    // Create relationship between 'cart' and 'product' table
    public function product()
    {
        // product_id -> primary key
        // id -> foreign key
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
