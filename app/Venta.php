<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
	protected $table = 'ventas';
	protected $primaryKey = 'folio';
    protected $with = ['vendedor','detalles'];
    public $incrementing=false;
    public $fillable=[
    	'folio',
    	'id_usuario',
    	'total'
    ]; 
    public function vendedor(){
        return $this->belongsTo(Usario::class, 'id_usuario','id_usuario');
    }
    public function detalles(){
        return $this->hasMany('App\Detalle_Venta','folio','folio');
    }
}
