<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

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
            'detail' => '
              <p> 
                We are going to talk about tools, tips, and tricks - so basically we will have post-it notes where we write down topics and then we vote per session (10-20 minutes long) which one to tackle. When topic is being talked about, we take a pause every 15 minutes to discuss if we should continue with the topic or continue with a different topic on the post-it note.
              </p>
              <p> 
                LeanCoffee (http://leancoffee.org)is a simple activity for open discussion of various topics.
              </p>
              <p> 
                There will be post-it notes to be used or we can use an online one to list down topics and vote on each one (we can also use trello if ever).
              </p>
              <p>
                Thanks and see you on Saturday!
              </p>',
            'start_date' =>  '2018-07-21 14:00:00',
            'end_date' =>  '2018-07-21 16:00:00',
            'address' => 'CoffeeBean Shangri-La',
            'summary_image_url' => URL::current() . '/images/users/coffee.jpeg',
            'city' => 'Makati',
        ]);

        DB::table('meetup')->insert([
            'id' => 2,
            'title' => 'LaravelPH Meetup',
            'detail' => "Our meetup this time will be about frontend development. We're looking for speakers!",
            'start_date' =>  '2018-06-27 19:00:00',
            'end_date' =>  '2018-06-27 21:00:00',
            'address' => 'TBD',
            'summary_image_url' => URL::current() . '/images/users/laravel.jpeg',
            'city' => 'TBD',
        ]);

        DB::table('meetup')->insert([
            'id' => 3,
            'title' => 'TechMeetups Community Launch',
            'detail' => "Techmeetups launch! Techmeetups is here to help with your meetup needs from sharing to connecting with your audience. We'd really love feedback from you - both organizers and meetup-goers. If you have your meetup and you want to join, this is the time to join.",
            'start_date' =>  '2018-07-14 14:00:00',
            'end_date' =>  '2018-07-14 16:00:00',
            'address' => 'TBD',
            'summary_image_url' => URL::current() . '/images/users/meetup.png',
            'city' => 'TBD',
        ]);
    }
}
