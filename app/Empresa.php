<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //
    protected $table = 'datos_empresa';
    protected $primaryKey = 'rfc';
    public $timestamps=false;
    public $incrementing=false;
    public $fillable=[
    	'rfc',
    	'nombre_empresa',
    	'direccion',
        'telefono',
        'correo',
        'representante_legal',
        'horario',
        'logo'
    ]; 

    
}
