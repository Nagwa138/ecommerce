<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        User::create([
//           'name' => 'Super admin',
//           'email' => 'admin@app.com',
//           'password' => bcrypt(123456),
//           'role' => 'admin'
//        ]);
//
//        $this->call([
//            CategorySeeder::class
//        ]);

        Product::factory(20)->create()->each(function ($product) {
            $product->categories()->attach(Category::first());
        });

    }
}
