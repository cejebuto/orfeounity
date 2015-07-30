<?php 
   #Incluimos el archivo de configuración
   require '../../config_ini.php';
session_start();
session_unset($_SESSION['use_id']);
session_unset($_SESSION['use_nam']);
session_unset($_SESSION['use_pas']);
session_unset($_SESSION['use_est']);
session_unset($_SESSION['id']);
session_destroy();
header("location:/$name_proyect/");
?>