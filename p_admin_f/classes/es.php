<?php session_start();
session_cache_limiter('nocache,private');



$p_usuario=$_SESSION['p_usua'];
 $p_nombre=$_SESSION['p_noma'];
 $p_tipo=$_SESSION['p_tipoa'];
 
 
 
if ($p_usuario!="" and $p_nombre!="" and $p_tipo=="admin"  )
{?>
<script>
function redireccionar(){
alert("Se Envio el Correo con sus datos Correctamente")
	 window.location="../asistentes.php"; 
}  
//setTimeout ("redireccionar()", 5000); //tiempo expresado en milisegundos 
</script>
<?php


include("conecta.php");	
$link=conectarse();

 require('class.phpmailer.php');
 require('class.smtp.php');
 $mail = new PHPMailer();
	
$mail->AddBCC("soporte@cisol.org.mx","soporte");
 $mail->SMTPAuth = true;
 $mail->Username = "soporte@cisol.org.mx";
 $mail->Password = "2A4*.Q2dx$"; 
	$md=$_GET['mail'];
	//for ($md = 1; $md <= 293; $md++){
	
$result=mysql_query("select * from asistentes where activo=1 and matricula =".$md,$link); 
 $num_r=mysql_num_rows($result);

 
 if ($num_r!=0){
//while(
$depp=mysql_fetch_array($result);
//mysql_free_result($depp);
//)
//{


$nom=$depp['nombre'];
$ape=$depp['apellidos'];
$cor=$depp['email'];

 
 $body = "<strong>Sus Datos:</strong>
 <br><br>

    <strong>Nombre: </strong>".$depp['nombre']." ".$depp['apellidos']."<br>
	<strong>Correo: </strong>".$depp['email']."<br>
	<strong>Institución: </strong>".$depp['institucion']."<br>
	<strong>Nombre de Usuario: </strong>".$depp['login']."<br>
	<strong>Contrase&ntilde;a: </strong>".$depp['nip']."<br>
	<a  href='http://cisol.org.mx/webapp/asistente/login.php'>Iniciar Sesión </a>
	";
	$body.= "<br><br><i>Enviado por http://cisol.org.mx</i>";
	
	$mail->Body = utf8_decode($body);
	$mail->IsHTML(true);
	$mail->IsSMTP();

 $mail->Host = "mail.cisol.org.mx";
 $mail->From = "soporte@cisol.org.mx";
 $mail->FromName = "Congreso Internacional de Software Libre Zacatecas 2012";
 $mail->Subject = utf8_decode("Información de su Cuenta");
 $mail->MsgHTML(utf8_decode($body));
// $mail->AddAddress($depp['email'], $nom." ".$ape);
 $mail->AddAddress($cor, utf8_decode($nom." ".$ape));
  $mail->AddBCC("soporte@cisol.org.mx", "soporte");
 
 $mail->Send();
$cor="";
$nom="";
$ape="";
$mail->ClearAddresses();
$mail->ClearBCCs();
echo '<BODY onLoad="javascript:redireccionar()">'; 

}
	


?>


<?php }else{
	
	header("Location: ../denegado.php");
	}?>
