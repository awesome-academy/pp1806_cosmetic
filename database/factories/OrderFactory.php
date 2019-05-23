<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'transaction_id' => function () {
            return factory(App\Transaction::class)->create()->id;
        },
        'product_id' => function () {
            return factory(App\Product::class)->create()->id;
        },
        'quantity' => $faker->numberBetween(1, 100),
        'amount' => $faker->numberBetween(100, 1000),
        'detail' => $faker->sentence,
        'status' => array_rand([0, 1], 1),
    ];
});
