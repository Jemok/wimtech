<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        DB::table('categories')->insert([

            'category_name' => 'Laptops',
            'category_description'=> 'Laptops',
            'category_class'  => 'buy',
            'user_id' => 1

        ]);

        DB::table('categories')->insert([

            'category_name' => 'Power Banks',
            'category_description'=> 'Power Banks',
            'category_class'  => 'rent',
            'user_id' => 1


        ]);

        DB::table('categories')->insert([

            'category_name' => 'Jewels',
            'category_description'=> 'Jewels',
            'category_class'  => 'pg',
            'user_id' => 1


        ]);

        DB::table('categories')->insert([

            'category_name' => 'Bags',
            'category_description'=> 'Bags',
            'category_class'  => 'sell',
            'user_id' => 1


        ]);

        DB::table('categories')->insert([

            'category_name' => 'Shoes',
            'category_description'=> 'Shoes',
            'category_class'  => 'loan'

        ]);

        DB::table('categories')->insert([

            'category_name' => 'Clothes',
            'category_description'=> 'Clothes',
            'category_class'  => 'apart',
            'user_id' => 1


        ]);

        DB::table('categories')->insert([

            'category_name' => 'Phones',
            'category_description'=> 'Phones',
            'category_class'  => 'deal',
            'user_id' => 1


        ]);
    }
}
