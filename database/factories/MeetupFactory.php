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

$factory->define(App\Meetup::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'start_date' => '2018-01-05 01:01:01',
        'end_date' => '2018-01-05 01:01:01',
        'detail' => 'About sample',
        'address' => $faker->address,
        'summary_image_url' => $faker->url,
        'city' => $faker->city,
    ];
});
