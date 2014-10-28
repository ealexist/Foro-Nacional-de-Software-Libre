<?php session_start();
session_cache_limiter('nocache,private');
?>


<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<link rel="stylesheet" href="images/style000.css" type="text/css" media="screen">
    <script type="text/javascript">
<!--





function msg(){
 alert('Se envio un Correo con tu Información')  
 window.location="login.php"; 
    

}
function no(){

 alert('El Email que ingresaste no existe. Verifica el Email e intenta nuevamente')  
  window.location="restaurar.php";   


}

function validacion(formulario) {
	var er_string = /^([a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|\s|\.|-)+$/    
		var er_pass = /^([0-9]|[a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|\s|\.|-)+$/    
		var er_numbers = /^([0-9])+$/            
		var er_email = /^(.+\@.+\..+)$/   
		var er_cbo =  /^([a-z]|[A-Z]|á|é|í|ó|ú|ñ|ü|\s)+$/   
		var x 
			
			
			if(!er_email.test(frmreg.txtmail.value)) {    
    		    alert('Correo Electronico no válido.')   
      		  return false   
    		} 	
			
			
						
    
	if(frmreg.recaptcha_response_field.value=="") {    
    		    alert('Codigo de Imagen no válido.')   
      		  return false   
    		} 
			
			
	
	
    	return true            //cambiar por return true para ejecutar la accion del formulario   
}   


//-->
</script>


  <div align="center" style="margin: 0 auto; text-align: center; max-width:460px; height:auto;">
		<h2 align="center"><span></span>Restaurar Contraseña</h2>

     <div align="center"  id="algo" > </div>
     Para restaurar tu contraseña por favor ingresa el email que registraste. Allí te enviaremos tu información para que puedas restaurar tu contraseña.
   <form   method="post" name="frmreg"  onsubmit="return validacion(this)">
  

  
  <br>
   
    
    <table width="70%" align="center">
     
<tr>
        <td  class="ddd">Email</td>




<td height="40"><input name="txtmail" type="text"  value="" size="35" maxlength="254" /></td>
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
	
	  
	 $_SESSION['sinoinfo12-qe']="true";
///--------------------------
	include("classes/c_asistentes1.php");
	
	$d = new asistente;
				
if ($_POST['action'] == "Restaurar") {


	$nnq=$d->enviar( $_POST['txtmail']);
   		if ($nnq==0){
		
			echo '<BODY onLoad="javascript:no()">';
			}else {
	
	
	echo '<BODY onLoad="javascript:msg()">'; 
		
        
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
        
       </td>
        </tr>
    </table>

   
        
           <input type="submit" name="action" id="button" value="Restaurar" />
            
       
       
   </form>
   
    
  <div align="left">  <a href="login.php" onmouseover="status='';return true" onclick="status='';return true" >Iniciar Sesión</a> </div>
    </div>
    
 
