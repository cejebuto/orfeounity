<?php
function create_file($BYB_NAM_MOD, $BYB_NAM_OPT, $BYB_DIR, $BYB_NAM_FILE, $BYB_HTML_ALL)
{
		#VALIDACION --> EXISTENCIA DEL DIRECTORIO
	if (!is_dir($_SERVER['DOCUMENT_ROOT'].'/module/mod_generateform/modules_generated/')) {
		//VALIDACION --> CREACI�N DEL DIRECTORIO
		if (!mkdir($_SERVER['DOCUMENT_ROOT'].'/module/mod_generateform/modules_generated/',0755)) {
		echo "No se pudo crear el directorio -> modules_generated"; exit;
		}
	}
 	#VALIDACION --> EXISTENCIA DEL DIRECTORIO
	if (!is_dir($_SERVER['DOCUMENT_ROOT'].'/module/mod_generateform/modules_generated/'.$BYB_NAM_MOD.'/')) {
		//VALIDACION --> CREACI�N DEL DIRECTORIO
		if (!mkdir($_SERVER['DOCUMENT_ROOT'].'/module/mod_generateform/modules_generated/'.$BYB_NAM_MOD.'/',0755)) {
		echo "No se pudo crear el directorio -> ".$BYB_NAM_MOD; exit;
		}
	} 
	#VALIDACION --> EXISTENCIA DEL DIRECTORIO
	if (!is_dir($_SERVER['DOCUMENT_ROOT'].'/module/mod_generateform/modules_generated/'.$BYB_NAM_MOD.'/'.$BYB_NAM_OPT.'/')) {
		//VALIDACION --> CREACI�N DEL DIRECTORIO
		if (!mkdir($_SERVER['DOCUMENT_ROOT'].'/module/mod_generateform/modules_generated/'.$BYB_NAM_MOD.'/'.$BYB_NAM_OPT.'/',0755)) {
		echo "No se pudo crear el directorio -> ".$BYB_NAM_OPT; exit;
		}
	}	
	#VALIDACION --> EXISTENCIA DEL DIRECTORIO
	if (!is_dir($_SERVER['DOCUMENT_ROOT'].'/module/mod_generateform/modules_generated/'.$BYB_NAM_MOD.'/'.$BYB_NAM_OPT.'/'.$BYB_DIR.'/')) {
		//VALIDACION --> CREACI�N DEL DIRECTORIO
		if (!mkdir($_SERVER['DOCUMENT_ROOT'].'/module/mod_generateform/modules_generated/'.$BYB_NAM_MOD.'/'.$BYB_NAM_OPT.'/'.$BYB_DIR.'/',0755)) {
		echo "No se pudo crear el directorio -> ".$BYB_DIR; exit;
		}
	}

$BYB_RUTA = $_SERVER['DOCUMENT_ROOT'].'/module/mod_generateform/modules_generated/'.$BYB_NAM_MOD.'/'.$BYB_NAM_OPT.'/'.$BYB_DIR.'/';


 $BYB_NAM_FILE = $BYB_NAM_FILE.".php";
 $nuevoarchivo = fopen($BYB_RUTA.$BYB_NAM_FILE , "w+");

if(fwrite($nuevoarchivo, $BYB_HTML_ALL)){
fclose($nuevoarchivo);
#echo "Documento --> ".$BYB_NAM_FILE."--";
	
}else{
	echo "No se pudo crear el archivo";
}
 
}
?>