<?php 

//Nombre del proyecto.filter
$name_proyect = $_POST['name_proyect'];

$filter = $_POST['filter'];

//Incluyo opción para Paginar
try {

	#INCLUYO EL PROCESO PARA PERMITIR PAGINAR EN LA CONSULTA
	require_once $_SERVER["DOCUMENT_ROOT"]."/".$name_proyect."/process/pro_pagination/pro_sql_pagination.php";

	//Incluyo opción para Paginar
	try {

		#INCLUYO QUERY NECESARIO PARA MOSTRAR
		require_once $_SERVER["DOCUMENT_ROOT"]."/".$name_proyect."/module/mod_user/sql/sql_filter_user.php";

		//Reemplazamos los datos nulos el array

		//Respondemos la data.
		$data= $sql_response;
		echo json_encode($data);


	} catch (Exception $e) {
		echo json_encode("Error ".$e->getMessage());
	} 


} catch (Exception $e) {
	echo json_encode("Error ".$e->getMessage());
} 
  
   
?>