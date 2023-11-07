<?php
// Creado desde la terminal Git Bash con el comando:
// php artisan make:controller (Nombre del controlador)

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Se importa el modelo curso para poder instanciar un objeto de dicha clase
// y poder llamar todos los registros que se encuentran en la base de datos
use App\Models\Curso;
use Illuminate\Support\Facades\Redis;

// CursoController funcionara como un controlador que manejara metodos que
// funcionaran como rutas para una mejor legibilidad de estas
class CursoController extends Controller{

    // Los metodos de la clase CursoController retornaran una vista diferente
    // que mostrara contenido relacionado al metodo que las retorna, dichas
    // vistas se encuantran en la carpeta resourse - views

    // ------------------------------------------------------------------------------

    // Por conveniencia a los metodos que mostraran la pagina de inicio se
    // llaman index
    public function index(){

        // Instancia de la clase curso la cual tendra todos los registros de la
        // tabla en la que se instancia gracias al metodo estatico all(), esta
        // podria ser una opcion sabiendo que hay pocos registros en la base de
        // datos ya que si por el contrario hay demaciados es muy probable que
        // se cargue mas lento la pagina web
        // $curso = Curso::all();

        // Cuando una base de datos cuenta con muchos registros y se desea mostrarlos
        // todos es muy recomendable usar el metodo paginate() pues este metodo solo
        // mostrara los 15 primeros registros y si por medio de un boton uno le 
        // indica a la vista que se desea mostrar el resto de paginas esta mostrara
        // los 15 siguientes y asi sucesivamente
        $curso = Curso::paginate();

        // A la variable que se instancio se le declara otra variable para poder
        // mostrar su valor en otra vista
        return view("cursos.index", ["cursos" => $curso]);
    }

    // ------------------------------------------------------------------------------

    // Por conveniencia a los metodos que mostraran las paginas donde se crean
    // algun nuevo elemento se llama create
    public function create(){
        return view("cursos.create");
    }

    // ------------------------------------------------------------------------------

    // Crear un nuevo registro para una tabla
    // Al crear un nuevo registro por lo general se hace por medio de un formulario,
    // para que dichos datos se almacenen en una variable para luego poder subirlos a
    // una base de datos se debe de crear una funcion y como parametros se le asigna
    // la palabra reservada Request seguido de una variable con el nombre request, esta
    // comando es el que recibira por medio del metodo POST todos los datos ingresados
    // por el formulario
    public function store(Request $request){

        // Validacion de formularios
        // Para validar de que un formulario es diligenciado con todos los campos llenos,
        // es importante hacer una validacion desde el metodo que recibe los datos de el
        // formulario, esto se realiza asignandole a la variable que recibe toda la 
        // informacion del formulario que es la variable request el metodo validate que
        // dentro de los parentesis se le asigna un array asignandole todos los campos que
        // tiene que diligenciar y pasandole un require para que obligatoriamente tenga 
        // que llenar todos los datos
        $request -> validate([
            "nombre" => "required",
            "categoria" => "required",
            "descripcion" => "required"
        ]);

        // Se instancia una variable de la clase cursos que sera la encargada de recibir
        // todos los datos de la variable request
        $curso = new Curso;

        // A la variable curso con el campo nombre se le asigna el valor de la variable
        // request en el campo nombre, (asi con el resto de campos)
        $curso -> nombre = $request -> nombre;
        $curso -> categoria = $request -> categoria;
        $curso -> descripcion = $request -> descripcion;

        // Se salva la variable curso que ya contiene todos los registros para previamente
        // subirlas a la base de datos
        $curso -> save(); 

        // Ahora cada que se diligencia el formulario dicha informacion se subira a la base
        // de datos  


        // Cuando se envia el registro que nosotros hayamos ingresado en el formulario a 
        // la base de datos queda una pantalla en blanco, por eso es necesario asignarle
        // al metodo redirect y a este asignarle el metodo route, pues este nos redireccionara
        // despues de enviar el formulario a la ruta que le pasemos como parametro en
        // el metodo route
        return redirect()->route("cursos.show", $curso->id);
    }

    // ------------------------------------------------------------------------------

    // Por conveniencia las paginas en las que se muestran algun elemento se llaman
    // como show
    // Cuando el metodo recibe uno o mas parametros es importate que al metodo view
    // se le asigne un parametro de mas, el cual hara referencia a una variable que
    // reciba la informacion que contenga la variable que se pasa como parametro de la
    // y asi mismo poder retornarla en la vista
    public function show($id){

        // Se instancia una variable del modelo Curso el cual utilizara el metodo estatico
        // find() y entre las llaves se le pasa el identificador unico. find() permite 
        // obtener toda la informacion de un registro segun su identificador unico, se realiza
        // de esta manera para que a la hora de llamar algun curso curso desde la vista index,
        // en la vista show se puedan visualizar los datos que se necesita gracias al retornar
        // la variable con todos sus registros 
        $curso = Curso::find($id);

        return view("cursos.show", ["curso" => $curso]);
    }

    // ------------------------------------------------------------------------------

    // Por conveniencia las paginas en las que se encuentran los formularios para actualizar
    // alguna informacion se llaman edit
    // Para saber que formulario y que datos actualizar se pasa como parametro el id 
    // del registro que deseamos cambiar, el id se pasa como parametro desde la vista
    // show 
    public function edit($id){

        // Se recolecta todos los datos dentro de un array con el metodo find y pasandole
        // como parametro el parametro que recibe la funcion
        $curso = Curso::find($id);
        
        // Se retorna la vista que contiene el formulario seguido de una variable para
        // poderla utilizar dentro del documento HTML
        return view("cursos.edit", ["curso" => $curso]);
    }

    // ------------------------------------------------------------------------------

    // Por conveniencia las paginas que reciben la informacion actualizada de un formulario
    // se llama update y dicho metodo debera tener en la ruta el metodo put
    // Se recibe como parametro dentro de el metodo update dos parametros, el primer
    // parametro sera la palabra reservada Request con la variable request que actua como
    // la variable que recolecta toda la informacion que se recibe por el formulario y como
    // segundo parametro es una variable que toma los datos que ya hayan como registro
    public function update(Request $request, $id){

        // Se recolecta todos los datos dentro de un array con el metodo find y pasandole
        // como parametro el parametro que recibe la funcion
        $curso = Curso::find($id);

        // A la variable curso con el campo nombre se le asigna el valor de la variable
        // request en el campo nombre, (asi con el resto de campos)
        $curso -> nombre = $request -> nombre;
        $curso -> categoria = $request -> categoria;
        $curso -> descripcion = $request -> descripcion;

        // Se salva la variable curso que ya contiene todos los registros para previamente
        // subirlas a la base de datos
        $curso -> save();

        // Ya diligenciado el formulario para actualizar los registros se redirecciona una
        // nueva ruta que va a mostrar una vista
        return redirect()->route("cursos.index");
    }
}
