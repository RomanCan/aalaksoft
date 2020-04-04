<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    //
	protected $table = 'especies';
    protected $primaryKey = 'id_especie';
    public $incrementing=false;
    public $timestamps=false;

    public $fillable=[
    	'id_especie',
    	'tipo'
    ]; 

}
