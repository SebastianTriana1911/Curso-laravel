@extends("layouts.plantilla")

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    
    <h1>En esta pagina podras editar un curso</h1>

    @section("content")
        <form action="{{route("cursos.update", $curso)}}" method="POST">

            <!-- Token: El token csrf en Laravel ayuda a la seguridad de la aplicacion
            web, pues a la hora de enviar un formulario laravel crea un token que se 
            guardara en el servidor, lo que significa que ningun otro formulario aparte
            del que estamos creando podra enviar informacion a nuestra base de datos,
            evitando posibles inconvenientes con gente maliciosa -->
            @csrf

            <!-- put: Este metodo es una directiva de laravel que nos permite mandar la 
            informacion de un formulario para actualizar algun registro, como en HTML no
            existe el metodo put se inicializa con el metodo post y a una directiva blade
            llamada method se le asigna dicho metodo put ya que haria referencia a la ruta
            que contenga mismo metodo -->
            @method("put")

            <label for="nombre">
                <strong>Nombre:</strong>

                <!-- El metodo old en este caso lo que hara es que si la validacion falla va a recuperar lo que
                el usuario ingreso en el campo name antes de que la validacion fallase y si la validacion no a
                fallado mostrara lo que haya en el campo nombre de la variable curso-->
                <input id="nombre" type="text" name="nombre" value="{{old("nombre", $curso -> nombre)}}"/>
            </label>

            @error('nombre')
                <br>
                <span>{{$message}}</span>
            @enderror

            <br> <br>

            <label for="categoria">
                <strong>Categoria:</strong> 
                <input id="categoria" type="text" name="categoria" value="{{old("categoria", $curso -> categoria)}}"/>
            </label>

            <br> <br>

            @error('categoria')
                <br>
                <span>{{$message}}</span>
            @enderror

            <label for="descripcion">
                <strong>Descripcion:</strong> <br> <br> 
                <textarea id="descripcion" name="descripcion">{{old("descripcion", $curso -> descripcion)}}</textarea>
            </label> 

            @error('descripcion')
                <br>
                <span>{{$message}}</span>
            @enderror

            <br> <br>

            <input type="submit" value="Actualizar formulario"/>
        </form> 
    @endsection

</body>
</html>