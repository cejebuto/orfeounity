<?php
session_start();
ini_set("display_errors", 1); 

#INCLUIMOS LA CONEXION A LA BASE DE DATOS y CON ESTA EL CONFIG 
require_once $_SERVER['DOCUMENT_ROOT'].'/'.$name_proyect.'/process/pro_connect/pro_connect.php';
$connectdb=connecttodb($name_proyect); //colocar "true" como segundo parametro para hacer debug en las consultas
$db =  $connectdb[0];
$ifconexion = $connectdb[1];
$_error_debug = $connectdb[2];

// echo json_encode('dos');
 
//comprobamos si existe la conexión.
if ($ifconexion == false){
$_Msg_response = $db;    

//Si existe la conexión, procedemos a validar.
}else{

    #INCLUYO FUNCION PARA LIMPIAR LAS VARIABLES
    require $_SERVER['DOCUMENT_ROOT'].'/'.$name_proyect."/function/fun_string/fun_clean_string.php";

$filter = strtoupper(clean_string($filter));

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
    ON u.use_id = pp.use_id
WHERE
    upper(u.use_nam) like '%".$filter."%'
    or upper(pp.per_pro_nam) like '%".$filter."%' 
    or upper(pp.per_pro_sur) like '%".$filter."%' 
    or upper(pp.per_pro_ema) like '%".$filter."%' 
    or upper(pp.per_pro_id) like '%".$filter."%' 
ORDER BY ".$By." ".$_Order."
";

//echo "<pre>$query</pre>"; exit;

 //Ejecuto la consulta
 $rs = $db->SelectLimitArray($query,$SizePage,$StartPage);  //APLICANDO LIMITES
 $showdata = $rs[1];
 $rs = $rs[0];

 //$rs = $db->Execute($query);  // NORMAL

//Compruebo la consulta
if (!$rs){
    
    //Compruebo si tengo que mostrar el debug ó el mensaje, por la variable $_error_debug del config
    if ($_error_debug == true){
        $db->debug = true;
        //$rs = $db->Execute($query);
        $rs = $db->SelectLimitArray($query,$SizePage,$StartPage);
        $db->debug = false;
    }else{
        $_class_msg = "danger";
        $_Msg_response = "Ocurrió un error procesando los datos, Por favor contacte con el administrador del sistema ; ERR:BC01";
    }

}else{

    //Si se construyó correctamente la consulta

    //Cuento las Filas.
    
    if ($showdata == 'true'){ $num_row_query = count($rs);} else {$num_row_query = 0;}

//echo var_dump($rs); exit;
        if( $num_row_query >= 1) { // Si hay un solo registro procedo a ingresar al aplicativo 
            $_class_msg = "success";
            $_Msg_response = 'true';
         
            //SE USA ESTE BLOQUE PARA PAGINNAR SI SE REQUIERE -----
            $rs_paginate = $db->Execute($query); //CAMBIAR POR UN SELECT COUNT
            $NumRowTotal = $rs_paginate->RecordCount();
            //calculo el total de páginas
            $Total_pages = ceil($NumRowTotal / $SizePage);
            //--------------------

        } else{
           $_class_msg = "warning";
           $_Msg_response = "No hay usuarios para mostrar.";
           $rs = null;
        }// fin de contar filas 

    } // fin de comprobar la consulta

} // fin de //comprobamos si existe la conexión.

//Retornamos -> $_Msg_response;
$sql_response[0] = $rs;
$sql_response[1] = $_Msg_response;
$sql_response[2] = $_class_msg;
$sql_response[3] = $Total_pages;
$sql_response[4] = $StartPage;
$sql_response[5] = $NumRowTotal;

//echo json_encode($rs);
//Cerramos la conexión.
//$db->Close();


?>

