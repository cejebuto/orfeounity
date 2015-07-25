<?php #echo "holi , estoy en el formulario"; exit; ?>
<html lang="es">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
  <script src="/<?=$name_proyect?>/js/jquery.js"></script>


  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- start: CSS -->
  <link href="/<?=$name_proyect?>/style/css/bootstrap.min.css" rel="stylesheet">
  <link href="/<?=$name_proyect?>/style/css/style.min.css" rel="stylesheet">
  <!--<link href="/<?=$name_proyect?>/style/css/retina.min.css" rel="stylesheet">
  <link href="/<?=$name_proyect?>/style/css/print.css" rel="stylesheet" type="text/css" media="print"/>-->
  <!-- end: CSS -->
  
 </head>
<!--=================================================================================  SCRIPTS ================================================== -->
<script language=JavaScript>
  function fnOcultar()
{
document.getElementById("msg_login").style.display = 'none';
document.getElementById("use_nam").focus();
}
 </script>
<!--=================================================================================  SCRIPTS ================================================== background="img/COE LOGO.png" -->
		<div class="container">
		<div class="row">
				<div id="content2" class="col-sm-12 full">
			
			<div class="row">

				<div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 login-box-locked" id="byb_fromlogin"style="margin-top:180;">
					
					<img src="/<?=$name_proyect?>/style/img/gallery/photo7.jpg" class="avatar"/>
          <fieldset>
             <form action="./" method="post" autocomplete="off">
      					<div class="input-prepend input-group">
      						<input id="use_nam" name ="use_nam" class="form-control"  type="text" placeholder="Usuario" autofocus><br><br>
      						<input id="use_pas" name ="use_pas" class="form-control"  type="password" placeholder="Contraseña"><br>
      				 	</div>
      				 	<button type="button" id="login" name="login" class="btn btn-primary" style="margin-top:14;"><div id="contenbotton"></div></button>
               
            </form>    
          </fieldset>

          <div>
					<!--<a href="#">Olvide mi contraseña</a>
					<a href="#">Acerca de este Software</a>-->
          </div>
          <div id="msg_login"></div>
				</div><!--/col-->
			</div><!--/row-->
		</div><!--/content-->	
			
				</div><!--/row-->		
		
	</div><!--/container-->
  
  <!-- page scripts -->
  <!-- theme scripts -->

  <!-- inline scripts related to this page -->
  <script src="/<?=$name_proyect?>/style/js/jquery.backstretch.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/pages/page-lockscreen.js"></script>
	<!-- end: JavaScript-->
  <!-- Le coloco el nombre al proyecto-->
   <script> var name_proyect = "<?php echo $name_proyect;?>" ;</script>
   
   <script src="/<?=$name_proyect?>/js/js_login/js_login.js"></script>
</body>
</html>
