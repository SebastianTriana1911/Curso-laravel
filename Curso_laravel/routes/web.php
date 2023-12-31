<?php

use Illuminate\Support\Facades\Route;

// Para usar un controlador es importante usarla copiando la ruta del namespace
// que ofrece laravel dentro del controlador que queremos usar, seguido del nombre
// de la clase que pertenece a dicho controlador de la siguiente manera
use App\Http\Controllers\HomeController;

use App\Http\Controllers\CursoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//-----------------------------------------------------------------------------------
// Ruta principal

Route::get('/', function(){
    return view('welcome');
});
//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------
// Ejemplo de una ruta

// El primer parametro del metodo estatico hace referencia a la url que se necesita
// para llegar al archivo que nos vaya a retornar la funcion
Route::get('/url', function () {

    // Este return hace referencia a lo que veremos a la hora de ingresar la url que
    // esta como primer parametro en el metodo get
    return "A este archivo fue que nos envia la url que se acaba de escribir";
});
//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------
// Rutas con algun identificador o identificadores como parametro (variables)

// El segundo parametro que sirve como un identificador es resivido por una variable
// que esta como parametro de la funcion anonima para utilizarla en el retorno de la 
// pagina
Route::get('/variable/{identificador}/{persona}',function ($identificador, $persona) {
    
    // Se retorna un mensaje mostrando el valor de la variable que resive el parametro
    // identificador
    return "El identificador que acaba de colocar la persona $persona es $identificador"; 
}) 
// Expresiones regulares: Las expresiones regulares nos ayudan a filtrar informacion de un
// parametro en un rango de caracteres, esto quiere decir que el usuario solo podra ingresar
// los caracteres que se le pasen como segundo parametro en la expresion regular.
// Ejemplo: El usuario al diligenciar su identificador solo podra ingresar datos del 0 al 9. 
-> where ('identificador','[0-9]+')
-> where ('persona','[a-zA-z]+');
//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------
// Ruta con identificador opcional

// Las variables que queremos que sean opcional se deben identificar con un signo de pregunta a
// la hora de declararlas, y hay que inicializarla nula en la funcion anonima de la siguiente
// manera. Este metododo nos ayudara ahorrar varia cantidad de rutas.
Route::get('opcional/{nombre}/{edad?}', function ($nombre, $edad = null){

    // Condicional donde se valida si la variable edad tiene algun valor o no.
    // Para evitar este codigo en la carpeta de rutas es importante crear un controlador con todo
    // el mecanismo de la ruta ya establecido para que sea un codigo mas ordenado y limpio
    if ($edad == null) {
        return "Usted es $nombre";
    }else{
        return "Usted es $nombre y tiene $edad";
    }
})
-> where ('nombre','[a-zA-z]+')
-> where ('edad','[0-9]+');
//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------
// Ruta desde un controlador invocando un metodo __invoke

// Al querer pasarle una ruta a un controlador se realiza de la misma manera el unico cambio es
// que ya no se pasa una funcion anonima si no el nombre de la clase que contiene el controlador
// con doble dos puntos (::) y la palabra reservada class
Route::get('/home',HomeController::class);
//-----------------------------------------------------------------------------------

//-----------------------------------------------------------------------------------
// Rutas desde un controlador con diferentes metodos

// Los controladores funcionan por clases y cada clase tiene diferentes metodos cada
// uno de esos metodos los podremos definir como una ruta de la siguiente manera, dentro
// de un array identificamos la clase que deseamos usar (nombre de la clase)::class, 
// seguido del metodo que deseamos llamar de la clase que estamos utilizando. Dicho metodo
// se activara cuando escribamos la url relacionada a dicho metodo de dicha clase, para 
// Laravel es importante que nosotros le demos a las rutas un nombre identificador para 
// poder acceder a dichas rutas por medio de las vistas. Estos nombres identificadores
// se realizan pasandole a cada ruta el metodo name, seguido del nombre identificador
// que les queramos dar

Route::get('cursos', [CursoController::class, 'index'])->name("cursos.index");
Route::get('cursos/create', [CursoController::class, 'create'])->name("cursos.create");

// Ruta que se encargara de recibir todos los datos que se manden por el formulario 
// de la vista create asignandole el metodo store del controlador Curso
Route::post('cursos', [CursoController::class, 'store'])->name("cursos.store");

// Ruta de controlador con variable
// Lo que se recibe desde la vista index la cual contiene todos los liks de todos
// los cursos es la variable curso que es la que contiene todos los registros pero
// asignandole el campo id, se le asigna que reciba como parametro un campo tipo id
Route::get('cursos/{id}',[CursoController::class, 'show'])->name("cursos.show");

// Ruta que se encarga de retornar un metodo que retorna una vista en la cual se 
// encuentra el mismo formulario para crear un curso pero en este caso sera el 
// formulario para actualizar dicho curso
Route::get("cursos/{id}/edit", [CursoController::class, "edit"])->name("cursos.edit");

// Ruta que se encarga de recibir los datos que llegan desde el formulario que funciona
// para actualizar un registro, se utiliza con el metodo put ya que deseamos actualizar,
// no deseamos ni mostrar que seria con el metodo get ni deseamos mandar a la base de 
// datos que seria con el metodo post, dicho metodo put se debe de declarar por una
// directiva blade desde el formulario de actualizacion (@method("put"))
Route::put("cursos/{id}", [CursoController::class, "update"])->name("cursos.update");

// Ruta que se encarga de eliminar un registro pasandole como parametro a la ruta, el campo 
// identificador para que con la llave primaria se sepa que registro se desea eliminar
Route::delete("cursos/{id}", [CursoController::class, "destroy"])->name("cursos.destroy");

//-----------------------------------------------------------------------------------
// Agrupar una cantidad de rutas que comparten un mismo controlador

// Route::controller(CursoControlle::class)->group(function(){
    
// Route::get('cursos', 'index');
// Route::get('cursos/create', 'create');
// Route::get('cursos/{curso}', 'show');
// });