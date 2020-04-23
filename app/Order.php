<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable =[
        'user_id',
        'to_user_id',
        'product_id',
        'name',
        'description',
        'price',
        'quantity',
        'validate',
    ];
}
