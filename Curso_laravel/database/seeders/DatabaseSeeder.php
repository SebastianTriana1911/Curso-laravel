<?php
// Los Seeder funcionan de la misma manera que creando registros desde los
// modelos con el comando php artisan make:tinker, pues en los seeder es
// necesario instanciar un objeto de la clase que representa la tabla en 
// nuestra base de datos y de ahi se le asignan las columnas con sus respectivos
// datos

// Dicho objeto con los registros ya creados se suben a la base de datos con
// el comando php artisan db:seed

// Para tener un mayor orden y no tener un reguero de instancias en el archivo
// se crean diferentes archivos que representen su tabla y alli se le asignan
// todos sus registros

// Para crear un Seeder es con el siguiente comando:
// php artisan make:seeder (Nombre descriptivo del seeder)


namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

// Se importa el archivo que contiene los seeders que deseamos subir a la bd
use Database\Seeders\CursoSeeder;

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
        
    }
}
