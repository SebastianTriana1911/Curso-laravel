<?php
// La metodologia eloquent toma todos los registros de una tabla
// como objetos

// Si deseamos convertir registros en objetos lo podriamos realizar
// desde la terminar utilizando el comando php artisan tinker

// Para usar el modelo en el que estamos se asigna con la palabra
// reservada use seguido del nombre que tenga el namespace y el nombre
// del modelo, asi:
// use App\Models\Curso

// Se debe de instanciar un nuevo objeto de la clase en la que estemos
// para que esta actue como el nuevo registro que vayamos a subir
// $curso = new Curso

// Ya instanciado el objeto se le asigna los campos y sus valores:
// $curso -> nombre = "Sebastian"

// Al subir dicha variable que contiene toda la informacion del nuevo 
// registro se le asigna a la variable el metodo save()

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    // Si se desea que el modelo apunte a otra tabla distinta, por ejemplo
    // que le modelo Curso actue como el modelo de la tabla usuarios lo 
    // asignaremos de la siguiente manera
    // protected $table = "users";
}
