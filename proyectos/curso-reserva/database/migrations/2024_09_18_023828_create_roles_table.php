<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Método que se ejecuta al aplicar la migración
    public function up(): void
    {
        // Creación de la tabla 'roles'
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // Campo de clave primaria (id)
            $table->string('name'); // Campo para el nombre del rol
            $table->timestamps(); // Campos para almacenar la fecha de creación y actualización
        });
    }

    // Método que se ejecuta al revertir la migración
    public function down(): void
    {
        // Elimina la tabla 'roles' si existe
        Schema::dropIfExists('roles');
    }
};

