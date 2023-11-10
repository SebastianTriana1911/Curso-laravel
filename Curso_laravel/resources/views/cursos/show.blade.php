<!-- Vista del controlador CursoController del metodo show -->

@extends("layouts.plantilla")

@section("title", "Cursos " . " ". $curso -> nombre)

@section("content")
    <!-- Para no convinar codigo PHP con codigo HTML la variable
    que viene desde el controlador que es archivo PHP se puede 
    cerrar entre llaves y asi se evita el codigo "< php?>-->
    <h1>Bienvenido al curso {{$curso -> nombre}} </h1>

    <p><strong>Categoria: </strong>{{$curso -> categoria}}</p>

    <p><strong>Descripcion: </strong>{{$curso -> descripcion}}</p>

    <a href="{{route("cursos.index")}}">Volver a la vista index</a>
    <br>
    <a href="{{route("cursos.edit", $curso->id)}}">Editar curso</a>

    <!-- Se crea un boton para eliminar un registro de la bd
    Este boton debera de estar en un formulario ya que como la ruta 
    utiliza el metodo delete si hacemos el boton dentro de una 
    etiqueta <a> no va a funcionar ya que dichas etiquetas solo
    funcionan cuando deseamos mostrar algo osea que la ruta tenga el
    metodo get, la unica forma de accionar las rutas que tengan los
    metodos diferentes al get es por medio de un formulario -->
    <!-- Se crea un formulario que contendra el boton para eliminar
    el registro a dicho formulario se le asigna la ruta que va a 
    emplear cuando se clikee el boton y esta es la ruta que contiene
    el metodo delete, seguido de esta se le asigna el metodo POST por
    que recordemos que HTML no lee otro metodo que no sea GET ni POST -->
    <form action="{{ route("cursos.destroy", $curso->id) }}" method="POST">

        <!-- Se ingresa la directiva blade csrf para que se 
        pueda enviar el formulario-->
        @csrf

        <!-- Ya que el metodo que tiene la ruta es delete y
        HTML no reconoce dicho metodo, por medio de la directiva
        blade method se le pasa como parametro el metodo que 
        esta usando la ruta que en este caso es delete -->
        @method("delete")

        <button type="submit">Eliminar</button>
    </form>
@endsection
