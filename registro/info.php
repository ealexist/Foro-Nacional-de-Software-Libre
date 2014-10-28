<?php session_start();
session_cache_limiter('nocache,private');

//include("out.php");

$p_usuario=$_SESSION['p_usu'];
 $p_nombre=$_SESSION['p_nom'];
 $p_tipo=$_SESSION['p_tipo'];
 
 
 
if ($p_usuario!="" and $p_nombre!="" and $p_tipo=="asis"  )
{?>


<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<link rel="stylesheet" href="images/style000.css" type="text/css" media="screen">
<div align="center" style="margin: 0 auto; text-align: center; max-width:460px; height:auto;">
		<h2  align="center"><span></span>Información General</h2>
    
     
	
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
   <?php include("menu.php"); ?>
    </tr>
</table>
   
 
  <div class="ddd">
          <?php
 echo "Bienvenido:"." ".$_SESSION['p_nom'];

 
	?></div>
  
   
   <div class="ddd" align="center"> 
   Noticias
  
    <br/>
 

 
  <br />
<div align="center"> Foro Nacional De Software Libre</div>
<iframe src="esc_verano14.pdf" style="width:500px; height:475px;" frameborder="0"></iframe>
		<table align="center"  border="0">
		
<tr>
    <td align="center" colspan="2"></td>
  </tr>		
  <tr>
    <td align="center" colspan="2"></td>
  </tr>
</table>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
          
             
        
    
    </div>
    <br />
    
    
    
  



</div>
<?php }else{
	
header("Location: denegado.php");
	}?>
