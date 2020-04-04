<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    //
    protected $table = 'mascotas';
    protected $primaryKey = 'id_mascota';
    public $timestamps=false;
    public $incrementing=true;
    protected $with=['propietario','especie','genero'];
    public $fillable=[
    	'nombre_usuario',
        'id_genero',
    	'id_especie',
        'nombre',
        'genero',
        'raza',
        'fecha_nac',
        'foto',
        'color',
        'observaciones'
        // 'estado_reproductivo'
    ]; 

    public function propietario(){
        return $this->belongsTo(Propietario::class, 'nombre_usuario','nombre_usuario');
    }

    public function especie(){
        return $this->belongsTo(Especie::class, 'id_especie','id_especie');
    }
    public function genero(){
        return $this->belongsTo(Genero::class, 'id_genero','id_genero');
    }
}
