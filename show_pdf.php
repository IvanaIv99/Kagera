<?php
  

$filename = $_GET['name'];
$file= "uploads/cv/".$_GET['name'];

header('Content-type: application/pdf');
  
header('Content-Disposition: inline; filename="' . $filename . '"');
  
header('Content-Transfer-Encoding: binary');
  
header('Accept-Ranges: bytes');
  
@readfile($file);
  
?>