<?php
include $_SERVER['DOCUMENT_ROOT'].'/sadmin/process/pro_connect/pro_connect.php';
$link=connecttodb(); 
mysqli_set_charset($link, "utf8");


$query = "UPDATE `tbl_contact_form_config`
SET con_for_con_pe = '".$_POST['con_for_con_pe']."' WHERE `con_for_con_id` = 1";


$Estatus_query = 0;
$sql_contact_form = mysqli_query($link,$query) or die(mysqli_error($link));

mysqli_close($link); 

?>