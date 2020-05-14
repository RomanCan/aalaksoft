<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use App\Articulo;
use App\Detalle_Venta;
use Session;
use DB;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Empresa;

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
            $nombre = DB::select("SELECT nombre FROM articulos WHERE id_articulo = '$codigo'");
            $precio = $detalles[$i]['precio'];
            $total = $detalles[$i]['total'];
            DB::update("UPDATE articulos 
                        SET cantidad = cantidad - $cant
                        WHERE id_articulo = '$codigo'");
        }
        $venta->save();
        Detalle_Venta::insert($array);

        // $tic = new TicketController();
        // return $imprimir = $tic->ticket();

        $empresa = Empresa::first();
        // return $empresa->logo;
         // $logo=file('../public/img/logo_empresa/'.$empresa->logo);

        $pdf = new Fpdf('P','mm',array(60,90));
        $pdf->Addpage();
        // foreach ($empresas as $empresa) {
            // $file = public_path().'/img/logo_empresa/'.$empresa->logo;
            // return $file;
            // $pdf->Image($file,35,5.5,3);
            $pdf->SetFont('Arial','B',6);
            $pdf->SetTextColor(0,0,0);
            $textypos = 5;

            $pdf->setY(3);
            $pdf->setX(4);
            $pdf->Cell(2,8,utf8_decode(''),0,0,'L');
            $pdf->Cell(38,8,utf8_decode($empresa->nombre_empresa),0,0,'L');
            $pdf->Cell(3,8,utf8_decode(''),'',0,'C');
            $pdf->Cell(5,8,utf8_decode('Factura'),0,1,'C');
            $pdf->Cell(2,8,utf8_decode(''),0,0,'L');

            $pdf->setY(6);
            $pdf->setX(4);
            $pdf->Cell(50,$textypos,'___________________________________________',0,1);

            $pdf->setX(4);
            $pdf->SetFont('Arial','B',3);
            $pdf->Cell(7,2,utf8_decode('RFC | '. $empresa->rfc),0,1,'L');
            $pdf->setX(4);
            $pdf->Cell(7,1,utf8_decode('Dirección | '. $empresa->direccion),0,1,'L');
            $pdf->setX(4);
            $pdf->Cell(7,2,utf8_decode('Teléfono | '. $empresa->telefono),0,1,'L');
            $pdf->setX(4);
            $pdf->Cell(7,1,utf8_decode('Horario | '. $empresa->horario),0,1,'L');

            $pdf->setY(15);
            $pdf->setX(4);
            $pdf->SetFont('Arial','B',6);
            $pdf->Cell(50,$textypos,'___________________________________________',0,1);
            // $pdf->SetTextColor(255,255,255);
            $pdf->setX(4);
            $pdf->SetFont('Arial','B',4);
            $pdf->Cell(1,4,utf8_decode(''),0,0,'L');
            $pdf->Cell(5,4,utf8_decode('Cant.'),1,0,'C');
            $pdf->Cell(29,4,utf8_decode('Concepto'),1,0,'C');     
            $pdf->Cell(8,4,utf8_decode('Importe'),1,0,'C');
            $pdf->Cell(8,4,utf8_decode('$ Total'),1,1,'C');
            $pdf->Cell(1,4,utf8_decode(''),0,0,'L');

            $pdf->setX(5);
            $pdf->SetFont('Arial','',4);
            $pdf->Cell(5,4,utf8_decode('this.$cant'),1,0,'C');
            $pdf->Cell(29,4,utf8_decode('this.$nombre'),1,0,'C');
            $pdf->Cell(8,4,utf8_decode('this.$precio'),1,0,'C');
            $pdf->Cell(8,4,utf8_decode('this.$total'),1,1,'C');
            $pdf->Cell(1,4,utf8_decode(''),0,0,'L');

            

            $pdf->Output();
            exit;

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


