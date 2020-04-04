<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    //
    protected $table = 'citas';
    protected $primaryKey = 'id_cita';
    protected $with=['propietario','mascota'];
    public $timestamps=false;
    public $fillable = [
        'fecha_cita',
        'nombre_usuario',
        'id_mascota'
    ];

    public function propietario(){
        return $this->belongsTo(Propietario::class, 'nombre_usuario','nombre_usuario');
    }
    public function mascota(){
        return $this->belongsTo(Mascota::class, 'id_mascota','id_mascota');
    }

}
