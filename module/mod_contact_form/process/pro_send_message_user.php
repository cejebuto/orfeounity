<?php 
 $headers .= "From: Balance y Resultados <no-reply@balanceyresultados.com>\r\n";  
 $destinatario=$_POST['con_for_ema'];
 $asunto .= "Su mensaje ha sido recibido";
 $cuerpo .= "

 Hola ".$_POST['con_for_nam']." !!

 Gracias por contactar a nuestro equipo.

 Pronto le atenderemos su consulta.


 Atentamente: balanceyresultados.com";
 mail($destinatario,$asunto,$cuerpo,$headers)  
?>