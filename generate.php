<?php
require "functions.php";
$name = $_GET['name'];
$data = json_decode($_GET['data']);

$img = getImage($name,$data);

// OUTPUT IMAGE
// ob_start (); 
imagejpeg($img);
// $image_data = ob_get_contents(); 
// ob_end_clean(); 

// $image_data_base64 = base64_encode($image_data);
// echo $image_data_base64;
// echo $image_data;