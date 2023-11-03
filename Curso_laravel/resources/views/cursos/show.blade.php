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
@endsection
