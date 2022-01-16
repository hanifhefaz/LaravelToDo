<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = array(
            array('id' => '1','title' => 'First Task','description' => 'My first task','isShow' => '1','status' => 'ACTIVE','category_id' => '1','created_by' => '1','updated_by' => NULL,'deleted_by' => NULL,'deleted_at' => NULL,'created_at' => '2022-01-16 10:55:44','updated_at' => '2022-01-16 10:55:44'),
            array('id' => '2','title' => 'Second Task','description' => 'second task','isShow' => '1','status' => 'DONE','category_id' => '1','created_by' => '1','updated_by' => NULL,'deleted_by' => NULL,'deleted_at' => NULL,'created_at' => '2022-01-16 10:56:05','updated_at' => '2022-01-16 10:56:05'),
            array('id' => '3','title' => 'Third Task','description' => 'test','isShow' => '1','status' => 'PENDING','category_id' => '1','created_by' => '2','updated_by' => NULL,'deleted_by' => NULL,'deleted_at' => NULL,'created_at' => '2022-01-16 10:56:57','updated_at' => '2022-01-16 10:56:57'),
            array('id' => '4','title' => 'Fourth','description' => 'test','isShow' => '1','status' => 'ACTIVE','category_id' => '1','created_by' => '2','updated_by' => NULL,'deleted_by' => NULL,'deleted_at' => NULL,'created_at' => '2022-01-16 10:57:16','updated_at' => '2022-01-16 10:57:16')
          );


          foreach ($tasks as $task){

            Task::create($task);
        }
    }

}