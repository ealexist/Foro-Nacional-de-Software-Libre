<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registro</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(images/fondo2.jpg);
	 background-repeat: no-repeat;
/*(background-position: center center;*/
           background-attachment: fixed;
}-->
</style>

<script src="Scripts/swfobject_modified.js" type="text/javascript"></script>
</head>
<script>
function redireccionar(){
	alert("Se Registraron Bien tus Datos, Revisa tu Correo mas tarde")
	 window.location="http://zacatecas.consol.org.mx/"; 
} 
function redireccionar1(){
	alert("Ya Te Encuentras Registrado")
	 window.location="http://zacatecas.consol.org.mx/"; 
}  
//setTimeout ("redireccionar()", 5000); //tiempo expresado en milisegundos 
</script>

<body>
&nbsp;
<div align="center">
<table width="755" border="0" cellspacing="0" cellpadding="0">
<tr>
<td class="header" valign="top">
<!-- HEADER INFORMATION-->
<table width="98%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td class="headerleft" valign="top"><table width="92%" height="94" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="737" height="220" align="middle" id="FlashID">
      <param name="movie" value="images/top.swf" />
      <param name="quality" value="high" />
      <param name="wmode" value="opaque" />
      <param name="swfversion" value="6.0.65.0" />
      <!-- Esta etiqueta param indica a los usuarios de Flash Player 6.0 r65 o posterior que descarguen la versión más reciente de Flash Player. Elimínela si no desea que los usuarios vean el mensaje. -->
      <param name="expressinstall" value="Scripts/expressInstall.swf" />
      <!-- La siguiente etiqueta object es para navegadores distintos de IE. Ocúltela a IE mediante IECC. -->
      <!--[if !IE]>-->
      <object data="images/top.swf" type="application/x-shockwave-flash" width="737" height="220" align="middle">
        <!--<![endif]-->
        <param name="quality" value="high" />
        <param name="wmode" value="opaque" />
        <param name="swfversion" value="6.0.65.0" />
        <param name="expressinstall" value="Scripts/expressInstall.swf" />
        <!-- El navegador muestra el siguiente contenido alternativo para usuarios con Flash Player 6.0 o versiones anteriores. -->
        <div>
          <h4>El contenido de esta p&aacute;gina requiere una versi&oacute;n m&aacute;s reciente de Adobe Flash Player.</h4>
          <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Obtener Adobe Flash Player" width="112" height="33" /></a></p>
        </div>
        <!--[if !IE]>-->
      </object>
      <!--<![endif]-->
    </object></td>
  </tr>
  
</table></td>
<td class="headerright" valign="top"><br />  <br /></td>
</tr>
</table></td>
</tr>
<tr>
<td valign="top" class="mainbody">
<!-- MAIN BODY SECTION-->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td width="14%" valign="top" class="mainleft">&nbsp;</td>
<td width="70%" valign="top" class="mainleft"><p>&nbsp;</p>

<?php

 $nombre =strtoupper ($_POST["nom"]); 
 $ape = strtoupper ($_POST["apellido"]);
   $carr= strtoupper ($_POST["carrera"]);
  $maile= $_POST["email"];
   $tipo= strtoupper($_POST["cbo_tipo"]);
    $tel= strtoupper($_POST["telefono"]);
	 $play= strtoupper($_POST["cbo_play"]);
   
 	$ma = $_POST["usu"]; 
	 $pa= $_POST["nip"]; 
	
	$control=str_rot13($ma);

	$cve=(str_rot13($pa));
	$fecha=date('Y-m-d');
	
