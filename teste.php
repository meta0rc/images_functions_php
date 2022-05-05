<?php 

    $file = 'img_compress.php';
    
    if(filesize($file) > 2000) {
        echo 'é maior ';
    }else {
        echo 'é menor ';
    }


?>