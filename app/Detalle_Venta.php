<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Venta extends Model
{
    //
    protected $table='detalle_venta';
    protected $primaryKey='id_detalle';
    protected $with = ['articulo'];
    public $timestamps = false;
    public $fillable =[
    	'folio',
    	'id_articulo',
    	'cantidad',
    	'precio',
    	'total'
    ];
    public function articulo(){
    	return $this->belongsTo(Articulo::class, 'id_articulo','id_articulo');
    }
}
