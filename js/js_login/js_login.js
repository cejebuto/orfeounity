$(document).ready(function(){

$("#contenbotton").html("Entrar");
//$("#msg_login").click(function(){$('#msg_login').slideUp(200);});
$('#use_nam, #use_pas').keypress(function (e) {
  if (e.which == 13) {
     $("#login").click(); 
    return false;    //<---- Add this line
  }
});

	 $("#login").click(function(){	
        heightbutton = $("#contenbotton").height();

		  use_nam=$("#use_nam").val();
		  use_pas=$("#use_pas").val();

		  $.ajax({
		  	beforeSend:function()
		  	 {
				$("#contenbotton").html("<i class='fa fa-refresh fa-spin'></i>");
				$("#contenbotton").height(heightbutton);
				$("#login").attr('disabled','disabled');
				$("#use_pas").attr('disabled','disabled');
		   		$("#use_nam").attr('disabled','disabled');
		  	 },
		   type: "POST",
		   url: "/"+name_proyect+"/sql/sql_login/sql_login.php",
		   data: {use_nam:use_nam,use_pas:use_pas,name_proyect:name_proyect},
		
		   success: function(resp,resp2){   
		   		if (resp=='true'){
		   			$("#msg_login").css('display', 'block', 'important');
		   			$("#msg_login").attr('class','alert alert-success');
			 		$("#msg_login").html("Logeado Correctamente <button typed='button' onClick='fnOcultar();' class='close'>&times;</button>");
			 		$("#msg_login").css({'margin-bottom':'-12px','margin-top':'10px'});
					$("#contenbotton").html("Logeado");
		   			$("#login").attr('disabled','disabled');
		   			$("#use_pas").attr('disabled','disabled');
		   			$("#use_nam").attr('disabled','disabled');	
		   			document.location.href='/';
		   			location.reload();
	   			}else{
	   				var respmensaje = resp;
	   				//alert(resp);
		   			$("#msg_login").css('display', 'block', 'important');
		   			$("#msg_login").attr('class','alert alert-danger');
					$("#msg_login").html(respmensaje.concat("<button typed='button' onClick='fnOcultar();' class='close'>&times;</button>"));
					$("#msg_login").css({'margin-bottom':'-12px','margin-top':'10px'});
					$("#contenbotton").html("Entrar");
		   			$("#login").removeAttr('disabled');
		   			$("#use_pas").removeAttr('disabled');
		   			$("#use_nam").removeAttr('disabled');
		   			$("#use_nam").focus();
		   		};
		   },

		   error: function(jqXHR,estado,error){ //colocar un case
		   			if (estado=='timeout'){
		   			$("#msg_login").css('display', 'block', 'important');
			 		$("#msg_login").html("Tiempo de Espera Agotado <button typed='button' onClick='fnOcultar();' class='close'>&times;</button>");
		   			$("#msg_login").attr('class','alert alert-danger');
		   			$("#msg_login").css({'margin-bottom':'-12px','margin-top':'10px'});
		   			$("#contenbotton").html("Entrar");
		   			$("#login").removeAttr('disabled');
		   			$("#use_pas").removeAttr('disabled');
		   			$("#use_nam").removeAttr('disabled');
		   		}else{
		   			$("#msg_login").css('display', 'block', 'important');
		   			$("#msg_login").attr('class','alert alert-danger');
		   			if (error=='Not Found'){error="config_ini mal configurado";}
		   			if (error=='Internal Server Error'){error="Error en la Conexión a la Base de Datos";}
		   			$("#msg_login").html(error);
					$("#msg_login").css({'margin-bottom':'-12px','margin-top':'10px'});
		   			$("#contenbotton").html("Entrar");
		   			$("#login").removeAttr('disabled');
		   			$("#use_pas").removeAttr('disabled');
		   			$("#use_nam").removeAttr('disabled');
		   		};
		   },

		    timeout: 10000
	
		  });

	});
});