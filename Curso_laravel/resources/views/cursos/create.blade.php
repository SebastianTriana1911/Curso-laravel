<!-- Vista del controlador CursoController del metodo create -->

@extends("layouts.plantilla")

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@section("title", "Cursos create")</title>
</head>
<body>

    <h1>En esta pagina podras crear un curso</h1>

    @section("content")
        <form action="{{route("cursos.store")}}" method="POST">

            <!-- Token: El token csrf en Laravel ayuda a la seguridad de la aplicacion
            web, pues a la hora de enviar un formulario laravel crea un token que se 
            guardara en el servidor, lo que significa que ningun otro formulario aparte
            del que estamos creando podra enviar informacion a nuestra base de datos,
            evitando posibles inconvenientes con gente maliciosa -->
            @csrf

            <label for="nombre">
                <strong>Nombre:</strong>
                <input id="nombre" type="text" name="nombre"/>
            </label>

            <br> <br>

            <label for="categoria">
                <strong>Categoria:</strong> 
                <input id="categoria" type="text" name="categoria"/>
            </label>

            <br> <br>

            <label for="descripcion">
                <strong>Descripcion:</strong> <br> <br> 
                <textarea id="descripcion" name="descripcion"></textarea>
            </label> 

            <br> <br>

            <input type="submit" value="Enviar formulario"/>
        </form> 
    @endsection
</body>
</html>
