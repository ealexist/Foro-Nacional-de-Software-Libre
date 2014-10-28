<?php session_start();
session_cache_limiter('nocache,private');

$p_usuario=$_SESSION['p_usu'];
 $p_nombre=$_SESSION['p_nom'];
 $p_tipo=$_SESSION['p_tipo'];
 
 
 
if ($p_usuario!="" and $p_nombre!="" and $p_tipo=="asis"  )
{

	include("classes/conecta.php");
	
$link=conectarse();
 $q=$_GET["q"];
 
 
$qi=mysql_query("select * from taller where id_taller=".$q); 
 $r=mysql_fetch_array($qi);

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



$nom_mes=mes(substr($r['fecha'],5,2));


 
//$a1="*Es recomendable que los asistentes cuenten con computadora portátil";
$a2="*El cupo es limitado por lo que es importante su registro lo antes posible.";
//$a3="*El pago se realizará en el lugar.";
//$b1="Área de Ciencias de la Salud";
//$b2="Campus UAZ Siglo XXI";
$sp="</br>";
//$ab1="* Antes del dia 04 de Mayo del 2012 el costo de cada taller es de $250, a partir del 05 mayo 2012 el costo de cada taller sera $350 ";

$ab1="* Para efectos de los talleres, se solicita a los participantes traer su propio equipo de cómputo, así como memorias
y alguna extensión para la toma de corriente.";

echo '<table border="1" bordercolor="gray" width="auto"  align="center"  class="ddd"cellpadding="8" cellspacing="2" bordercolor="#ccc" bgcolor="#CCCCCC" >
  <tr >
    <td colspan="5"><div align="center"> </div>    <div align="center">Instituto Tecnológico de Toluca</div> </td>
  </tr>
  <tr bgcolor="#33CC00">
    <td >Hora </td>
	<td >Fecha </td>
    <td >Curso</td>
    <td >Coordinador</td>
    <td>Lugar</td>
	
  </tr>
  <tr>
    <td >'.$r['hora'].'</td>
	 <td >'.$r['fecha'].'</td>
    <td >'.$r['nombre'].'</td>
    <td >'.$r['coordinador'].'</td>
    <td >'.$r['lugar'].'</td>
	
  </tr>
  <tr>
  <td colspan="5"></td>
  </tr>
  <tr>
  <td colspan="5"></td>
  </tr>
  <tr>
  <td colspan="5"></td>
  </tr>
  <tr>
  <td colspan="5"> <div align="left">
  '.$a1.'</div> 
  </td>
  </tr>
  <tr>
  <td colspan="5"> 
  <div align="left">
  '.$a2.'<br>'.$a3.'</div> 
  </td>
  </tr>
  <tr>
  <td colspan="5"> 
  <div align="left">
  '.$ab1.'</div> 
  </td>
  </tr>
</table>';


 


 
 }else
{
	header("Location: denegado.php");
}
 ?>
