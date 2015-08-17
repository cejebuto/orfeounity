			
<?php if (!$option_show == 1 ){ ?>

	<?php /* LISTA TODOS LOS RADICADOS EN "PANTALLA COMPLETA" */ ?>
	<?php require $_SERVER['DOCUMENT_ROOT']."/$name_proyect/module/mod_".$_GET['url_module']."/form/for_list_radicado_expensive.php";?>


<?php }else{ ?>

	<?php /* COLUMNA DONDE MUESTRA LOS DETALLES DE UN RADICADO*/ ?>
	<?php require $_SERVER['DOCUMENT_ROOT']."/$name_proyect/module/mod_".$_GET['url_module']."/form/for_list_radicado_condense.php";?>				

	<?php /* COLUMNA DONDE MUESTRA LOS DETALLES DE UN RADICADO*/ ?>
	<?php require $_SERVER['DOCUMENT_ROOT']."/$name_proyect/module/mod_".$_GET['url_module']."/form/for_details_radicado.php";?>

<?php } ?>