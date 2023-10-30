<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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

        // ------------------------  NUEVO REGISTRO ----------------------------

        $curso3 = new Curso();

        $curso3 -> nombre = "Python";
        $curso3 -> descripcion = "Uno de los mejores lenguajes de programacion";
        $curso3 -> categoria = "Desarrollo web";

        $curso3 -> save();

    }
}
