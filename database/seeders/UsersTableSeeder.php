<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array(
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
                'is_member' => '0',
                'project_topic_id' => NULL,
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
                'is_member' => '0',
                'project_topic_id' => NULL,
                'email' => 'student1@gmail.com',
                'phone' => '01638849305',
                'address' => 'Aftabnagar, Dhaka',
                'password' => '$2y$10$ZOu6rcpAyd1NLH62n6SdN.RHjrVG0fLS4ymta1tJhFl5X1OODose.',
                'dob' => '1998-03-14',
                'image' => '1683220744.jpeg',
                'created_at' => '2023-05-04 17:14:20',
                'updated_at' => '2023-05-04 17:19:04',
            ),
            2 =>
            array(
                'id' => 3,
                'user_type' => 'Student',
                'first_name' => 'Aleam Hossain',
                'last_name' => 'Hasib',
                'roll_no' => '18037',
                'registration_no' => '17502004716',
                'department' => 'CSE',
                'session' => NULL,
                'designation' => NULL,
                'is_member' => '0',
                'project_topic_id' => NULL,
                'email' => 'student2@gmail.com',
                'phone' => '01638849305',
                'address' => 'Aftabnagar, Dhaka',
                'password' => '$2y$10$ZOu6rcpAyd1NLH62n6SdN.RHjrVG0fLS4ymta1tJhFl5X1OODose.',
                'dob' => '1998-03-14',
                'image' => '1683220744.jpeg',
                'created_at' => '2023-05-04 17:14:20',
                'updated_at' => '2023-05-04 17:19:04',
            ),
            3 =>
            array(
                'id' => 4,
                'user_type' => 'Student',
                'first_name' => 'Md. Redwan',
                'last_name' => 'Hossain',
                'roll_no' => '18036',
                'registration_no' => '17502004715',
                'department' => 'CSE',
                'session' => NULL,
                'designation' => NULL,
                'is_member' => '0',
                'project_topic_id' => NULL,
                'email' => 'student3@gmail.com',
                'phone' => '01638849305',
                'address' => 'Aftabnagar, Dhaka',
                'password' => '$2y$10$ZOu6rcpAyd1NLH62n6SdN.RHjrVG0fLS4ymta1tJhFl5X1OODose.',
                'dob' => '1998-03-14',
                'image' => '1683220744.jpeg',
                'created_at' => '2023-05-04 17:14:20',
                'updated_at' => '2023-05-04 17:19:04',
            ),
            4 =>
            array(
                'id' => 5,
                'user_type' => 'Student',
                'first_name' => 'Priyanka',
                'last_name' => 'Ghosh',
                'roll_no' => '18087',
                'registration_no' => '17502004716',
                'department' => 'CSE',
                'session' => NULL,
                'designation' => NULL,
                'is_member' => '0',
                'project_topic_id' => NULL,
                'email' => 'student4@gmail.com',
                'phone' => '01638849305',
                'address' => 'Aftabnagar, Dhaka',
                'password' => '$2y$10$ZOu6rcpAyd1NLH62n6SdN.RHjrVG0fLS4ymta1tJhFl5X1OODose.',
                'dob' => '1998-03-14',
                'image' => '1683220744.jpeg',
                'created_at' => '2023-05-04 17:14:20',
                'updated_at' => '2023-05-04 17:19:04',
            ),
            5 =>
            array(
                'id' => 6,
                'user_type' => 'Teacher',
                'first_name' => 'Teacher',
                'last_name' => '1',
                'roll_no' => NULL,
                'registration_no' => NULL,
                'department' => 'CSE',
                'session' => NULL,
                'designation' => 'Lecturer',
                'is_member' => '0',
                'project_topic_id' => '[5,6,9]',
                'email' => 'teacher1@gmail.com',
                'phone' => '+1 (285) 823-2494',
                'address' => 'Quis hic inventore q',
                'password' => '$2y$10$KzeM1edqejhYyqdjqA8Xau1jBSopDKZVwqWxgxb.bKk5MBCm9K9.u',
                'dob' => NULL,
                'image' => NULL,
                'created_at' => '2023-06-24 17:42:26',
                'updated_at' => '2023-06-24 17:42:26',
            ),
            6 =>
            array(
                'id' => 7,
                'user_type' => 'Teacher',
                'first_name' => 'Teacher',
                'last_name' => '2',
                'roll_no' => NULL,
                'registration_no' => NULL,
                'department' => 'BBA',
                'session' => NULL,
                'designation' => 'Associate Professor',
                'is_member' => '0',
                'project_topic_id' => '[2,3,6,8]',
                'email' => 'teacher2@gmail.com',
                'phone' => '+1 (958) 334-3485',
                'address' => 'Eos quisquam vero in',
                'password' => '$2y$10$Vc2v5EPT7F9EMsXQu7g0FOPOmsjWVdPij.ZPuaDw1f7TXlg.Om5Y6',
                'dob' => NULL,
                'image' => NULL,
                'created_at' => '2023-06-24 17:42:49',
                'updated_at' => '2023-06-24 17:42:49',
            ),
            7 =>
            array(
                'id' => 8,
                'user_type' => 'Teacher',
                'first_name' => 'Teacher',
                'last_name' => '3',
                'roll_no' => NULL,
                'registration_no' => NULL,
                'department' => 'CSE',
                'session' => NULL,
                'designation' => 'Assistant Professor',
                'is_member' => '0',
                'project_topic_id' => '[3,8]',
                'email' => 'teacher3@gmail.com',
                'phone' => '+1 (107) 779-9088',
                'address' => 'Expedita voluptate p',
                'password' => '$2y$10$K57.epJywPrvCy2N0cuq0OmZ/uwKVkdh19.qFDyRyntAmHLUgULNu',
                'dob' => NULL,
                'image' => NULL,
                'created_at' => '2023-06-24 17:43:17',
                'updated_at' => '2023-06-24 17:43:17',
            ),
        ));
    }
}
