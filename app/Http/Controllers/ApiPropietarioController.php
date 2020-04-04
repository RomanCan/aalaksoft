<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Propietario;
use Session;

class ApiPropietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return $propietario = Propietario::all();
        $id= Session::get('nombre_usuario');


        return $propietario = Propietario::
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
        $propietario = new Propietario;
        $propietario->nombre_usuario=$request->get('nombre_usuario');
        $propietario->password=$request->get('password');
        $propietario->nombre=$request->get('nombre');
        $propietario->apellidop=$request->get('apellidop');
        $propietario->apellidom=$request->get('apellidom');
        $propietario->curp=$request->get('curp');
        $propietario->edad=$request->get('edad');
        $propietario->celular=$request->get('celular');
        $propietario->sexo=$request->get('sexo');
        $propietario->calle=$request->get('calle');
        $propietario->cruzamientos=$request->get('cruzamientos');
        $propietario->localidad=$request->get('localidad');
        $propietario->municipio=$request->get('municipio');
        $propietario->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $propietario = Propietario::find($id);
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
        $propietario = Propietario::find($id);
        $propietario->nombre_usuario=$request->get('nombre_usuario');
        $propietario->password=$request->get('password');
        $propietario->nombre=$request->get('nombre');
        $propietario->apellidop=$request->get('apellidop');
        $propietario->apellidom=$request->get('apellidom');
        $propietario->curp=$request->get('curp');
        $propietario->edad=$request->get('edad');
        $propietario->celular=$request->get('celular');
        $propietario->sexo=$request->get('sexo');
        $propietario->calle=$request->get('calle');
        $propietario->cruzamientos=$request->get('cruzamientos');
        $propietario->localidad=$request->get('localidad');
        $propietario->municipio=$request->get('municipio');
        $propietario->update();
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
