<?php 
ini_set("display_errors", 1); 
require 'config_ini.php';

session_start();
if (!isset($_SESSION['id'])){ ?>
<?php 
  require $_SERVER['DOCUMENT_ROOT']."/$name_proyect/form/for_login/for_login.php";
?>
<?php }else{ ?>
<!DOCTYPE html>
<html lang="es">
<head>

  <!-- start: Meta -->
  <meta charset="utf-8">
  <title>Orfeo Unity</title>
  <meta name="description" content="Sistema de Gestión De Información , Administrador de Contenidos,Sistema de Gestiòn Documental">
  <meta name="author" content="Cesar Buelvas Torres">
  <!-- end: Meta -->
  
  <!-- start: Mobile Specific -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- end: Mobile Specific -->
  
  <!-- start: CSS -->
  <link href="/<?=$name_proyect?>/style/css/bootstrap.min.css" rel="stylesheet">
  <link href="/<?=$name_proyect?>/style/css/style.min.css" rel="stylesheet">
  <link href="/<?=$name_proyect?>/style/css/retina.min.css" rel="stylesheet">
  <link href="/<?=$name_proyect?>/style/css/print.css" rel="stylesheet" type="text/css" media="print"/>
  <!-- end: CSS -->
  

  <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="/<?=$name_proyect?>/style/js/respond.min.js"></script>
    
  <![endif]-->
  
  <!-- start: Favicon and Touch Icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/<?=$name_proyect?>/style/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/<?=$name_proyect?>/style/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/<?=$name_proyect?>/style/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/<?=$name_proyect?>/style/ico/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="/<?=$name_proyect?>/style/ico/favicon.png">
  <!-- end: Favicon and Touch Icons --> 
    
</head>

<body class = 'sidebar-minified'>
    <!-- start: Header -->
  <header class="navbar">
  <?php require $_SERVER['DOCUMENT_ROOT']."/$name_proyect/form/for_header/for_header.php";?>
  </header>
  <!-- end: Header -->
  
    <div class="container">
    <div class="row">
        
      <!-- start: Main Menu /col-lg-2 col-sm-1 / col-lg-2 col-sm-1 minified -->
      <div id="sidebar-left" class="col-lg-2 col-sm-1 minified">
                
        <div class="sidebar-nav nav-collapse collapse navbar-collapse">
          <ul class="nav main-menu">
          <?php require $_SERVER['DOCUMENT_ROOT']."/$name_proyect/form/for_menu/for_menu.php";?>
          </ul>
        </div>    <!-- main menu / full visible-md visible-lg / col-lg-10 col-sm-11 sidebar-minified minified //// fa fa-angle-double-left / fa fa-angle-double-right-->
              
      <a href="#" id="main-menu-min" class="col-lg-10 col-sm-11 sidebar-minified minified"><i class="fa fa-angle-double-right"></i></a>
      
      </div>
      <!-- end: Main Menu -->
            
      <!-- start: Content / col-lg-10 col-sm-11 / col-lg-10 col-sm-11 sidebar-minified-->
      <div id="content" style ='padding-top:0px;' class="col-lg-10 col-sm-11 sidebar-minified">

      <?php // INCLUYO JQUERY PARA LOS MODULOS ?>
      <script src="/<?=$name_proyect?>/style/js/jquery-2.1.0.min.js"></script>

      <div id= "id_list" class="row">
        <?php // dashboard ?>
        <?php 
        /*
          COMPROBAR SI DEBE CAMBIAR LA CONTRASEÑA
          COMPROBAR CUAL ES EL MODULO POR DEFECTO DEL USUARIO
          COMPROBAR LOS PERMISOS DEL MODULO AL QUE DESEA ACCEDER

        */
        ?>

          <?php if(!isset($_GET['url_module'])){$_GET['url_module']='user';} ?>
          <?php  #require $_SERVER['DOCUMENT_ROOT']."/$name_proyect/module/mod_contact_form/form/for_config_contact_form.php";
           require $_SERVER['DOCUMENT_ROOT']."/$name_proyect/module/mod_".$_GET['url_module']."/index.php";?> 
      </div><!--/row--> 

      </div>
      <!-- end: Content -->
        
        </div><!--/row-->   
    
  </div><!--/container-->
  
<!-- Modal Here --> 

  <div class="clearfix"></div>
  
  <?php  /*
  <footer>
  <?php require $_SERVER['DOCUMENT_ROOT']."/$name_proyect/form/for_footer/for_footer.php";?>
  </footer>
    */ ?>

  <script type="text/javascript">
      window.jQuery || document.write("<script src='/<?=$name_proyect?>/style/js/jquery-2.1.0.min.js'>"+"<"+"/script>");
    </script>
  <script src="/<?=$name_proyect?>/style/js/jquery-migrate-1.2.1.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/bootstrap.min.js"></script>
  
  <!-- page scripts -->
  <script src="/<?=$name_proyect?>/style/js/jquery-ui-1.10.3.custom.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/jquery.ui.touch-punch.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/jquery.sparkline.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/fullcalendar.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/jquery.flot.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/jquery.flot.pie.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/jquery.flot.stack.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/jquery.flot.resize.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/jquery.flot.time.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/jquery.autosize.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/jquery.placeholder.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/moment.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/daterangepicker.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/jquery.easy-pie-chart.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/jquery.dataTables.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/dataTables.bootstrap.min.js"></script>

    <!-- page scripts -->
  <script src="/<?=$name_proyect?>/style/js/jquery.mockjax.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/bootstrap-editable.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/typeahead.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/typeaheadjs.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/address.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/select2.min.js"></script>

    <!-- inline scripts related to this page -->
  <script src="/<?=$name_proyect?>/style/js/pages/form-x-editable-demo.js"></script>
  <script src="/<?=$name_proyect?>/style/js/pages/form-x-editable.js"></script>


  <?php #SCRIPT PARA EL FORMULARIO ?>
  <script src="/<?=$name_proyect?>/style/js/jquery.sparkline.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/jquery.chosen.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/jquery.cleditor.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/jquery.maskedinput.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/jquery.inputlimiter.1.3.1.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/bootstrap-datepicker.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/bootstrap-timepicker.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/jquery.hotkeys.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/bootstrap-wysiwyg.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/bootstrap-colorpicker.min.js"></script> 
  
  <!-- theme scripts -->
  <script src="/<?=$name_proyect?>/style/js/custom.min.js"></script>
  <script src="/<?=$name_proyect?>/style/js/core.min.js"></script>
  
    <!-- inline scripts related to this page -->
  <script src="/<?=$name_proyect?>/style/js/pages/form-elements.js"></script>

  <!-- inline scripts related to this page -->
  <script src="/<?=$name_proyect?>/style/js/pages/index.js"></script>
  <!-- Le coloco el nombre al proyecto-->
  <script> var name_proyect = "<?php echo $name_proyect;?>" ;</script>

</body>
</html>
<?php } ?>

