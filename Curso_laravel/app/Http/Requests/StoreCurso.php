<?php
// Los archivos Requests se crean con la finalidad de que cuando deseamos validar un 
// formulario con demaciados campos no se nos ensucie el contructor que recibe esos
// datos asignandole las validaciones desde ahi, si no hacerlo desde otro archivo
// para que estan se vean mas legibles y mas organizadas

// Comando para crear un archivo request que contenga las validaciones que deben de tener
// los diferentes campos de un formulario y editar los mensajes que hayan cuando se
// genere un error en dicho formulario es:
// php artisan make:request (nombre del metodo que recibe la informacion de el formulario
// y validara sus campos) seguido de el nombre de la tabla

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCurso extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Para que no haya ningun error al metodo authorize se debe de retornar un true
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

     // Metodo que contiene las validaciones que se va a realizar segun los campos que hayan en el
     // formulario
    public function rules(): array
    {
        return [
            "nombre" => "required|min:3",
            "categoria" => "required|max:100",
            "descripcion" => "required"
        ];
    }

    // Metodo que contiene los mensajes personalizados segun la validacion que se haga con un campo.
    // El metodo que contiene estos mensajes de debe de llamar messages 
    public function messages(): array{
        return [

            // Para decir en que campo y en que validacion mostrar el mensaje se asigna primero el
            // campo y despues la validacion en la que deseamos que se muestre el mensaje seguido
            // del mensaje que deseamos mostrar 
            "nombre.required" => "El campo nombre es requerido asegurese de ingresar alguna informacion"
        ];
    }

    // Metodo que cambia el name que se le asigna a un input de un formulario, para si utilizar el nuevo
    // nombre a la hora de mostrar algun error
    // El metodo que contiene este cambio de atributo se debe de llamar attributes 
    public function attributes(): array{
        return [

            // Se ingresa el name que contiene el input que deseamos modificar y le asignamos su 
            // nuevo valor
            "nombre" => "nombre curso"
        ];
    }
}
