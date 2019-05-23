<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'category_id' => function () {
            return factory(App\Category::class)->create()->id;
        },
        'brand_id' => function () {
            return factory(App\Brand::class)->create()->id;
        },
        'name' => $faker->name,
        'price' => $faker->numberBetween(100, 1000),
        'discount' => 0,
        'image' => $faker->imageUrl( $width = 200, $height = 200),
        'image_list' => $faker->imageUrl( $width = 200, $height = 200),
    ];
});
