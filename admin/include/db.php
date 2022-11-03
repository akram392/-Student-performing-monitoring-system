<?php
  
   // Database connection goes here....
   
   $db = mysqli_connect("localhost", "root", "", "studentperform");

   if ($db) {
   	// code...
   	//echo "Database Connected Successfully.";
   }
   else {

   	die("Query Field". mysqli_error($db));
   }
?>