<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Rafael Borges',
            'email' => 'rafaelborgesdev@gmail.com',
            'password' => bcrypt('rafael13'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Bianca Sanches',
            'email' => 'bianca.sanches@appventura.com',
            'password' => bcrypt('rafael13'),
            'role' => 'editor',
        ]);

        Category::factory(67)->create();
        Article::factory(123)->create();



    }
}
