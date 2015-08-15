<style type="text/css">
.lettersearch {font-size: 16px;line-height: 16px;font-weight: 300;font-family: inherit;margin-right: 10px; margin-left: 10px;}
.aling_left{float:left; text-align:left;}
</style>

<?php #Formulario de Búsqueda ?>
<div class="col-lg-12">
	<div class="box">
		<div class="box-header">
			<h2><i class="fa fa-search-plus" style="color: #428bca;"></i>Búsqueda Avanzada de Usuarios</h2>
			<div class="box-icon">
				<a href="#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
				<a href="/<?=$name_proyect?>/<?=$_GET['url_module']?>" ><i class="fa fa-times"></i></a>
			</div>
		</div>
		<div class="box-content">

<form  id="Formsearch">

			<?php //Fecha Creación ?>
			<?php $date_ini = date("m/d/Y");  $date_fin = date("m/d/Y", strtotime('+1 month')); ?>
			<div class="row inbox">
					<div align="left" class="col-sm-3">
						<span class="input-group-addon aling_left" style="background-color: white; border:none;">
							<label class="switch switch-primary">
								      <input type="checkbox" name="ck_use_dat" id="ck_use_dat" class="switch-input"> <!--checked=""-->
								      <span class="switch-label" data-on="Si" data-off="No"></span>
								      <span class="switch-handle"></span>
							</label>
							<span ><font class="lettersearch">Rango Fecha Creacion</font></span>
						</span>
					</div>
					<div class="col-sm-3">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							<input type="text" class="form-control rangedatepiker" id="use_dat" name="use_dat" value="<?=$date_ini?> - <?=$date_fin?>">
						</div>
					</div>
			</div>

			<?php //Fecha Nacimiento ?>
			<div class="row inbox">
					<div align="left" class="col-sm-3">
						<span class="input-group-addon aling_left" style="background-color: white; border:none;">
							<label class="switch switch-primary">
								      <input type="checkbox" name="ck_per_pro_dat_bor" id="ck_per_pro_dat_bor" class="switch-input"> <!--checked=""-->
								      <span class="switch-label" data-on="Si" data-off="No"></span>
								      <span class="switch-handle"></span>
							</label>
							<span ><font class="lettersearch">Rango Fecha Nacimiento</font></span>
						</span>
					</div>
					<div class="col-sm-3">
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							<input type="text" class="form-control rangedatepiker" id="per_pro_dat_bor" name="per_pro_dat_bor" value="01/01/1990 - 1/02/1990">
						</div>
					</div>
			</div>


			<?php //Usuario ?>
			<div class="row inbox">
					<div class="col-sm-3 ">
						<span class="input-group-addon aling_left" style="background-color: white; border:none;">
							<label class="switch switch-primary">
								      <input type="checkbox" name ="ck_use_nam" id ="ck_use_nam" class="switch-input"> <!--checked=""-->
								      <span class="switch-label" data-on="Si" data-off="No"></span>
								      <span class="switch-handle"></span>
							</label>
							<span ><font class="lettersearch">Usuario</font></span>
						</span>
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control" name = "use_nam" id="use_nam">
					</div>
			</div>

			<?php //Identificacion ?>
			<div class="row inbox">
					<div align="left" class="col-sm-3">
						<span class="input-group-addon aling_left" style="background-color: white; border:none;">
							<label class="switch switch-primary">
								      <input type="checkbox" id ="ck_per_pro_id"  name ="ck_per_pro_id" class="switch-input"> <!--checked=""-->
								      <span class="switch-label" data-on="Si" data-off="No"></span>
								      <span class="switch-handle"></span>
							</label>
							<span ><font class="lettersearch">No. Identificación</font></span>
						</span>
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="per_pro_id" id="per_pro_id">
					</div>
			</div>


			<?php //Nombre ?>
			<div class="row inbox">
					<div align="left" class="col-sm-3">
						<span class="input-group-addon aling_left" style="background-color: white; border:none;">
							<label class="switch switch-primary">
								      <input type="checkbox" name ="ck_per_pro_nam" id ="ck_per_pro_nam" class="switch-input"> <!--checked=""-->
								      <span class="switch-label" data-on="Si" data-off="No"></span>
								      <span class="switch-handle"></span>
							</label>
							<span ><font class="lettersearch">Nombre</font></span>
						</span>
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control" name = "per_pro_nam" id="per_pro_nam">
					</div>
			</div>


			<?php //Apellido ?>
			<div class="row inbox">
					<div align="left" class="col-sm-3">
						<span class="input-group-addon aling_left" style="background-color: white; border:none;">
							<label class="switch switch-primary">
								      <input type="checkbox" name ="ck_per_pro_sur" id ="ck_per_pro_sur" class="switch-input"> <!--checked=""-->
								      <span class="switch-label" data-on="Si" data-off="No"></span>
								      <span class="switch-handle"></span>
							</label>
							<span ><font class="lettersearch">Apellido</font></span>
						</span>
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="per_pro_sur" id="per_pro_sur">
					</div>
			</div>


			<?php //Email ?>
			<div class="row inbox">
					<div align="left" class="col-sm-3">
						<span class="input-group-addon aling_left" style="background-color: white; border:none;">
							<label class="switch switch-primary">
								      <input type="checkbox" id="ck_per_pro_ema" name="ck_per_pro_ema" class="switch-input"> <!--checked=""-->
								      <span class="switch-label" data-on="Si" data-off="No"></span>
								      <span class="switch-handle"></span>
							</label>
							<span ><font class="lettersearch">Correo Electronico </font></span>
						</span>
					</div>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="per_pro_ema" id="per_pro_ema">
					</div>
			</div>


			<?php //Estado ?>
			<div class="row inbox">
					<div align="left" class="col-sm-3">
						<span class="input-group-addon aling_left" style="background-color: white; border:none;">
							<label class="switch switch-primary">
								      <input type="checkbox" name ="ck_use_est" id ="ck_use_est" class="switch-input"> <!--checked=""-->
								      <span class="switch-label" data-on="Si" data-off="No"></span>
								      <span class="switch-handle"></span>
							</label>
							<span ><font class="lettersearch">Estado</font></span>
						</span>
					</div>
					<div class="col-sm-3">
						<select  name="use_est" id="use_est" class="form-control">
							<option value = "0"> - Seleccione - </option>
							<option>Activo</option>
							<option>Inactivo</option>
							<option>Baneado</option>
							<option>Suspendido</option>
							<option>Incompleto</option>
					  	</select>
					</div>
			</div>


			<?php //Dependencia ?>
			<div class="row inbox">
					<div align="left" class="col-sm-3">
						<span class="input-group-addon aling_left" style="background-color: white; border:none;">
							<label class="switch switch-primary">
								      <input type="checkbox" name="ck_per_pro_dep" id="ck_per_pro_dep" class="switch-input"> <!--checked=""-->
								      <span class="switch-label" data-on="Si" data-off="No"></span>
								      <span class="switch-handle"></span>
							</label>
							<span ><font class="lettersearch">Dependencia</font></span>
						</span>
					</div>
					<div class="col-sm-3">
						<select  name="per_pro_dep" id="per_pro_dep" class="form-control">
							<option value = "0"> - Seleccione - </option>
							<option>900 - Pruebas </option>
					  	</select>
					</div>
			</div>


			<?php //Ldap ?>
			<div class="row inbox">
					<div align="left" class="col-sm-3">
						<span class="input-group-addon aling_left" style="background-color: white; border:none;">
							<label class="switch switch-primary">
								      <input type="checkbox" name="ck_use_ldap" id="ck_use_ldap"  class="switch-input"> <!--checked=""-->
								      <span class="switch-label" data-on="Si" data-off="No"></span>
								      <span class="switch-handle"></span>
							</label>
							<span ><font class="lettersearch">Ldap</font></span>
						</span>
					</div>
					<div class="col-sm-3">
						<select  name="use_ldap" id="use_ldap" class="form-control">
							<option value = "0"> - Seleccione - </option>
							<option>Si</option>
							<option>No</option>
					  </select>
					</div>
			</div>

