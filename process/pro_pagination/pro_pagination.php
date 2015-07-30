<?php 
//Si Requiere Paginar
if ($Total_pages > 1) { ?>
	<ul class="pagination">
   	<? if ($Page != 1){ ?>
       <li><a href="<?=$Page_url.($Page-1).'/'.$SizePage.'/'.$Order.'/'.$By?>" title = "Anterior "><i class="fa fa-arrow-left"></i></a></li>
      <?php  }else{ ?>
		<li><a href="#" title = "No hay Anterior "><i class="fa fa-arrow-left" style="color: gray;" ></i></a></li>
      <? }
    for ($i=1;$i<=$Total_pages;$i++) {
         if ($Page == $i){ 
			//si muestro el índice de la página actual, no coloco enlace ?>
            <li class="active"><a href="#"><?=$Page?></a></li>
         <? }else{
            //si el índice no corresponde con la página mostrada actualmente,
            //coloco el enlace para ir a esa página  ?>
            <li><a href="<?=$Page_url.$i.'/'.$SizePage.'/'.$Order.'/'.$By?>"><?=$i?></a></li>
        <? }
      }
      if ($Page != $Total_pages){ ?>
         <li><a href="<?=$Page_url.($Page+1).'/'.$SizePage.'/'.$Order.'/'.$By?>" title = "Siguiente "><i class="fa fa-arrow-right"></i></a></li>
     <? }else{ ?>
		<li><a href="#" title = "No hay Siguiente "><i class="fa fa-arrow-right" style="color: gray;" ></i></a></li>
     <? } ?>
     </ul>
<? } ?>     
     <?php 
     //Traigo los datos del mensaje.
     	$page_ini = $StartPage+1;
     	$page_fin = $StartPage+$SizePage;
     	if($page_fin>$num_row_total){
     		$page_fin = $num_row_total;}
	?>