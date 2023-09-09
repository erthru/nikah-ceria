<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
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
        $user = User::create([
            'email' => 'admin@nikahceria.com',
            'password' => bcrypt('123456')
        ]);

        Admin::create([
            'name' => 'Admin',
            'user_id' => $user->id
        ]);

        for ($i = 0; $i < 4; $i++) {
            Product::create([
                'code' => 'p' . $i + 1,
                'name' => 'Example Product ' . $i + 1,
                'description' => 'Example short or not so long description that will use on the product ' . $i + 1,
                'thumbnail' => 'placeholder.png',
                'price' => 0,
                'discount' => null,
                'discount_expires_at' => null,
                'demo_url' => '#',
                'is_active' => 1,
            ]);
        }
    }
}
