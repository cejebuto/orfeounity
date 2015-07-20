<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/sadmin/process/pro_connect/pro_connect.php';
$link=connecttodb(); 
mysqli_set_charset($link, "utf8");

$query = " INSERT INTO `tbl_contact_form`
(`con_for_nam`,
`con_for_com`,
`con_for_ema`,
`con_for_iss`,
`con_for_mes`)
 VALUES 
 ('".$_POST['con_for_nam']."',
 '".$_POST['con_for_com']."',
 '".$_POST['con_for_ema']."',
 '".$_POST['con_for_iss']."',
 '".$_POST['con_for_mes']."')";


$sql_contact_form = mysqli_query($link,$query) or die(mysqli_error($link));
/*
$Estatus_query = 0;
echo 'true'; */

/*mysqli_free_result($query);*/
mysqli_close($link);
?>