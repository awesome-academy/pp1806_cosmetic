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
}
