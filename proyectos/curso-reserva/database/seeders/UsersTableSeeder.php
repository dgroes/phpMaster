<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    // Crear un Administrador, Tener en consideración el UserFactory!
    // C07 - Seeders de usuarios
    public function run(): void
    {
        // Creación de un usuario administrador de manera manual
        User::create([
            'nombres' => 'Admin',
            'apellidos' => 'Principal',
            'teléfono' => '1234567890',
            'email' => 'admin@example.com',
            'foto' => null,
            'password' => Hash::make('password'),
            'rol_id' => 1 //Administador
        ]);

        User::factory()->count(3)->create([
            'rol_id' => 2 //Consultores
        ]);

        User::factory()->count(10)->create([
            'rol_id' => 3 //Usuarios comunes
        ]);
    }
}
