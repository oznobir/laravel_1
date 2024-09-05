<?php

namespace Database\Seeders;

use App\Models\Name;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'Администратор', 'slug' => 'admin']);
        $editor = Role::create(['name'  => 'Редактор сайта', 'slug' => 'web-editor']);
        $manager = Role::create(['name'  => 'Менеджер', 'slug' => 'manager']);

        $show_users =  Permission::create(['name' => 'Просмотр пользователей', 'slug' => 'show-users']);
        $create_users =   Permission::create(['name' => 'Добавление пользователей', 'slug' => 'create-users']);
        $edit_users =  Permission::create(['name' => 'Редактирование пользователей', 'slug' => 'edit-users']);
        $delete_users =   Permission::create(['name' => 'Удаление пользователей', 'slug' => 'delete-users']);

        $show_posts =   Permission::create(['name' => 'Просмотр статей', 'slug' => 'show-posts']);
        $create_posts =   Permission::create(['name' => 'Добавление статей', 'slug' => 'create-posts']);
        $edit_posts =   Permission::create(['name' => 'Редактирование статей', 'slug' => 'edit-posts']);
        $delete_posts =   Permission::create(['name' => 'Удаление статей', 'slug' => 'delete-posts']);

        $show_names =   Permission::create(['name' => 'Просмотр сотрудников', 'slug' => 'show-names']);
        $create_names =   Permission::create(['name' => 'Добавление сотрудников', 'slug' => 'create-names']);
        $edit_names =  Permission::create(['name' => 'Редактирование сотрудников', 'slug' => 'edit-names']);
        $delete_names =   Permission::create(['name' => 'Удаление сотрудников', 'slug' => 'delete-names']);

        $show_chirps =   Permission::create(['name' => 'Просмотр комментариев', 'slug' => 'show-chirps']);
        $create_chirps =   Permission::create(['name' => 'Добавление комментариев', 'slug' => 'create-chirps']);
        $edit_chirps =   Permission::create(['name' => 'Редактирование комментариев', 'slug' => 'edit-chirps']);
        $delete_chirps =   Permission::create(['name' => 'Удаление комментариев', 'slug' => 'delete-chirps']);

        $admin->permissions()->attach($show_users);
        $admin->permissions()->attach($create_users);
        $admin->permissions()->attach($edit_users);
        $admin->permissions()->attach($delete_users);

        $admin->permissions()->attach($show_posts);
        $admin->permissions()->attach($create_posts);
        $admin->permissions()->attach($edit_posts);
        $admin->permissions()->attach($delete_posts);

        $admin->permissions()->attach($show_names);
        $admin->permissions()->attach($create_names);
        $admin->permissions()->attach($edit_names);
        $admin->permissions()->attach($delete_names);

        $admin->permissions()->attach($show_chirps);
        $admin->permissions()->attach($create_chirps);
        $admin->permissions()->attach($edit_chirps);
        $admin->permissions()->attach($delete_chirps);

        $editor->permissions()->attach($show_posts);
        $editor->permissions()->attach($create_posts);
        $editor->permissions()->attach($edit_posts);
        $editor->permissions()->attach($delete_posts);

        $editor->permissions()->attach($show_chirps);
        $editor->permissions()->attach($edit_chirps);

        $manager->permissions()->attach($show_users);
        $manager->permissions()->attach($create_users);
        $manager->permissions()->attach($edit_users);

        $manager->permissions()->attach($show_posts);

        $manager->permissions()->attach($show_names);

        $manager->permissions()->attach($show_chirps);
        $manager->permissions()->attach($create_chirps);
        $manager->permissions()->attach($edit_chirps);

        $names1 = Name::find(1);
        $names2 = Name::find(2);
        $names3 = Name::find(3);

        $names1->assignRole($admin->slug);
        $names2->assignRole($editor->slug);
        $names3->assignRole($manager->slug);

    }
}
