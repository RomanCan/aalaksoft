<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Mascota;
use App\Propietario;

class ApiMascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id = Session::get('nombre_usuario');

        return $mascota = Mascota::
        where('nombre_usuario','=',$id)
        ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $mascota=new Mascota;
        // $mascota->id_mascota=$request->get('id_mascota');
        $mascota->nombre_usuario=$request->get('nombre_usuario');
        $mascota->id_especie=$request->get('id_especie');
        $mascota->id_genero=$request->get('id_genero');
        $mascota->nombre=$request->get('nombre');
        $mascota->id_genero=$request->get('id_genero');
        $mascota->raza=$request->get('raza');
        $mascota->fecha_nac=$request->get('fecha_nac');
        $mascota->foto=$request->get('foto');
        $mascota->color=$request->get('color');
        $mascota->observaciones=$request->get('observaciones');

        $mascota->save();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return $mascota=Mascota::find($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $mascota=Mascota::find($id);
        // $mascota->id_mascota=$request->get('id_mascota');
        $mascota->nombre_usuario=$request->get('nombre_usuario');
        $mascota->id_especie=$request->get('id_especie');
        $mascota->id_genero=$request->get('id_genero');
        $mascota->nombre=$request->get('nombre');
        $mascota->raza=$request->get('raza');
        $mascota->fecha_nac=$request->get('fecha_nac');
        // $mascota->foto=$request->get('foto');
        $mascota->color=$request->get('color');
        $mascota->observaciones=$request->get('observaciones');

        $mascota->update();
        // Mascota::findOrfail($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}