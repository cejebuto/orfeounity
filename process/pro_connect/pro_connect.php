<?php

#Nos conectamos a la base de datos
function connecttodb($name_proyect,$_debug) { 
  
   #Incluimos el archivo de configuración
   require $_SERVER['DOCUMENT_ROOT'].'/'.$name_proyect.'/config.php';

   #incluimos el ADODB
   require $_SERVER['DOCUMENT_ROOT'].'/'.$name_proyect.'/dbal/adodb.inc.php';
    $db = ADONewConnection($_driver);
    $db->debug = $_debug;

    #intentamos conectarnos a la base de datos.
   if( ! $db->Connect($_hostname, $_username, $_password, $_database)) {
        $connectdb = false;
        $db = "<p><i>No fue posible conectarse a la base de datos, mas info en :config.php;$_debug=true</i></p>";
    }else{
      $connectdb = true;
    }

    #construimos la respuesta
    $response[0] = $db;
    $response[1] = $connectdb;
        
return $response; 
}

?>