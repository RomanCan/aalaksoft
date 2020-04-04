<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mascota;
use Session;
use DB;
class ApiFotoMascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return Mascota::all();
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

        $id=$request->get('id_mascota');

        $mascota=Mascota::find($id);
        // $empresa->nombre_empresa=$request->get('nombre_empresa');
        $foto=$request->file('foto');
        //El nombre foto se asigna de acuerdo a la clave primaria de la tabla,
        //en este caso id_mascota
        //se obtiene el id como nombres
        $mascota->foto=$id.'.jpg';
        //Se guarda la foto con base a la clave primaria de la tabla users2
        $foto->move(public_path().'/img/mascotas',$id.'.jpg');

        $mascota->update();
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
