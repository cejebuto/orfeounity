<?php 
#PROCESO PARA TRAER EL ORDER Y EL BY EN EPAGINACIÓN.

	if (!$_GET['order']){
		$class_sorting = "sorting_desc"; //2
	}else if ($_GET['order']==2){
			$class_sorting = "sorting_desc"; //2
		}else if ($_GET['order']==1){
		$class_sorting = "sorting_asc"; //1
	}

if (!$_GET['by']){
	$_GET['by'] = 1;
}
	$_id = $_GET['by']; 

?>