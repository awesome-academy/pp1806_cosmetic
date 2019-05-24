<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'total' => $faker->numberBetween(100, 1000),
        'payment_method'=> 'cash',
        'payment_info' => $faker->sentence,
        'message' => 'on time',
        'status' => array_rand(array(0, 1), 1),
    ];
});
