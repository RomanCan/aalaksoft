<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Articulo;
use DB;

class ApiArticuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $articulo = Articulo::all(); 
        
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
        $articulo = new Articulo;
                                        //base de datos
        $articulo->id_tipo=$request->get('id_tipo');
        $articulo->nombre=$request->get('nombre');
        $articulo->costo=$request->get('costo');
        
        $articulo->cantidad=$request->get('cantidad');
        $articulo->save();
        
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
        return $articulo = Articulo::find($id);
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
        $articulo = Articulo::find($id);
        // $articulo->id_articulo=$request->get('id_articulo');
        $articulo->id_tipo=$request->get('id_tipo');
        $articulo->nombre=$request->get('nombre');
        $articulo->costo=$request->get('costo');
        $articulo->cantidad=$request->get('cantidad');
        
        $articulo->update();
       
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
        return Articulo::destroy($id);
    }

    
}
