<?php 

$_class_msg = "warning";
$_Msg_response = "No se a Cargado la consulta";

// Compruebo si es busqueda 
if ($_POST['search_fast']){
	#LISTO TODOS LOS CONSULTA RAPIDA
	require_once $_SERVER['DOCUMENT_ROOT'].'/'.$name_proyect."/module/mod_".$_GET['url_module']."/sql/sql_list_user_search_fast.php";	
}else{

	#LISTO TODOS LOS USUARIOS
	require_once $_SERVER['DOCUMENT_ROOT'].'/'.$name_proyect."/module/mod_".$_GET['url_module']."/sql/sql_list_user.php";
} ?>

 
<div class="box">
<div class="box-header" data-original-title>
	<h2><i class="fa fa-user"></i><span class="break"></span> Usuarios del Sistema</h2>
	<div class="box-icon">
		<!-- Busqueda avanzada, configuraciones , opciones --> 
		<a href="/<?=$name_proyect?>/<?=$_GET['url_module']?>/sgd/search_<?=$_GET['url_module']?>" title="Búsqueda Avanzada"><i class="fa fa-search-plus" style="color: #428bca;"></i></a>
		<a href="/<?=$name_proyect?>"><i class="fa fa-times" style="color: black;"></i></a> 
	</div>
</div>
<div class="box-header">
<div class="row">
  <div class="col-lg-3">
  	<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-search"></i></span>
		<form method="post" action="./" >
			<input type="text" name ="search_fast" class="form-control" value = "<?=$_POST['search_fast']?>" placeholder="Busqueda Rapida">
		</form>
	</div>
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-8">
  </div>
  <div class="col-lg-1">
  	<select id="selectdisplatrownum" name "" class="form-control" onchange='$("#id_list").LoadingOverlay("show"); location = this.options[this.selectedIndex].value;' title="Numero de registros a mostrar">
  		<option value = '<?=$Page_url.'1/10/'.$Order.'/'.$By?>'  <?php if($SizePage == 10) {echo " selected";} ?> >10</option>
		<option value = '<?=$Page_url.'1/25/'.$Order.'/'.$By?>'  <?php if($SizePage == 25) {echo " selected";} ?> >25</option>
		<option value = '<?=$Page_url.'1/50/'.$Order.'/'.$By?>'  <?php if($SizePage == 50) {echo " selected";} ?> >50</option>
		<option value = '<?=$Page_url.'1/100/'.$Order.'/'.$By?>' <?php if($SizePage == 100){echo " selected";} ?> >100</option>
		<option value = '<?=$Page_url.'1/200/'.$Order.'/'.$By?>' <?php if($SizePage == 200){echo " selected";} ?> >200</option>
  	</select>
  </div>
  <?php /* <div class="col-lg-3"> 
  </div><!-- /.col-lg-6 -->  */ ?>
