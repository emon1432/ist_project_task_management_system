<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert(array(
            0 =>
            array(
                'id' => 1,
                'user_type' => 'Admin',
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'roll_no' => NULL,
                'department' => NULL,
                'session' => NULL,
                'designation' => NULL,
                'email' => 'admin@gmail.com',
                'phone' => '01638849305',
                'password' => '$2y$10$ZOu6rcpAyd1NLH62n6SdN.RHjrVG0fLS4ymta1tJhFl5X1OODose.',
                'address' => 'Aftabnagar, Dhaka',
                'dob' => '1998-03-14',
                'image' => NULL,
                'created_at' => '2023-04-30 18:49:05',
                'updated_at' => '2023-04-30 18:49:05',
            ),
        ));
    }
}
