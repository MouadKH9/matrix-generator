<?php
$HEIGHT = 384;
$WIDTH = 630;

$BRACKET_WIDTH = 405;
$BRACKET_HEIGHT = 230;

$BRACKET_START_X = 150;
$BRACKET_START_Y = 85;


$name = $_GET['name'];
$data = json_decode($_GET['data']);
$numberOfLines = count($data);
$numberOfCols = count($data[0]);

// FETCH IMAGE & WRITE TEXT
$img = imagecreatefromjpeg('canvas.jpg');
$white = imagecolorallocate($img, 0, 0, 0);
$font = "C:\Windows\Fonts\arial.ttf"; 

/*

    brackets width: 145 -> 550
    brackets height: 70 -> 300

*/


$test = imagettftext($img, 40, 0, 10, $HEIGHT/2, $white, $font, "$name = ");
// var_dump($test);
// die();

for ($i=0; $i < count($data); $i++) { 
    for ($j=0; $j < count($data[$i]); $j++) { 
        $box = imagettfbbox(
                    $BRACKET_WIDTH/(max([$numberOfCols,$numberOfLines]) * 2.2),
                    0,
                    $font,
                    $data[$i][$j]
            );
        imagettftext(
            $img, 
            $BRACKET_WIDTH/(max([$numberOfCols,$numberOfLines]) * 2.2),
            0,
            $BRACKET_START_X + $j * 470 / $numberOfCols,
            $BRACKET_START_Y + max([$box[2], $box[4]]) + $i * 310  / $numberOfLines,
            $white,
            $font,
            $data[$i][$j]
        );
    }
}

// OUTPUT IMAGE
header('Content-type: image/jpeg');
imagejpeg($img);
imagedestroy($img);
