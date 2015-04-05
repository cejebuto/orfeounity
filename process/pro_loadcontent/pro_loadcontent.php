<?php 
session_start();
unset($_SESSION['suboption']);
$_SESSION['option']=$_POST['option'];
echo $_SESSION['option'];
?>