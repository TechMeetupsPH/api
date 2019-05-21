<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('roles')->insert([
         'id' => 1,
         'role' => 'regular',
             'is_admin' => false
           ]);

         DB::table('roles')->insert([
           'id' => 2,
           'role' => 'organizer',
             'is_admin' => false
           ]);

         DB::table('roles')->insert([
           'id' => 3,
           'role' => 'admin',
             'is_admin' => true
           ]);

        //tester is for devs/qa to see things. "dummy" user
         DB::table('roles')->insert([
           'id' => 4,
           'role' => 'tester',
           'is_admin' =>false 
         ]);

       //super has special powers
         DB::table('roles')->insert([
           'id' => 5,
           'role' => 'superadmin',
           'is_admin' => true 
         ]);
    }
}
