<?php 
if(!isset($_SESSION)){ session_start();}
if(!isset($_GET['option'])){ $_GET['option']="view_trays";}
?>
<?php
#incluyo el MODULO o el SUBMODULO que requiero
require_once $_SERVER['DOCUMENT_ROOT'].'/'.$name_proyect."/module/mod_".$_GET['url_module']."/form/".$_GET['option'].".php";
?>

	<!-- inline scripts related to this page -->

	