<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed default admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@blog.com',
            'password' => bcrypt('admin123'),
        ]);

        // Seed blog posts
        $this->call([
            BlogSeeder::class,
        ]);
    }
}
