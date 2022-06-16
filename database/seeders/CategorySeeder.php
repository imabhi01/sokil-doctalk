<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $categories = [
        'Covid Essentials', 
        'Devices', 
        'Nutrition and Fitness Supplements', 
        'Personal Care',
        'Ayurvedic Care',
        'Baby and Mom Care',
        'Skin Care',
        'Diabetic Care',
        'Sexual Wellness',
        'Short Term Aliments',
        'Lifestyle Aliments',
        'Home Care',
        'Women Care',
        'Health foods and Drinks',
        'Ortho Care',
        'Pets Care'
    ];
    
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Category::truncate();

        foreach($this->categories as $category){
            Category::create([
                'title' => $category,
                'slug' => Str::slug($category),
                'status' => 1
            ]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
