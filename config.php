<?php
/*ARCHIVO QUE CONTIENE LAS CONFIGURACIONES DE CONEXION*/

#variables de configuración NO MODIFICAR;
//para usar la funcíón RecordCount , colocar false
$ADODB_COUNTRECS = false;
//debug
$__debug = $_debug;
################################################


####OPCIONES PARA CONEXION

#DONDE SE HOSPEDA LA BASE DE DATOS
$_hostname = "localhost";

#PUERTO PARA CONECTARSE A LA BASE DE DATOS
$_port = "5432";

#NOMBRE DE LA BASE DE DATOS
$_database = "orfeounity";

#USUARIO DE LA BASE DE DATOS
$_username = "postgres";

#CONTRASEÑA DE LA BASE DE DATOS
$_password = "1NfometriK5102";

#DRIVER USADO PARA LA CONEXIÓN.
$_driver = 'postgres'; //oracle , mysql , mysqlite mas drivers en /dbal/drivers

#LA IP PUBLICA EN DONDE SE ALOJA EL PROYECTO
$_urlproyc = "http://localhost/orfeounity/";



##OPCIONES PARA DESARROLLADORES 

#SI ESTA OPCIÓN ESTA TRUE O ACTIVA , REALIZA UN DEBUG AL SISTEMA
$_debug = false;

#SI ESTA OPCION ESTA TRUE O ACTIVA , MUESTRA EL DEBUG DE UNICAMENTE LAS FUNCIONES QUE FALLAN EN UNA CONSULTA PARAMETRIZADA.
$_error_debug = true; // ($response[2]) en el pro_conect.php


#SI ESTA OPCION ESTA TRUE O ACTIVA , ESCRIBE EN UN LOG DE ERRORES EL SQL QUE FALLÓ
$_write_error_log_sql = false;

#PROCEDIMIENTOS

#DEBUG
#si el debug llega verdadero, se omite la configuración inicial. NO MODIFICAR
if($__debug == "true"){
	$_debug=true;
}elseif ($__debug=="false") {
	$_debug=false;
}


?>
