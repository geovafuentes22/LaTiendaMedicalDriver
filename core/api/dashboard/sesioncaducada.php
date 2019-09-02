<?php
//sino, calculamos el tiempo transcurrido
        $tiempo_transcurrido = time() - $_SESSION["ultimoAcceso"];

        //comparamos el tiempo transcurrido  
        if ($tiempo_transcurrido >= 300) {
            //si pasaron 5 segundos o más  
            session_destroy(); // destruyo la sesión  
            $result['session'] = 0;//envío al usuario a la pag. de autenticación  
            $result['message'] = 'Su sesión ha caducado';
            exit(json_encode($result));
        } else {  
            $_SESSION["ultimoAcceso"] = time();
        }
        
?>