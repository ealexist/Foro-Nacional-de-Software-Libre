<?php session_start();
session_cache_limiter('nocache,private');

//include("out.php");

$p_usuario=$_SESSION['p_usua'];
 $p_nombre=$_SESSION['p_noma'];
 $p_tipo=$_SESSION['p_tipoa'];
 
 
 
if ($p_usuario!="" and $p_nombre!="" and $p_tipo=="pagoss"  )
{
	
if(!($link=@mysql_connect("mysql51-094.wc1.ord1.stabletransit.com","633795_r3g1_f5n1","fn51_R3.gi12*30")))
{
echo "error conectando a la base de datos.";
exit();
}
if (!@mysql_select_db("633795_fnsl_reg001",$link)) //nombre de la base de datos ---

{
echo "error seleccionando la base de datos.";
exit();
}

function fechanueva($fechavieja){
	
	if ($fechavieja!="0000-00-00"){
		
    list($a,$m,$d)=explode("-",$fechavieja);
    return $d."/".$m."/".$a;
	}else{
		return "No hay";
		}}
require('fpdf.php');
class PDF extends FPDF
{
//Cabecera de página
function Header()
{
	//Logo
	$this->Image('images/recibo.jpg',0,0,212,150);
//	$this->Image('images/pri.jpg',95,158,20,20);
//	$this->Image('listo.jpg',160,23,35,20);
	//Arial bold 15
	$this->SetFont('Arial','B',12);
	//Movernos a la derecha
	$this->Cell(80);
	
	
	//Salto de línea
	$this->Ln(10);
}

//Pie de página
//function Footer()
//{
	//Posición: a 1,5 cm del final
	//$this->SetY(-15);
	//Arial italic 8
	//$this->SetFont('Arial','I',12);
	//Número de página
	//$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
//}
}


//Creación del objeto de la clase heredada





//////////////////////////////////////////////////////////////////////////////////////////////////////////
$pdf=new PDF();
$pdf->AliasNbPages();



$pdf->AddPage();
//$pdf->SetFont('Arial','U',32);
//$pdf->Text(20,30,"Formato en Espera de Autorización ");

$pdf->SetFont('Arial','',12);
$mes=substr($fecha,8,2);

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

 $fechahoy=date("d/m/Y");


$nom_mes=mes(date("m"));
$pdf->SetXY(4,60);
//$pdf->MultiCell(180,5,"".ucwords(strtolower(utf8_decode($roow2['nombre']))).", ".ucwords(strtolower(utf8_decode($roow3['nom_loc']))).", a ".substr($fechahoy,0,2)." de ".$nom_mes." del ".date("Y"),0,R,0); 

 $id=$_GET['fl'];
 $dep=@mysql_query("select * from pagos where id_pago=".$id ."");
   $roow=mysql_fetch_array($dep);

 $dep1=@mysql_query("select * from asistentes where matricula=".$roow['matricula'] ."");
   $roow1=mysql_fetch_array($dep1);
$pdf->SetFont('Arial','I',13);
$pdf->SetXY(22,35.5);
$pdf->MultiCell(35,5,$roow['id_pago'],0,"J",0);

$pdf->SetFont('Arial','I',13);
$pdf->SetXY(155,35);
$pdf->MultiCell(46,5, fechanueva(substr($roow['fecha'],0,10)),0,"C",0);

$pdf->SetXY(40,55);
$pdf->MultiCell(197,5,ucwords(utf8_decode(strtolower($roow1['nombre'].' '.$roow1['apellidos']))),0,"J",0);

$pdf->SetFont('Arial','I',11);
$pdf->SetXY(20,79.5);
$pdf->MultiCell(17,5,"1",0,"C",0);


$desp=@mysql_query("select * from taller where id_taller=".$roow['id_taller']."");
		$despp = @mysql_fetch_array($desp); 
$pdf->SetFont('Arial','I',11);
$pdf->SetXY(38,79.5);
$pdf->MultiCell(132,5,utf8_decode($roow['pago'])." ".utf8_decode(($despp['nombre'])),0,"C",0);

$pdf->SetFont('Arial','I',11);
$pdf->SetXY(171,79.5);
$pdf->MultiCell(19,5,"$".number_format($roow['costo'],2),0,"C",0);

$pdf->SetFont('Arial','I',11);
$pdf->SetXY(171,123.5);
$pdf->MultiCell(19,5,"$".number_format($roow['costo'],2),0,"C",0);




//}
 
	
$pdf->Output();

 }else
{
	header("Location: denegado.php");
}

?>
