<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Session;

class ApiUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $u = Session::get('id_usuario');
        return $usuario = Usuario::where('id_usuario','=',$u)->get();

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
        $usuario = new Usuario;

        // $usuario->id_empleado = $request->get('id_empleado');
        $usuario->id_rol=$request->get('id_rol');
        $usuario->nombre = $request->get('nombre');
        $usuario->apellidop = $request->get('apellidop');
        $usuario->apellidom = $request->get('apellidom');
        $usuario->curp = $request->get('curp');
        $usuario->sexo = $request->get('sexo');
        $usuario->edad = $request->get('edad');
        $usuario->telefono = $request->get('telefono');
        $usuario->calle = $request->get('calle');
        $usuario->cruzamiento = $request->get('cruzamiento');
        $usuario->localidad = $request->get('localidad');
        $usuario->municipio = $request->get('municipio');

        $usuario->save();
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
        return $usuario=Usuario::find($id);
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
        $usuario = Usuario::find($id);

        // $usuario->id_empleado = $request->get('id_empleado');
        $usuario->id_rol=$request->get('id_rol');
        $usuario->nombre = $request->get('nombre');
        $usuario->apellidop = $request->get('apellidop');
        $usuario->apellidom = $request->get('apellidom');
        $usuario->curp = $request->get('curp');
        $usuario->sexo = $request->get('sexo');
        $usuario->edad = $request->get('edad');
        $usuario->telefono = $request->get('telefono');
        $usuario->calle = $request->get('calle');
        $usuario->cruzamiento = $request->get('cruzamiento');
        $usuario->localidad = $request->get('localidad');
        $usuario->municipio = $request->get('municipio');
        $usuario->activo = $request->get('activo');
        $usuario->update();
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
        return $usuario = Usuario::destroy($id);
    }
}
