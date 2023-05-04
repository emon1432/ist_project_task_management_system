<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
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
                'registration_no' => NULL,
                'department' => NULL,
                'session' => NULL,
                'designation' => NULL,
                'email' => 'admin@gmail.com',
                'phone' => '01638849305',
                'address' => 'Aftabnagar, Dhaka',
                'password' => '$2y$10$ZOu6rcpAyd1NLH62n6SdN.RHjrVG0fLS4ymta1tJhFl5X1OODose.',
                'dob' => '1998-03-14',
                'image' => '1683137089.jpeg',
                'created_at' => '2023-04-30 18:49:05',
                'updated_at' => '2023-05-03 18:04:49',
            ),
            1 =>
            array(
                'id' => 2,
                'user_type' => 'Student',
                'first_name' => 'Md khairul Islam',
                'last_name' => 'Emon',
                'roll_no' => '18038',
                'registration_no' => '17502004717',
                'department' => 'CSE',
                'session' => NULL,
                'designation' => NULL,
                'email' => 'e.mon143298@gmail.com',
                'phone' => '01638849305',
                'address' => 'Aftabnagar, Dhaka',
                'password' => '$2y$10$H/k1FzlDKAZTQLeoO6/41.NOdtWQF9c5XJkywYV3L.shnhZofzbmi',
                'dob' => '1998-03-14',
                'image' => '1683220744.jpeg',
                'created_at' => '2023-05-04 17:14:20',
                'updated_at' => '2023-05-04 17:19:04',
            ),
        ));
    }
}
