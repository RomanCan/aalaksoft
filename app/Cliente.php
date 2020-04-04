<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='registro';
    protected $primaryKey='id';
    protected $with=['rol'];    
    public $incrementing=true;

    public $timestamps=false;
    protected $fillable=[
    'email',
    'nombre_usuario',
    'telefono',
    'contrasenia',
    ];

    public function rol(){
        return $this->belongsTo(Rol::class, 'id_rol','id_rol');
    }


}
