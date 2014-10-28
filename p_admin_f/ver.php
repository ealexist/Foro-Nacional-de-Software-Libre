<?php session_start();
session_cache_limiter('nocache,private');

//include("out.php");

$p_usuario=$_SESSION['p_usua'];
 $p_nombre=$_SESSION['p_noma'];
 $p_tipo=$_SESSION['p_tipoa'];
 
 
 
if ($p_usuario!="" and $p_nombre!="" and $p_tipo=="pagoss"  )
{
	function fechanueva($fechavieja){
	if ($fechavieja!="0000-00-00"){
		
    list($a,$m,$d)=explode("-",$fechavieja);
    return $d."/".$m."/".$a;
	}else{
		return "No hay";
		}}
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" SYSTEM "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es-ES" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml">


<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<head>
<link rel="shortcut icon" href="images/cisol000.png" type="image/x-icon">

<title>Administracion</title>
<meta name="generator" content="WordPress 3.0">
<meta name="robots" content="follow, all">
<link rel="stylesheet" href="images/style000.css" type="text/css" media="screen">
<link rel="alternate" type="application/rss+xml" title="%s Feed RSS CISOL" href="http://cisol.org.mx/feed/">
<link rel="pingback" href="http://www.cisol.org.mx/xmlrpc.php">
<!--[if IE]><link rel="stylesheet" href="http://www.cisol.org.mx/wp-content/themes/eos/ie.css" type="text/css" media="screen" /><![endif]-->
<!--[if lte IE 6]><link rel="stylesheet" href="http://www.cisol.org.mx/wp-content/themes/eos/ie6.css" type="text/css" media="screen" /><![endif]-->
<script type="text/javascript" src="images/default0.js"></script>

	<link rel="stylesheet" href="images/dcssb000.css" type="text/css" media="screen">
	<!--Facebook OpenGraph Slick Social Share Buttons -->
	<meta property="og:site_name" content="CISOL">
		<meta property="og:title" content="CISOL">
		<meta property="og:url" content="http://www.cisol.org.mx">
		
		<meta property="og:image" content>
		<meta property="fb:admins" content>
		<meta property="fb:app_id" content>
		<meta property="og:type" content="blog"><!--End Facebook OpenGraph Settings -->
		<link rel="stylesheet" id="smooth_slider_headcss-css" href="images/style001.css" type="text/css" media="all">
<script type="text/javascript" src="images/jquery00.js"></script>
<script type="text/javascript" src="images/jquery01.js"></script>
<script type="text/javascript" src="images/jquery02.js"></script>
<script type="text/javascript" src="images/jquery03.js"></script>
<script type="text/javascript" src="images/moderniz.js"></script>
<script type="text/javascript" src="images/jquery04.js"></script>
<script type="text/javascript" src="images/comment-.js"></script>
<script type="text/javascript" src="images/ga000000.js"></script>
<script type="text/javascript" src="images/jquery05.js"></script>
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="http://www.cisol.org.mx/xmlrpc.php?rsd">
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="http://www.cisol.org.mx/wp-includes/wlwmanifest.xml"> 
<link rel="index" title="CISOL" href="http://cisol.org.mx/">
<link rel="prev" title="Index" href="http://cisol.org.mx/acerca-de/">
<link rel="next" title="Blog" href="http://cisol.org.mx/blog/">
<meta name="generator" content="WordPress 3.0">
<link rel="canonical" href="http://cisol.org.mx/">

<script type="text/javascript">

function index(b){
window.location="ver.php?mt="+b; 

}


function validacion(frmreg) {
	var er_string = /^([a-z]|[A-Z]|[0-9]|@|,|"|á|é|í|ó|ú|ñ|ü|\s|\.|-)+$/    
			

 var t1=frmreg.radio[0].checked
	  var tt1=frmreg.radio[1].checked
	  if (t1==false && tt1==false){
	  alert('Seleccione El Tipo de Cuota, Participación en el CISOL o Participación a un Taller.');
	   return false   
	  }			
	
		if(frmreg.radio[1].checked==true && frmreg.cbo_talle.value=="") {    
    		    alert('Seleccione un Taller')   
      		  return false   
    		} 	
		
			if(frmreg.cbo_pago.value=="") {    
    		    alert('Seleccione la Forma de Pago')   
      		  return false   
    		} 	


	if(frmreg.cbo_pago.value=="Deposito" && frmreg.txtfolio.value=="" ) {    
    		    alert('Ingresa el folio del Deposito')   
      		  return false   
    		} 	
			if(frmreg.txtcosto.value=="") {    
    		    alert('Ingresa el Costo de Cobro.')   
      		  return false   
    		} 	
		
	
    	return true            //cambiar por return true para ejecutar la accion del formulario   
}   


//-->
</script>
<!-- Dynamic Content Gallery plugin version 3.3.5 www.studiograsshopper.ch  Begin jQuery smoothSlideshow scripts -->
<style type="text/css">
#dfcg-slideshow {
	color:#fff;
	list-style:none;
	}
	
#dfcg-slideshow span {
	display:none;
	}

