<?php

use Faker\Generator as Faker;

$factory->define(App\Attendee::class, function (Faker $faker) {
    return [
        'id' => '1',
        'meetup_id' => '1',
        'email' => $faker->unique()->safeEmail
    ]; 
});
