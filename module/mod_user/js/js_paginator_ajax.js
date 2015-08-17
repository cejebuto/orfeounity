
function loadtable(name_proyect,Json_url,Json_file,Page,Size_page,Order,By,showpreloader,filter){

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
	   data:({name_proyect:name_proyect, Page:Page, Size_page:Size_page, Order:Order, By:By, filter:filter}),
	   dataType: 'json',
	   //data: {use_nam:use_nam,use_pas:use_pas,name_proyect:name_proyect},
	   success: function(data){   
	   		
	   		//Reorganizo los valores
	   		$( "input[name='inputJson_file']" ).val(Json_file);
	   		$( "input[name='inputPage']" ).val(Page);
	   		$( "input[name='inputSize_page']" ).val(Size_page);
			$( "input[name='inputOrder']" ).val(Order);
	        $( "input[name='inputBy']" ).val(By);

	   		//Limpio el resultado.
	   		divresponse.html('');
	   			//Si la consulta se hizo correctamente muestro la data, lo contrario el mensaje de error
	   			if(data[1]=='true'){
		   			tableJson(data[0]); //LLamo la funcion para mostrar la data
					Total_pages = data[3];
					StartPage   = data[4];
					NumRowTotal = data[5];

					divpagination.html("");
					if (Total_pages > 1) { 
						pagination(Page,Total_pages); //LLamo la funcion que me permite paginar
					}



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
	    @@ data[3]- Total page pagination
	    @@ data[4]- Start Page for Pagination
	    @@ data[5]- Row Number total sql
	    */

	  });

}


function pagination(Page,Total_pages){

var Json_file =  $( "input[name='inputJson_file']" ).val();
var Size_page =  $( "input[name='inputSize_page']" ).val();
var Order =      $( "input[name='inputOrder']" ).val();
var By =         $( "input[name='inputBy']" ).val();

var itemperpage = 10; //Numero de paginadores a mostrar

//CREO LA VARIABLE PARA PAGINAR
var start = parseInt(Page)-(itemperpage/2);
var end = parseInt(Page)+(itemperpage/2);
var arrpages =[];
var j=0;

if(start<0){end=end +(start*-1); start=1;}
if(end>=Total_pages-1){start=start-(end-Total_pages-1);end=Total_pages;}

for (var i = start ;i<=end;i++) {
	if(j<itemperpage){
		arrpages[j] = start; j++; start++;
	}
};

divpagination.html("");

var htmlpag   = "<ul id='ulpagination' class='pagination'>";

	if(Page!=1)	{
		i=parseInt(Page)-1;
		htmlpag = htmlpag + "<li><a  onclick='loadtable(name_proyect,Json_url,Json_file,"+1+","+Size_page+","+Order+","+By+")' style='cursor:pointer;'title = 'Ir al Inicio '><i class='fa fa-arrow-left'></i></a></li>";
		htmlpag = htmlpag + "<li><a  onclick='loadtable(name_proyect,Json_url,Json_file,"+i+","+Size_page+","+Order+","+By+")' style='cursor:pointer;'title = 'Anterior '><i class='fa fa-chevron-left'></i></a></li>";
	}else{
		htmlpag = htmlpag + "<li><a  title = 'No hay Anteriores '><i class='fa fa-arrow-left' style='color: gray;'></i></a></li>";
		htmlpag = htmlpag + "<li><a  title = 'No hay Anterior '><i class='fa fa-chevron-left' style='color: gray;'></i></a></li>";
	}
	for (var i=1;i<=Total_pages;i++) {
		if (arrpages.indexOf(i)!=-1) {
			if (Page == i){ 
				htmlpag = htmlpag +" <li class='active'><a >"+i+"</a></li>";
			}else{
				htmlpag = htmlpag +" <li class=''><a onclick='loadtable(name_proyect,Json_url,Json_file,"+i+","+Size_page+","+Order+","+By+")' style='cursor:pointer;'>"+i+"</a></li>";
			}
		};
	};
	if(Page!=Total_pages)	{
		i=parseInt(Page)+1;
		htmlpag = htmlpag + "<li><a  onclick='loadtable(name_proyect,Json_url,Json_file,"+i+","+Size_page+","+Order+","+By+")'  style='cursor:pointer;'title = 'Siguiente '><i class='fa fa-chevron-right'></i></a></li>";
		if(itemperpage<=Total_pages){
			htmlpag = htmlpag + "<li><a  onclick='loadtable(name_proyect,Json_url,Json_file,"+Total_pages+","+Size_page+","+Order+","+By+")'  style='cursor:pointer;'title = 'Siguiente '><i class='fa fa-arrow-right'></i> "+Total_pages+"</a></li>";
			}
	}else{
		htmlpag = htmlpag + "<li><a title = 'No hay Siguiente '><i class='fa fa-chevron-right' style='color: gray;'></i></a></li>";
		if(itemperpage<=Total_pages){
			htmlpag = htmlpag + "<li><a title = 'No hay Siguientes '  style='color: gray;'><i class='fa fa-arrow-right' style='color: gray;'></i>" +Total_pages+ "</a></li>";
		}
	}

htmlpag = htmlpag +" </ul>";

divpagination.html(htmlpag);
}




//LISTAR POR EL ORDEN
$( ".sorting,.sorting_desc,.sorting_asc" ).click(function() {
	
	var Json_file =  $( "input[name='inputJson_file']" ).val();
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
	    	$(id).removeClass( "sorting" );
			$(id).removeClass( "sorting_desc" ).addClass("sorting_asc");
			Order = 1;
	        break;
	    case "sorting_asc":
	    	$(id).removeClass( "sorting" );
			$(id).removeClass( "sorting sorting_asc" ).addClass("sorting_desc");
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

	var Json_file =  $( "input[name='inputJson_file']" ).val();
	var Page =       $( "input[name='inputPage']" ).val();
	var Order =      $( "input[name='inputOrder']" ).val();
	var By =         $( "input[name='inputBy']" ).val();

	if(Page>=1){Page=1}

    var Size_page = $(this).val();
	loadtable(name_proyect,Json_url,Json_file,Page,Size_page,Order,By);    
});

//Busqueda Rapida
$("input[name=search_fast]").on('keyup', function() {
	var value = $(this).val();
	if(value.length>=3){

			$( "input[name='inputJson_file']" ).val('pro_filter_user.php');
			var Json_file = $( "input[name='inputJson_file']" ).val();
			var Size_page =  $( "input[name='inputSize_page']" ).val();
			var Page =       $( "input[name='inputPage']" ).val();
			var Order =      $( "input[name='inputOrder']" ).val();
			var By =         $( "input[name='inputBy']" ).val();
		
			loadtable(name_proyect,Json_url,Json_file,Page,Size_page,Order,By,1,value); 

	//console.log(value);	
	}else if(value.length==0){
		$( "input[name='inputJson_file']" ).val('pro_list_user.php');
		var Json_file = $( "input[name='inputJson_file']" ).val();

		var Size_page =  $( "input[name='inputSize_page']" ).val();
		var Page =       $( "input[name='inputPage']" ).val();
		var Order =      $( "input[name='inputOrder']" ).val();
		var By =         $( "input[name='inputBy']" ).val();
	loadtable(name_proyect,Json_url,Json_file,Page,Size_page,Order,By); 
	}
});

