<?php

// Los Seeder funcionan de la misma manera que creando registros desde los
// modelos con el comando php artisan make:tinker, pues en los seeder es
// necesario instanciar un objeto de la clase que representa la tabla en 
// nuestra base de datos y de ahi se le asignan las columnas con sus respectivos
// datos

// Dicho objeto con los registros ya creados dse suben a la base de datos con
// el comando php artisan db:seed

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Curso;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Instancia de una clase (Tabla) Curso
        $curso = new Curso();

        // Objeto instanciado con los registros de los diferentes campos
        // de la tabla
        $curso -> nombre = "Laravel";
        $curso -> descripcion = "El mejor framework de PHP";
        $curso -> categoria = "Desarrollo web";

        // Objeto salvado para con el comando db:seed subir dichos registros
        // que contiene a la base de datos
        $curso -> save();

        // ------------------------  NUEVO REGISTRO ----------------------------

        $curso2 = new Curso();

        $curso2 -> nombre = "PHP";
        $curso2 -> descripcion = "El mejor lenguaje de programacion";
        $curso2 -> categoria = "Desarrollo web";

        $curso2 -> save();
        
    }
}
