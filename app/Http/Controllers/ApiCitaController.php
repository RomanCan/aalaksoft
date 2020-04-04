<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cita;
use App\Propietario;
use Session;

class ApiCitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $cita = Cita::all();
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
        $cita = new Cita;
        $cita->nombre_usuario=$request->get('nombre_usuario');
        $cita->id_mascota=$request->get('id_mascota');
        $cita->descripcion=$request->get('descripcion');
        $cita->fecha_cita=$request->get('fecha_cita');
        $cita->save();
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
        return $cita = Cita::find($id);
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
        $cita = Cita::find($id);
        $cita->nombre_usuario=$request->get('nombre_usuario');
        $cita->id_mascota=$request->get('id_mascota');
        $cita->descripcion=$request->get('descripcion');
        $cita->fecha_cita=$request->get('fecha_cita');
        $cita->update();
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
        return $cita = Cita::destroy($id);
    }
}
