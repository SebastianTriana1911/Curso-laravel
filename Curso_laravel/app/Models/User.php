<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

// Se importa la clase Attribute que nos permite capturar los registros
// que se manden a la base de datos y estos se modifiquen por medio de un
// mutador
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // --------------------------------------------------------------
    // Mutador para convertir el dato del campo nombre en minusculas - SET
    // Accesor para convertir las primeras letras en mayuscula - GET

    // Para crear un mutador se debe de crear un metodo protegido con
    // el mismo nombre del campo que vamos a modificar y diciendo que
    // vamos a retornar un nuevo atributo
    protected function name(): Attribute {

        // Se retorna un nuevo atributo que sera el que se modificara
        return new Attribute(

            // -------------------------------------------------------
            // Accesor  
            // Los accesores nos permiten modificar un valor solo cuando
            // se este realizando una consulta y se desee retornar dicho
            // valor

            // Se crea un accesor que reciba como parametro un valor y solo
            // cuando se desee retornar el valor de dicho elemento se 
            // modifique
            get: function($valor){

                // Se retornara el primer elemento de cada palabra en matuscula
                // utilizando funcion ucwords de PHP
                return ucwords($valor);
            },
            // --------------------------------------------------------

            // Dentro del Attribute se crea una funcion que reciba como
            // parametro el valor a modificar. Set nos da a entender que
            // se tomara primero el valor, se modificara y se subira a la
            // base de datos
            set: function($valor){

                // Se retornara el valor con el funcion strtolower que es
                // una funcion en PHP que convierte cualquier texto en
                // minuscula. El valor que retorna esta funcion es el valor
                // que se le asigna al Attribute y sera el nuevo valor que
                // se mande a la base de datos
                return strtolower($valor);
            }
        );
    }

    // -------------------------------------------------
    // Mutadores en versiones de laravel antiguas

    /*
    public function getNameAttribute($valor){
        return ucwords($valor); 
    }
    */

    // -------------------------------------------------
    // Accesores en versiones de laravel antiguas

    /*
    public function setNameAttribute($valor){
        $this->attributes["name"] = strtolower($valor); 
    }
    */
}
