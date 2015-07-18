<?php 

#OBTENGO LOS DATOS DE LA CONFIGURACION DEL ADMINISTRADOR
require $_SERVER['DOCUMENT_ROOT']."/sadmin/module/mod_contact_form/sql/sql_get_contact_form_config.php";


 $headers_user .= "From:  Contacto <".$get_contact_form_config['con_for_con_pe'].">\r\n" .
 $destinatario_user .= $_POST['con_for_ema'];
 $asunto_user .= "Solicitud Resuelta Balance y Resultados";
 $cuerpo_user .= "

".$_POST['solve_contact']." 


 --------------------------------------------------------
 Su mensaje : 

 Nombre :".$_POST['con_for_nam']." 

 Empresa :".$_POST['con_for_com']." 

 Correo :".$_POST['con_for_ema']." 


 Asunto: ".$_POST['con_for_iss']." 

 Mensaje :
  ".$_POST['con_for_mes']." 


";

echo $headers_user; exit;
 mail($destinatario_user,$asunto_user,$cuerpo_user,$headers_user)  

?>