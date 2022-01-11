<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array(
            array('id' => '1','name' => 'Daily','created_by' => '1','updated_by' => NULL,'deleted_by' => NULL,'created_at' => '2022-01-11 08:09:12','updated_at' => '2022-01-11 08:09:12'),
            array('id' => '2','name' => 'Night','created_by' => '1','updated_by' => NULL,'deleted_by' => NULL,'created_at' => '2022-01-11 08:09:12','updated_at' => '2022-01-11 08:09:12'),
            array('id' => '3','name' => 'Weekend','created_by' => '1','updated_by' => NULL,'deleted_by' => NULL,'created_at' => '2022-01-11 08:09:12','updated_at' => '2022-01-11 08:09:12'),
          );
          foreach ($categories as $category){

            Category::create($category);
        }
    }

}