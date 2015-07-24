<?php
session_start();
ini_set("display_errors", 1); 

#INCLUIMOS LA CONEXION A LA BASE DE DATOS y CON ESTA EL CONFIG 
require_once $_SERVER['DOCUMENT_ROOT'].'/'.$name_proyect.'/process/pro_connect/pro_connect.php';
$connectdb=connecttodb($name_proyect); //colocar "true" como segundo parametro para hacer debug en las consultas
$ifconexion = $connectdb[1];
$db =  $connectdb[0];
$_error_debug = $connectdb[2];

//comprobamos si existe la conexión.
if ($ifconexion == false){
$_Msg_response = $db;    

//Si existe la conexión, procedemos a validar.
}else{

    #Bloque para la REGULAR PAGINATION
    $Page_url = "/$name_proyect/".$_GET['url_module']."/sgd/".$_GET['option']."/lst/";
    $Page = intval($_GET['page']); //Page
    $SizePage = intval($_GET['size']); //Limit
    $Order = intval($_GET['order']); //Orden
    $By = intval($_GET['by']); //By - por que numero se ordena
    if ($Page<=1){$StartPage = 0;$Page = 1;} else {$StartPage = ($Page - 1) * $SizePage;}
    
    
//Query para traer los usuarios.
$query = "SELECT  
    u.use_id,
    u.use_dat,
    u.use_nam,
    ".$db->Concat('pp.per_pro_nam',"' '",'pp.per_pro_sur')." as nombre,
    pp.per_pro_id,
    pp.per_pro_ema,
    u.use_est
FROM
    sgd_user u 
    LEFT JOIN sgd_personal_profile pp
    ON u.use_id = pp.use_id";

//echo "<pre>$query</pre>"; exit;

 //Ejecuto la consulta
 $rs = $db->SelectLimit($query,$SizePage,$StartPage);  //APLICANDO LIMITES
 //$rs = $db->Execute($query);  // NORMAL

//Compruebo la consulta
if (!$rs){
	
	//Compruebo si tengo que mostrar el debug ó el mensaje, por la variable $_error_debug del config
	if ($_error_debug == true){
		$db->debug = true;
		//$rs = $db->Execute($query);
        $rs = $db->SelectLimit($query,$SizePage,$StartPage);
		$db->debug = false;
	}else{
        $_class_msg = "danger";
		$_Msg_response = "Ocurrió un error procesando los datos, Por favor contacte con el administrador del sistema ; ERR:BC01";
	}

}else{
    //Si se construyó correctamente la consulta

    //Cuento las Filas.
    $num_row_query = $rs->RecordCount();

    if( $num_row_query >= 1 ) { // Si hay un solo registro procedo a ingresar al aplicativo
            $_Msg_response = 'true';

            //SE USA ESTE BLOQUE PARA PAGINNAR SI SE REQUIERE -----
            $rs_paginate = $db->Execute($query);
            $num_row_forpage = $rs_paginate->RecordCount();
            //calculo el total de páginas
            $Total_pages = ceil($num_row_forpage / $SizePage);
            //--------------------

        } else{
            $_class_msg = "warning";
           $_Msg_response = "No hay usuarios para mostrar.";
        }// fin de contar filas 

    } // fin de comprobar la consulta

} // fin de //comprobamos si existe la conexión.

//Retornamos -> $_Msg_response;

//Cerramos la conexión.
$db->Close();

?>

