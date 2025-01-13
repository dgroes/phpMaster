<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Método que se ejecuta al aplicar la migración
    public function up(): void
    {
        // Modificación de la tabla 'users' para eliminar la columna 'name'
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('name'); // Elimina la columna 'name' de la tabla 'users'
        });
    }

    // Método que se ejecuta al revertir la migración
    public function down(): void
    {
        // Reversión de la migración: se vuelve a agregar la columna 'name'
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->nullable(); // Vuelve a añadir el campo 'name', permitiendo valores nulos
        });
    }
};

