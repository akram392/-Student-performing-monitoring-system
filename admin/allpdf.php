<?php

include"include/db.php";
require('fpdf/fpdf.php');

$sql = " SELECT * FROM courseoutline ";
$selected_co = mysqli_query($db, $sql);
$pdf = new FPDF('P','mm','A3');

while ($row = mysqli_fetch_assoc($selected_co)) {
    # code...

    $pdf->AddPage();
    $pdf->SetFont('Times','',12);

    $pdf->Cell(260,10,'Course ID: ' . $row['course_id'],0,1,'C',false);
    $pdf->Cell(260,10,'Course Title: ' . $row['course_title'],0,1,'C',false);
    $pdf->Cell(260,10,'Semester: ' . $row['semester'],0,1,'C',false);
    $pdf->Cell(260,10,'Credit Value: ' . $row['credit_value'],0,1,'C',false);
    $pdf->Image('dist/img/users/outline.png',0,80);
    $pdf->Image('dist/img/users/md.png',0,200);
    $pdf->Image('dist/img/users/cps.png',8,308);
    $pdf->Cell(260,10,'Contact Hour/Week: ' . $row['duration'] . ' minitues',0,1,'C',false);

    // $pdf->Cell(60,10,'Course Description: ' . $row['course_desc'] ,0,1,'L',false);
    $pdf->ln(30);
}
$pdf->Output();


?>