<?php session_start(); 
session_cache_limiter('nocache,private');

 $p_usuario=$_SESSION['p_usu'];

 $p_nombre=$_SESSION['p_nom'];
 $p_tipo=$_SESSION['p_tipo'];
 $p_time=$_SESSION["lastoutaccess"];
 

if ($p_usuario!=""  and $p_nombre!="" and $p_tipo!="asis" and $p_time!="")
{
	
	
  $fechaOld= $_SESSION["lastoutaccess"];

    $ahora = date("Y-n-j H:i:s");

    $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaOld));

    if($tiempo_transcurrido>= 6000) { //comparamos el tiempo y verificamos si pasaron 10 minutos o más

      session_destroy(); // destruimos la sesión

      header("Location: login.php"); //enviamos al usuario a la página principal

    }else {       //sino, actualizo la fecha de la sesión

    $_SESSION["lastoutaccess"] = $ahora;

   } 


}else

{
session_start();
session_destroy();
session_cache_limiter('nocache,private');
unset( $_SESSION['p_usu'], $_SESSION['p_nom'],$_SESSION['p_tipo'],$_SESSION["lastoutaccess"]);

	 header("Location: login.php");
	
	}















?>