#dfcg-wrapper {
	display:none;
	margin:0px;
	}
	
#dfcg-wrapper * {
	margin:0;
	padding:0;
	/*overflow:hidden;Added AW */
	}
	
#dfcg-fullsize {
	background:#000000;
	border:0px solid #000000;
	height:290px;
	overflow: hidden;
	padding:0px;
	position:relative;
	z-index:1;/* Fix added in v3.3.3 */
	width:550px;
	}
	
#dfcg-text {
	background-color:#000000 !important;
	bottom:0;
	filter:alpha(opacity=70);
	height:0px;
	opacity:.7;
	overflow:hidden;
	padding-bottom:1px;/* Fix added in v3.3.3 - was 5px */
	position:absolute;
	width:550px;
	z-index:200;
	}

#dfcg-text h3 {
	color:#FFFFFF !important;
	margin:2px 5px !important;
	padding:0px 0px !important;
	font-size:12px !important;
	font-weight:bold !important;
	}

#dfcg-text p {
	color:#FFFFFF !important;
	font-size: 11px !important;
	line-height:14px !important;
	margin:2px 5px !important;
	padding:0px 0px !important;
	}
	
#dfcg-text p a, #dfcg-text p a:link, #dfcg-text p a:visited {
	color: #FFFFFF !important;
	font-weight:normal !important;
	}

#dfcg-text p a:hover {
	color: #FFFFFF !important;
	font-weight:bold !important;
	}
	
#dfcg-image img {
	position:absolute;
	z-index:25;
	width:auto;
	/*height:px;/* Added AAW - not sure */
	}

.dfcg-imgnav {
	position:absolute;
	width:25%;
	height:290px;
	cursor:pointer;
	z-index:150;
	}

#dfcg-imgprev {
	left:0;
	background:url(Inicio\ -\ CISOL_files/fleche10.png) left center no-repeat;
	}
	
#dfcg-imgnext {
	right:0;
	background:url(Inicio\ -\ CISOL_files/fleche20.png) right center no-repeat;
	}
	
#dfcg-imglink {
	position:absolute;
	width:100%;
	z-index:100;
	opacity:.01;/* changed v3.3.3 */
	filter:alpha(opacity=1);/* changed v3.3.3 */
	background:#fff;/* added v3.3.3 */
	}
	
.linkhover {
	background:url(http://cisol.org.mx/images/link.gif) center center no-repeat;
	}
	
#dfcg-thumbnails {
	position: absolute;
	top: -110px;
	left: 0;
	z-index: 999;
	height: 130px;
	}

#slideleft {
	float:left;
	width:20px;
	height:81px;
	background:url(http://cisol.org.mx/images/scroll-left.gif) center center no-repeat;
	background-color:#222;
	}
	
#slideleft:hover {
	background-color:#333;
	}
	
#slideright {float:right;
	width:20px;
	height:81px;
	background:#222 url(http://cisol.org.mx/images/scroll-right.gif) center center no-repeat;
	}
	
#slideright:hover {
	background-color:#333;
	}
	
#dfcg-slidearea {
	float:left;
	position:relative;
	width:550px;
	height:81px;
	overflow:hidden;
	padding-top: 6px;
	}
	
#dfcg-slider {
	position:absolute;
	left:0;
	height:81px;
	}
	
#dfcg-slider img {
	cursor:pointer;
	border:1px solid #fff;
	padding:0px;
	height: 75px;
	}
	
#dfcg-thumbnails .dfcg-carouselBtn {
    position: absolute;
    bottom: -3px;
    right: 20px;
    display: block;
    color: #fff;
    cursor: pointer;
    font-size: 13px;
    padding: 0px 8px 3px;
	}

