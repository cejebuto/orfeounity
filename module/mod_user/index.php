<?php $name_module=$_GET['url_module'];?>
<?php $name_option=$_GET['option'];?>
<?php 
if(!isset($_SESSION)){ session_start();}
if(!isset($_GET['option'])){ $_GET['option']="list_user";}
?>
<?php
#incluyo el MODULO o el SUBMODULO que requiero
require_once $_SERVER['DOCUMENT_ROOT'].'/'.$name_proyect."/module/mod_".$_GET['url_module']."/form/for_".$_GET['option'].".php";
?>
<?php #Obtengo variables para los javascript?>
<script> var name_module = "<?php echo $name_module;?>" ;</script>
<script> var name_option = "<?php echo $name_option;?>" ;</script>
