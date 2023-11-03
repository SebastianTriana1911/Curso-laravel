<?php

// Para crear un Factory especificando el modelo que utilizara es con el comando
// php artisan make:factory (nombre del factory) --model=(Nombre del modelo que utilizara)

// Los Factory nos serviran para crear una catidad de de registros de prueba para verificar
// si los campos y los registros se suben correctamente a nuestra base de datos

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * 
     */
    public function definition(): array
    {
        return [
            // Se introducen los campos que contiene el modelo en este caso Curso

            // A la hora de crear un factory se le deben de indicar los campos de la
            // tabla que se desean llenar, seguido de la plabra reservada $this que
            // hace referencia a que la clase que se esta utilizando extendida de la
            // clase Factory utilizara el metodo faker y a este metodo se le asiga
            // un nuevo metodo que hara referencia a el tipo de dato que se ingresara
            // en dicho campo
            
            // sentence(): Este metodo rellenara el campo con un texto corto
            "nombre" => $this->faker->sentence(),

            // paragraph(): Este metodo rellenara el campo con un parrafo
            "descripcion" => $this->faker->paragraph(),

            // randomElement([]): Dentro de un array se ingresan las posibles opciones
            // y el metodo randomElement escojera una de ellas entre las que se encuentre
            // dentro del array
            "categoria" => $this->faker->randomElement(["Desarrollo", "Diseño"])     
        ];
    }
}
