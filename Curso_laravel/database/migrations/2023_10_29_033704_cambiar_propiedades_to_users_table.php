<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Se pasa el campo con el nuevo tipo de dato
            $table->string("name", 150)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Se pasa el campo con el tipo de dato que tiene antes
            // de modificarlo
            $table->string("name", 255)->change();
        });
    }
};
