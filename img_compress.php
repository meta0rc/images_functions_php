<?php

        function imgs_compress(){
            
            $pathImg = scandir('imagens');
            foreach($pathImg as $image) {
                $pathTo = 'imagens/' . $image;
                $param = 'imagens/' . $image; 
                
                if (strpos($image, 'jpg')) { 
                    if(strpos($param, 'vazio.jpg')){
                        continue;
                    }
                    $newImage = imagecreatefromjpeg($param);
                    imagejpeg($newImage, $pathTo, 50);
                } 
                else if(strpos($image, 'png')) { 
                    $newImage = imagecreatefrompng($param);
                    //Trata transparência para PNG
                    imagealphablending($newImage, false);
                    imagesavealpha($newImage, true);
                    imagecolortransparent($newImage);
                    imagepng($newImage, $pathTo, 9, PNG_FILTER_NONE);
    
                }

    
            }
        }
        function thumbs_compress(){
            $pathTmb = scandir('imagens/thumb');
            foreach($pathTmb as $image) {
                $path = 'imagens/thumb/' . $image;
                $param = 'imagens/thumb/' . $image; 
                
                if(strpos($param, 'vazio.jpg')){
                    continue;
                }
                
                 if(strpos($image, 'jpg')) { 
                    $newImage = imagecreatefromjpeg($param);
                    imagejpeg($newImage, $path, 50);
                } 
                else if(strpos($image, 'png')) { 
                    $newImage = imagecreatefrompng($param);
                    //Trata transparência para PNG
                    imagealphablending($newImage, false);
                    imagesavealpha($newImage, true);
                    imagecolortransparent($newImage);
                    imagepng($newImage, $path, 9, PNG_FILTER_NONE);
    
                }
    
            }

            echo "Imagens Convertidas";
        }

        thumbs_compress();
        imgs_compress();

        $fileD = 'img_compress.php';

        if(file_exists($fileD)){
            unlink($fileD);
        }

    

?>