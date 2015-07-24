//FUNCIÓNES EN JAVA QUE PERMITEN CAMBIAR LOS CORREOS ELECTRONICOS DE DONDE VA A LLEGAR LA INFORMACIÓN

		$("#email_frist").click(function() {
			$("#email_frist").css("display","none");
			$("#form_ema_frist").css("display","block");
			$("#con_for_con_pe").focus();		

		});	
		$("#cancel_email_frist").click(function() {
			$("#email_frist").css("display","block");
			$("#form_ema_frist").css("display","none");	
		});

		$("#email_second").click(function() {
			$("#email_second").css("display","none");
			$("#form_ema_second").css("display","block");
			$("#con_for_con_se").focus();		
		
		});	
		$("#cancel_email_second").click(function() {
			$("#email_second").css("display","block");
			$("#form_ema_second").css("display","none");		
		});

//DECLARO FUNCIONES
function validar_email(valor){var filter = /[\w-\.]{3,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;if(filter.test(valor))return true;else return false;}

$("#con_for_con_se").focus(function() {
 if ($("#con_for_con_se").val()=="Email requerido" || $("#con_for_con_se").val()=="Digite un email valido"){
 	$("#con_for_con_se").val("");
 	$("#con_for_con_se").css("background-color","white");
    $("#con_for_con_se").css("color","black"); } 
});

$("#con_for_con_pe").focus(function() {
 if ($("#con_for_con_pe").val()=="Email requerido" || $("#con_for_con_pe").val()=="Digite un email valido"){
 	$("#con_for_con_pe").val("");
 	$("#con_for_con_pe").css("background-color","white");
    $("#con_for_con_pe").css("color","black"); } 
});

//VALIDACIÓN Y AJAX
$('#con_for_con_pe').keypress(function (e) {
  if (e.which == 13) {
     $("#update_primary_email").click(); 
    return false;    //<---- Add this line
  }

});//VALIDACIÓN Y AJAX
$('#con_for_con_se').keypress(function (e) {
  if (e.which == 13) {
     $("#update_second_email").click(); 
    return false;    //<---- Add this line
  }
});

	$("#update_primary_email").click(function() {
	    var ok=0;
	    //OBTENGO LAS VARIABLES    
	    con_for_con_pe =$("#con_for_con_pe").val();
	    option ="update_primary_email";

	    //Valido EMAIL
        if(con_for_con_pe.length==0){$("#con_for_con_pe").val("Email requerido");ok=1;
        $("#con_for_con_pe").css("background-color","rgb(248, 82, 110)");
        $("#con_for_con_pe").css("color","white");$("#con_for_con_se").focus();}else{
        if(!validar_email($("#con_for_con_pe").val())){$("#con_for_con_pe").val("Digite un email valido"); ok=1;
        $("#con_for_con_pe").css("background-color","rgb(248, 82, 110)");
        $("#con_for_con_pe").css("color","white");$("#con_for_con_se").focus();}}
		if(ok==1){return false;}


		$.ajax({
		  	beforeSend:function()
		  	 {
				$("#update_primary_email").html("<i class='fa fa-refresh fa-spin'></i>");
				$("#con_for_con_pe").attr('disabled','disabled');
		   		
		  	 },
		   type: "POST",
		   url: "/sadmin/module/mod_contact_form/process/pro_update_contact_form_config.php",
		   data: {con_for_con_pe:con_for_con_pe,option:option},
		
		   success: function(resp,resp2){   
		   		if (resp=='true'){
		   			$("#update_primary_email").html("<i class='fa fa-check'></i>");
		   			$("#con_for_con_pe").attr('disabled','disabled');
		   			$("#email_frist").val(con_for_con_pe);
		   			$("#email_frist").text(con_for_con_pe);
		   			$("#email_frist").css("display","block");
					$("#form_ema_frist").css("display","none");	
			   		$("#con_for_con_pe").removeAttr('disabled');
	   			}else{
	   				//alert(resp);
		   			$("#update_primary_email").html("<i class='fa fa-frown-o'></i>");
			   		$("#con_for_con_pe").removeAttr('disabled');
		   		};
		   },

		   error: function(jqXHR,estado,error){
		   			if (estado=='timeout'){
		   			$("#update_primary_email").html("<i class='fa fa-frown-o'></i>");
		   		}else{
		   			$("#update_primary_email").html("<i class='fa fa-frown-o'></i>");
			   		$("#con_for_con_pe").removeAttr('disabled');
		   		};
		   },

		    timeout: 10000
	
		  });

    });

	$("#update_second_email").click(function() {


	    var ok=0;
	    //OBTENGO LAS VARIABLES 
	    con_for_con_se =$("#con_for_con_se").val();	
	    option ="update_second_email";


	      //Valido EMAIL
        if(!con_for_con_se.length==0){
        if(!validar_email($("#con_for_con_se").val())){$("#con_for_con_se").val("Digite un email valido"); ok=1;
        $("#con_for_con_se").css("background-color","rgb(248, 82, 110)");
        $("#con_for_con_se").css("color","white");$("#update_second_email").focus();}}

		if(ok==1){return false;}


		$.ajax({
		  	beforeSend:function()
		  	 {
				$("#update_second_email").html("<i class='fa fa-refresh fa-spin'></i>");
				$("#con_for_con_se").attr('disabled','disabled');
		   		
		  	 },
		   type: "POST",
		   url: "/sadmin/module/mod_contact_form/process/pro_update_contact_form_config.php",
		   data: {con_for_con_se:con_for_con_se,option:option},
		
		   success: function(resp,resp2){   
		   		if (resp=='true'){
		   			$("#update_second_email").html("<i class='fa fa-check'></i>");
		   			$("#con_for_con_se").attr('disabled','disabled');
		   			$("#email_second").val(con_for_con_se);
		   			$("#email_second").text(con_for_con_se);
		   			$("#email_second").css("display","block");
					$("#form_ema_second").css("display","none");	
			   		$("#con_for_con_se").removeAttr('disabled');
	   			}else{
	   				//alert(resp);
		   			$("#update_second_email").html("<i class='fa fa-frown-o'></i>");
			   		$("#con_for_con_se").removeAttr('disabled');
		   		};
		   },

		   error: function(jqXHR,estado,error){
		   			if (estado=='timeout'){
		   			$("#update_second_email").html("<i class='fa fa-frown-o'></i>");
		   		}else{
		   			$("#update_second_email").html("<i class='fa fa-frown-o'></i>");
			   		$("#con_for_con_se").removeAttr('disabled');
		   		};
		   },

		    timeout: 10000
	
		  });

	});
