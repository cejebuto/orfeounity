<?php 

require $_SERVER['DOCUMENT_ROOT']."/sadmin/module/mod_contact_form/sql/sql_get_contact_form_config.php";

?>
<style type="text/css">
	.input_form_control{text-decoration: none; border-bottom: dashed 1px; cursor: pointer;}
</style>
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>

<div class="box">
	<div class="box-header">
		<h2><i class="fa fa-edit"></i>Configuración del modulo de contácto</h2>
		<div class="box-icon">
			<a href="/sadmin/contact_form/0/for_view_contact" ><i class="fa fa-envelope-o"></i></a>
			<a href="form-x-editable.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
			<a href="/sadmin/contact_form/0/for_view_contact" ><i class="fa fa-times"></i></a>
		</div>
	</div>
	<div class="box-content">

        <table id="user" class="table table-bordered table-striped" style="clear: both">
            <tbody> 
                <tr>         
                    <td width="35%">Email principal donde quiere que se notifique </td>
                    <td width="65%">
                    	<a href="#" id="email_frist" class="input_form_control"><?php echo $get_contact_form_config['con_for_con_pe']; ?></a>
						<div id ="form_ema_frist" class="form-group" style="display:none">
							  <div class="controls">
							   <div class="input-group date col-sm-6">
		                        	<input type="text" class="form-control" name="con_for_con_pe" id="con_for_con_pe" value="<?php echo $get_contact_form_config['con_for_con_pe']; ?>">
									<span id="update_primary_email" class="input-group-addon btn btn-info"><i class="fa fa-check"></i></span>
									<span id ="cancel_email_frist" class="input-group-addon btn btn-default"><i class="fa fa-times"></i></span>
								</div>	
						</div>
                    </td>
                </tr>
                <tr>         
                    <td width="35%">Email secundario para enviar copia </td>
                    <td width="65%">
                    	<a href="#" id="email_second" class="input_form_control"><?php if($get_contact_form_config['con_for_con_se']==""){echo " Ninguno";}else{ echo $get_contact_form_config['con_for_con_se'];}  ?></a>
						<div id ="form_ema_second" class="form-group" style="display:none">
							  <div class="controls">
							   <div class="input-group date col-sm-6">
		                        	<input type="text" class="form-control" name="con_for_con_se" id="con_for_con_se" value="<?php echo $get_contact_form_config['con_for_con_se']; ?>">
									<span id="update_second_email" class="input-group-addon btn btn-info"><i class="fa fa-check"></i></span>
									<span id ="cancel_email_second" class="input-group-addon btn btn-default"><i class="fa fa-times"></i></span>
								</div>	
						</div>
                    	<!--<a id="email_second" class="input_form_control"><?php echo $get_contact_form_config['con_for_con_se']; ?></a>
                    	<input type="text" name="con_for_con_se" id="con_for_con_se" style="display:none" value="<?php echo $get_contact_form_config['con_for_con_se']; ?>">-->
                    </td>
                </tr>
            </tbody>
        </table>				            									  

	</div>
</div>

<script type="text/javascript">
  $( document ).ready(function() { 
  	//Incluimos los script para hacer funcionar las configuraciones del correo
	$.getScript( "/sadmin/module/mod_contact_form/js/js_update_contact_form_config.js" )
  	.done(function( script, textStatus ) { console.log('%c js_update_contact_form_config.js OK ', 'color: #088A29'); })
  	.fail(function( jqxhr, settings, exception ) {console.log('%c No se pudo cargar -> js_update_contact_form_config.js', 'background: #222; color: #ffffff');});
	});

  
</script>
