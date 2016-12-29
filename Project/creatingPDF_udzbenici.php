<?php

require('fpdf.php');

class pdf extends fpdf{
    // Simple table
    function BasicTable($header, $data)
    {
        // Header
        foreach($header as $col)
            $this->Cell(40,7,$col,1,0, 'C');
        $this->Ln();
        // Data
        foreach($data as $row)
        {
            foreach($row as $col)
                //$this->Cell(40,6,$col,1);
                $this->Cell(40,6,$col,1,0,'C');
            $this->Ln();
        }
    }
}

//create a FPDF object
$pdf=new PDF();

//set document properties
$pdf->SetAuthor('Drvenija.ba');
$pdf->SetTitle('Izvjestaj o korisnicima');

//set font for the entire document
$pdf->SetFont('Helvetica','B',20);
$pdf->SetTextColor(153,0,0);

//set up a page
$pdf->AddPage('L');
//$pdf->SetDisplayMode(real,'default');

//display the title with a border around it
//$pdf->SetXY(50,20);
$pdf->SetDrawColor(50,60,100);
$pdf->Cell(0,10,'Registrovani artikli',0,0,'C',0);

$pdf->SetTextColor(0,0,0);

//Set x and y position for the main text, reduce font size and write content
$pdf->SetXY (10,25);
$pdf->SetFontSize(10);

$xml=simplexml_load_file("knjige.xml");
$headings = array('Naziv', 'Skola', 'Predmet', 'Godina izdanja', 'Stanje', 'Cijena (KM)', 'Razmjena');


$pdf->BasicTable($headings, $xml);

date_default_timezone_set("Europe/Belgrade");

$pdf->SetTextColor(153,0,0);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(195,20,'Drvenija.ba',0,1,'L');
$pdf->SetFont('Arial','',12);
$pdf->Cell(40,10,'Dokument je kreiran:'.' '.date("d.m.Y").'.',0,2,'L');
$pdf->Cell(40,10,'Broj registrovanih artikala: '.($xml->count()-1).'.',0,2,'L');
$pdf->Cell(40,10,'Telefon: 033 888 999',0,2,'L');
$pdf->Cell(40,10,'Email: info@drvenija.ba',0,2,'L');
$pdf->Cell(40,10,'DOKUMENT NIJE DOZVOLJENO DISTRIBUIRATI BEZ SAGLASNOSTI ODGOVORNOG LICA.',0,2,'L');

//Output the document
$pdf->Output('izvjestaj.pdf','I');

?>