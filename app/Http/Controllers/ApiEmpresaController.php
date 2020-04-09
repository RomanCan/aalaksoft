<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use DB;
class ApiEmpresaController extends Controller
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
        $empresa=new Empresa;
        $empresa->rfc=$request->get('rfc');
        $empresa->nombre_empresa=$request->get('nombre_empresa');
        $empresa->direccion=$request->get('direccion');
        $empresa->telefono=$request->get('telefono');
        $empresa->correo=$request->get('correo');
        $empresa->representante_legal=$request->get('representante_legal');
        $empresa->horario=$request->get('horario');
        
          //El file es para archivos
        // $logo=$request->file('logo');
        // //El nombre foto se asigna de acuerdo a la clave primaria de la tabla,
        // //en este caso, 'nick'
        // //se obtiene el 'nick'
        // $nombre_logo=$request->get('nombre_empresa');
        // $empresa->logo=$nombre_logo.'.jpg';
        // //Se guarda la foto con base a la clave primaria de la tabla users2
        // $logo->move(public_path().'/img/logo_empresa',$nombre_logo.'.jpg');

        $empresa->save();
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
        return $empresa=Empresa::find($id);
        
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

        //El get es para datos numéricos o letras
        //El file es para archivos
        // $logo=$request->file('logo');
        //El nombre foto se asigna de acuerdo a la clave primaria de la tabla,
        //en este caso, 'nick'
        // //se obtiene el 'nick'
        // $logo=$request->get('rfc');
        // $empresa->logo=$logo'.jpg';
        // //Se guarda la foto con base a la clave primaria de la tabla users2
        // $logo->move(public_path().'/img/logo_empresa',$logo.'.jpg');

         Empresa::findOrfail($id)->update($request->all());
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
