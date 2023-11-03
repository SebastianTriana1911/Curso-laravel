<?php
// Los Seeder funcionan de la misma manera que creando registros desde los
// modelos con el comando php artisan make:tinker, pues en los seeder es
// necesario instanciar un objeto de la clase que representa la tabla en 
// nuestra base de datos y de ahi se le asignan las columnas con sus respectivos
// datos

// Para tener un mayor orden y no tener un reguero de instancias en el archivo
// se crean diferentes archivos que representen su tabla y alli se le asignan
// todos sus registros

// Subir Seeder a la base de datos
// Dicho objeto con los registros ya creados se suben a la base de datos con
// el comando php artisan db:seed

// Crear un archivo de Seeders
// Para crear un Seeder es con el siguiente comando:
// php artisan make:seeder (Nombre descriptivo del seeder)


namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

// Se importa el archivo que contiene los seeders que deseamos subir a la bd
use Database\Seeders\CursoSeeder;

// Se importa el modelo de la clase curso para poder subir los Factorys de dicho
// modelo
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

        // Todos los sedder para que se ejecuten debe estar en esta carpeta
        // principal pero como los registros estan en las capetas correspondientes
        // que hacen referencia a sus tablas, se llaman cada una de esas carpetas
        // que en realidad son clases en un metodo call de la siguiente manera
        $this->call(CursoSeeder::class);
        
        // Se llama a la clase curso con el metodo estatico factory, este metodo
        // llamara el array que le pertenece a la clase CursoFactory que es el que
        // contiene todos los campos con sus diferentes metodos para instanciar registros
        // de prueba, dentro del metodo factory se le asigna entre parentesis la cantidad
        // de registros que se desea subir a la tabla seguido del metodo create 
        Curso::factory(30)->create();
    }
}
