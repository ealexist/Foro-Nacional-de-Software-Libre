<?php session_start();
session_cache_limiter('nocache,private');

//include("out.php");

$p_usuario=$_SESSION['p_usua'];
 $p_nombre=$_SESSION['p_noma'];
 $p_tipo=$_SESSION['p_tipoa'];
 
 
 
if ($p_usuario!="" and $p_nombre!="" and $p_tipo=="admin"  )
{

$va=$_GET['a'];
$vb=$_GET['b'];
include("classes/conecta.php");
$link=conectarse();

if ($va!=""){
mysql_query("update asistentes set activo=1 where matricula='$va'" ,$link);
  header ('Location: asistentes.php');
}

if ($vb!=""){
mysql_query("update asistentes set activo=0 where matricula='$vb'" ,$link);
  header ('Location: asistentes.php');
}





 }else{
	
	header("Location: denegado.php");
	}?>
