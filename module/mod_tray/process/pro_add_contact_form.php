<?php


if (isset($_POST['con_for_nam'])){}#Destruimos session y salimos inmediatamente
if (isset($_POST['con_for_com'])){}#Destruimos session y salimos inmediatamente
if (isset($_POST['con_for_ema'])){}#Destruimos session y salimos inmediatamente
if (isset($_POST['con_for_iss'])){}#Destruimos session y salimos inmediatamente
if (isset($_POST['con_for_mes'])){}#Destruimos session y salimos inmediatamente

#VALIDAMOS LA INTEGRIDAD DE LAS VARIABLES
$Msg ="";
# VALIDACIÓN ---> INTEGRIDAD DE LAS VARIABLES
if (strlen($_POST['con_for_nam'])< 3 ){ $Msg = "Nombre muy corto"; echo "error :$Msg";}
if(!empty($_POST['con_for_com'])){if (strlen($_POST['con_for_com'])< 3 ){ $Msg = "Compañia no valida"; echo "error :$Msg";}}
if (!filter_input(INPUT_POST, 'con_for_ema', FILTER_VALIDATE_EMAIL)){ $Msg = "E-Mail NO válido"; echo "error :$Msg";}
if (strlen($_POST['con_for_iss'])< 4){ $Msg = "Asunto NO válido"; echo "error :$Msg";}
if (strlen($_POST['con_for_mes'])< 3 ){ $Msg = "Mesaje demaciado corto"; echo "error :$Msg";}


if ($Msg==""){
	
	#ENVIO MENSAJE AL USUARIO
	include $_SERVER['DOCUMENT_ROOT']."/sadmin/module/mod_contact_form/process/pro_send_message_user.php";

	#ENVIO MENSAJE AL ADMINISTRADOR
	include $_SERVER['DOCUMENT_ROOT']."/sadmin/module/mod_contact_form/process/pro_send_message_admin.php";

	#GUARDO EN LA BASE DE DATOS
	require $_SERVER['DOCUMENT_ROOT']."/sadmin/module/mod_contact_form/sql/sql_add_contact_form.php";
	$Estatus_query = '0';

	if ($Estatus_query=='0'){
	    echo 'true';

	}else{
	    echo 'false';
	}
}else{
		echo 'false';
}

?>