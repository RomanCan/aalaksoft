<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Empresa;


class ApiTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function ticket(){

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
            $pdf->Cell(5,4,utf8_decode('100'),1,0,'C');
            $pdf->Cell(29,4,utf8_decode('Carda cepillo con autolimpieza'),1,0,'C');
            $pdf->Cell(8,4,utf8_decode('$ 1000'),1,0,'C');
            $pdf->Cell(8,4,utf8_decode('$ 10000'),1,1,'C');
            $pdf->Cell(1,4,utf8_decode(''),0,0,'L');

            

            $pdf->Output();
            exit;
        }
    
}
