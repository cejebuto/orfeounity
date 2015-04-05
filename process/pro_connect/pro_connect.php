<?php

#Nos conectamos a la base de datos
function connecttodb() { 
   #Incluimos el archivo de configuración
   include $_SERVER['DOCUMENT_ROOT'].'/sadmin/config.php';

   if (!($connectdb = mysqli_connect($hostname, $username, $password, $database)
      or trigger_error(mysqli_error($connectdb),E_USER_ERROR))) { 
      echo "Error al conectarnos a la base de datos.";
      exit(); 
   }
	if (mysqli_connect_errno()) {
		printf("Problema:  %s\n", mysqli_connect_error());
		exit();
	}
   return $connectdb; 
}
?>