<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Método que se ejecuta al aplicar la migración
    public function up(): void
    {
        // Modificación de la tabla 'users' para añadir la columna 'rol_id'
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('rol_id')->after('id'); // Se añade la columna 'rol_id' después del campo 'id'
            // Se establece una clave foránea para 'rol_id' que referencia el campo 'id' de la tabla 'roles'
            // Si un rol es eliminado, también se eliminarán los usuarios asociados a ese rol (onDelete('cascade'))
            $table->foreign('rol_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }

    // Método que se ejecuta al revertir la migración
    public function down(): void
    {
        // Se define el comportamiento para revertir los cambios de la migración
        Schema::table('users', function (Blueprint $table) {
            // Aquí puedes eliminar la columna o la relación si fuera necesario (aún no se define acción en este caso)
        });
    }
};

