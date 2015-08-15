<?php

	#PROCESO QUE SE INCLUYE EN LA CONSULTA PARA PAGINAR.
    $Page_url = "/$name_proyect/".$_GET['url_module']."/sgd/".$_GET['option']."/lst/";
    $Page = intval($_GET['page']); //Page
    $SizePage = intval($_GET['size']); if ($SizePage == 0){$SizePage=10;}//Limit
    $Order = intval($_GET['order']); //Orden
    $By = intval($_GET['by']); //By - por que numero se ordena
    if($By==0){$By=1;}
    if($Order==0){$Order=1;} if($Order==1){$_Order=" DESC ";}else{$_Order=" ASC ";}
    if ($Page<=1){$StartPage = 0;$Page = 1;} else {$StartPage = ($Page - 1) * $SizePage;}
    $Page_url_order = "/$name_proyect/".$_GET['url_module']."/sgd/".$_GET['option']."/lst/".$_GET['page']."/".$_GET['size'];

