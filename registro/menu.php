<?php session_start();
session_cache_limiter('nocache,private');

//include("out.php");

$p_usuario=$_SESSION['p_usu'];
 $p_nombre=$_SESSION['p_nom'];
 $p_tipo=$_SESSION['p_tipo'];
 
 
 
if ($p_usuario!="" and $p_nombre!="" and $p_tipo=="asis"  )
{?>
<div align="center" style="max-width:460px; height:auto;">
<td align="center"  class="ddd"> | <a href="preinscripcion.php">Preinscripción a taller </a> | <a href="asistente.php">Información</a> | <a href="info.php">Noticias</a> | <a href="script.php"> Cerrar Sesion</a> | </td>
</div>
<?php /*<td  class="ddd"> | <a href="asistente.php">Información</a> | <a href="info.php">Noticias</a> | <a href="ficha.php">Imprime tu Ficha</a> | <a href="script.php"> Cerrar Sesion</a> | </td>
<strong></strong> */ ?>
<?php }else{
	
	header("Location: denegado.php");
	}?>
