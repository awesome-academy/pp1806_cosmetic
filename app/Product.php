<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
        'brand_id',
        'name',
        'price',
        'image',
        'image_list',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function brand() {
        return $this->belongsTo('App\Brand');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order', 'order_products', 'product_id', 'order_id');
    }
}
