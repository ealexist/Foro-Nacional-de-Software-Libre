<?php session_start();
session_cache_limiter('nocache,private');
?>



<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<link rel="stylesheet" href="images/style000.css" type="text/css" media="screen">
    <script type="text/javascript">
<!--




function index(){
window.location="info.php";

}
function msg(){
 alert('Ya estas dado de Alta')


}
function no(){

 alert('No se ha completado tu registro, el Nombre de usuario esta en uso, escribe otro por favor')
  window.location="registro.php";


}

function validacion(formulario) {
	var er_string = /^([a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|\s|\.|-)+$/
		var er_pass = /^([0-9]|[a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|\s|\.|-)+$/
		var er_numbers = /^([0-9])+$/
		var er_email = /^(.+\@.+\..+)$/
		var er_cbo =  /^([a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|\s)+$/
		var x


		if(!er_string.test(frmreg.txtnom.value)) {
    		    alert('Nombre no válido.')
      		  return false
    		}

		if(!er_string.test(frmreg.txtape.value)) {
    		    alert('Apellido(s) no válido.')
      		  return false
    		}


				if(!er_string.test(frmreg.txtinst.value)) {
    		    alert('Institucion no válido.')
      		  return false
    		}



			if(!er_email.test(frmreg.txtmail.value)) {
    		    alert('Correo Electronico no válido.')
      		  return false
    		}




		if(!er_string.test(frmreg.txtusu.value)) {
    		    alert('Nombre de usuario no válido.')
      		  return false
    		}


			if(!er_string.test(frmreg.txtusu.value)) {
    		    alert('Nombre de usuario no válido.')
      		  return false
    		}


			if(frmreg.txtpass.value=="") {
    		    alert('Contraseña no válida.')
      		  return false
    		}




	if(frmreg.recaptcha_response_field.value=="") {
    		    alert('Codigo de Imagen no válido.')
      		  return false
    		}

			if(frmreg.txtpass.value!=frmreg.txtpass1.value) {
    		    alert('No es la misma Contraseña.')
      		  return false
    		}



    	return true            //cambiar por return true para ejecutar la accion del formulario
}


//-->
</script>

 <div align="center" style="margin: 0 auto; text-align: center; max-width:460px; height:auto;">


   <form   method="post" name="frmreg"  onsubmit="return validacion(this)">



    <table width="100%" align="center">
      <tr>
        <td  class="ddd">Nombre</td>

<td  height="40"><input name="txtnom" type="text"  value="" size="35" maxlength="30" /></td>



      </tr>
      <tr>
        <td class="ddd"><label>Apellidos </label></td>

<td height="40"><input name="txtape" type="text"  value="" size="35" maxlength="70" /></td>




      </tr>





<tr>
        <td  class="ddd">Institucion</td>
        <td height="40">


<input type="text" name="txtinst"  value="" size="35" maxlength="254"/>
</label></td>
      </tr>





<tr>
        <td  class="ddd">Email</td>




<td height="40"><input name="txtmail" type="text"  value="" size="35" maxlength="254" /></td>
      </tr>





<tr>
 <td  class="ddd">
    <label>Telefono</label></td>
<td height="40"><input name="txttel" type="text"  value="" size="35" maxlength="70" /></td>
     </tr>


<tr>
 <td  class="ddd">
    <label>Nombre de usuario</label></td>
<td height="40"><input name="txtusu" type="text"  value="" size="35" maxlength="12"  /></td>
     </tr>

<tr>
 <td  class="ddd">
    <label>Contraseña</label></td>
<td height="40"><input name="txtpass" type="password"  value="" size="35" maxlength="12" /></td>
     </tr>

<tr>
 <td  class="ddd">
    <label>Confirmar contraseña</label></td>
<td height="40"><input name="txtpass1" type="password"  value="" size="35" maxlength="12" /></td>
     </tr>







      <tr>
        <td height="40" colspan="2"><p align="center">
          <?php

@require_once('recaptchalib.php');
$publickey = "6LcMcvoSAAAAAAU0sk_UpkAQIYMcdE3x6R1u_912";
$privatekey = "6LcMcvoSAAAAAPTz5oRbQhNzsdkZJ_RHT_1j394u";

$resp = null;
$error = null;

# are we submitting the page?
if ($_POST["action"]) {
  $resp = recaptcha_check_answer ($privatekey,
                                  $_SERVER["REMOTE_ADDR"],
                                  $_POST["recaptcha_challenge_field"],
                                  $_POST["recaptcha_response_field"]);

  if ($resp->is_valid) {


	 $_SESSION['sino23-que']="true";
///--------------------------
	include("classes/c_asistentes.php");

	$d = new asistente;

if ($_POST['action'] == "Guardar") {


	$nnq=$d->abrir_usu( $_POST['txtusu']);
   		if ($nnq==1){

			echo '<BODY onLoad="javascript:no()">';
			}else {


		$nn=$d->abrir( $_POST['txtnom'], $_POST['txtape'], $_POST['txtmail']);
		if ($nn==0){

$d->guardar(  $_POST['txtnom'],$_POST['txtape'], $_POST['txtmail'], $_POST['txtinst'],  $_POST['txtusu'],  $_POST['txtpass'],  $_POST['txttel']);

echo '<BODY onLoad="javascript:index()">';
		}else{echo '<BODY onLoad="javascript:msg()">';
		}

}





	}





	//	include("listo.php");
	//	 $nn=alu::ver();

	////	if ($nn==0){
     //    alu::guardar();



  } else {

     	echo "<div class='dd' align='center'>Lo sentimos, no se enviaron tus datos, por que no has logrado proporcionar el código de la imagen correcta! Inténtelo de nuevo ... </div>";
  }
}


echo '<div align="center">'.recaptcha_get_html($publickey, $error).'</div>';
?>

        </p></td>
        </tr>
    </table>



           <input type="submit" name="action" id="button" value="Guardar" />

          <input type="reset" name="button2" id="button2" value="Limpiar" />
        </p>

    </label></form>








	<br />
    <br />
    <br />

    <a href="login.php" onmouseover="status='';return true" onclick="status='';return true" >Iniciar Sesión</a>
</div>
