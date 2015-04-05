<?php
#INCLUIMOS LA CONEXION A LA BASE DE DATOS
session_start();
sleep(1);	
include_once $_SERVER['DOCUMENT_ROOT'].'/sadmin/process/pro_connect/pro_connect.php';
$connectdb=connecttodb(); 
mysqli_set_charset($connectdb, "utf8");

$use_nam = $_POST['use_nam'];
$use_pas = md5($_POST['use_pas']);

$query = "SELECT  `use_id`,`use_nam`,`use_pas`,`use_est` FROM `tbl_user` WHERE `use_nam`='".$use_nam."' AND `use_pas`='".$use_pas."' AND `use_est`='A'";
$sql_login = mysqli_query($connectdb,$query) or die(mysqli_error($connectdb));

$num_row_connect = mysqli_num_rows($sql_login);
$row_connect=mysqli_fetch_assoc($sql_login);
if( $num_row_connect == 1 ) {
    echo 'true';
	$_SESSION['id'] = md5(session_id()); 
    $_SESSION['use_id'] =  $row_connect['use_id'];
    $_SESSION['use_nam'] = $row_connect['use_nam'];
    $_SESSION['use_pas'] = $row_connect['use_pas'];
    $_SESSION['use_est'] = $row_connect['use_est'];
    }
else {
    echo 'false';
}
	mysqli_free_result($sql_login);
	mysqli_close($connectdb); 
?>
