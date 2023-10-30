<!-- Vista del controlador CursoController del metodo show -->

@extends("layouts.plantilla")

@section("title", "Cursos " . " ". $curso)

@section("content")
    <!-- Para no convinar codigo PHP con codigo HTML la variable
    que viene desde el controlador que es archivo PHP se puede 
    cerrar entre llaves y asi se evita el codigo <?php?>-->
    <h1>Bienvenido al curso {{$curso}} </h1>
@endsection
