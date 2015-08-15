<?php 
function clean_string($string) {
      $string = strip_tags($string);
      $string = htmlentities($string);
	  $string = str_replace("\"", "&quot;", $string);
      return stripslashes($string);
}
?>