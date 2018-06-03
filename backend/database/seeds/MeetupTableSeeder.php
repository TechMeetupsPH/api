<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeetupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('meetup')->insert([
            'id' => 1,
            'title' => 'CoPHPee with LaravelPH',
            'about' => 'Discuss PHP and Laravel over a cup of coffee.',
            'start_date' =>  '2018-07-21 14:00:00',
            'end_date' =>  '2018-07-21 16:00:00',
            'address' => 'CoffeeBean Shangri-La',
            'summary_image_url' => 'http://localhost:8080/images/users/coffee.jpeg',
            'city' => 'Makati',
        ]);

        DB::table('meetup')->insert([
            'id' => 2,
            'title' => 'LaravelPH Meetup',
            'about' => "Our meetup this time will be about frontend development. We're looking for speakers!",
            'start_date' =>  '2018-06-27 19:00:00',
            'end_date' =>  '2018-06-27 21:00:00',
            'address' => 'TBD',
            'summary_image_url' => 'http://localhost:8080/images/users/laravel.jpeg',
            'city' => 'TBD',
        ]);

        DB::table('meetup')->insert([
            'id' => 3,
            'title' => 'TechMeetups Community Launch',
            'about' => "Techmeetups launch! Techmeetups is here to help with your meetup needs from sharing to connecting with your audience. We'd really love feedback from you - both organizers and meetup-goers. If you have your meetup and you want to join, this is the time to join.",
            'start_date' =>  '2018-07-14 14:00:00',
            'end_date' =>  '2018-07-14 16:00:00',
            'address' => 'TBD',
            'summary_image_url' => 'http://localhost:8080/images/users/meetup.jpg',
            'city' => 'TBD',
        ]);
    }
}
