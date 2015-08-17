$.ajax({
		  	beforeSend:function()
		  	 {
			console.log("antes de enviar");
		  	 },
		   type: "POST",
		   url: "/"+name_proyect+"/sql/sql_login/sql_login.php",
		   data: {use_nam:use_nam,use_pas:use_pas,name_proyect:name_proyect},
		
		   success: function(resp,resp2){   
		   		if (resp=='true'){
					console.log(resp);
	   			}else{
	   				var respmensaje = resp;
					console.log(respmensaje);
		   		};
		   },

		   error: function(jqXHR,estado,error){ //colocar un case
		   		if (estado=='timeout'){
					console.log("Timeout");
		   		}else{
					console.log(error);
		   		};
		   },

		    timeout: 10000
	
		  });
