
//Funcion para determinar en que pagina se ecuentra el listado
function set_page(Page_url,Page,SizePage,Order,By) {
	
	$("#id_list").LoadingOverlay("show");
     url = Page_url+Page+"/"+SizePage+"/"+Order+"/"+By;
     $(location).attr('href',url);
     
}

//Funcion para determinar el tamaño del listado
function set_size(Page_url,SizePage,Order,By) {
	$("#id_list").LoadingOverlay("show");
     
}

//Funcion para determinar el orden del listado
function set_order(data,url){

	$("#id_list").LoadingOverlay("show");
	
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