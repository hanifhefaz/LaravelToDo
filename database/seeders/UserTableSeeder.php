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
            array('id' => '1','name' => 'Lonnie Daniel','email' => 'zreichel@example.net','email_verified_at' => '2022-01-11 07:30:23','password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','remember_token' => 'ZgjzJN5ydF','created_at' => '2022-01-11 07:30:23','updated_at' => '2022-01-11 07:30:23'),
            array('id' => '2','name' => 'Oliver Keeling','email' => 'hailie.hackett@example.net','email_verified_at' => '2022-01-11 07:30:23','password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','remember_token' => 'cg2RQyeuht','created_at' => '2022-01-11 07:30:23','updated_at' => '2022-01-11 07:30:23'),
            array('id' => '3','name' => 'Adriel Denesik','email' => 'irma.parisian@example.org','email_verified_at' => '2022-01-11 07:30:23','password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','remember_token' => 'V7IeMpkYVr','created_at' => '2022-01-11 07:30:23','updated_at' => '2022-01-11 07:30:23')
          );
          foreach ($users as $user){

            User::create($user);
        }
    }
}
