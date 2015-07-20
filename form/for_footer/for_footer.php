		<div class="row">
			<div class="col-sm-5">
			&copy; Copyright 2014
			</div><!--/.col-->
			<div class="col-sm-7 text-right">
				 Desarrollado por  <a href="#">Cesar</a> | Basado en Bootstrap 3.1.1 </a>
			</div><!--/.col-->	
		</div><!--/.row-->	
			 <script>
$(document).ready(function(){
	$("#<?php echo $_SESSION['option']; ?>").addClass("active");
	$("#menu_sub_<?php echo $_SESSION['suboption'] ?>").addClass("active");
});
</script>