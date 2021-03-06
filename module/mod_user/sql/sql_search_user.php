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

/*    #Bloque para parametrizar la paginación por defecto.
    if(!$_GET['page']){$_GET['page']=1;}
    if(!$_GET['size']){$_GET['size']=10;}
    if(!$_GET['order']){$_GET['order']=2;}
    if(!$_GET['by']){$_GET['by']=1;}

    #INCLUYO EL PROCESO PARA PERMITIR PAGINAR EN LA CONSULTA
    require $_SERVER['DOCUMENT_ROOT'].'/'.$name_proyect."/process/pro_pagination/pro_sql_pagination.php";

    #INCLUYO FUNCION PARA LIMPIAR LAS VARIABLES
    require $_SERVER['DOCUMENT_ROOT'].'/'.$name_proyect."/function/fun_string/fun_clean_string.php";

$data = strtoupper(clean_string($_POST['search_fast']));  LIKE CASE WHEN */

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
    RIGHT JOIN sgd_personal_profile pp
    ON u.use_id = pp.use_id
WHERE 
 upper(u.use_nam) LIKE CASE WHEN '".$ck_use_nam."' = 'on' THEN upper(u.use_nam) ELSE '%".$use_nam."%' END
 AND upper(pp.per_pro_id) LIKE CASE WHEN '".$ck_per_pro_id."' = 'on' THEN upper(pp.per_pro_id) ELSE '%".$per_pro_id."%' END 
 AND upper(pp.per_pro_nam) LIKE CASE WHEN '".$ck_per_pro_nam."' = 'on' THEN upper(pp.per_pro_nam) ELSE '%".$per_pro_nam."%' END
 AND upper(pp.per_pro_sur) LIKE CASE WHEN '".$ck_per_pro_sur."' = 'on' THEN upper(pp.per_pro_sur) ELSE '%".$per_pro_sur."%' END
 AND upper(pp.per_pro_ema) LIKE CASE WHEN '".$ck_per_pro_ema."' = 'on' THEN upper(pp.per_pro_ema) ELSE '%".$per_pro_ema."%' END

ORDER BY 3 DESC
";

echo "$query"; exit;

#Limpio las variables
/*
upper(pp.per_pro_id) LIKE CASE WHEN '".$ck_per_pro_id."' = 'on' THEN upper(pp.per_pro_id) ELSE '%".$per_pro_id."%' END
 upper(pp.per_pro_nam) LIKE CASE WHEN '".$ck_per_pro_nam."' = 'on' THEN upper(pp.per_pro_nam) ELSE '%".$per_pro_nam."%' END
 upper(pp.per_pro_sur) LIKE CASE WHEN '".$ck_per_pro_sur."' = 'on' THEN upper(pp.per_pro_sur) ELSE '%".$per_pro_sur."%' END
 upper(pp.per_pro_ema) LIKE CASE WHEN '".$ck_per_pro_ema."' = 'on' THEN upper(pp.per_pro_ema) ELSE '%".$per_pro_ema."%' END

*/



$a = "AND  pro_num_ide LIKE CASE WHEN ".$_SESSION['ind_pro_num_ide']." = 0 Then pro_num_ide ELSE '%".$_SESSION['pro_num_ide']."%'  END 
    upper(u.use_nam) like '%".$data."%' 
    or upper(pp.per_pro_nam) like '%".$data."%' 
    or upper(pp.per_pro_sur) like '%".$data."%' 
    or upper(pp.per_pro_ema) like '%".$data."%' 

    ";

 //Ejecuto la consulta
 //$rs = $db->SelectLimit($query,$SizePage,$StartPage);  //APLICANDO LIMITES
 $rs = $db->Execute($query);  // NORMAL

//Compruebo la consulta
if (!$rs){
	
	//Compruebo si tengo que mostrar el debug ó el mensaje, por la variable $_error_debug del config
	if ($_error_debug == true){
		$db->debug = true;
		$rs = $db->Execute($query);
        //$rs = $db->SelectLimit($query,$SizePage,$StartPage);
		$db->debug = false;
	}else{
        $_class_msg = "danger";
		$_Msg_response = "Ocurrió un error procesando los datos, Por favor contacte con el administrador del sistema ; ERR:BC01";
	}
exit;
}else{
    //Si se construyó correctamente la consulta

    //Cuento las Filas.
echo    $num_row_query = $rs->RecordCount(); exit;

    if( $num_row_query >= 1 ) { // Si hay un solo registro procedo a ingresar al aplicativo
            $_Msg_response = 'true';

            //SE USA ESTE BLOQUE PARA PAGINNAR SI SE REQUIERE -----
            $rs_paginate = $db->Execute($query); //CAMBIAR POR UN SELECT COUNT
            $num_row_total = $rs_paginate->RecordCount();
            //calculo el total de páginas
            $Total_pages = ceil($num_row_total / $SizePage);
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

