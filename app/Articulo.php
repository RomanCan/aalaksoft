<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table = 'articulos';
    protected $primaryKey = 'id_articulo';
    protected $with=['tipo'];
    public $timestamps=false;

    public $fillable=[
    	'nombre',
    	'costo',
        'cantidad',
        'id_tipo'
    ]; 

    public function tipo(){
        return $this->belongsTo(Tipo::class,'id_tipo','id_tipo');
    }

}
