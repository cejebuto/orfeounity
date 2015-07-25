<?php
session_start();
ini_set("display_errors", 1); 
$name_proyect = $_POST['name_proyect'];

#INCLUIMOS LA CONEXION A LA BASE DE DATOS
require_once $_SERVER['DOCUMENT_ROOT'].'/'.$name_proyect.'/process/pro_connect/pro_connect.php';
$connectdb=connecttodb($name_proyect); 
$ifconexion = $connectdb[1];
$db =  $connectdb[0];

//comprobamos si existe la conexión.
if ($ifconexion == false){
    $_Msg_response = $db;    

//Si existe la conexión, procedemos a validar.
}else{ //ifconexion

    $use_nam = $_POST['use_nam'];
    //COMPROBAMOS SI EL USARIO USA LDAP O NO //COLOCAR EL MESAJES SI ESTA  BANEADO Ó O INACTIVO PARA LDAP
    $query = "SELECT  
        use_ldap
    FROM
        sgd_user
    WHERE 
        use_nam='".$use_nam."'";
    //Ejecuto la consulta
    $rs = $db->Execute($query);
    //Compruebo la consulta
    if (!$rs){ //comprobarconsulta
            $_Msg_response = "Ocurrió un error procesando los datos, contacte con el administrador del sistema : LG01";
    }else{ //comprobarconsulta
        $num_row_connect = $rs->RecordCount(); 
        if( $num_row_connect == 1 ) { // Si hay un solo registro procedo a ingresar al aplicativo //rscount1
            //Si el usuario tiene t o verdadero, procedemos a traer el dato de ldap
            if ($use_ldap= $rs->fields["use_ldap"]=='t'){ //ifisldap
                $use_pas = $_POST['use_pas'];
                //Incluimos Conexión con LDAP 
                $_Msg_response = "Servidor LDAP no configurado";
                //INCLUIMOS LA CONFIGURACION NECESARIA PARA CONECTARSE CON LDAP
            }else{ //ifisldap


                //Si no tiene LDAP , Procedemos a conectarnos por el usuario de la base de datos
                $use_pas = md5($_POST['use_pas']);
                //Query para traer el usuario.
                $query = "SELECT  
                    use_id,
                    use_nam,
                    use_pas,
                    use_est 
                FROM
                    sgd_user
                WHERE 
                    use_nam='".$use_nam."' 
                    AND use_pas='".$use_pas."'";
                //Ejecuto la consulta
                $rs = $db->Execute($query);
                //Compruebo la consulta
                if (!$rs){
                    $_Msg_response = "Ocurrió un error procesando los datos, contacte con el administrador del sistema : LG02";
                }else{
                    //Si se construyó correctamente la consulta
                    //Cuento las Filas.
                    $num_row_connect = $rs->RecordCount(); 
                    if( $num_row_connect == 1 ) { // Si hay un solo registro procedo a ingresar al aplicativo  //rownunconet  ESTO EN UNA FUNCION
                        //Comprobamos si el usuario esta activo o no.
                        switch ($rs->fields["use_est"]) {
                            case 'A': //Activo
                                $_Msg_response = 'true';
                                $_SESSION['id'] = md5(session_id()); 
                                $_SESSION['use_id'] =  $rs->fields["use_id"];
                                $_SESSION['use_nam'] = $rs->fields["use_nam"];
                                $_SESSION['use_est'] = $rs->fields["use_est"];
                                break;
                            case 'I':
                                $_Msg_response = "Usuario Inactivo";
                                session_destroy();
                                break;
                            case 'B':
                                $_Msg_response = "Usuario Baneado";
                                session_destroy();
                                break;
                            case 'S':
                                $_Msg_response = "Usuario Suspendido";
                                session_destroy();
                                break;
                            case 'N':
                                $_Msg_response = "Usuario con datos insuficientes";
                                session_destroy();
                                break;
                            default:
                                $_Msg_response = "Error al procesar el usuario";
                                break;
                        }
                    } else{ //rownunconet
                        $_Msg_response = "Usuario ó Contraseña Incorrectos";
                    }// fin de contar filas   //rownunconet
                } // fin de comprobar la consulta


            } //ifisldap
        } else{ //rscount1 else de contar filas
            $_Msg_response = "Usuario ó Contraseña Incorrectos";
        }// fin de contar filas 

    } //Fin de Comprobar la consulta //comprobarconsulta
} //fin ifconexion

echo $_Msg_response;
//Cerramos la conexión.
unset($rs);
$db->Close();
?>
