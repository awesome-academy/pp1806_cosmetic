<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'total_price' => $faker->numberBetween(100, 1000),
        'description' => $faker->sentence,
        'address_shipping' => $faker->sentence,
        'status' => array_rand([1, 2, 3, 4]),
    ];
});
