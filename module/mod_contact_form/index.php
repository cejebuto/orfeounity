<?php 
if(!isset($_SESSION)){ session_start();}
if(!isset($_GET['option'])){ $_GET['option']="for_view_contact";}
?>
<?php
#incluyo el MODULO que requiero
require $_SERVER['DOCUMENT_ROOT']."/sadmin/module/mod_".$_GET['url_module']."/form/".$_GET['option'].".php";
?>

	<!-- inline scripts related to this page -->