</div><!-- /.row --> 
</div>
<div  id "list_user"  class="box-content" style="margin-bottom: -80px" >
	<table  class="table table-bordered table-hover">
	  <thead id = "list_user">
		  <tr> 
		  	<?php 
			#INCLUYO EL PROCESO QUE TRAE EL ORDER Y EL BY DE PAGINACION PARA EL LIST
			require $_SERVER['DOCUMENT_ROOT'].'/'.$name_proyect."/process/pro_pagination/pro_get_orderby.php";
			?>
			  <th id="order_1" onclick="set_order(1,'<?=$Page_url_order?>')" class ="sorting <?php if($_id == 1){echo $class_sorting;} ?> " >Id</th>
			  <th id="order_2" onclick="set_order(2,'<?=$Page_url_order?>')" class ="sorting <?php if($_id == 2){echo $class_sorting;} ?> ">Fecha de Creación</th>
			  <th id="order_3" onclick="set_order(3,'<?=$Page_url_order?>')" class ="sorting <?php if($_id == 3){echo $class_sorting;} ?> ">Usuario</th>
			  <th id="order_4" onclick="set_order(4,'<?=$Page_url_order?>')" class ="sorting <?php if($_id == 4){echo $class_sorting;} ?> ">Nombre</th>
			  <th id="order_5" onclick="set_order(5,'<?=$Page_url_order?>')" class ="sorting <?php if($_id == 5){echo $class_sorting;} ?> ">Identificación</th>
			  <th id="order_6" onclick="set_order(6,'<?=$Page_url_order?>')" class ="sorting <?php if($_id == 6){echo $class_sorting;} ?> ">Email</th>
			  <th id="order_7" onclick="set_order(7,'<?=$Page_url_order?>')" class ="sorting <?php if($_id == 7){echo $class_sorting;} ?> ">Estado</th>
		  </tr>
	  </thead>   
	  <tbody>


	<?php //LLENAMOS LOS REGISTROS DE LOS USUARIOS 
	if ($_Msg_response == 'true'){ ?>
		<?php while(!$rs->EOF){ ?>
	  	<tr onclick="document.location = '#';" style="cursor:pointer;">
	   		<td><?=$rs->fields["use_id"]?></td>
	   		<td><?=$rs->fields["use_dat"]?></td>
	   		<td><?=$rs->fields["use_nam"]?></td>
	   		<td><?=$rs->fields["nombre"]?></td>
	   		<td><?=$rs->fields["per_pro_id"]?></td>
	   		<td><?=$rs->fields["per_pro_ema"]?></td>
	   		<? 
			switch ($rs->fields["use_est"]) {
			    case 'A': $estado = "Activo"; $label = "label label-success"; break;
			    case 'I': $estado = "Inactivo"; $label = "label label-default"; break;
			    case 'B': $estado = "Baneado"; $label = "label label-info"; break;
			    case 'S':  $estado = "Suspendido"; $label = "label label-danger"; break;
			    case 'N': $estado = "Incompleto";  $label = "label label-warning"; break;
			    default: $estado = "Desconocido"; $label = "label label-primary";
				}
	   		?>
	   		<td><span class="<?=$label?>"><?=$estado?></span></td>
	   		<? unset($estado);unset($label); ?>
	   </tr>
   		<? $rs->MoveNext();} ?>
	<?php }else{ ?>
			<tr>
				<td colspan="7">
					<div class="alert alert-<?=$_class_msg?>"><?=$_Msg_response?></div>
				</td>
			</tr>
		<? } ?>


	  </tbody>
  </table>            


<!-- Paginación -->
<?php
#INCLUYO EL PROCESO QUE ME MUESTRA LA PAGINACIÓN.
require $_SERVER['DOCUMENT_ROOT'].'/'.$name_proyect."/process/pro_pagination/pro_pagination.php";
?>
<!-- fin de Paginación -->


<?php if ($_Msg_response == 'true'){ ?>
<?php //si requiere exportar ?>
	  <ul class="pagination">
		<li><a href="#" title = "Exportar a PDF "><i class="fa fa-file-pdf-o" style="color:#BE1111;" ></i></a></li>
		<li><a href="#" title = "Exportar a Excel  "><i class="fa fa-file-excel-o" style="color:#2EBE11;" ></i></a></li>
		<li><a href="#" title = "Exportar a CSV  "><i class="fa fa-file-code-o" style="color:#BEAD11;" ></i></a></li>
	  </ul>
<?php } ?>

<?php // Si Pagina correctamente muestre el mensaje.
if ($_show_messagge == 'true'){ ?>
<div class="alert alert-info" style = "padding:0px;margin-top:-18px;"><font style="font-size:10px">Mostrando de <?=$page_ini?> a <?=$page_fin?> Registros de, <?=$num_row_total?> en total</font></div>
<?php } ?>
</div>
</div>

<script type="text/javascript">
  $( document ).ready(function() {

	//Incluimos el script de preloader
	$.getScript( "/<?=$name_proyect?>/module/mod_<?=$_GET['url_module']?>/js/loadingoverlay.js" )
  		.done(function( script, textStatus ) { console.log('%c loadingoverlay.js OK ', 'color: #088A29'); })
  		.fail(function( jqxhr, settings, exception ) {console.log('%c No se pudo cargar -> loadingoverlay.js', 'background: #222; color: #ffffff');});


  	//Incluimos el script que permite la paginación.
	$.getScript( "/<?=$name_proyect?>/module/mod_<?=$_GET['url_module']?>/js/js_paginator_ajax.js" )
  		.done(function( script, textStatus ) { console.log('%c js_paginator_ajax.js OK ', 'color: #088A29'); })
  		.fail(function( jqxhr, settings, exception ) {console.log('%c No se pudo cargar -> js_paginator_ajax.js', 'background: #222; color: #ffffff');});

	
  	});
</script>