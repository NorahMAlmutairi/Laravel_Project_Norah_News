<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create(['name' => 'Politics']);
        Category::create(['name' => 'Sports']);
        Category::create(['name' => 'Entertainment']);
        Category::create(['name' => 'Travel']);
        Category::create(['name' => 'Business']);
        Category::create(['name' => 'Technology']);
        Category::create(['name' => 'Culture']);
        Category::create(['name' => 'World']);
    }
}
