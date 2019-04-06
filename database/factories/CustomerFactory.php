<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {  
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->randomNumber,
        'shopname' => $faker->name,
        'address' => $faker->address,
        'photo' => $faker->image('public/images/customer/', 200, 200, 'cats'),
        'account_holder' => $faker->name,
        'account_number' => $faker->randomNumber, 
        'bank_name' => $faker->name, 
        'bank_brance' => $faker->city, 
        'city' => $faker->city, 
    ];
});
