<?php
    function converter(){
        function conversor($file, $output){     
            $image = imagecreatefromstring(file_get_contents($file));
            ob_start();
            imagejpeg( $image,NULL,100);
            $cont = ob_get_contents();
            ob_end_clean();
            imagedestroy($image);
            $content = imagecreatefromstring($cont);
            imagewebp($content,$output);
            imagedestroy($content);
        }
        function incluDes(){
            $dir = './imagens';
            $ListaDeimg = scandir($dir);
            return $ListaDeimg;   
    
        }
        $a = [ //imagens que eu não quero excluir'   

            'imagens/ajax-loader.gif',
            'imagens/back.png',
            'imagens/busca-clientes.png',
            'imagens/comment.png',
            'imagens/favicon.ico',
            'imagens/icones',
            'imagens/iconwhats.png',
            'imagens/logo.png',
            'imagens/max.png',
            'imagens/next.png',
            'imagens/pin_de_localização.gif',
            'imagens/selo-w3c-css.png',
            'imagens/selo-w3c-html5.png',
            'imagens/selo.png',
            'imagens/telephone.png',
            'imagens/vazio.jpg',
            'imagens/whatsapp.png',
            'imagens/thumb'
           
        ];

        for($cont = 2; $cont < count(incluDes()); $cont++){

            $b = 'images/' .substr(incluDes()[$cont], 0 , -4) . '.webp';
            $c = 'imagens/' . incluDes()[$cont];
            
            if(in_array($c, $a)) { 
                continue;
            }

           conversor($c, $b);
           
        }
 

    }
    converter();

  
?>

