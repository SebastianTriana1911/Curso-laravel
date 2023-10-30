<?php
// Creado desde la terminal Git Bash con el comando:
// php artisan make:controller (Nombre del controlador)

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// CursoController funcionara como un controlador que manejara metodos que
// funcionaran como rutas para una mejor legibilidad de estas
class CursoController extends Controller{

    // Los metodos de la clase CursoController retornaran una vista diferente
    // que mostrara contenido relacionado al metodo que las retorna, dichas
    // vistas se encuantran en la carpeta resourse - views
    
    // Por conveniencia a los metodos que mostraran la pagina de inicio se
    // llaman index
    public function index(){
        return view("cursos.index");
    }

    // Por conveniencia a los metodos que mostraran las paginas donde se crean
    // algun nuevo elemento se llama create
    public function create(){
        return view("cursos.create");
    }

    // Por conveniencia las paginas en las que se muestran algun elemento se llaman
    // como show
    // Cuando el metodo recibe uno o mas parametros es importate que al metodo view
    // se le asigne un parametro de mas, el cual hara referencia a una variable que
    // reciba la informacion que contenga la variable que se pasa como parametro de la
    // y asi mismo poder retornarla en la vista
    public function show($curso){
        return view("cursos.show", ["curso" => $curso]);
    }
}
