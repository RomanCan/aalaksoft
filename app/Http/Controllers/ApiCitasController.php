<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cita;
use DB;

class ApiCitasController extends Controller
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
        // return $cita = DB::select('SELECT citas.fecha_cita , citas.descripcion , propietarios.nombre , mascotas.nombre
        // FROM citas
        // JOIN propietarios ON  citas.nombre_usuario = propietarios.nombre_usuario
        // JOIN mascotas on citas.id_mascota = mascotas.id_mascota
        // ORDER BY citas.fecha_cita ASC');
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
