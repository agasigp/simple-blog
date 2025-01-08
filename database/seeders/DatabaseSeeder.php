<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Article::factory(20)->create([
            'user_id' => $user->id,
        ]);
        Article::factory(5)->create([
            'user_id' => $user->id,
            'is_published' => false
        ]);
    }
}
