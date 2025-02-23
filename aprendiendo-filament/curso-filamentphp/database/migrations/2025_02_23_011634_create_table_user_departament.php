<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    /* C10: Tablas Pivote */
    public function up(): void
    {
        Schema::create('table_user_departament', function (Blueprint $table) {
            $table->foreignId('user_id');
            $table->foreignId('departament_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_user_departament');
    }
};
