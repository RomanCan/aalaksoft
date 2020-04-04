<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //
    protected $table='roles';
    protected $primariKey='id_rol';
    protected $fillable=[
    	'id_rol',
    	'rol'
    ];
}
