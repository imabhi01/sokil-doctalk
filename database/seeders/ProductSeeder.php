<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\CategoryProduct;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $faker;

    public function __construct(Faker $faker){
        $this->faker = $faker;
    }

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Product::truncate();

        for($i = 1; $i <= 10; $i++){
            
            $imageStrings = ['1639415145.png', '1639415201.png', '1639418663.png', '1639418674.png', '1639419736.png', '1639419835.png', '1639419821.png'];
        
            $isDealValue = rand(0, 1);
    
            $product = Product::create([
                'title' => $this->faker->name(),
                'slug' => Str::slug($this->faker->name()),
                'desc' => $this->faker->text(),
                'image' => $imageStrings[array_rand($imageStrings)],
                'price' => rand(200, 900),
                'is_deal' => $isDealValue,
                'deal_price' => ($isDealValue == 1) ? rand(200, 900) : null,
                'status' => 1
            ]);

            $product->categories()->attach([rand(1, 10)]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
