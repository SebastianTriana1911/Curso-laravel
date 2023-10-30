<?php
// M

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
        // Metodo table - se utiliza cuando se desea actualizar una 
        // tabla que ya existe
        Schema::table('users', function (Blueprint $table) {
            // Se asigna el nuevo campo que se le agregara a la tabla.
            // Si deseamos crear un nuevo campo a una tabla que ya
            // tenga registros y no deseamos que nos genere error es
            // importante asignarle al campo el metodo nullable
            $table->string("avatar")->nullable()->after("email");
            // El metodo after nos ayudara a insertar el nuevo campo 
            // adelante del campo que le asignemos como parametro
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("avatar");
        });
    }
};
