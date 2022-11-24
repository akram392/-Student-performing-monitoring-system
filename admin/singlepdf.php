<?php

include"include/db.php";
require('fpdf/fpdf.php');

if (isset($_GET['PDF'])) {
    # code...
    $co_id = $_GET['PDF'];
    $sql = " SELECT * FROM courseoutline WHERE id = '$co_id' ";
    $selected_co = mysqli_query($db, $sql);

    while ($row = mysqli_fetch_assoc($selected_co)) {
        # code...
        $pdf = new FPDF('P','mm','A4');
        // $pdf-> aliasNbpages('{pages}');
        $pdf->AddPage();
        $pdf->SetFont('Times','',12);

        $pdf->Cell(40,10,'Course ID: ' . $row['course_id'],0,1,'L',false);
        $pdf->Cell(40,10,'Course Title: ' . $row['course_title'],0,1,'L',false);
        $pdf->Cell(40,10,'Semester: ' . $row['semester'],0,1,'L',false);
        $pdf->Cell(40,10,'Credit Value: ' . $row['credit_value'],0,1,'L',false);
        $pdf->Cell(40,10,'Contact Hour/Week: ' . $row['duration'] . ' minitues',0,1,'L',false);

        $pdf->Cell(60,10,'Course Description: ' . $row['course_desc'] ,0,1,'L',false);
        $pdf->ln(30);
        
    }
    $pdf->Output();
}

// $pdf = new FPDF('P','mm','A4');
// $pdf->AddPage();
// $pdf->SetFont('Arial','B',16);
// $pdf->Cell(40,10,'Hello World!');


?>