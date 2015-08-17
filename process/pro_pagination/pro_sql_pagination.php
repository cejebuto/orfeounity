<?php
/*
PARA METRIZACION DE PAGINACION
CESAR BUEVAS TORRES
CEJEBUTO@GMAIL.COM
*/

    #Bloque para parametrizar la paginación por defecto.
    if(!$_POST['Page']){$_POST['Page']=1;}
    if(!$_POST['Size_page']){$_POST['Size_page']=10;}
    if(!$_POST['Order']){$_POST['Order']=2;}
    if(!$_POST['By']){$_POST['By']=1;}


	#PROCESO QUE SE INCLUYE EN LA CONSULTA PARA PAGINAR.
    $Page     = intval($_POST['Page']);              //Page
    $SizePage = intval($_POST['Size_page']);         //Limit
    $Order    = intval($_POST['Order']);             //Orden
    $By       = intval($_POST['By']);                //By - number for order

//    echo "@>".$Page." ".$SizePage." ".$Order." ".$By; exit;

    //Parametrizamos 
    if ($SizePage == 0){$SizePage=10;}
    if ($By==0){$By=1;}
    if ($Order==0){$Order=1;} if($Order==1){$_Order=" DESC ";}else{$_Order=" ASC ";}
    if ($Page<=1){$StartPage = 0;$Page = 1;} else {$StartPage = ($Page - 1) * $SizePage;}

?>

