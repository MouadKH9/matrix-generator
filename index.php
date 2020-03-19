<?php
require "functions.php";

$name = $_GET['name'];
$data = json_decode($_GET['data']);

$img = getImage($name,$data);

// OUTPUT IMAGE
header('Content-type: image/jpeg');
imagejpeg($img);
imagedestroy($img);
