<?php 

//Valores Iniciales:
$Json_file = "pro_list_user.php";
$Json_url = "/$name_proyect/module/mod_".$_GET['url_module']."/process/";

$Page = 1; //Comenzar en la pagina uno
$Size_page = 10; //Mostrar por defecto 10 resultados
$Order = 2;    //1 / manera Desendente , 2 manera Asendente
$By = 1; //Ordenar por el primer registro No.

?>
 
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
  	<select id="selectdisplatrownum" name "" class="form-control" title="Numero de registros a mostrar">
  		<option value ='5' >5</option>
  		<option value ='10' >10</option>
		<option value ='25' >25</option>
		<option value ='50' >50</option>
		<option value ='100' >100</option>
		<option value ='200' >200</option>
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
			  <th id="order_1" class ="sorting_desc" >Id</th>
			  <th id="order_2" class ="sorting" >Fecha de Creación</th>
			  <th id="order_3" class ="sorting" >Usuario</th>
			  <th id="order_4" class ="sorting" >Nombre</th>
			  <th id="order_5" class ="sorting" >Identificación</th>
			  <th id="order_6" class ="sorting" >Email</th>
			  <th id="order_7" class ="sorting" >Estado</th>
		  </tr>
	  </thead>   
	  <tbody id="listdata" ></tbody>
  </table>            


<div id ="pagination"><div>

<?php if ($_Msg_response == 'true'){ ?>
<?php //si requiere exportar ?>
	  <ul class="pagination">
		<li><a href="#" title = "Exportar a PDF "><i class="fa fa-file-pdf-o" style="color:#BE1111;" ></i></a></li>
		<li><a href="#" title = "Exportar a Excel  "><i class="fa fa-file-excel-o" style="color:#2EBE11;" ></i></a></li>
		<li><a href="#" title = "Exportar a CSV  "><i class="fa fa-file-code-o" style="color:#BEAD11;" ></i></a></li>
	  </ul>
<?php } ?>

<?php // Si Pagina correctamente muestre el mensaje. hidden
if ($_show_messagge == 'true'){ ?>
<div class="alert alert-info" style = "padding:0px;margin-top:-18px;"><font style="font-size:10px">Mostrando de <?=$page_ini?> a <?=$page_fin?> Registros de, <?=$num_row_total?> en total</font></div>
<?php } ?>
</div>
</div>

<input type="hidden" value="<?=$Page?>" name="inputPage"/>
<input type="hidden" value="<?=$Size_page?>" name="inputSize_page"/>
<input type="hidden" value="<?=$Order?>" name="inputOrder"/>
<input type="hidden" value="<?=$By?>" name="inputBy"/>

<script type="text/javascript">
//Declaro donde se va a responder la tabla.
var divresponse = $("#listdata");
var divpagination = $("#pagination");

//Declaro valores principales de la paginacion
var Json_file = '<?=$Json_file?>';
var Json_url = '<?=$Json_url?>';

var Page =       $( "input[name='inputPage']" ).val();
var Size_page =  $( "input[name='inputSize_page']" ).val();
var Order =      $( "input[name='inputOrder']" ).val();
var By =         $( "input[name='inputBy']" ).val();



  $( document ).ready(function() {
  	
  	//Obtenemos el tamaño de la pagina por defecto para el select
	$("#selectdisplatrownum").val(Size_page);

	//Incluimos el script de preloader
	$.getScript( "/<?=$name_proyect?>/module/mod_<?=$_GET['url_module']?>/js/loadingoverlay.js" )
  		.done(function( script, textStatus ) { console.log('%c loadingoverlay.js OK ', 'color: #088A29');

		  	//Incluimos el script que permite la paginación.
			$.getScript( "/<?=$name_proyect?>/module/mod_<?=$_GET['url_module']?>/js/js_paginator_ajax.js" )
		  		.done(function( script, textStatus ) { console.log('%c js_paginator_ajax.js OK ', 'color: #088A29'); 
		  			//Cargamos por primera vez los datos
		  			loadtable(name_proyect,Json_url,Json_file,Page,Size_page,Order,By); })
		  		.fail(function( jqxhr, settings, exception ) {console.log('%c No se pudo cargar -> js_paginator_ajax.js', 'background: #222; color: #ffffff');});

  		 })
  		.fail(function( jqxhr, settings, exception ) {console.log('%c No se pudo cargar -> loadingoverlay.js', 'background: #222; color: #ffffff');});


  		tableJson = function(data) {
  			$.each(data, function(key, value) {
  					//Evito que aparesca nulo en estos campos.
  					if(value['nombre']==null){value['nombre']='';}
  					if(value['per_pro_id']==null){value['per_pro_id']='';}
  					if(value['per_pro_ema']==null){value['per_pro_ema']='';}

  				var estado, label;

  				switch (value['use_est']) {
			    	case 'A':  estado = "Activo";  label = "label label-success"; break;
			    	case 'I':  estado = "Inactivo";  label = "label label-default"; break;
			    	case 'B':  estado = "Baneado";  label = "label label-info"; break;
			    	case 'S':  estado = "Suspendido";  label = "label label-danger"; break;
			    	case 'N':  estado = "Incompleto";   label = "label label-warning"; break;
			    	default:   estado = "Desconocido";  label = "label label-primary";
				}

			 	var datos   = "	<tr style='cursor:pointer;'>"
				 				+" <td> "+ value['use_id'] +" </td>"
				 				+" <td> "+ value['use_dat']+" </td>"
				 				+" <td> "+ value['use_nam'] +" </td>"
				 				+" <td> "+ value['nombre'] +" </td>"
				 				+" <td> "+ value['per_pro_id'] +" </td>"
				 				+" <td> "+ value['per_pro_ema'] +" </td>"
				 				+" <td> <span class='"+label+"'>"+ estado +"</span></td>"
				 		 +"	 </tr>";
				 		divresponse.append(datos);
  			}); // Fin each

  		} //Fin funcion tablejson

  	});

</script>
