<?php session_start();
session_cache_limiter('nocache,private');

//include("out.php");

$p_usuario=$_SESSION['p_usu'];
 $p_nombre=$_SESSION['p_nom'];
 $p_tipo=$_SESSION['p_tipo'];
 
 
 
if ($p_usuario!="" and $p_nombre!="" and $p_tipo=="asis"  )
{
	
	
include("classes/c_asistentes.php");
	
	$d = new asistente;
				
				
				$r=$d->abrir_mat($p_usuario);
				
				
if ($_POST['action'] == "Guardar") {
   		
	
		$nn=$d->abrir( $_POST['txtnom'], $_POST['txtape'], $_POST['txtmail']);
		if ($nn==1){
				
$d->modificar($_POST['txtpass']);

echo '<BODY onLoad="javascript:index()">'; 
		}else{echo '<BODY onLoad="javascript:msg()">'; 
		}
        
}



?>
 


<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<link rel="stylesheet" href="images/style000.css" type="text/css" media="screen">

    
   


    <script type="text/javascript">
<!--




function index(){
	alert('Se modifico tu contraseña correctamente')   
window.location="asistente.php"; 

}
function msg(){
 alert('Estas dado de Baja')   

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
		
						
    

			
			if(frmreg.txtpass.value!=frmreg.txtpass1.value) {    
    		    alert('No es la misma Contraseña.')   
      		  return false   
    		}  
	
	
	
    	return true            //cambiar por return true para ejecutar la accion del formulario   
}   


//-->
</script>
<div align="center" style="margin: 0 auto; text-align: center; max-width:460px; height:auto;">
    <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
   <?php include("menu.php"); ?>
    </tr>
</table>
		
    
     
	
   <form   method="post" name="frmreg"  onsubmit="return validacion(this)">
  

  
  <br>
   
   
    <table width="100%" align="center">
      <tr>
        <td  class="ddd">Nombre</td>

<td  height="40"><input name="txtnom" type="text"  value="<?php echo $r['nombre']; ?>" size="35" maxlength="30"  readonly="readonly"/></td>



      </tr>
      <tr>
        <td class="ddd"><label>Apellidos </label></td>

<td height="40"><input name="txtape" type="text"  value="<?php echo $r['apellidos']; ?>" size="35" maxlength="70" readonly="readonly" /></td>




      </tr>





<tr>
        <td  class="ddd">Institucion</td>
        <td height="40">    
 

<input type="text" name="txtinst"  value="<?php echo $r['institucion']; ?>" size="35" maxlength="254" readonly="readonly"/>
</label></td>
      </tr>
	  




<tr>
        <td  class="ddd">Email</td>




<td height="40"><input name="txtmail" type="text"  value="<?php echo $r['email']; ?>" size="35" maxlength="254" readonly="readonly" /></td>
      </tr>
      
      
   
      
      
<tr>
 <td  class="ddd">
    <label>Telefono</label></td>
<td height="40"><input name="txttel" type="text"  value="<?php echo $r['telefono']; ?>" size="35" maxlength="70" readonly="readonly" /></td>
     </tr>


<tr>
 <td  class="ddd">
    <label>Nombre de usuario</label></td>
<td height="40"><input name="txtusu" type="text"  value="<?php echo $r['login']; ?>" size="35" maxlength="12"  readonly="readonly" /></td>
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
     
      
    </table>
  
           <input type="submit" name="action" id="button" value="Guardar" />
            
          <input type="reset" name="button2" id="button2" value="Limpiar" />
        </p>
     
    </form>
     
                   <div class="ddd"> </div>     
            
            <?php
			function mes($mes){
if ($mes=="01") $mes="Enero";
if ($mes=="02") $mes="Febrero";
if ($mes=="03") $mes="Marzo";
if ($mes=="04") $mes="Abril";
if ($mes=="05") $mes="Mayo";
if ($mes=="06") $mes="Junio";
if ($mes=="07") $mes="Julio";
if ($mes=="08") $mes="Agosto";
if ($mes=="09") $mes="Septiembre";
if ($mes=="10") $mes="Octubre";
if ($mes=="11") $mes="Noviembre";
if ($mes=="12") $mes="Diciembre";
 return $mes;
}






		
	
		
		
		
	

   $otro=@mysql_query("select * from asistentes inner join expediente on asistentes.matricula=expediente.matricula where expediente.matricula=".$p_usuario." and asistentes.activo=1");	
    $rr=mysql_fetch_array($otro);
	
 $nom_mes=mes(substr($rr['fecha'],5,2));

echo ' </div><table border="1" bordercolor="gray" width="auto"  align="center"  class="ddd"cellpadding="8" cellspacing="2" bordercolor="#ccc" bgcolor="#CCCCCC" >
  <tr >
    <td colspan="5"><div align="center"> </div>    <div align="center">Registrado a los Cursos:</div></td>
  </tr>
  <tr bgcolor="#33CC00">
    <td >Hora </td>
    <td >Fecha</td>
    <td >Curso</td>
	 <td >Coordinador</td>
    <td>Lugar</td>
  </tr>
 
  ';
  
$otro=@mysql_query("select * from asistentes inner join expediente on asistentes.matricula=expediente.matricula where expediente.matricula=".$p_usuario." and asistentes.activo=1");	
   while ($roww=mysql_fetch_array($otro))
			  
		  {
		$desp=@mysql_query("select * from taller where id_taller=".$roww['id_taller']."");
		$despp = @mysql_fetch_array($desp); 
		 
		if ($despp['nombre']!=""){
		 echo ' <tr bgcolor="#CCCCCC" >';
    echo '<td >'.$despp['hora'].'</td>';
    echo ' <td >'.$despp['fecha'].'</td>';
    echo ' <td >'.$despp['nombre'].'</td>';
	 echo ' <td >'.$despp['coordinador'].'</td>';
    echo ' <td >'.$despp['lugar'].'</td>';
		}
	
	 }
	 
	 
	echo '
  </tr>
  
</table>';

			?>
         
			
            
      
    </div>
 
    
    
    
  
<?php }else{
	
	header("Location: denegado.php");
	}?>
