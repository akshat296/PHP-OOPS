<?php 
include_once("fpdf.php");
class PDF extends FPDF
{
// Load data

function __construct($data)
{ parent::__construct();
    $this->data=$data;
}
// Better table

// Colored table
function FancyTable()
{   $header=array('Photo','First_Name','Last_Name','Username','Email');
    // Colors, line width and bold font
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(40, 35, 40, 45,35);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = false;
    foreach($this->data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,$row[2],'LR',0,'R',$fill);
        $this->Cell($w[3],6,$row[3],'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
}

// $pdf = new PDF();
// // Column headings
// $header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
// // Data loading
// $data = $pdf->LoadData('countries.txt');
// $pdf->SetFont('Arial','',14);
// $pdf->AddPage();
// $pdf->BasicTable($header,$data);
// $pdf->AddPage();
// $pdf->ImprovedTable($header,$data);
// $pdf->AddPage();
// $pdf->FancyTable($header,$data);
// $pdf->Output();
?>