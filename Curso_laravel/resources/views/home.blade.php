<!-- Para poder compartir una plantilla blade es necesario convertir el archivo
que tomara dicha plantilla en extencion .blande.php -->

<!-- Se importa la plantilla blade con el metodo extends y la ruta de donde se
encuentra -->
@extends("layouts.plantilla")

<!-- El archivo blade que contiene la platilla en diferentes puntos cuenta con el
metodo yield quiere decir que se puede modificar, para modificar dicho yield es 
necesario hacerlo con el metodo section, y existen dos formas de hacerlo -->

<!-- @ section("nombre del campo identificativo", "valor"): Este metodo se realiza
    cuando lo que deseamos cambiar no tiene mas que una sola linea de codigo

    @ section("nombre del campo identificativo")
        (valor)
    endsection: Este metodo se realiza cuando lo que deseamos cambiar tiene mas de
    una linea de codigo
-->

@section("title", "Home")

@section ("content")
    <h1>Importacion de plantilla blade con metodos section</h1>
    <h1>Bienvenido al retorno de la clase home del metodo __invoke</h1>
@endsection
