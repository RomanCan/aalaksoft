<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    //Nombre de la tabla a utilizar
    protected $table='users';
    //Definimos la llave primaria
    protected $primaryKey='id_usuario';
    protected $with=['rol'];    
    //Definimos las columnas
    // public $incrementing=false;
    //Pordefecto Laravel pide de dos métodos create y update,
    //como no los tenemos creados utilizamos la variable timestamp en false
    //para indicar que no contamos con la variable.
    public $timestamps=false;
    protected $fillable=[
        'usuario',
    	'password',
    	'nombre',
    	'apellidop',
        'apellidom',
        'activo',
        'email',
        'telefono',
        'curp',
        'sexo',
        'edad',
        'calle',
        'cruzamiento',
        'localidad',
        'municipio',
        'id_rol'
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol','id_rol');
    }
}
