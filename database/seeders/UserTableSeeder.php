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
            array('id' => '3','name' => 'Adriel Denesik','email' => 'irma.parisian@example.org','email_verified_at' => '2022-01-11 07:30:23','password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','remember_token' => 'V7IeMpkYVr','created_at' => '2022-01-11 07:30:23','updated_at' => '2022-01-11 07:30:23'),
            array('id' => '4','name' => 'Devonte Brekke','email' => 'gerhold.dan@example.org','email_verified_at' => '2022-01-11 07:30:23','password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','remember_token' => 'ER17zEtkVc','created_at' => '2022-01-11 07:30:23','updated_at' => '2022-01-11 07:30:23'),
            array('id' => '5','name' => 'Nya Gulgowski','email' => 'auer.cora@example.net','email_verified_at' => '2022-01-11 07:30:23','password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','remember_token' => 'U0rxZbvQVc','created_at' => '2022-01-11 07:30:23','updated_at' => '2022-01-11 07:30:23'),
            array('id' => '6','name' => 'Muhammad Howe','email' => 'treva.orn@example.com','email_verified_at' => '2022-01-11 07:30:23','password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','remember_token' => 'LeHMVK9MB5','created_at' => '2022-01-11 07:30:23','updated_at' => '2022-01-11 07:30:23'),
            array('id' => '7','name' => 'Alfonso Towne IV','email' => 'theresa.tremblay@example.org','email_verified_at' => '2022-01-11 07:30:23','password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','remember_token' => '1uSzpZdgj4','created_at' => '2022-01-11 07:30:23','updated_at' => '2022-01-11 07:30:23'),
            array('id' => '8','name' => 'Prof. Hertha Block','email' => 'dena.welch@example.net','email_verified_at' => '2022-01-11 07:30:23','password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','remember_token' => 'pbfFOekUK2','created_at' => '2022-01-11 07:30:23','updated_at' => '2022-01-11 07:30:23'),
            array('id' => '9','name' => 'Mateo Kshlerin','email' => 'omills@example.org','email_verified_at' => '2022-01-11 07:30:23','password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','remember_token' => 'ePeswddcHx','created_at' => '2022-01-11 07:30:24','updated_at' => '2022-01-11 07:30:24'),
            array('id' => '10','name' => 'Marcelina Stracke PhD','email' => 'kyla.orn@example.net','email_verified_at' => '2022-01-11 07:30:23','password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','remember_token' => 'yPqpHALlq8','created_at' => '2022-01-11 07:30:24','updated_at' => '2022-01-11 07:30:24')
          );
          foreach ($users as $user){

            User::create($user);
        }
    }
}