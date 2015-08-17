
function loadtable(name_proyect,Json_url,Json_file,Page,Size_page,Order,By,showpreloader){

		var Jurl = Json_url+Json_file;

		$.ajax({
	  	beforeSend:function()
	  	 {
		//Muestro el preload
		if(showpreloader!=1){
			$("#content").LoadingOverlay("show");
		}
	  	 },

	   url: Jurl,
	   type: 'POST',
	   data:({name_proyect:name_proyect, Page:Page, Size_page:Size_page, Order:Order, By:By}),
	   dataType: 'json',
	   //data: {use_nam:use_nam,use_pas:use_pas,name_proyect:name_proyect},
	   success: function(data){   

	   		//Reorganizo los valores
	   		$( "input[name='inputPage']" ).val(Page);
	   		$( "input[name='inputSize_page']" ).val(Size_page);
			$( "input[name='inputOrder']" ).val(Order);
	        $( "input[name='inputBy']" ).val(By);

	   		//Limpio el resultado.
	   		divresponse.html('');
	   			//Si la consulta se hizo correctamente muestro la data, lo contrario el mensaje de error
	   			if(data[1]=='true'){
		   			tableJson(data[0]);
				}else{
					divresponse.html('<tr><td colspan="7"><div class="alert alert-'+data[2]+'">'+data[1]+'</div></td></tr>');						
				}

	   		//Oculto el preload
	   		$("#content").LoadingOverlay("hide");
	   },

	   error: function(jqXHR,estado,error){ //colocar un case
	   		if (estado=='timeout'){
				console.log("Timeout");
	   		}else{
				console.log(jqXHR);
	   		};
	   		$("#content").LoadingOverlay("hide");	
			divresponse.html('');
			divresponse.html('<tr><td colspan="7"><div class="alert alert-danger">'+ JSON.stringify(jqXHR, null, 4)  +'</div></td></tr>');
	   },

	    timeout: 10000

	    /*
	    @@ data[0]- resultset assoc
	    @@ data[1]- Messagge
	    @@ data[2]- Class CSS Messagge
	    */

	  });

}

//LISTAR POR EL ORDEN
$( ".sorting,.sorting_desc,.sorting_asc" ).click(function() {

	var Page =       $( "input[name='inputPage']" ).val();
	var Size_page =  $( "input[name='inputSize_page']" ).val();

	var id =  '#'+$(this).attr('id') ;
	var className = $(id).attr('class');
	By = id.substr(-1);

//	console.log('>'+className+'<');
	$('th').removeClass("sorting_desc").addClass("sorting");
	$('th').removeClass("sorting_asc").addClass("sorting");

	switch(className) {
	    case 'sorting':
			$(id).removeClass( "sorting" ).addClass("sorting_desc");
			Order = 2;
	        break;
	    case "sorting_desc":
			$(id).removeClass( "sorting_desc" ).addClass("sorting_asc");
			Order = 1;
	        break;
	    case "sorting_asc":
			$(id).removeClass( "sorting_asc" ).addClass("sorting_desc");
			Order = 2;
	        break;
	    default:
	       	break;
	}
	//Recargo la Pagina
	loadtable(name_proyect,Json_url,Json_file,Page,Size_page,Order,By);
	

});


//TAMAÑO DE LA PAGINA
$("#selectdisplatrownum").change(function() {

	var Page =       $( "input[name='inputPage']" ).val();
	var Order =      $( "input[name='inputOrder']" ).val();
	var By =         $( "input[name='inputBy']" ).val();

    var Size_page = $(this).val();
	loadtable(name_proyect,Json_url,Json_file,Page,Size_page,Order,By);    
});


/*
//Funcion para determinar en que pagina se ecuentra el listado
function set_page(Page_url,Page,SizePage,Order,By) {

$("#content").LoadingOverlay("show");
 url = Page_url+Page+"/"+SizePage+"/"+Order+"/"+By;
 $(location).attr('href',url);
 
}

//Funcion para determinar el tamaño del listado
function set_size(Page_url,SizePage,Order,By) {
$("#content").LoadingOverlay("show");
 
}

//Funcion para determinar el orden del listado
function set_order(data,url){

$("#content").LoadingOverlay("show");

var str1 = "#order_";
var t_h = str1.concat(data);
var className = $.trim(String($(t_h).attr('class')));

switch(className) {
    case 'sorting':
		$(t_h).removeClass( "sorting" ).addClass("sorting_desc");
		var order = 2;
		var by = data;
        break;
    case "sorting sorting_desc":
		$(t_h).removeClass( "sorting sorting_desc" ).addClass("sorting_asc");
		var order = 1;
		var by = data;
        break;
    case "sorting sorting_asc":
		$(t_h).removeClass( "sorting sorting_asc" ).addClass("sorting_desc");
		var order = 2;
		var by = data;
        break;
    default:
       	break;
}

//alert (order); return;
url = url+"/"+order+"/"+by;

//Redirecciono con el orden
$(location).attr('href',url);

}
*/