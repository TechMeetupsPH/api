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
            'title' => 'Meetup 1',
            'about' => 'About Meetup',
            'start_date' =>  '2018-06-06 11:00:00',
            'end_date' =>  '2018-06-06 13:00:00',
            'address' => '#1 Meetup Street, Meetup City'
        ]);

        DB::table('meetup')->insert([
            'id' => 2,
            'title' => 'Meetup 2',
            'about' => 'About Meetup',
            'start_date' =>  '2018-06-07 12:00:00',
            'end_date' =>  '2018-06-07 14:00:00',
            'address' => '#2 Seeya Street, Hello City'
        ]);

        DB::table('meetup')->insert([
            'id' => 3,
            'title' => 'Meetup 3',
            'about' => 'About Meetup',
            'start_date' =>  '2018-06-06 16:00:00',
            'end_date' =>  '2018-06-06 17:00:00',
            'address' => '#3 Here Street, Where City'
        ]);
    }
}
