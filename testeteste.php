<?php

    $path = scandir('imagens_teste');
   
    $qualityJpg = 60; 
    $qualityPng = 9; 




        foreach($path as $image) {
            $pathTo = 'saved/' . $image;
            $param = 'imagens_teste/' . $image; 

            if(strpos($image, 'png')) { 
                $newImage = imagecreatefrompng($param);
                
                //Trata transparência para PNG
                imagealphablending($newImage, false);
                imagesavealpha($newImage, true);
                imagecolortransparent($newImage);
                imagepng($newImage, $pathTo, $qualityPng, PNG_FILTER_NONE);

            }
            else if(strpos($image, 'jpg')) { 
                $newImage = imagecreatefromjpeg($param);
                imagejpeg($newImage, $pathTo, $qualityJpg);
            } 

        }

    echo 'Fim';

?>
