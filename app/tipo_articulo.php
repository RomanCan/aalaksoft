<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo_articulo extends Model
{
    //
    protected $table = 'tipo_articulos';
    protected $primaryKey = 'id_tipo';
    public $timestamps=false;

    public $fillable=[
    	'id_articulo',
    	'nombre'
    ];

}