include("conecta.php");
$link=conectarse();
class alu {
function gen_chars_no_dup($long=8)   
{   
    $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";   
    mt_srand((double)microtime()*1000000);    
    $i=0;   
    while ($i != $long) {   
        $rand=mt_rand() % strlen($chars);   
        $tmp=$chars[$rand];   
        $pass=$pass . $tmp;   
        $chars=str_replace($tmp, "", $chars);   
        $i++;   
    }   
    return strrev($pass);   
}  


function ver (){
global $link,$nombre,$ape,$carr,$maile,$tipo,$tel,$play,$control,$cve,$fecha;
$result=mysql_query("select * from alumnos where nombre='$nombre' and apellidos='$ape' and activo=1",$link); 
$num_r=mysql_num_rows($result);
return($num_r);
}




function guardar (){
global $link,$nombre,$ape,$carr,$maile,$tipo,$tel,$play,$control,$cve,$fecha;

  
//$result=mysql_query("select * from alumnos where login='$control' and nip='$cve' and activo=1",$link); 
//$num_r=mysql_num_rows($result);
//if ($num_r==0){
	
    $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";   
    mt_srand((double)microtime()*1000000);    
    $i=0;   
    while ($i != 8) {   
        $rand=mt_rand() % strlen($chars);   
        $tmp=$chars[$rand];   
        $pass1=$pass1 . $tmp;   
        $chars=str_replace($tmp, "", $chars);   
        $i++;   
    }   
    //return strrev($pass);   
	$user=str_rot13(strrev($pass1));
	
	 $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";   
    mt_srand((double)microtime()*1000000);    
    $i=0;   
    while ($i != 8) {   
        $rand=mt_rand() % strlen($chars);   
        $tmp=$chars[$rand];   
        $pass2=$pass2 . $tmp;   
        $chars=str_replace($tmp, "", $chars);   
        $i++;   
    }   
$pass= str_rot13(strrev($pass2));
//gen_chars_no_dup();

 @mysql_query("insert into alumnos values ('','$nombre','$ape','$maile','$carr','$user','$pass','$tel','$play',1,'$tipo','$fecha')",$link);
@mysql_close($link);


require("class.phpmailer.php");

$mail = new PHPMailer();
	$mail->Host = "localhost";
	$mail->From = "manuel.haro@uaz.edu.mx";
	$mail->FromName = "Congreso Internacional de Software Libre Zacatecas 2011";
	$mail->Subject = "Registro Exitoso";
	$mail->AddAddress($maile);
		if ($varname != "") {
		$mail->AddAttachment($vartemp, $varname);
	}
	
	$body = "<strong>Ahora Puedes Inscribirte a un Taller, Incia sesion </strong><br><br><a href='http://zacatecas.consol.org.mx/registro/login.php'>Iniciar Sesion</a><br><br><strong>Nombre: </strong>".$nombre." ".$ape."<br>
	<strong>Correo: </strong>".$maile."<br>
	<strong>Institucion: </strong>".$carr."<br>
	<strong>Telefono: </strong>".$tel."<br>
	<strong>Playera: </strong>".$play."<br>
	<strong>Asistente: </strong>".$tipo."<br>
	<strong>Usuario: </strong>".str_rot13($user)."<br>
	<strong>Password: </strong>".str_rot13($pass)."<br>
	<br>Estaremos En Contacto En Los Proximos Dias.<br><br><br>Saludos!<br><br>";
	$body.= "<i>Enviado por http://zacatecas.consol.org.mx</i>";
	$mail->Body = $body;
	$mail->IsHTML(true);
	$mail->Send();

echo '<BODY onLoad="javascript:redireccionar()">';  



}
	}
//}

?>


<?php 

global $link,$nombre,$ape,$carr,$maile,$tipo,$tel,$play,$control,$cve,$fecha;
$result=mysql_query("select * from alumnos where nombre='$nombre' and apellidos='$ape' and activo=1",$link); 
$num_r=mysql_num_rows($result);
if ($num_r==0){

?>
  <fieldset>
  <legend>Datos Generales</legend>
  
  
  
  <?php
  echo '<BODY onLoad="javascript:redireccionar()">';  
  echo '<center><h1>Se Registraron Bien tus Datos, Revisa tu Correo mas tarde</h1><br><br>';
//   echo '<center><h3>Ahora puede <a href=acceso.php>iniciar sesion</a></center> </h3>';
//echo '<a href=acceso.php>Volver</a></center>';
 echo '<center>Se Redireccionara Automaticamente en 5 segundos</center>';
  ?>
  </fieldset>
  <p></p>
  <p></td>
<td width="16%" valign="top" class="mainleft">&nbsp;</td>
</tr>
</table>
<br /></td>
</tr>

<tr>
<td class="footer" valign="top">
<!-- FOOTER SECTION-->
<div align="center">CONSOL ZACATECAS</div>
s</td>
</tr>
</table>
</div>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
</html>
<?php
}
else{
?>
  <fieldset>
  <legend>Datos Generales</legend>
  
  
  
  <?php
  echo '<BODY onLoad="javascript:redireccionar1()">';  
  echo '<center><h1>Ya Te Encuentras Registrado</h1><br><br>';
//   echo '<center><h3>Ahora puede <a href=acceso.php>iniciar sesion</a></center> </h3>';
//echo '<a href=acceso.php>Volver</a></center>';
 echo '<center>Se Redireccionara Automaticamente en 5 segundos</center>';
  ?>
  </fieldset>
  <p></p>
  <p></td>
<td width="16%" valign="top" class="mainleft">&nbsp;</td>
</tr>
</table>
<br /></td>
</tr>

<tr>
<td class="footer" valign="top">
<!-- FOOTER SECTION-->
<div align="center">CONSOL ZACATECAS</div>
s</td>
</tr>
</table>
</div>
<script type="text/javascript">
swfobject.registerObject("FlashID");
</script>
</body>
</html>
<?php }?>
