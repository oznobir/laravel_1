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
        $user1 = new Name();
        $user1->first_name = 'Руслан';
        $user1->last_name = 'Озноб';
        $user1->password = bcrypt('12345678');
        $user1->save();

        $user2 = new Name();
        $user2->first_name = 'Маша';
        $user2->last_name = 'Серова';
        $user2->password = bcrypt('12345678');
        $user2->save();

        $user3 = new Name();
        $user3->first_name = 'Ваня';
        $user3->last_name = 'Петров';
        $user3->password = bcrypt('12345678');
        $user3->save();

    }
}
