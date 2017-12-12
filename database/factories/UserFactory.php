<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Company::class, function (Faker $faker){
   return [
        'name' => $faker->name,
        'cnpj' => $faker->numberBetween(21210,1000000000),
        'address'=> $faker->address,
        'phone' => random_int(10000000,999999999),
   ];
});

$factory->define(App\Models\Doctor::class, function (Faker $faker){
    return [
        'name' => $faker->name,
        'crm' => $faker->numberBetween(21210,1000000000),
    ];
});

$factory->define(App\Models\Exam::class, function (Faker $faker){
    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween(210,300),
        'description' => $faker->sentence(),
    ];
});
$factory->define(App\Models\Employee::class, function (Faker $faker){
    return [
        'name' => $faker->name,
        'function' => str_random(10),
        'date_of_birth' => $faker->date('Y-m-d'),
    ];
});

$factory->define(App\Models\Service::class, function (Faker $faker){
    return [
        'doctor_id' => random_int(1,10),
        'employee_id' => random_int(1,10),
        'company_id'  => random_int(1,10),
        'exam_date' => $faker->date('Y-m-d'),
    ];
});