<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'emoplyee_no' => $faker->randomNumber,
        'name' => $faker->words(rand(1, 4), true),
        'designation_id' => $faker->randomElement(\App\Designation::pluck('id')->toArray()),
        'department' => $faker->words(rand(1, 4), true),
        'company' => $faker->company,
        'salary' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 5000),
        'joining_date' => $faker->date(),
        'termination_date' => $faker->date()
    ];
});
