<?php

namespace Database\Seeders;

use App\Models\Name;
use App\Models\Post;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(NameSeeder::class);
        // User::factory(10)->create();
        for ($i = 1; $i < 11; $i++) {
            User::factory()->create([
                'name' => 'user' . $i,
                'email' => 'r' . $i . '@m.ru',
                'password' => bcrypt('12345678'),
            ]);
        }
        Post::factory(30)->create();
//        Name::factory()->create([
//            'first_name' => 'Ruslan',
//            'last_name' => 'Oznor',
//            'type' => 'admin',
//            'password' => bcrypt('12345678'),
//        ]);
    }
}
