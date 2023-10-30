<?php
// Creado desde la terminal Git Bash con el comando:
// php artisan make:controller (Nombre del controlador)

// namespace hace referencia de la ruta de donde se crea el archivo
namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Clase nombrada de la misma manera que el proyecto HomeController
class HomeController extends Controller{

    // Metodo propio de la clase HomeController que retorna una vista

    // __invoke solo funcionara para una sola ruta en especial y es /
    public function __invoke(){

        // Se retorna la vista que se encuentra en la carpeta views y
        // se llama home
        return view("home");
    }
}
?>