<?php 

#OBTENGO LOS DATOS DE LA CONFIGURACION DEL ADMINISTRADOR
require $_SERVER['DOCUMENT_ROOT']."/sadmin/module/mod_contact_form/sql/sql_get_contact_form_config.php";


 $headers_admin .= "From:  ".$_POST['con_for_nam']." <".$_POST['con_for_ema'].">\r\n" .
"Cc:".$get_contact_form_config['con_for_con_se'];
 $destinatario_admin .= $get_contact_form_config['con_for_con_pe'];
 $asunto_admin .= "Contacto web Balance y Resultados";
 $cuerpo_admin .= "

 
 Tiene un nuevo mensaje : 

 Nombre :".$_POST['con_for_nam']." 

 Empresa :".$_POST['con_for_com']." 

 Correo :".$_POST['con_for_ema']." 


 Asunto: ".$_POST['con_for_iss']." 

 Mensaje :
 _______________________________________________
  ".$_POST['con_for_mes']." 


";
 mail($destinatario_admin,$asunto_admin,$cuerpo_admin,$headers_admin)  

?>