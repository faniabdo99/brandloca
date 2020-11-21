<?php
namespace Database\Factories;
use App\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
class ProductsFactory extends Factory{
    protected $model = Product::class;
    public function definition(){
        $faker = Faker\Factory::create();
        return [
        
        ];
    }
}
