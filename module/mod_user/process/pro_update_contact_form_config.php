<?php


if ($_POST['option']=="update_primary_email"){

if (isset($_POST['con_for_con_pe'])){}#Destruimos session y salimos inmediatamente
#VALIDAMOS LA INTEGRIDAD DE LAS VARIABLES
$Msg ="";
# VALIDACIÓN ---> INTEGRIDAD DE LAS VARIABLES
if (!filter_input(INPUT_POST, 'con_for_con_pe', FILTER_VALIDATE_EMAIL)){ $Msg = "E-Mail NO válido"; echo "error :$Msg";}

if ($Msg==""){
	require $_SERVER['DOCUMENT_ROOT']."/sadmin/module/mod_contact_form/sql/sql_update_prymary_email.php";
	$Estatus_query==0;
	if ($Estatus_query==0){
	    echo 'true';
	}else{
	    echo 'false';
	}
}else{
		echo 'false';
}

}

if ($_POST['option']=="update_second_email"){

if (isset($_POST['con_for_con_se'])){}#Destruimos session y salimos inmediatamente
#VALIDAMOS LA INTEGRIDAD DE LAS VARIABLES
$Msg ="";
# VALIDACIÓN ---> INTEGRIDAD DE LAS VARIABLES
if (!$_POST['con_for_con_se']==""){if (!filter_input(INPUT_POST, 'con_for_con_se', FILTER_VALIDATE_EMAIL)){ $Msg = "E-Mail NO válido"; echo "error :$Msg";}}

if ($Msg==""){
	require $_SERVER['DOCUMENT_ROOT']."/sadmin/module/mod_contact_form/sql/sql_update_second_email.php";
	$Estatus_query==0;
	if ($Estatus_query==0){
	    echo 'true';
	}else{
	    echo 'false';
	}
}else{
		echo 'false';
}

}

?>