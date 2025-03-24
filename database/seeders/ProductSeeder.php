<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fakeRecord = Faker::create();
        for ($i = 0; $i <= 5; $i++) {
            $product = new Product();
            $product->title = $fakeRecord->title;
            $product->description = $fakeRecord->text(50);
            $product->image = $fakeRecord->imageUrl();
            $product->price = $fakeRecord->numberBetween(10, 50);
            $product->category = $fakeRecord->randomElement([
                'Electronics',
                'Fashion',
                'Home and Living',
                'Beauty and Personal Care',
                'Fitness',
                'Toys and Games',
                'Kitchen',
                'Books',
                'Outdoor Gear',
                'Tech Accessories',
                'Gadgets'
            ]);
            $product->quantity = $fakeRecord->numberBetween(10, 50);
            $product->save();
        }
    }
}