.dfcg-carouselBtn, .dfcg-sliderContainer {
    background: #000;
    opacity: 0.9;
    filter: alpha(opacity=90);
	}

#dfcg-thumbnails .dfcg-sliderContainer {
    height: 110px;
    position: relative;
    width: 550px;
    padding: 0 5px;
	}
	
#dfcg-sliderInfo {
    color: #fff;
    bottom: 5px;
    position: absolute;
    padding-left: 5px;
	}
</style>
<!-- End of Dynamic Content Gallery plugin scripts -->

	<link rel="stylesheet" type="text/css" href="images/dcjq-meg.css" media="screen"><style type="text/css" media="screen">.jcarousel-skin-default .jcarousel-clip-horizontal {padding:0px 0px 0px 0px;width:260px;}.smooth_slider{width:250px;height:190px;background-color:#ffffff;border:1px solid #999999;padding:0 5px 0 10px;}.sldr_title{font-family:Georgia, Arial, Helvetica, sans-serif;font-size:20px;font-weight:bold;font-style:normal;color:#000000;}.smooth_slider .jcarousel-item{width:250px;height:160px;}.smooth_slider h2{clear:none;line-height:17px;font-family:Trebuchet MS, Arial, Helvetica, sans-serif;font-size:14px;font-weight:bold;font-style:normal;color:#000000;margin:0px 0 5px 0 !important;}.smooth_slider h2 a{color:#000000;}.smooth_slider span{font-family:Verdana, Arial, Helvetica, sans-serif;font-size:12px;font-weight:normal;font-style:normal;color:#333333;}.smooth_slider_thumbnail{float:left;margin:0px 5px 0 0px;max-height:120px;border:1px solid #000000;}.smooth_slider .smooth_slideri div{margin-right:20px}.smooth_slider p.more a{color:#000000;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:12px;}.jcarousel-control a{border:1px solid #333333;font-size:12px;font-family:Verdana, Arial, Helvetica, sans-serif;}.jcarousel-control a{color:#000000 !important;}.sldrlink{padding-right:0px;}.sldrlink a{color:#333333 !important;}</style>

	<link rel="stylesheet" href="images/skin0000.css" type="text/css" media="screen">
    
   


   
</head>

<body>

<a id="skipToContent" href="http://cisol.org.mx/#content">Saltar al contenido</a>
<div class="PageContainer">

<div class="Header">
<div class="HeaderMenu" id="HeaderMenu">
  
	<span class="clear"></span>
</div>

<div class="HeaderSubArea">
	<!--<h1><a href="http://cisol.org.mx">CISOL</a></h1>
	<span></span>-->
    <div id="organizadores" style="padding:10px 350px;">
    	<img src="images/footer_0.png" width="160" height="70">
        <img src="images/footer_1.png" width="90" height="70">
    </div>
</div> 
<!-- Closes .HeaderSubArea -->

</div> <!-- Closes .Header -->

<div id="contentWrapper">
	<div id="contentArea">
				<div class="headerBar"></div>
		

<div class="post" id="post-6">
	<div class="postHeader">
		<h2 class="postTitle" align="center"><span></span>Informacion General</h2>
    
     
	</div>
    <div class="postFooter">
    		</div>
    <div class="postContent">
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>
    <td  class="ddd">|<a href="pagos.php">Pagos</a> | <a href="script.php"> Cerrar Sesion</a>|</td>
    </tr>
</table>
    <div class="postFooter">
    
		</div>
 
  <div class="ddd">
          <?php
 


 include("classes/c_asistentes.php");
	
	$d = new asistente;
				

	if($_GET['dl']!=""){
				$d->baja($_GET['dl']);
						echo '<BODY onLoad="javascript:index()">'; 	
				}
	
if ($_POST['action'] == "Guardar") {
   		
		
			if ($_POST['cbo_talle']!="" and $_POST['txtfolio']!="" ){
				$d->guardar_pago($_POST['txtmt'],$_POST['radio'],$_POST['cbo_talle'],  $_POST['cbo_pago'],$_POST['txtfolio'],$_POST['txtcosto']);
			///	echo '<BODY onLoad="javascript:index('.$_POST['txtmt'].')">';
				}
			if ($_POST['cbo_talle']!="" and $_POST['txtfolio']=="" ){
				$d->guardar_pago1($_POST['txtmt'],$_POST['radio'],$_POST['cbo_talle'], $_POST['cbo_pago'],$_POST['txtcosto']);
			//	echo '<BODY onLoad="javascript:index('.$_POST['txtmt'].')">';
				}
			if ($_POST['cbo_talle']=="" and $_POST['txtfolio']=="" ){
				$d->guardar_pago2($_POST['txtmt'],$_POST['radio'], $_POST['cbo_pago'],$_POST['txtcosto']);
				//echo '<BODY onLoad="javascript:index('.$_POST['txtmt'].')">';
				}
				
				if ($_POST['cbo_talle']=="" and $_POST['txtfolio']!="" ){
				$d->guardar_pago3($_POST['txtmt'],$_POST['radio'], $_POST['cbo_pago'],$_POST['txtfolio'],$_POST['txtcosto']);
				//echo '<BODY onLoad="javascript:index('.$_POST['txtmt'].')">';
				}
		
echo '<BODY onLoad="javascript:index('.$_POST['txtmt'].')">';





		}
        
    
			
				
				
				
				
 if ($_GET['mt']!=""){
	 $m=$_GET['mt'];
	 
	 $r=$d->abrir_mat($m);
	 
	
}



 
	?></div>
  
   
 <div class="ddd" align="center"> 
 <div align="center">Asistente</div>
 <table width="70%" align="center">
 
 <tr>
        <td  class="ddd">Matricula</td>
<td  height="40"><input name="txtmt" type="text"  value="<?php echo $r['matricula']; ?>" size="35" maxlength="30"  readonly="readonly"/></td>
     </tr>
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
<td height="40"><input name="txttel" type="text"  value=<?php echo $r['telefono']; ?> size="35" maxlength="70" readonly="readonly" /></td>
     </tr>
     
      <td  class="ddd">
    <label>Fecha de Registro</label></td>
<td height="40"><input name="txttel" type="text"  value=<?php echo fechanueva($r['fecha']); ?> size="35" maxlength="70" readonly="readonly" /></td>
     </tr>
      </table>
      <div class="postFooter">
    		</div>
            
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

	
	

   $otro=@mysql_query("select * from asistentes inner join expediente on asistentes.matricula=expediente.matricula where expediente.matricula=".$m." and asistentes.activo=1");	
    $rr=mysql_fetch_array($otro);
	
 $nom_mes=mes(substr($rr['fecha'],5,2));

echo '<table border="0"  class="ddd"cellpadding="8" cellspacing="2" bordercolor="#ccc" bgcolor="#CCCCCC" >
  <tr >
    <td colspan="4"><div align="center"> <div align="center">Talleres</div></td>
  </tr>
  <tr bgcolor="#33CC00">
    <td >Hora </td>
    <td >Nombre del Taller</td>
    <td >Coordinador</td>
    <td>Lugar</td>
	  <td>Fecha Ins.</td>
  </tr>
 
  ';
$otro=@mysql_query("select * from asistentes inner join expediente on asistentes.matricula=expediente.matricula where expediente.matricula=".$m." and asistentes.activo=1");	
   while ($roww=mysql_fetch_array($otro))
			  
		  {
		$desp=@mysql_query("select * from taller where id_taller=".$roww['id_taller']."");
		$despp = @mysql_fetch_array($desp); 
		 
		 echo ' <tr bgcolor="#CCCCCC" >';
    echo '<td >'.$despp['fecha']." ".$despp['hora'].'</td>';
    echo ' <td >'.$despp['nombre'].'</td>';
    echo ' <td >'.$despp['coordinador'].'</td>';
    echo ' <td >'.$despp['lugar'].'</td>';
	 echo ' <td >'.fechanueva(substr($roww['fecha_ins'],0,10)).'</td>';
	 }
	 
	 
	echo '
  </tr>
  <tr>
  <td colspan="4"></td>
  </tr>
  <tr>
  <td colspan="4"></td>
  </tr>
  <tr>
  <td colspan="4"></td>
  </tr>
  <tr>
  <td colspan="4"> <div align="left">
  '.$a1.'</div> 
  </td>
  </tr>
  <tr>
  <td colspan="4"> 
  <div align="left">
  '.$a2.'</div> 
  </td>
  </tr>
  <tr>
  <td colspan="4"> 
  <div align="left">
  '.$ab1.'</div> 
  </td>
  </tr>
</table>';

			?>       
            
               
            <div class="postFooter">
    
		</div>
   <?php 	
 

echo '<table border="0"  class="ddd"cellpadding="8" cellspacing="2" bordercolor="#ccc" bgcolor="#CCCCCC" >
  <tr >
    <td colspan="4"><div align="center"> <div align="center">Pagos</div></td>
  </tr>
  <tr bgcolor="#33CC00">
    <td >Pago </td>
    <td >Forma de Pago</td>
    <td >Costo</td>
    <td>Folio</td>
	  <td>Fecha</td>
	    <td>Recibo</td>
  </tr>
 
  ';
$otro=@mysql_query("select * from pagos where matricula=".$m);	
   while ($roww=mysql_fetch_array($otro))
			  
		  {
		$desp=@mysql_query("select * from taller where id_taller=".$roww['id_taller']."");
		$despp = @mysql_fetch_array($desp); 
		 
		 echo ' <tr bgcolor="#CCCCCC" >';
    echo '<td >'.$roww['pago']." ".$despp['nombre']." ".$despp['fecha']." ".$despp['hora'].'</td>';
    echo ' <td >'.$roww['forma_pago'].'</td>';
    echo ' <td >'.$roww['costo'].'</td>';
    echo ' <td >'.$roww['folio'].'</td>';
	 echo ' <td >'.fechanueva(substr($roww['fecha'],0,10)).'</td>';
	 echo '<td><a href="recibo.php?fl='.$roww['id_pago'].'"  target="_blank">Recibo</a></td>';
	 }
	 
	 
	echo '
  </tr>
  <tr>
  <td colspan="4"></td>
  </tr>
  <tr>
  <td colspan="4"></td>
  </tr>
  <tr>
  <td colspan="4"></td>
  </tr>
  <tr>
  <td colspan="4"> <div align="left">
  '.$a1.'</div> 
  </td>
  </tr>
  <tr>
  <td colspan="4"> 
  <div align="left">
  '.$a2.'</div> 
  </td>
  </tr>
  <tr>
  <td colspan="4"> 
  <div align="left">
  '.$ab1.'</div> 
  </td>
  </tr>
</table>';

			?> 
            <div class="postFooter">
    
		</div>
 
   
   <div align="center"> 
   <div align="center">Cuotas de recuperación</div>
   <form   method="post" name="frmreg"  onsubmit="return validacion(this)">
  

  
  <br>
   
    <p><label></label>
      <label></label>
      <label></label></p>
    <table width="70%" align="center">
      <tr>
        <table class="ddd" width="100%" border="0">
        <input name="txtmt" type="hidden"  value="<?php echo $r['matricula']; ?>"
  <tr>
    <td >
      <input type="radio" name="radio" id="radio" value="Participación en el CISOL" />
      <label for="radio">Participación en el CISOL</label>
   </td>
    <td >
      <input type="radio" name="radio" id="radio" value="Taller" />
      <label for="radio2">Participación a un Taller</label>
    </td>
  </tr>
  
   <tr>
    <td >
               
   </td>
    <td >
                       
    </td>
  </tr>
  <tr>
    <td>Taller:</td>
    <td>
     <select class="dd" name="cbo_talle" id="cbo_talle">
          <?php
		
          echo '<option selected="selected"></option>';
					
						
					$tip=$d->abrir_tal();	
				
	
            while ($r=mysql_fetch_array($tip))
			
		  {echo"<option value='".$r['id_taller']."'>".$r['nombre']."</option>";}
				
		
          ?>
          </select>
   </td>
  </tr>
  <tr>
    <td>Forma de Pago:</td>
    <td><select name="cbo_pago" id="cbo_pago">
    <option selected="selected"></option>
    <option value="Deposito">Deposito</option>
    <option value="Efectivo">Efectivo</option>
    <option value="Beca">Beca</option>
    <option value="Cortesia">Cortesia</option>
    
    </select></td>
  </tr>
  <tr>
    <td>Folio:(Deposito)</td>
    <td><label for="textfield"></label>
      <input type="text" name="txtfolio" id="txtfolio" /></td>
  </tr>
  <tr>
    <td>Costo:</td>
    <td> <input type="text" name="txtcosto" id="txtcosto" /></td>
  </tr>
</table>



      </tr>
     
     
      
    </table>
  
           <input type="submit" name="action" id="button" value="Guardar" />
            
          <input type="reset" name="button2" id="button2" value="Limpiar" />
        </p>
     
    </form>
             
            <div class="postFooter">
    		</div>
    
    </div>
    <br />
    
    
    
   
   
    </div>
    
	
	<div class="postLinkPages"></div>
	
</div>

<div id="comments">
	<div class="commentHeader">
			<h4></h4>
</div>
			<!--<p class="nocomments"></p>-->
	</div>




</div>
	





</div>

<div class="Footer"></div><!-- Closes .Footer -->

</div><!-- Closes .PageContainer -->

<!-- Dynamic Content Gallery plugin version 3.3.5 www.studiograsshopper.ch  Add jQuery smoothSlideshow scripts -->
<script type="text/javascript" src="images/dfcg-jq-.js"></script>
<script type="text/javascript">
			jQuery("#dfcg-slideshow").smoothSlideshow("#dfcg-wrapper", {
				showArrows: true,
				showCarousel: true,
				showInfopane: true,
				timed: true,
				delay: 9000,
				thumbScrollSpeed:4,
				preloader: true,
				preloaderImage: true,
				preloaderErrorImage: true,
				elementSelector: "li",
				imgContainer:"#dfcg-image",
				imgPrevBtn:"#dfcg-imgprev",
				imgNextBtn:"#dfcg-imgnext",
				imgLinkBtn:"#dfcg-imglink",
				titleSelector: "h3",
				subtitleSelector: "p",
				linkSelector: "a",
				imageSelector: "img.full",
				thumbnailSelector: "a img",
				carouselContainerSelector: "#dfcg-thumbnails",
				thumbnailContainerSelector: "#dfcg-slider",
				thumbnailInfoSelector: "#dfcg-sliderInfo",
				carouselSlideDownSelector: "#dfcg-openGallery",
				carouselSlideDownSpeed: 500,
				infoContainerSelector:"#dfcg-text",
				borderActive:"#fff",
				slideInfoZoneOpacity: 0.7,
				carouselOpacity: 0.3,
				thumbSpacing: 5,
				slideInfoZoneStatic: true
			});
		</script>
<!-- End of Dynamic Content Gallery plugin scripts -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-0000000-0");
pageTracker._trackPageview();
} catch(err) {}</script><script type="text/javascript">_ga.trackFacebook();</script>
			<script type="text/javascript">
				jQuery(window).load(function() {

								
					jQuery('#dc-dcssb').dcSocialSlick({
						idWrapper : 'dcssb-slick',
						location: 'top',
						align: 'left',
						offset: '20px',
						speed: 600,
						tabText: '<img src="http://www.cisol.org.mx/wp-content/plugins/slick-social-share-buttons/css/images/tab_top_vertical.png" alt="Share" />',
						autoClose: false,
						loadOpen: true,
						classWrapper: 'dc-social-slick vertical',
						classOpen: 'dcssb-open',
						classClose: 'dcssb-close',
						classToggle: 'dcssb-link'
						
					});
					
								});
			</script>
		
						<script type="text/javascript">
				jQuery(document).ready(function($) {
					jQuery('#dc_jqmegamenu_widget-5-item .menu').dcMegaMenu({
						rowItems: 4,
						subMenuWidth: "111px",//'',
						speed: 'slow',
						effect: 'slide',
						event: 'click',
											});
				});
			</script>
		
			
<footer>
  <div id="patrocinadores">
      <ul>
            	<!--<li><span>Nuestros Patrocinadores: </span></li>-->
                <!--</h1><li><img src="http://localhost/CISOL/imgs/EYYYY/footer_0006_cisco.png" width="90" height="50" /></li>-->
                <li><img src="images/footer_2.png" width="90" height="50"></li>
                <li><img src="images/footer_3.png" width="60" height="60"></li>
                <li><img src="images/footer_4.png" width="90" height="60"></li>
                <!--<li><img src="http://cisol.org.mx/imgs/EYYYY/footer_0001_uaz.png" width="90" height="70" /></li>-->
                <li><img src="images/footer_5.png" width="100" height="70"></li>
                <!--<li><img src="http://cisol.org.mx/imgs/EYYYY/footer_0003_gobierno.png" width="160" height="70" /></li>-->
    </ul>
  </div>
</footer>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-28906502-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
<!-- This document saved from http://cisol.org.mx/ -->
<?php }else{
	
	header("Location: denegado.php");
	}?>