<?php #Campos requeridos para el AJAX ?>
<input type="hidden" name="name_proyect" value="<?=$name_proyect?>" >
<input type="hidden" name="name_module" value="<?=$name_module?>" >

</form>
			<div align="right" ><button id ="start_search" class="btn btn-primary">Buscar</button></div>

		</div>
	</div>
</div>

<?php #Resultado de la Búsqueda ?>
<div id ="box_result_search" class="col-lg-12" style="display:none">
	<div class="box">
		<div class="box-header">
			<h2><i class="fa fa-th-list"></i>Resultados de la Búsqueda</h2>
			<div class="box-icon" >
				<a href="#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
				<a class="btn-close" ><i class="fa fa-times"></i></a>
			</div>
		</div>
		<div class="box-content">
			
		</div>
	</div>
</div>


<script type="text/javascript">
  $( document ).ready(function() {

	//Incluimos el script de preloader
	$.getScript( "/<?=$name_proyect?>/module/mod_<?=$_GET['url_module']?>/js/loadingoverlay.js" )
  		.done(function( script, textStatus ) { console.log('%c loadingoverlay.js OK ', 'color: #088A29'); })
  		.fail(function( jqxhr, settings, exception ) {console.log('%c No se pudo cargar -> loadingoverlay.js', 'background: #222; color: #ffffff');});


	//Incluimos el script que ejecuta la busqueda en ajax
	$.getScript( "/<?=$name_proyect?>/module/mod_<?=$_GET['url_module']?>/js/js_searh_user.js" )
  		.done(function( script, textStatus ) { console.log('%c js_searh_user.js OK ', 'color: #088A29'); })
  		.fail(function( jqxhr, settings, exception ) {console.log('%c No se pudo cargar -> js_searh_user.js', 'background: #222; color: #ffffff');});
	

  	
  	});
</script>
