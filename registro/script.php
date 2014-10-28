<?php
session_start();
	session_destroy();
	unset( $_SESSION['p_usu'], $_SESSION['p_nom'],$_SESSION['p_tipo'],$_SESSION["lastoutaccess"]);
	header ("Location: login.php");
?>