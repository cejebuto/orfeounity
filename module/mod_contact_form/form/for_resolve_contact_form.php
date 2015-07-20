<?php 

#ACTUALIZO EL ESTADO A VISTO
include_once ($_SERVER['DOCUMENT_ROOT']."/sadmin/module/mod_contact_form/sql/sql_update_contact_form_view.php");

#Obtengo el contacto a resolver.
include_once ($_SERVER['DOCUMENT_ROOT']."/sadmin/module/mod_contact_form/sql/sql_get_contact_form.php");
?> 

<div class="box">
	<div class="box-header">
		<h2><i class="fa fa-edit"></i>Resolver este contacto</h2>
		<div class="box-icon">
			<a href="form-elements.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
			<a href="/sadmin/contact_form/0/for_view_contact" ><i class="fa fa-times"></i></a>
		</div>
	</div>
	<div class="box-content">

		<label class="control-label">Nombre:</label>
		<div  class="tab-content">
		<?php  echo $get_contact_form['con_for_nam'];?> 
		</div><br>
		<label class="control-label">Empresa:</label>
		<div  class="tab-content">
		<?php  echo $get_contact_form['con_for_com'];?> 
		</div><br>
		<label class="control-label">Correo Electronico:</label>
		<div  class="tab-content">
		<?php  echo $get_contact_form['con_for_ema'];?> 
		</div><br>
		<label class="control-label">Asunto:</label>
		<div  class="tab-content">
		<?php  echo $get_contact_form['con_for_iss'];?> 
		</div><br>
			<label class="control-label">Mensaje:</label>

			<div id="myTabContent" class="tab-content">
					<pre><p>
<?php  echo $get_contact_form['con_for_mes'];?> 
					</p></pre>
		</div>
			<div class="form-group hidden-xs">
			  	<label class="control-label">Respuesta:</label>
				<div class="btn-toolbar" data-role="editor-toolbar" data-target=".editor">
					<div class="btn-group">
						<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
							<li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
							<li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
						</ul>
					</div>
					<div class="btn-group">
						<a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
						<a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
						<a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
						<a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
					</div>
					<div class="btn-group">
						<a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
				        <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
				        <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-outdent"></i></a>
				        <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
					</div>
					<div class="btn-group">
				        <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
				        <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
				        <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
				        <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
					</div>
					<div class="btn-group">
		 				<a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
						<div class="dropdown-menu input-append">
							<input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
							<button class="btn" type="button">Add</button>
						</div>
						<a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>

					</div>

					
					<div class="btn-group">
						<a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
				        <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
					</div>
				</div>
			<form action="/sadmin/module/mod_contact_form/process/pro_send_message_user_solve.php" method="post">
				<div class="editor" name="solve_contact">
				     Señor(a): <br>
				     <?php  echo $get_contact_form['con_for_nam'];?><br><br><br><br><br><br>
				     Atentamente:<br>El equipo de Balance y Resultados.
				</div>
			</div>
			<br/>
			<div class="form-actions">
			  <button type="submit" class="btn btn-primary">Enviar Correo</button>
			  <button type="reset" class="btn">Cancelar</button>
			  <?php //Variables ocultas para pasar por post ?>
			  <input type="hidden" value="<?php  echo $get_contact_form['con_for_nam'];?> " name="con_for_nam">
			  <input type="hidden" value="<?php  echo $get_contact_form['con_for_com'];?> " name="con_for_com">
			  <input type="hidden" value="<?php  echo $get_contact_form['con_for_ema'];?> " name="con_for_ema">
			  <input type="hidden" value="<?php  echo $get_contact_form['con_for_iss'];?> " name="con_for_iss">
			  <input type="hidden" value="<?php  echo $get_contact_form['con_for_mes'];?> " name="con_for_mes">
			</div>
		</form>
  

	</div>
</div>