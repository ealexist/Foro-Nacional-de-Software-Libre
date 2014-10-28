<?php session_start();
session_cache_limiter('nocache,private');

//include("out.php");

$p_usuario=$_SESSION['p_usua'];
 $p_nombre=$_SESSION['p_noma'];
 $p_tipo=$_SESSION['p_tipoa'];
 
 
 
if ($p_usuario!="" and $p_nombre!="" and $p_tipo=="admin"  )
{
require('fpdf.php');

class PDF extends FPDF
{
//Cabecera de página
function Header()
{
	//Logo
	$this->Image('images/constancia.jpg',0,0,210,297);
	//Arial bold 15
	$this->SetFont('Arial','B',15);
	//Movernos a la derecha
	//$this->Cell(80);
	//Título
//	$this->Cell(30,10,'Title',1,0,'C');	
	//Salto de línea
//	$this->Ln(20);
}

//Pie de página
function Footer()
{
	//Posición: a 1,5 cm del final
	//$this->SetY(-15);
	//Arial italic 8
//	$this->SetFont('Arial','I',8);
	//Número de página
	//$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
if(!($link=@mysql_connect("mysql51-053.wc1.ord1.stabletransit.com","633795_C13tI19c8","c17*_ta.13P")))
{
echo "error conectando a la base de datos.";
exit();
}
if (!@mysql_select_db("633795_ciiti",$link)) //nombre de la base de datos ---

{
echo "error seleccionando la base de datos.";
exit();
}




//$q="SELECT * FROM remitente where nom_rem='$rem'";
//$result=mysql_query($q,$link);
//$row = mysql_fetch_array($result);
//$rem=$row['id_remitente'];


//Creación del objeto de la clase heredada
$pdf=new PDF('P');
$inicio=$_POST['txtinicio'];
$fin=$_POST['txtfin'];



 $query="select * from asistentes where activo=1 and apellidos BETWEEN '".$inicio."%' and '".$fin."%' order by apellidos asc";
$result=mysql_query($query,$link);
//$pdf=new PDF();
while($row=mysql_fetch_array($result)) {

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',18);
$pdf->SetTextColor(254,254,254);
$pdf->SetXY(98,233);
$pdf->MultiCell(111,5,ucwords(strtolower( utf8_decode($row['nombre']." ".$row['apellidos']))),0,J,0);
}


$pdf->Output();


}else{

header("Location: denegado.php");
}



?>