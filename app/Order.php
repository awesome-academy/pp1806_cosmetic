<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'total_price',
        'description',
        'status',
        'address_shipping'
    ];

    function user() {

        return $this->belongsTo('App\User');
    }

    function products() {

        return $this->belongsToMany('App\Product', 'order_products', 'order_id', 'product_id')->withPivot('quantity', 'price');
    }
}
