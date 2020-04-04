<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Empleado;
use DB;

class ApiEmpleadoDesactivado extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $empleado = DB::select("SELECT * FROM users WHERE id_rol = 2 AND activo = 0");  
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
        return $empleado=Usuario::find($id);
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
        //$empleado=Usuario::find($id);

        // $empleado->id_empleado = $request->get('id_empleado');
        $empleado->nombre = $request->get('nombre');
        $empleado->apellidop = $request->get('apellidop');
        $empleado->apellidom = $request->get('apellidom');
        $empleado->curp = $request->get('curp');
        $empleado->sexo = $request->get('sexo');
        $empleado->edad = $request->get('edad');
        $empleado->telefono = $request->get('telefono');
        $empleado->calle = $request->get('calle');
        $empleado->cruzamiento = $request->get('cruzamiento');
        $empleado->localidad = $request->get('localidad');
        $empleado->municipio = $request->get('municipio');
        $empleado->activo = $request->get('activo');

        $empleado->update();
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
