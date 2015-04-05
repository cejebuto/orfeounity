<?php 
session_start();
if (!isset($_SESSION['id'])){ ?>
<?php 
  require $_SERVER['DOCUMENT_ROOT']."/sadmin/form/for_login/for_login.php";
?>
<?php }else{ ?>
<!DOCTYPE html>
<html lang="es">
<head>
  
  <!-- start: Meta -->
  <meta charset="utf-8">
  <title>Administrador de Información</title>
  <meta name="description" content="Sistema de Gestión De Información , Administrador de Contenidos">
  <meta name="author" content="Cesar Buelvas">
  <!-- end: Meta -->
  
  <!-- start: Mobile Specific -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- end: Mobile Specific -->
  
  <!-- start: CSS -->
  <link href="/sadmin/style/css/bootstrap.min.css" rel="stylesheet">
  <link href="/sadmin/style/css/style.min.css" rel="stylesheet">
  <link href="/sadmin/style/css/retina.min.css" rel="stylesheet">
  <link href="/sadmin/style/css/print.css" rel="stylesheet" type="text/css" media="print"/>
  <!-- end: CSS -->
  

  <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="/sadmin/style/js/respond.min.js"></script>
    
  <![endif]-->
  
  <!-- start: Favicon and Touch Icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/sadmin/style/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/sadmin/style/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/sadmin/style/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/sadmin/style/ico/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="/sadmin/style/ico/favicon.png">
  <!-- end: Favicon and Touch Icons --> 
    
</head>

<body>
    <!-- start: Header -->
  <header class="navbar">
  <?php require $_SERVER['DOCUMENT_ROOT']."/sadmin/form/for_header/for_header.php";?>
  </header>
  <!-- end: Header -->
  
    <div class="container">
    <div class="row">
        
      <!-- start: Main Menu -->
      <div id="sidebar-left" class="col-lg-2 col-sm-1 ">
                
        <div class="sidebar-nav nav-collapse collapse navbar-collapse">
          <ul class="nav main-menu">
          <?php require $_SERVER['DOCUMENT_ROOT']."/sadmin/form/for_menu/for_menu.php";?>
          </ul>
        </div>
                  <a href="#" id="main-menu-min" class="full visible-md visible-lg"><i class="fa fa-angle-double-left"></i></a>
              </div>
      <!-- end: Main Menu -->
            
      <!-- start: Content -->
      <div id="content" class="col-lg-10 col-sm-11 ">
      
      
      <div class="row">
          <?php if(!isset($_GET['url_module'])){$_GET['url_module']='dashboard';} ?>
          <?php  #require $_SERVER['DOCUMENT_ROOT']."/sadmin/module/mod_contact_form/form/for_config_contact_form.php";
           require $_SERVER['DOCUMENT_ROOT']."/sadmin/module/mod_".$_GET['url_module']."/index.php";?> 
      </div><!--/row--> 

      </div>
      <!-- end: Content -->
        
        </div><!--/row-->   
    
  </div><!--/container-->
  
<!-- Modal Here --> 

  <div class="clearfix"></div>
  
  <footer>
  <?php require $_SERVER['DOCUMENT_ROOT']."/sadmin/form/for_footer/for_footer.php";?>
  </footer>
    
    <script src="/sadmin/style/js/jquery-2.1.0.min.js"></script>
    <script type="text/javascript">
      window.jQuery || document.write("<script src='/sadmin/style/js/jquery-2.1.0.min.js'>"+"<"+"/script>");
    </script>
  <script src="/sadmin/style/js/jquery-migrate-1.2.1.min.js"></script>
  <script src="/sadmin/style/js/bootstrap.min.js"></script>
  
  <!-- page scripts -->
  <script src="/sadmin/style/js/jquery-ui-1.10.3.custom.min.js"></script>
  <script src="/sadmin/style/js/jquery.ui.touch-punch.min.js"></script>
  <script src="/sadmin/style/js/jquery.sparkline.min.js"></script>
  <script src="/sadmin/style/js/fullcalendar.min.js"></script>
  <script src="/sadmin/style/js/jquery.flot.min.js"></script>
  <script src="/sadmin/style/js/jquery.flot.pie.min.js"></script>
  <script src="/sadmin/style/js/jquery.flot.stack.min.js"></script>
  <script src="/sadmin/style/js/jquery.flot.resize.min.js"></script>
  <script src="/sadmin/style/js/jquery.flot.time.min.js"></script>
  <script src="/sadmin/style/js/jquery.autosize.min.js"></script>
  <script src="/sadmin/style/js/jquery.placeholder.min.js"></script>
  <script src="/sadmin/style/js/moment.min.js"></script>
  <script src="/sadmin/style/js/daterangepicker.min.js"></script>
  <script src="/sadmin/style/js/jquery.easy-pie-chart.min.js"></script>
  <script src="/sadmin/style/js/jquery.dataTables.min.js"></script>
  <script src="/sadmin/style/js/dataTables.bootstrap.min.js"></script>

    <!-- page scripts -->
  <script src="/sadmin/style/js/jquery.mockjax.min.js"></script>
  <script src="/sadmin/style/js/bootstrap-editable.min.js"></script>
  <script src="/sadmin/style/js/typeahead.min.js"></script>
  <script src="/sadmin/style/js/typeaheadjs.min.js"></script>
  <script src="/sadmin/style/js/address.min.js"></script>
  <script src="/sadmin/style/js/select2.min.js"></script>

    <!-- inline scripts related to this page -->
  <script src="/sadmin/style/js/pages/form-x-editable-demo.js"></script>
  <script src="/sadmin/style/js/pages/form-x-editable.js"></script>


  <?php #SCRIPT PARA EL FORMULARIO ?>
  <script src="/sadmin/style/js/jquery.sparkline.min.js"></script>
  <script src="/sadmin/style/js/jquery.chosen.min.js"></script>
  <script src="/sadmin/style/js/jquery.cleditor.min.js"></script>
  <script src="/sadmin/style/js/jquery.maskedinput.min.js"></script>
  <script src="/sadmin/style/js/jquery.inputlimiter.1.3.1.min.js"></script>
  <script src="/sadmin/style/js/bootstrap-datepicker.min.js"></script>
  <script src="/sadmin/style/js/bootstrap-timepicker.min.js"></script>
  <script src="/sadmin/style/js/jquery.hotkeys.min.js"></script>
  <script src="/sadmin/style/js/bootstrap-wysiwyg.min.js"></script>
  <script src="/sadmin/style/js/bootstrap-colorpicker.min.js"></script> 
  
  <!-- theme scripts -->
  <script src="/sadmin/style/js/custom.min.js"></script>
  <script src="/sadmin/style/js/core.min.js"></script>
  
    <!-- inline scripts related to this page -->
  <script src="/sadmin/style/js/pages/form-elements.js"></script>

  <!-- inline scripts related to this page -->
  <script src="/sadmin/style/js/pages/index.js"></script>
  

</body>
</html>
<?php } ?>

