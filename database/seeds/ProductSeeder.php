<?php
namespace Database\Seeds;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use App\Product;
class ProductSeeder extends Seeder{
    public function run(){
        $faker = Faker\Factory::create();
        for ($i=0; $i <= 15; $i++) {
          Product::create([
              'title' => $faker->sentence(6 , true),
              'model_number' => $faker->randomNumber(4),
              'slug' => $faker->slug,
              'description' => $faker->sentence(15),
              'body' => $faker->paragraph(3,true),
              'image' => 'https://placehold.it/500x800',
              'category_id' => rand(1,5),
              'price' => rand(1,20),
              'status' => 'Available',
              'weight' => 10,
              'height' => 60,
              'width' => 112,
              'discount_id' => null,
              'is_promoted' => 0,
              'size' => 'bb',
              'season' => 'summer',
              'type' => 'pajama',
              'use_id' => 5,
          ]);
        }

    }
}
