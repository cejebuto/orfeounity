<?php
#Obtenemos el contacto enviado desde la web.
include $_SERVER['DOCUMENT_ROOT'].'/sadmin/process/pro_connect/pro_connect.php';
$link=connecttodb(); 
mysqli_set_charset($link, "utf8");

$query = 
"SELECT `con_for_con_id`,`con_for_con_pe`,`con_for_con_se`,`sta_id` FROM `tbl_contact_form_config`";

$sql_get_contact_form_config = mysqli_query($link,$query) or die(mysqli_error($link));
$get_contact_form_config=mysqli_fetch_array($sql_get_contact_form_config);
mysqli_close($link);
?>