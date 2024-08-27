<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'Добавление пользователей', 'slug' => 'create-users']);
        Permission::create(['name' => 'Редактирование пользователей', 'slug' => 'edit-users']);
        Permission::create(['name' => 'Удаление пользователей', 'slug' => 'delete-users']);

        Permission::create(['name' => 'Добавление статей', 'slug' => 'create-posts']);
        Permission::create(['name' => 'Редактирование статей', 'slug' => 'edit-posts']);
        Permission::create(['name' => 'Удаление статей', 'slug' => 'delete-posts']);

        Permission::create(['name' => 'Добавление сотрудников', 'slug' => 'create-names']);
        Permission::create(['name' => 'Редактирование сотрудников', 'slug' => 'edit-names']);
        Permission::create(['name' => 'Удаление сотрудников', 'slug' => 'delete-names']);
    }
}
