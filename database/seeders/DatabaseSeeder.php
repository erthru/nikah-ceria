<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
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
    }
}
