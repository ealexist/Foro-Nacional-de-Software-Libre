
<script>
function redireccionar(){
alert("Listo")
	 window.location="http://cisol.org.mx/"; 
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
	for ($md = 4; $md <= 121; $md++){
	//for ($md = 1; $md <= 293; $md++){
	
$result=mysql_query("select * from asistentes where activo=1 and matricula =".$md,$link); 
 $num_r=mysql_num_rows($result);
 if ($num_r!=0){
//while(
$depp=mysql_fetch_array($result);
mysql_free_result($depp);
//)
//{


$nom=$depp['nombre'];
$ape=$depp['apellidos'];
$cor=$depp['email'];

 
 $body = "<strong>Talleres  prácticos en el CISOL 2012</strong>
 <br><br>Te invitamos a que participes en los talleres que se realizarán los días 21, 22 y 23 de mayo, previo al inicio oficial del CISOL 2012.<br><br>
 Puedes Inscribirte accesando a tu cuenta, en la parte superior, Inscripción a Talleres, Conferencias, y mas...
 <br><br>El costo de cada taller, antes del día  04 de Mayo del 2012 será  de $250, a partir del día 05 mayo 2012 el costo será  $350. <br><br>
 *Es recomendable que los asistentes cuenten con computadora portátil
<br>*El cupo es limitado por lo que es importante su registro lo antes posible.<br><br>

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
 $mail->Subject = utf8_decode("Talleres prácticos en el CISOL 2012");
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

}
	}
echo '<BODY onLoad="javascript:redireccionar()">'; 

?>