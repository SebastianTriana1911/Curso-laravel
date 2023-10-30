<?php
// --------------------------------------------------------------------------

// Crear una migracion desde consola es con el comando
// php artisan make:migration create_(nombre de la tabla)_table

// --------------------------------------------------------------------------

// Refrescar todos los cambios de una base de datos pero eliminando registros
// php artisan migration:fresh

// --------------------------------------------------------------------------

// Eliminar el ultimo lote de una migracion
// php artisan make:rollback

// --------------------------------------------------------------------------

// Actualizar los cambios que se realizen a una tabla
// php artisan make:migration add_(nombre del campo que se desea actualizar)_
// to_(nombre de la tabla que se va alterar)

// --------------------------------------------------------------------------

// Modificar un tipo de dato de una tabla
// php artisan make:migration cambiar_propiedades_to_(nombre de la tabla que 
// se va alterar)_table

// --------------------------------------------------------------------------

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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->text("descripcion");
            $table->text("categoria");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
