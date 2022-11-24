<?php

include"include/db.php";
require('fpdf/fpdf.php');

$sql = " SELECT * FROM courseoutline ";
$selected_co = mysqli_query($db, $sql);
$pdf = new FPDF();

while ($row = mysqli_fetch_assoc($selected_co)) {
    # code...
    
    $pdf->AddPage();
    $pdf->SetFont('Arial','',16);

    $pdf->Cell(40,10,'Course ID: ' . $row['course_id'],0,1,'L',false);
    $pdf->Cell(40,10,'Course Title: ' . $row['course_title'],0,1,'L',false);
    $pdf->Cell(40,10,'Semester: ' . $row['semester'],0,1,'L',false);
    $pdf->Cell(40,10,'Credit Value: ' . $row['credit_value'],0,1,'L',false);
    $pdf->Cell(40,10,'Contact Hour/Week: ' . $row['duration'] . ' minitues',0,1,'L',false);
    // $pdf->setx(50);
    // $pdf->ln(20);
    $pdf->multiCell(90,10,'Course Description: Conventional and database approaches. Basic concepts of DBMS. Hierarchical, network and relational data  models. Entity-relationship modeling. Relational database designing: decomposition and normalization;  functional dependencies. Relational algebra and calculus. Structured query language (SQL). Query  optimization. Database programming with SQL and PL/SQL. Database security and administration. Distributed  databases. Object-oriented data modeling. Specific database systems: oracle, MS SQL server, access. ',0,2,'J',false);
}
$pdf->Output();


?>