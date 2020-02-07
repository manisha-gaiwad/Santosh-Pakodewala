<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Expenses;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(\App\Expenses::class, function (Faker $faker) {
    return [
        'date' => $faker->dateTime,
            'branch_id' => Str::random(10),
            'item_details' => $faker->text,
            'quantity' => $faker->randomNumber(2),
            'price' => $faker->randomNumber(3),
            'total_price' =>$faker->randomNumber(3),
            'unit_id' =>Str::random(10),  
    ];
});
