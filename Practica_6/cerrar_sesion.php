<?php
	require 'abre_sesion.php';
	$_SESSION=array();
	session_destroy();
	if(isset($_COOKIE[session_name()])) {
		setcookie(session_name(),'',time()-42000,'/');
	}
	header('Location:login.php');
?>
