<!-- Vista del controlador CursoController del metodo index -->

@extends("layouts.plantilla")

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@section("title", "Cursos")</title>
</head>
<body>

    <h1>Bienvenido a la pagina principal de la clase cursos</h1>
    
    <!-- A una etiqueta a se le asigna el name de una de las rutas que hay en la carpeta
    routes, se escribe entre dos llaves "{ {} }" ya que es codigo PHP, dentro de estas 
    se escribe la palabra reservada route y entre parentesis el name identificador que se
    asigno a la ruta -->
    <a href="{{route ("cursos.create")}}">Crear cursos</a>

    @section("content")
        <ul>
            <!-- La variable cursos como es un array ya que como contiene todos los
                 registros de la tabla Cursos es necesario iterarlo por medio de un 
                 foreach pero desde un archivo blade -->
            @foreach ($cursos as $curso)
                
                <!-- Por cada bucle se mostrara el valor de la variable pero solo lo
                     que se encuentre en el campo nombre, se separa entre cuatro llaves
                     "{ {} }" para poder ejecutar la variable ya que esta es codigo PHP -->
                <li> 
                    <!-- Cada curso que se muestre que venga como registro del campo nombre
                         de la base de datos sera un link que lleve a la ruta de cursos.show,
                         como dicha ruta contiene un parametro despues de asignarle la ruta a
                         la palabra reservada route seguido de una coma se le asigna la variable
                         curso cogiendo el registro del campo id y este es el que se convertira
                         como parametro de la ruta -->
                    <a href="{{route("cursos.show", $curso->id)}}">{{$curso->nombre}}</a> 
                </li>
            @endforeach
        </ul>

        <!-- Al array que contiene todos los registros de la tabla se le asigna el metodo
        links, este metodo nos mostrara unos botones los cuales nos permitiran movilizarnos
        por las paginas para ver los diferentes registros que contiene dicho array -->
        {{$cursos->links()}}
    @endsection
</body>
</html>
