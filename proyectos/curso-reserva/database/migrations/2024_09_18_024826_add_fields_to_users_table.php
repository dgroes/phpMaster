<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Método que se ejecuta al aplicar la migración
    public function up(): void
    {
        // Modificación de la tabla 'users' para añadir nuevos campos
        Schema::table('users', function (Blueprint $table) {
            $table->string('nombres')->after('id'); // Añade el campo 'nombres' después del campo 'id'
            $table->string('apellidos')->after('nombres'); // Añade el campo 'apellidos' después del campo 'nombres'
            $table->string('teléfono')->after('apellidos'); // Añade el campo 'teléfono' después del campo 'apellidos'
            $table->string('foto')->nullable()->after('email'); // Añade el campo 'foto' después del campo 'email', permitiendo valores nulos
        });
    }

    // Método que se ejecuta al revertir la migración
    public function down(): void
    {
        // Se define el comportamiento para revertir los cambios de la migración
        Schema::table('users', function (Blueprint $table) {
            // Aquí puedes eliminar los campos añadidos si fuera necesario (aún no se define acción en este caso)
        });
    }
};

