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
		
if ($_POST['action'] == "Inscribir") {
   		
				
		$nn=$d->vertaller($_POST['cbo_taller'],$p_usuario);
		
		if ($nn==0){
			
		
$re=$d->guardartaller($_POST['cbo_taller'],$p_usuario) ;

if ($re==1){
	echo '<BODY onLoad="javascript:msg3()">';
		}
		if ($re==0){
	echo '<BODY onLoad="javascript:msg1()">';
		}
	}else{echo '<BODY onLoad="javascript:msg()">'; }
        
  
	
	}



			
				
				
				
				?>



<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<link rel="stylesheet" href="images/style000.css" type="text/css" media="screen">

   
<script type="text/javascript">
 function showtaller(str)
 {
 if (str=="")
   {
   document.getElementById("txtHint").innerHTML="";
   return;
   } 
 if (window.XMLHttpRequest)
   {// code for IE7+, Firefox, Chrome, Opera, Safari
   xmlhttp=new XMLHttpRequest();
   }
 else
   {// code for IE6, IE5
   xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
   }
 xmlhttp.onreadystatechange=function()
   {
   if (xmlhttp.readyState==4 && xmlhttp.status==200)
     {
     document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
     }
   }
 xmlhttp.open("GET","tal.php?q="+str,true);
 xmlhttp.send();
 }
 </script>


    <script type="text/javascript">
<!--





function msg(){
 alert('Ya estas pre-registrado o No puedes tomar otro Curso a la misa hora y dia')   

}
function msg1(){
 alert('No hay Cupo en el Curso')   

}


function msg3(){
 alert('Pre-registrado Correctamente')   
window.location="asistente.php"; 

}


function validacion(formulario) {
	
		
			
			
		
		
			if(frmact.cbo_taller.value=="") {    
    		    alert('Selecciona un Curso.')   
      		  return false   
    		}  
		
		
						
   
	
	
	
    	return true            //cambiar por return true para ejecutar la accion del formulario   
}   


//-->
</script>
<div align="center" style="margin: 0 auto; text-align: center; max-width:460px; height:auto;">
		<h2 align="center"><span></span>Información General</h2>
    
     
	
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
   <?php include("menu.php"); ?>
  
</table>
    
   
  

  
  <br>
   
 <div class="ddd"> Pre-registro </div>	
 <br/>
    <table width="70%" align="center">
      <tr>
        <td  class="ddd">Nombre</td>

<td  height="40"><input name="txtnom" type="text"  value="<?php echo $r['nombre']; ?>" size="35" maxlength="30" /></td>



      </tr>
      <tr>
        <td class="ddd"><label>Apellidos </label></td>

<td height="40"><input name="txtape" type="text"  value="<?php echo $r['apellidos']; ?>" size="35" maxlength="70" /></td>




      </tr>





<tr>
        <td  class="ddd">Institucion</td>
        <td height="40">    
 

<input type="text" name="txtinst"  size="35"  value="<?php echo $r['institucion']; ?>"  maxlength="254"/>
</label></td>
      </tr>
	  




<tr>
        <td  class="ddd">Email</td>




<td height="40"><input name="txtmail" type="text"  value="<?php echo $r['email']; ?>" size="35" maxlength="254" /></td>
      </tr>
      
   
     
    
        
      
    </table>
    <form id="frmact" name="frmact" method="post" action="" onsubmit="return validacion(this)">
       

   <div class="ddd"> Selecciona el Curso: </div>	
        <br/>
       

            </div>
              <div class="ddd"><?php 
 	  //include ("conecta.php");
				//	$link=conectarse();
					$qi=mysql_query("select * from taller order by taller.id_taller  asc"); ?>
           <select name="cbo_taller" id="cbo_taller" onChange="showtaller(this.value)">
          <option selected="selected"></option>
           
          <?php 
	
            while ($r=mysql_fetch_array($qi))
			  {echo"<option value='".$r['id_taller']."'>".$r['nombre']."</option>";}
		 
          ?>
          </select>
        </label>
        <div id="txtHint"></div>
        
     	   <input type="submit" name="action" id="button" value="Inscribir" /> 
    
        </form>
    </div>	
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
   
    echo'      <br>		
<table border="0" cellpadding="3" width="800px"  align="center"  cellspacing="2" bordercolor="#ccc" bgcolor="#CCCCCC" >
 <tr >
    <td colspan="4">   <div align="center" class="ddd">Cursos:</div></td><br>
  </tr>
  <tr bgcolor="#CCCCCC"  class="c">
    <td align="center"><strong>Curso</strong></td>
  
    <td><strong>Coordinador</strong></td>
	 <td><strong>Hora</strong></td>
	<td><strong>Fecha</strong></td>
	   <td ><strong>Lugar</strong></td>
	   
	   
	
	
	
  </tr> 
   ';
   $resultados = mysql_query("SELECT * from taller order by taller.id_taller asc");
while($row=mysql_fetch_array($resultados)) {?>

<tr bgcolor="#f3f3f3" onmouseover='this.bgColor="#97B030"' onmouseout='this.bgColor="#f3f3f3"' 

<?php


  
printf("<tr class='dd'><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td align='right'>%s</td>


</tr>",$row["nombre"],$row["coordinador"],$row["hora"],$row["fecha"],$row["lugar"]);
}
mysql_free_result($resultados);
echo '</table>';
 ?>
 <br />
 <table align="center"  border="0">

<tr>
    <td align="center" colspan="2"> 
</td>
  </tr>		
  
  
</table>
   
   
<!-- This document saved from http://cisol.org.mx/ -->
<?php }else{
	
	header("Location: denegado.php");
	}?>
