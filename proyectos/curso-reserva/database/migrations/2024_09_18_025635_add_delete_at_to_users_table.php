<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Método que se ejecuta al aplicar la migración
    public function up(): void
    {
        // Modificación de la tabla 'users' para agregar el soporte de eliminación suave (soft deletes)
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes(); // Agrega la columna 'deleted_at' para las eliminaciones suaves
        });
    }

    // Método que se ejecuta al revertir la migración
    public function down(): void
    {
        // Reversión de la migración: elimina el soporte de soft deletes
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Elimina la columna 'deleted_at'
        });
    }
};

