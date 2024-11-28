<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "Manuel Arías";
        $user->email = "manuel@gmail.com";
        $user->password = bcrypt('124325');

        $user->save();

        User::factory(50)->create();
    }
}
