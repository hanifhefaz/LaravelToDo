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
            array('id' => '1','title' => 'First Task','description' => 'my first task','isShow' => '1','status' => 'ACTIVE','category_id' => '1','assignee' => '8','created_by' => '3','updated_by' => NULL,'deleted_by' => NULL,'created_at' => '2022-01-11 08:09:43','updated_at' => '2022-01-11 08:09:43'),
            array('id' => '2','title' => 'Second Task','description' => 'second task','isShow' => '1','status' => 'PENDING','category_id' => '1','assignee' => '3','created_by' => '3','updated_by' => NULL,'deleted_by' => NULL,'created_at' => '2022-01-11 08:27:57','updated_at' => '2022-01-11 08:27:57'),
            array('id' => '3','title' => 'Third Task','description' => 'third task','isShow' => '1','status' => 'DONE','category_id' => '1','assignee' => '9','created_by' => '3','updated_by' => NULL,'deleted_by' => NULL,'created_at' => '2022-01-11 08:31:05','updated_at' => '2022-01-11 08:31:05')
          );


          foreach ($tasks as $task){

            Task::create($task);
        }
    }

}