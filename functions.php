<?php
    
    function getImage($name,$data){
        $HEIGHT = 384;
        $WIDTH = 630;

        $BRACKET_WIDTH = 405;
        $BRACKET_HEIGHT = 230;

        $BRACKET_START_X = 155;
        $BRACKET_START_Y = 85;

        $numberOfLines = count($data);
        $numberOfCols = count($data[0]);

        // FETCH IMAGE & WRITE TEXT
        $img = imagecreatefromjpeg('canvas.jpg');
        $white = imagecolorallocate($img, 0, 0, 0);
        $font = "C:\Windows\Fonts\arial.ttf"; 

        imagettftext($img, 40, 0, 10, $HEIGHT/2, $white, $font, "$name = ");

        for ($i=0; $i < count($data); $i++) { 
            for ($j=0; $j < count($data[$i]); $j++) { 
                $box = imagettfbbox(
                            $BRACKET_WIDTH/(max([$numberOfCols,$numberOfLines]) * 2.4),
                            0,
                            $font,
                            $data[$i][$j]
                    );
                imagettftext(
                    $img, 
                    $BRACKET_WIDTH/(max([$numberOfCols,$numberOfLines]) * 2.4),
                    0,
                    $BRACKET_START_X + $j * 475 / $numberOfCols - ($box[2] - $box[0])/2,
                    $BRACKET_START_Y + ($numberOfLines <= 3 ? max([$box[2], $box[4]]) : 0) + $i * 320  / $numberOfLines,
                    $white,
                    $font,
                    $data[$i][$j]
                );
            }
        }

        return $img;
    }
