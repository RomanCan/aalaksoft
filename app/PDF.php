<?php
require('fpdf.php');

class PDF extends FPDF
{
    function Header()
    {
    	$this->Image(storage_path() . '../public/img/logo.png',4,4,6);
        $this->SetFont('Arial','B',6);
        $this->Cell(38,8,utf8_decode('Veterinaria Colitas Felices'),0,0,'L');
        $this->Ln(20);
    }

    function Footer(){
    	$this->SetY(-15);
    	$this->SetFont('Arial','B',6);
        $this->Cell(38,8,utf8_decode('Veterinaria Colitas Felices'),0,0,'L');
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

    }
}
     public function PDF(){
    $pdf = new PDF('P','mm',array(60,120));
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',12);
    for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Imprimiendo línea número '.$i,0,1);
    $pdf->Output();
    exit;
}
?>
