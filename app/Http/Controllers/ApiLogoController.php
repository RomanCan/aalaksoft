<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use DB;
class ApiLogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return Empresa::all();
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

        $id=$request->get('rfc');

        $empresa=Empresa::find($id);
        // $empresa->nombre_empresa=$request->get('nombre_empresa');
        $logo=$request->file('logo');
        //El nombre foto se asigna de acuerdo a la clave primaria de la tabla,
        //en este caso, 'nick'
        //se obtiene el 'nick'
        // $nombre_logo=$request->get('nombre_empresa');
        $empresa->logo=$id.'.jpg';
        //Se guarda la foto con base a la clave primaria de la tabla users2
        $logo->move(public_path().'/img/logo_empresa',$id.'.jpg');

        $empresa->update();
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
