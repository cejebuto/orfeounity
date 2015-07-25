<?php 
#LISTO TODOS LOS USUARIOS TENIENDO ENCUENTA LAS OPCIONES
require_once $_SERVER['DOCUMENT_ROOT'].'/'.$name_proyect."/module/mod_".$_GET['url_module']."/sql/sql_list_user.php";
?>
 
<div class="box">
<div class="box-header" data-original-title>
	<h2><i class="fa fa-user"></i><span class="break"></span> Usuarios del Sistema</h2>
	<div class="box-icon">
		<!-- Busqueda avanzada, configuraciones , opciones --> 
		<a href="/<?=$name_proyect?>" title="Busqueda Avanzada"><i class="fa fa-search-plus"></i></a>
		<a href="/<?=$name_proyect?>"><i class="fa fa-times" style="color: black;"></i></a>
	</div>
</div>
<div class="box-header">
<div class="row">
  <div class="col-lg-3">
  	<div class="input-group">
	<span class="input-group-addon"><i class="fa fa-search"></i></span>
		<input type="text" class="form-control" placeholder="Filtrar">
	</div>
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-8">
  </div>
  <div class="col-lg-1">
  	<select id="selectdisplatrownum" name "" class="form-control" onchange="location = this.options[this.selectedIndex].value;" title="Numero de registros a mostrar">
  		<option value = '<?=$Page_url.'1/10/'.$Order.'/'.$By?>' <?php if($SizePage == 10){echo " selected";} ?> >10</option>
		<option value = '<?=$Page_url.'1/25/'.$Order.'/'.$By?>' <?php if($SizePage == 25){echo " selected";} ?> >25</option>
		<option value = '<?=$Page_url.'1/50/'.$Order.'/'.$By?>' <?php if($SizePage == 50){echo " selected";} ?> >50</option>
		<option value = '<?=$Page_url.'1/100/'.$Order.'/'.$By?>' <?php if($SizePage == 100){echo " selected";} ?> >100</option>
		<option value = '<?=$Page_url.'1/200/'.$Order.'/'.$By?>' <?php if($SizePage == 200){echo " selected";} ?> >200</option>
  	</select>
  </div>
  <?php /* <div class="col-lg-3">
  </div><!-- /.col-lg-6 -->  */ ?>
</div><!-- /.row -->

</div>
<div class="box-content" style="margin-bottom: -80px" >
	<table class="table table-bordered table-hover">
	  <thead>
		  <tr>
			  <th id="order_1" onclick="comprobar_clase" class ="sorting_desc">Id</th>
			  <th id="order_2" class ="sorting">Fecha de Creación</th>
			  <th id="order_3" class ="sorting">Usuario</th>
			  <th id="order_4" class ="sorting">Nombre</th>
			  <th id="order_5" class ="sorting">Identificación</th>
			  <th id="order_6" class ="sorting">Email</th>
			  <th id="order_7" class ="sorting">Estado</th>
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
//Si Requiere Paginar
if ($Total_pages > 1) { ?>
	<ul class="pagination">
   	<? if ($Page != 1){ ?>
       <li><a href="<?=$Page_url.($Page-1).'/'.$SizePage.'/'.$Order.'/'.$By?>" title = "Anterior "><i class="fa fa-arrow-left"></i></a></li>
      <?php  }else{ ?>
		<li><a href="#" title = "No hay Anterior "><i class="fa fa-arrow-left" style="color: gray;" ></i></a></li>
      <? }
    for ($i=1;$i<=$Total_pages;$i++) {
         if ($Page == $i){ 
			//si muestro el índice de la página actual, no coloco enlace ?>
            <li class="active"><a href="#"><?=$Page?></a></li>
         <? }else{
            //si el índice no corresponde con la página mostrada actualmente,
            //coloco el enlace para ir a esa página  ?>
            <li><a href="<?=$Page_url.$i.'/'.$SizePage.'/'.$Order.'/'.$By?>"><?=$i?></a></li>
        <? }
      }
      if ($Page != $Total_pages){ ?>
         <li><a href="<?=$Page_url.($Page+1).'/'.$SizePage.'/'.$Order.'/'.$By?>" title = "Siguiente "><i class="fa fa-arrow-right"></i></a></li>
     <? }else{ ?>
		<li><a href="#" title = "No hay Siguiente "><i class="fa fa-arrow-right" style="color: gray;" ></i></a></li>
     <? } ?>
     </ul>
<? } ?>     
     <?php 
     //Traigo los datos del mensaje.
     	$page_ini = $StartPage+1;
     	$page_fin = $StartPage+$SizePage;
     	if($page_fin>$num_row_total){
     		$page_fin = $num_row_total;}
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

<div class="alert alert-info" style = "padding:0px;margin-top:-18px;"><font style="font-size:10px">Mostrando de <?=$page_ini?> a <?=$page_fin?> Registros de, <?=$num_row_total?> en total</font></div>
</div>
</div>

<script type="text/javascript">
  $( document ).ready(function() {
  	//Incluimos el script que permite la paginación.
	$.getScript( "/<?=$name_proyect?>/module/mod_<?=$_GET['url_module']?>/js/js_paginator_ajax.js" )
  		.done(function( script, textStatus ) { console.log('%c js_paginator_ajax.js OK ', 'color: #088A29'); })
  		.fail(function( jqxhr, settings, exception ) {console.log('%c No se pudo cargar -> js_paginator_ajax.js', 'background: #222; color: #ffffff');});
  	});
</script>