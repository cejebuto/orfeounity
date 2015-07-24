<div class="row inbox">
				

				<?php /* MENU DONDE MUESTRA LAS BANDEJAS Y LAS ETIQUETAS*/ ?>
				<?php require $_SERVER['DOCUMENT_ROOT']."/$name_proyect/module/mod_".$_GET['url_module']."/form/for_menu_trays.php";?>
				
				<?php //si $option_show == 1 muestra el listado desplegado, de lo contrario muesta el detalle 
				if ($_GET['param1'] == "" ){$option_show =1; } else { $option_show = $_GET['param1']; } ?>

				<?php /* LISTADO DONDE MUESTRA LOS RADICADOS */ ?>
				<?php require $_SERVER['DOCUMENT_ROOT']."/$name_proyect/module/mod_".$_GET['url_module']."/form/for_list_radicado.php";?>

<?php //php tormenta ?>

