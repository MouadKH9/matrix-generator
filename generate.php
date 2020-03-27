<?php
require "functions.php";

$name = $_POST['name'];
$data = json_decode($_POST['data']);

$img = getImage($name,$data);

// OUTPUT IMAGE
header('Content-type: image/jpeg');
imagejpeg($img);
imagedestroy($img);
