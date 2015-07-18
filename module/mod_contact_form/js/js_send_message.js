$(document).ready(function(){

//DECLARO FUNCIONES
function validar_email(valor){var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;if(filter.test(valor))return true;else return false;}

//LIMPIO SI HE VALIDADO ANTES
$("#con_for_nam").focus(function() {
 if ($("#con_for_nam").val()=="Nombre requerido" || $("#con_for_nam").val()=="Nombre demasiado corto"){
 	$("#con_for_nam").val("");
 	$("#con_for_nam").css("background-color","white");
    $("#con_for_nam").css("color","black"); } 
});

$("#con_for_ema").focus(function() {
 if ($("#con_for_ema").val()=="Email requerido" || $("#con_for_ema").val()=="Digite un email valido"){
 	$("#con_for_ema").val("");
 	$("#con_for_ema").css("background-color","white");
    $("#con_for_ema").css("color","black"); } 
});

$("#con_for_iss").focus(function() {
 if ($("#con_for_iss").val()=="Asunto requerido" || $("#con_for_iss").val()=="Asunto demasiado corto"){
 	$("#con_for_iss").val("");
 	$("#con_for_iss").css("background-color","white");
    $("#con_for_iss").css("color","black"); } 
});

$("#con_for_mes").focus(function() {
 if ($("#con_for_mes").val()=="Mensaje requerido" || $("#con_for_mes").val()=="Mensaje demasiado corto"){
 	$("#con_for_mes").val("");
 	$("#con_for_mes").css("background-color","white");
    $("#con_for_mes").css("color","black"); } 
});


//VALIDACIÓN Y AJAX
$("#contenbotton").html("Enviar");
$('#use_nam, #use_pas').keypress(function (e) {
  if (e.which == 13) {
     $("#send_message").click(); 
    return false;    //<---- Add this line
  }
});

	 $("#send_message").click(function(){	
        heightbutton = $("#contenbotton").height();

        var ok=0;
        //OBTENGO LAS VARIABLES    
        con_for_nam =$("#con_for_nam").val();
        con_for_com =$("#con_for_com").val();
        con_for_ema =$("#con_for_ema").val();
        con_for_iss =$("#con_for_iss").val();
        con_for_mes =$("#con_for_mes").val();


        //VALIDO LAS VARIABLES
        //Valido NOMBRE
		if ($("#con_for_nam").val()=="Nombre requerido" || $("#con_for_nam").val()=="Nombre demasiado corto"){	ok=1;}else{
        if(con_for_nam.length<3){
      	if(con_for_nam.length==0){$("#con_for_nam").val("Nombre requerido");}else{ $("#con_for_nam").val("Nombre demasiado corto");}	
        $("#con_for_nam").css("background-color","#1b1c2e");
        $("#con_for_nam").css("color","white"); ok=1;}}

        //Valido EMAIL
        if(con_for_ema.length==0){$("#con_for_ema").val("Email requerido");ok=1;
        $("#con_for_ema").css("background-color","#1b1c2e");
        $("#con_for_ema").css("color","white");}else{
        if(!validar_email($("#con_for_ema").val())){$("#con_for_ema").val("Digite un email valido"); ok=1;
        $("#con_for_ema").css("background-color","#1b1c2e");
        $("#con_for_ema").css("color","white");}}

        //Valido ASUNTO
		if ($("#con_for_iss").val()=="Asunto requerido" || $("#con_for_iss").val()=="Asunto demasiado corto"){	ok=1;}else{
        if(con_for_iss.length<3){
      	if(con_for_iss.length==0){$("#con_for_iss").val("Asunto requerido");}else{ $("#con_for_iss").val("Asunto demasiado corto");}	
        $("#con_for_iss").css("background-color","#1b1c2e");
        $("#con_for_iss").css("color","white"); ok=1;}}

        //Valido MENSAJE
		if ($("#con_for_mes").val()=="Mensaje requerido" || $("#con_for_mes").val()=="Mensaje demasiado corto"){	ok=1;}else{
        if(con_for_mes.length<=3){
      	if(con_for_mes.length==0){$("#con_for_mes").val("Mensaje requerido");}else{ $("#con_for_mes").val("Mensaje demasiado corto");}	
        $("#con_for_mes").css("background-color","#1b1c2e");
        $("#con_for_mes").css("color","white"); ok=1;}}


 
if(ok==1){return false;}


		  $.ajax({
		  	beforeSend:function()
		  	 {
				$("#contenbotton").html("Enviando...");
				$("#send_message").height(heightbutton);
				$("#send_message").attr('disabled','disabled');
				$("#con_for_nam").attr('disabled','disabled');
		   		$("#con_for_com").attr('disabled','disabled');
		   		$("#con_for_ema").attr('disabled','disabled');
		   		$("#con_for_iss").attr('disabled','disabled');
		   		$("#con_for_mes").attr('disabled','disabled');
		   		
		  	 },
		   type: "POST",
		   url: "/sadmin/module/mod_contact_form/process/pro_add_contact_form.php",
		   data: {con_for_nam:con_for_nam,con_for_com:con_for_com,con_for_ema:con_for_ema,con_for_iss:con_for_iss,con_for_mes:con_for_mes},
		
		   success: function(resp,resp2){   
		   		if (resp=='true'){
			 		$("#respon_contact").html('<div id="wrap_response_mensaje"><div class="response_mesagge">Gracias por contactarnos</div><br><div class="response_mesagge_2">Uno de nuestros asesores le atenderá lo mas pronto posible</div></div>');
					$("#contenbotton").html("Logeado");
		   			$("#send_message").attr('disabled','disabled');
		   			$("#use_pas").attr('disabled','disabled');
		   			$("#use_nam").attr('disabled','disabled');	

	   			}else{
	   				//alert(resp);
		   			$("#msg_send_message").css('display', 'block', 'important');
		   			$("#msg_send_message").attr('class','alert alert-danger');
					$("#msg_send_message").html("Usuario ó Contraseña Incorrectos <button typed='button' onClick='fnOcultar();' class='close'>&times;</button>");
					$("#msg_send_message").css({'margin-bottom':'-12px','margin-top':'10px'});
					$("#contenbotton").html("No pudo ser enviado, intente de nuevo");
		   			$("#send_message").removeAttr('disabled');
		   			$("#use_pas").removeAttr('disabled');
			   		$("#con_for_nam").removeAttr('disabled');
			   		$("#con_for_com").removeAttr('disabled');
			   		$("#con_for_ema").removeAttr('disabled');
			   		$("#con_for_iss").removeAttr('disabled');
			   		$("#con_for_mes").removeAttr('disabled');
		   		};
		   },

		   error: function(jqXHR,estado,error){
		   			if (estado=='timeout'){
		   			$("#msg_send_message").css('display', 'block', 'important');
			 		$("#msg_send_message").html("Tiempo de Espera Agotado <button typed='button' onClick='fnOcultar();' class='close'>&times;</button>");
		   			$("#msg_send_message").attr('class','alert alert-danger');
		   			$("#msg_send_message").css({'margin-bottom':'-12px','margin-top':'10px'});
		   			$("#contenbotton").html("Enviar");
		   			$("#send_message").removeAttr('disabled');
		   			$("#use_pas").removeAttr('disabled');
		   			$("#use_nam").removeAttr('disabled');
		   		}else{
		   			$("#msg_send_message").css('display', 'block', 'important');
		   			$("#msg_send_message").attr('class','alert alert-danger');
					$("#msg_send_message").html(error);
					$("#msg_send_message").css({'margin-bottom':'-12px','margin-top':'10px'});
		   			$("#contenbotton").html("Enviar");
		   			$("#send_message").removeAttr('disabled');
		   			$("#use_pas").removeAttr('disabled');
		   			$("#use_nam").removeAttr('disabled');
		   		};
		   },

		    timeout: 10000
	
		  });

	});
});