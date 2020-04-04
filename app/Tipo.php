<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    //
    protected $table = 'tipos';
    protected $primaryKey = 'id_tipo';
    public $timestamps=false;

    public $fillable=[
    	'id_tipo',
    	'nombre'
    ];

}
