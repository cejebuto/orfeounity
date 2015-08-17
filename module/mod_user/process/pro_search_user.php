<?php 
//Proceso para buscar por ajax
//Asignarles valores a las variables locales.


$name_proyect = $_POST['name_proyect'];
$name_module = $_POST['name_module'];

#INCLUYO FUNCION PARA LIMPIAR LAS VARIABLES
require $_SERVER['DOCUMENT_ROOT'].'/'.$name_proyect."/function/fun_string/fun_clean_string.php";


#DATOS DEL FORMULARIO
$use_dat = $_POST['use_dat'];
$per_pro_dat_bor = $_POST['per_pro_dat_bor'];
$use_nam = $_POST['use_nam'];
$per_pro_id = $_POST['per_pro_id'];
$per_pro_nam = $_POST['per_pro_nam'];
$per_pro_sur = $_POST['per_pro_sur'];
$per_pro_ema = $_POST['per_pro_ema'];
$use_est = $_POST['use_est'];
$per_pro_dep = $_POST['per_pro_dep'];
$use_ldap = $_POST['use_ldap'];

##################
#CHEKEO SI SE INCLUYE EN LA CONSULTA
$ck_use_dat = $_POST['ck_use_dat']; if ($ck_use_dat!='on'){$ck_use_dat='off';}
$ck_per_pro_dat_bor = $_POST['ck_per_pro_dat_bor'];if ($ck_per_pro_dat_bor!='on'){$ck_per_pro_dat_bor='off';}
$ck_use_nam = $_POST['ck_use_nam']; if ($ck_use_nam!='on'){$ck_use_nam='off';}
$ck_per_pro_id = $_POST['ck_per_pro_id']; if ($ck_per_pro_id!='on'){$ck_per_pro_id='off';}
$ck_per_pro_nam = $_POST['ck_per_pro_nam']; if ($ck_per_pro_nam!='on'){$ck_per_pro_nam='off';}
$ck_per_pro_sur = $_POST['ck_per_pro_sur']; if ($ck_per_pro_sur!='on'){$ck_per_pro_sur='off';}
$ck_per_pro_ema = $_POST['ck_per_pro_ema']; if ($ck_per_pro_ema!='on'){$ck_per_pro_ema='off';}
$ck_use_est = $_POST['ck_use_est']; if ($ck_use_est!='on'){$ck_use_est='off';}
$ck_per_pro_dep = $_POST['ck_per_pro_dep']; if ($ck_per_pro_dep!='on'){$ck_per_pro_dep='off';}
$ck_use_ldap = $_POST['ck_use_ldap']; if ($ck_use_ldap!='on'){$ck_use_ldap='off';}
#######################


#Limpio las variables
$use_dat = strtoupper(clean_string($use_dat));
$per_pro_dat_bor = strtoupper(clean_string($per_pro_dat_bor));
$use_nam = strtoupper(clean_string($use_nam));
$per_pro_id = strtoupper(clean_string($per_pro_id));
$per_pro_nam = strtoupper(clean_string($per_pro_nam));
$per_pro_sur = strtoupper(clean_string($per_pro_sur));
$per_pro_ema = strtoupper(clean_string($per_pro_ema));
$use_est = strtoupper(clean_string($use_est));
$per_pro_dep = strtoupper(clean_string($per_pro_dep));
$use_ldap = strtoupper(clean_string($use_ldap));


#INCLUYO LA CONSULTA PARA GENERAR EL RESULTADO 
	require_once $_SERVER['DOCUMENT_ROOT'].'/'.$name_proyect."/module/mod_".$name_module."/sql/sql_search_user.php";


echo "->".$use_dat ."\n";
echo "->".$per_pro_dat_bor ."\n";
echo "->".$use_nam ."\n";
echo "->".$per_pro_id ."\n";
echo "->".$per_pro_nam ."\n";
echo "->".$per_pro_sur ."\n";
echo "->".$per_pro_ema ."\n";
echo "->".$use_est ."\n";
echo "->".$per_pro_dep ."\n";
echo "->".$use_ldap ."\n";

echo "---------------------\n";

echo "->".$ck_use_dat ."\n";
echo "->".$ck_per_pro_dat_bor ."\n";
echo "->".$ck_use_nam ."\n";
echo "->".$ck_per_pro_id ."\n";
echo "->".$ck_per_pro_nam ."\n";
echo "->".$ck_per_pro_sur ."\n";
echo "->".$ck_per_pro_ema ."\n";
echo "->".$ck_use_est ."\n";
echo "->".$ck_per_pro_dep ."\n";
echo "->".$ck_use_ldap ."\n";

 exit;
?>