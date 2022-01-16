<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            array('id' => '1','name' => 'Admin','email' => 'admin@dashboard.af','email_verified_at' => NULL,'password' => '$2y$10$LYiWoulNceRrBD6tJcpADOLh92yMOqBDxWioJ6JOe6PV1q0Cw89mK','remember_token' => NULL,'created_at' => '2022-01-09 07:18:27','updated_at' => '2022-01-09 07:18:27'),
            array('id' => '2','name' => 'ggg','email' => 'admin@dashboard.aff','email_verified_at' => NULL,'password' => '$2y$10$.5ciALLBYBLWZVy8D7.bU.2vCJ08ddtkfrcyQSU9CbYM97V2jejPi','remember_token' => NULL,'created_at' => '2022-01-16 06:12:50','updated_at' => '2022-01-16 06:12:50')
          );
          foreach ($users as $user){

            User::create($user);
        }
    }
}