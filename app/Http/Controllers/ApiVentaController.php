<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use App\Articulo;
use App\Detalle_Venta;
use Session;
use DB;

class ApiVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return $venta = Venta::all();
        $id = Session::get('id_usuario');

        return $venta=Venta::where('id_usuario','=',$id)->get();
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
        $venta = new Venta;
        $venta->folio=$request->get('folio');
        $venta->id_usuario=$request->get('id_usuario');
        $venta->total=$request->get('total');

        $detalles = $request->get('detalles');
        $array=[];
        $detalles=$request->get('detalles');

        for ($i=0;$i<count($detalles);$i++) { 
            $array[]=[
                'folio'=>$request->get('folio'),
                'id_articulo'=>$detalles[$i]['id_articulo'],
                'cantidad'=>$detalles[$i]['cantidad'],
                'precio'=>$detalles[$i]['precio'],
                'total'=>$detalles[$i]['total'],
            ];
            $cant =$detalles[$i]['cantidad'];
            $codigo =$detalles[$i]['id_articulo'];
            DB::update("UPDATE articulos 
                        SET cantidad = cantidad - $cant
                        WHERE id_articulo = '$codigo'");
        }
        $venta->save();
        Detalle_Venta::insert($array);
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

        return $venta = Venta::find($id);
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
