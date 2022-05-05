<?php

session_start();
if((isset($_SESSION['user']))) {
    
    function compressThumbs(){
        $a = scandir('imagens/thumb/');
        for($i = 2; $i < count($a); $i++){
    
        
            $param = 'imagens/thumb/' . $a[$i];
            if(strpos($a[$i], 'jpg') === false || getimagesize($param)['mime'] != 'image/jpeg') { 
                continue;
            }
            $image = imagecreatefromjpeg($param);
            $destination_url = 'imagens/thumb/' . $a[$i]; 
            $quality = 50;
    
            imagejpeg($image, $destination_url, $quality);
            
        }
    }
    
    function compressImages(){
        $a = scandir('imagens/');
        for($i = 2; $i < count($a); $i++){
    
        
            $param = 'imagens/' . $a[$i];
            if(strpos($a[$i], 'jpg') === false || getimagesize($param)['mime'] != 'image/jpeg'  || filesize($a[$i]) <= 5000){ 
                continue;
            }
            $image = imagecreatefromjpeg($param);
            $destination_url = 'imagens/' . $a[$i]; 
            $quality = 50;
    
            imagejpeg($image, $destination_url, $quality);
            
        }
    }



compressThumbs();
compressImages();

echo 'Imagens Convertidas';
}
else{
    $_SESSION['loginErro'] = 'Você precisa estar logado para acessar essa pagina ';
    header('location: index.php'); 
}

    

?>