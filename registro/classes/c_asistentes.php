<?php session_start();
session_cache_limiter('nocache,private');

//include("out.php");

 
 if ( $_SESSION['sino23-que']=="true" or $_SESSION['p_usu']!="" and $_SESSION['p_nom']!="" and $_SESSION['p_tipo']!="" )
{
	
	
 $p_usuario=$_SESSION['p_usu'];
 $p_nombre=$_SESSION['p_nom'];
 $p_tipo=$_SESSION['p_tipo'];


include("conecta.php");
 $link=conectarse();
  
class asistente {



function abrir_mat ($usu){	
 $p_usuario=$_SESSION['p_usu'];
//echo "select * from asistentes where nombre='$nom' and apellidos='$ape' and email='$mail' and activo=1";
  $dep=@mysql_query("select * from asistentes where matricula='$p_usuario' and activo=1");
  $depp = @mysql_fetch_array($dep);
   @mysql_close($link);
   return $depp;
 
}
function abrir_usu ($usu){	

//echo "select * from asistentes where nombre='$nom' and apellidos='$ape' and email='$mail' and activo=1";
  $dep=@mysql_query("select * from asistentes where login='$usu' and activo=1");
  $num=@mysql_num_rows ($dep);
  return $num;
 
}

function vertaller ($tal,$usu){	



		  $dep=@mysql_query("select * from taller where id_taller=".$tal."");
		  $depp = @mysql_fetch_array($dep);
			
			$hora= $depp['hora'];
			$fecha=$depp['fecha'];
			
			
			$otro=@mysql_query("select * from asistentes inner join expediente on asistentes.matricula=expediente.matricula where  expediente.matricula=".$usu." and asistentes.activo=1");
		
	
		
		
		
		 while ($r=mysql_fetch_array($otro))
			  
		  {
		$desp=@mysql_query("select * from taller where id_taller=".$r['id_taller']."");
		$despp = @mysql_fetch_array($desp); 
		$horay= $despp['hora'];
		$fechay=$despp['fecha'];
		
	
		if (substr($hora,0,5)==substr($horay,0,5) and $fecha==$fechay){
			
		return 1;	
		exit;
		            }		  
		  
		  }
			
			return 0;
		  
		  
  
  
 
 
}
function guardartaller ($tal,$usu){	

$q1="select * from taller where id_taller =".$tal;
$result1=mysql_query($q1);
$row = mysql_fetch_array($result1); 
 $num_al=$row["cantidad"];
 
  if ($num_al>=1){
  
  $num_al-=1;
   $q2="update taller set cantidad=".$num_al." where id_taller=".$tal;  
  mysql_query($q2);
 
  
  @mysql_query("insert into expediente values ('',$usu,$tal,'".date("Y-m-d H:m:s")."')");

return 1;
  // echo '<center><h1>TU PREINSCRIPCION FUE COMPLETADA CON EXITO</center></h1>';

 }else{
	 return 0;
// echo '<center><h1>ESTE TALLER YA ESTA LLENO, NO SE REALIZO TU PREINSCRIPCION</center></h1>';
}

			
			
}


public function abrir ($nom, $ape, $mail){	

//echo "select * from asistentes where nombre='$nom' and apellidos='$ape' and email='$mail' and activo=1";
  $dep=@mysql_query("select * from asistentes where nombre='$nom' and apellidos='$ape' and email='$mail' and activo=1");
  $num=@mysql_num_rows ($dep);
  return $num;
 
}

function editar ($id){
 $dep=@mysql_query("select * from asistentes where matricula=$id");
  $depp = @mysql_fetch_array($dep);
   @mysql_close($link);
  return $depp;
 
}

function guardar ($nom,$ape,$mailer,$inst,$user,$pass,$tel){	

//$user2=str_rot13($user);
//$pass1=str_rot13($pass);
//$pass2=strrev($pass1);
 $fechahoy=date("Y/m/d");
 //echo "insert into asistentes values ('','$nom','$ape','$mail','$inst','$user','$pass','$tel',1,'$fechahoy')";
  @mysql_query("insert into asistentes values ('','$nom','$ape','$mailer','$inst','$user','$pass','$tel',1,'$fechahoy')");
  
 $dep=@mysql_query("select * from asistentes where nombre='$nom' and apellidos='$ape' and email='$mailer' and activo=1");
  $depp = @mysql_fetch_array($dep);
 

  $_SESSION['p_usu']=$depp['matricula'];
   $_SESSION['p_nom']=$depp['nombre']." ".$depp['apellidos'];
  $_SESSION['p_tipo']="asis";
  $_SESSION["lastoutaccess"]= date("Y-n-j H:i:s");
  





 require('class.phpmailer.php');
 require('class.smtp.php');
 $mail = new PHPMailer();
 
 $body = "<strong>Registro exitoso</strong>
	<br><br><strong>Nombre: </strong>".$depp['nombre']." ".$depp['apellidos']."<br>
	<strong>Correo: </strong>".$depp['email']."<br>
	<strong>Instituci&#243;n: </strong>".$depp['institucion']."<br>
	<strong>Telefono: </strong>".$depp['telefono']."<br>
	<strong>Nombre de usuario: </strong>".$depp['login']."<br>
	<strong>Contrase&ntilde;a: </strong>".$depp['nip']."<br>
	<br>Estaremos en contacto en los pr&#243;ximos d&#237;as.<br><br><br>Saludos!<br><br></strong><a  href='http://fnsl.org.mx/registro/login.php'>Iniciar Sesi&#243;n</a>";
	$body.= "<br><br><i>Enviado por http://fnsl.org.mx/</i>";
	$mail->Body =utf8_decode( $body);
	$mail->IsHTML(true);
	$mail->IsSMTP();
	
	

 $mail->Host = "mail.ciiti.org.mx";
 $mail->From = "organizacion@ciiti.org.mx";
 $mail->FromName = utf8_decode("Foro Nacional De Software Libre");
 $mail->Subject = "Registro Exitoso";
 $mail->MsgHTML($body);
 $mail->AddAddress($mailerr, $nom." ".$ape);
$mail->AddBCC("organizacion@ciiti.org.mx","Organizacion");
//   $mail->AddBCC("contenidos@ciiti.org.mx","Contenidos");
 $mail->SMTPAuth = true;
 $mail->Username = "organizacion@ciiti.org.mx";
 $mail->Password = "cisol.2013"; 
 
 if(!$mail->Send()) {
 //echo "Mailer Error: " . $mail->ErrorInfo;
// exit();
 } else {
 //echo "Message sent!";
 } 
  
 }

  function modificar ($pass){	

 $p_usuario=$_SESSION['p_usu'];
 @mysql_query("update asistentes set nip='$pass' where matricula='$p_usuario' ");
    }






function error(){
return ('Error'.'<br>'.'Verifique con el Admnistrador' );
}
}

}else{
	echo "No tienes Permisos";
	
	}

?>
