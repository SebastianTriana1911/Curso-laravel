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
            evitando posibles inconvenientes con gente maliciosa, es obligatorio colocar
            esta directiva a la hora de crear un formulario ya que si no lo hacemos nos
            generara error -->
            @csrf

            <!-- Metodo old: Cuando usamos reglas de validacion y enviamos un formulario
            con campos vacios lo que sucede es que re reinicia nuevamente el formulario
            perdiendo la informacion que ya se haya escrito, para que no suceda esto dentro
            del value utilizaremos el metodo old con el name del input al que deseamos
            recuperar la informacion, lo que hace este metodo es que a la hora de diligenciar
            un formulario y esta contenga inputs vacios en vez de reiniciar todo el formulario
            y dejarlo en blanco, mostrara los inputs que no tuvieron error de validacio antes
            de enviar dicho formulario -->
            <label for="nombre">
                <strong>Nombre:</strong>
                <input id="nombre" type="text" name="nombre" value="{{old("nombre")}}" />
            </label>

            <!-- Error: La directiva error nos ayudara a mostrar un mensaje de error si
            un campo del formulario se llega a enviar estando vacio para esto se debe de
            declarar la validacion requerida desde el contructor, la directiva error recibe
            como parametro el nombre del input al cual verificara si a la hora de enviarlo
            este se encuentra vacio o con algun dato, si este se encuentra vacio mostrara un
            mensaje el cual lo contiene una variable de PHP la cual es $message -->
            @error('nombre')
                <br>
                <span>{{$message}}</span>
            @enderror

            <br> <br>

            <label for="categoria">
                <strong>Categoria:</strong> 
                <input id="categoria" type="text" name="categoria" value="{{old("categoria")}}"/>
            </label>

            @error('categoria')
                <br>
                <span>{{$message}}</span>
            @enderror

            <br> <br>

            <!-- La etiquta textarea como no tiene propiedad value para asignarle el metodo old y
            poder recuperar su informacion, dicho metodo se debe de ingresar dentro de la etiqueta
            de apertura y la etiqueta de cierre -->
            <label for="descripcion">
                <strong>Descripcion:</strong> <br> <br> 
                <textarea id="descripcion" name="descripcion">{{old("descripcion")}}</textarea>
            </label>

            @error('descripcion')
                <br>
                <span>{{$message}}</span>
            @enderror

            <br> <br>

            <input type="submit" value="Enviar formulario"/>
        </form> 
    @endsection
</body>
</html>
