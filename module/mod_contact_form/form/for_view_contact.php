<?php 

#LISTO TODOS LOS CONTACTOS MIENTRAS NO ESTEN ELIMINADOS 
include_once ($_SERVER['DOCUMENT_ROOT']."/sadmin/module/mod_contact_form/sql/sql_list_contact_form.php");
 ?>
 					<div class="box">
						<div class="box-header" data-original-title>
							<h2><i class="fa fa-user"></i><span class="break"></span>Lista de Mensajes </h2>
							<div class="box-icon">
								<a href="/sadmin/contact_form/0/for_config_contact_form"><i class="fa fa-wrench"></i></a>
								<a href="table.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
								<a href="/sadmin"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<div class="box-content">
							<table class="table table-bordered table-hover">
							  <thead>
								  <tr>
									  <th>Nombre</th>
									  <th>Asunto</th>
									  <th>Fecha y Hora</th>
									  <th>Estado</th>
									  <th>Acciones</th>
								  </tr>
							  </thead>   
							  <tbody>
							 	<?php while ($row_list_contact_form=mysqli_fetch_array($sql_list_contact_form)) {	?>
								<tr <?php if ($row_list_contact_form['con_for_vie']<1){ ?> style="font-weight:bold" <?php } ?> >
									<td><?php echo $row_list_contact_form['con_for_nam'] ?></td>
									<td><?php echo $row_list_contact_form['con_for_iss'] ?></td>
									<td><?php echo $row_list_contact_form['con_for_dat'] ?></td>
									<td><?php if ($row_list_contact_form['con_for_vie']<1){ ?><span class="label label-info">Nuevo !</span><?php } ?></td>
									<td>
										<!--<a class="btn btn-success" href="table.html#"><i class="fa fa-eye "></i></a>-->
										<a class="btn btn-info" href="/sadmin/contact_form/1/for_resolve_contact_form/<?php echo $row_list_contact_form['con_for_id'] ?>"><i class="fa fa-edit "></i></a>
										<!--<a class="btn btn-danger" href="table.html#"><i class="fa fa-trash-o "></i></a>-->  
									</td>
								</tr>
								    <?php } mysqli_free_result($sql_list_contact_form); ?> 
							  </tbody>
						  </table>            
						</div>
					</div>


<!--	<script src="/sadmin/style/js/jquery.dataTables.min.js"></script>
	<script src="/sadmin/style/js/dataTables.bootstrap.min.js"></script>
	<script src="/sadmin/style/js/pages/table.js"></script>-->