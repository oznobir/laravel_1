<?php

namespace Database\Seeders;

use App\Models\Chirp;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(NameSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        for ($i = 1; $i < 11; $i++) {
            User::factory()->create([
                'name' => 'user' . $i,
                'email' => 'r' . $i . '@m.ru',
                'password' => bcrypt('12345678'),
            ]);
        }
        Post::factory(30)->create();
        Chirp::factory(40)->create();
    }
}
