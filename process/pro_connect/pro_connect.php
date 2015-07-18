<?php

#Nos conectamos a la base de datos
function connecttodb() { 
   #Incluimos el archivo de configuración
   require $_SERVER['DOCUMENT_ROOT'].'/orfeounity/config.php';
   /*
   if (!($connectdb = mysqli_connect($hostname, $username, $password, $database)
      or trigger_error(mysqli_error($connectdb),E_USER_ERROR))) { 
      echo "Error al conectarnos a la base de datos.";
      
   }
	if (mysqli_connect_errno()) {
		printf("Problema:  %s\n", mysqli_connect_error());
		exit();
	}
   */

   $connectdb = pg_connect("host=$hostname, port=$port, user=$username, pass=$password, dbname=$database");

    if(!$connectdb) {
        echo "<p><i>No me conecte</i></p>";
    }else{
        echo "<p><i>Me conecte</i></p>";
    }
return $connectdb; 
}

?>