<?php
#Obtenemos el contacto enviado desde la web.
include $_SERVER['DOCUMENT_ROOT'].'/sadmin/process/pro_connect/pro_connect.php';
$link=connecttodb(); 
mysqli_set_charset($link, "utf8");

$query = 
"SELECT `con_for_id`,`con_for_dat`,`con_for_nam`,`con_for_com`,`con_for_ema`,`con_for_iss`, `con_for_mes`, `con_for_vie` ,`sta_id`  
FROM `tbl_contact_form` WHERE `con_for_id` = ".$_GET['item_id'];


$sql_get_contact_form = mysqli_query($link,$query) or die(mysqli_error($link));
$get_contact_form=mysqli_fetch_assoc($sql_get_contact_form);
mysqli_close($link);

?>