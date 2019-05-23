<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Slider;
use Faker\Generator as Faker;

$factory->define(Slider::class, function (Faker $faker) {
    return [
        'slider_link' => 'abc',
        'image' => $faker->imageUrl( $width = 200, $height = 600),
    ];
});
