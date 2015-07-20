<?php
session_start();
ini_set("display_errors", 1); 
$name_proyect = $_POST['name_proyect'];

#INCLUIMOS LA CONEXION A LA BASE DE DATOS
require_once $_SERVER['DOCUMENT_ROOT'].'/'.$name_proyect.'/process/pro_connect/pro_connect.php';
$connectdb=connecttodb($name_proyect); 
$ifconexion = $connectdb[1];
$db =  $connectdb[0];

//comprobamos si existe la conexión.
if ($ifconexion == false){
$_Msg_response = $db;    

//Si existe la conexión, procedemos a validar.
}else{

$use_nam = $_POST['use_nam'];
$use_pas = md5($_POST['use_pas']);

$query = "SELECT  
    use_id,
    use_nam,
    use_pas,
    use_est 
FROM
    sgd_user
WHERE 
    use_nam='".$use_nam."' 
    AND use_pas='".$use_pas."' 
    AND use_est='A'";

//Ejecuto la consulta
$rs = $db->Execute($query);
//Compruebo la consulta
if (!$rs){

    $_Msg_response = "Ocurrió un error procesando los datos, contacte con el administrador del sistema : LG01";

}else{
    //Si se construyó correctamente la consulta

    //Cuento las Filas.
    $num_row_connect = $rs->RecordCount(); 

    if( $num_row_connect == 1 ) { // Si hay un solo registro procedo a ingresar al aplicativo
        $_Msg_response = 'true';

        $_SESSION['id'] = md5(session_id()); 
        $_SESSION['use_id'] =  $row_connect['use_id'];
        $_SESSION['use_nam'] = $row_connect['use_nam'];
        $_SESSION['use_pas'] = $row_connect['use_pas'];
        $_SESSION['use_est'] = $row_connect['use_est'];

        } else{
        $_Msg_response = "Usuario ó Contraseña Incorrectos";
        }// fin de contar filas 

    } // fin de comprobar la consulta

} // fin de //comprobamos si existe la conexión.

echo $_Msg_response;

//Cerramos la conexión.
unset($rs);
$db->Close();

?>
