<?php

namespace Database\Seeders;

use App\Models\Name;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::where('slug','admin')->first();
        $editor = Role::where('slug', 'editor')->first();
        $create_users = Permission::where('slug','create-users')->first();
        $edit_users = Permission::where('slug','edit-users')->first();
        $delete_users = Permission::where('slug','delete-users')->first();
        $create_posts = Permission::where('slug','create-posts')->first();
        $edit_posts = Permission::where('slug','edit-posts')->first();
        $delete_posts = Permission::where('slug','delete-posts')->first();
        $create_names = Permission::where('slug','create-names')->first();
        $edit_names = Permission::where('slug','edit-names')->first();
        $delete_names = Permission::where('slug','delete-names')->first();
        $user1 = new Name();
        $user1->first_name = 'Руслан';
        $user1->last_name = 'Озноб';
        $user1->password = bcrypt('12345678');
        $user1->save();
        $user1->roles()->attach($admin);
        $user1->permissions()->attach($create_users);
        $user1->permissions()->attach($edit_users);
        $user1->permissions()->attach($delete_users);
        $user1->permissions()->attach($create_posts);
        $user1->permissions()->attach($edit_posts);
        $user1->permissions()->attach($delete_posts);
        $user1->permissions()->attach($create_names);
        $user1->permissions()->attach($edit_names);
        $user1->permissions()->attach($delete_names);
        $user2 = new Name();
        $user2->first_name = 'Маша';
        $user2->last_name = 'Серова';
        $user2->password = bcrypt('12345678');
        $user2->save();
        $user2->roles()->attach($editor);
        $user2->permissions()->attach($create_posts);
        $user2->permissions()->attach($edit_posts);
        $user2->permissions()->attach($delete_posts);
    }
}
