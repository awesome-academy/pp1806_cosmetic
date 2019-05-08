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
        'discount',
        'image',
        'image_list',
        'count_buy',
        'view',
    ];
}
