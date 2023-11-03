
<!-- Los archivos blade.php nos ayudaran cuando queramos que uno o varios archivos
tengan la misma estructura html -->

<!-- yield permitica que a la hora de querer llamar esta plantilla en algun otro
documento se pueda modificar dicho elemento desde el componente que se llamo, yield
recibe un unico parametro y es un identificador para cuando se desee modificar algun
elemento en otro documento saber que elemento es el que se va a modificar -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Cuando se comparta esta plantilla se podra modificar la etiqueta titles -->
    <title> @yield('title') </title>
</head>
<body>
    <!-- Cuando se comparta esta plantilla se podra modificar la etiqueta body-->
    @yield("content")
</body>
</html>