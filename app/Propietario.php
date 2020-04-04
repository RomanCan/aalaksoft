<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    protected $table = 'propietarios';
    protected $primaryKey = 'nombre_usuario';
    public $incrementing=false;
    protected $with=['rol'];
    public $timestamps=false;
    
    protected $fillable = [
    	'nombre_usuario',
    	'password',
		'nombre',
		'apellidop',
		'apellidom',
		'curp',
		'edad',
		'celular',
		'sexo',
		'calle',
		'cruzamientos',
		'localidad',
		'municipio'
    ];

        public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol','id_rol');
    }
}
