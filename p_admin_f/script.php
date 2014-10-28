<?php
session_start();
	session_destroy();
	unset( $_SESSION['p_usup'], $_SESSION['p_nomp'],$_SESSION['p_tipop'],$_SESSION["lastoutaccess"]);
	header ("Location: http://cisol.org.mx/");
?>