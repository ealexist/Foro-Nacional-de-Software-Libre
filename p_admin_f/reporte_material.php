<?php session_start();
session_cache_limiter('nocache,private');

//include("out.php");

$p_usuario=$_SESSION['p_usua'];
 $p_nombre=$_SESSION['p_noma'];
 $p_tipo=$_SESSION['p_tipoa'];
 
 
 
if ($p_usuario!="" and $p_nombre!="" and $p_tipo=="admin"  )
{
	function fechanueva($fechavieja){
	
	if ($fechavieja!="0000-00-00"){
		
    list($a,$m,$d)=explode("-",$fechavieja);
    return $d."/".$m."/".$a;
	}else{
		return "No hay";
		}}


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
require('fpdf.php');
//$link=conectarse();

$tl=$_POST['cbo_nive'];






class PDF extends FPDF
{ 

	
	
//Cabecera de página
function Header()
{global $link, $tl;
$this->SetMargins(3,3);
$this->SetFont('Arial','B',14);
////////////////Logos//////////////////////////////////////////////
//$this->Image('../images/dicre.jpg',10,10,30,25);
$this->Text(90,15,'Congreso Internacional de Software Libre');


$this->SetXY(3,20);

$this->MultiCell(291,5,utf8_decode("Reporte de Material Entregado."),0,C,0);



//$this->Text(130,31,'De: '.substr($fecha_m,8,2).'/'.substr($fecha_m,5,2).'/'.substr($fecha_m,0,4) );

//$link=conectarse();

//$this->Text(115,45,'CURRICULUM DE LA EMPRESA');

$this->SetFont('Arial','B',8);
$X=3;
$Y=30;


$this->SetXY($X,$Y);
$this->Cell(13,5,'Matricula',1,0,'C');
$this->Cell(65,5,'Nombre',1,0,'C');
$this->Cell(55,5,'Correo',1,0,'C');
$this->Cell(50,5,'Institucion',1,0,'C');

$this->Cell(20,5,'Telefono',1,0,'C');

$this->Cell(70,5,'Taller',1,0,'C');
$this->Cell(17,5,'Fecha ',1,0,'C');


//$this->Cell(36,5,'Importe Ejercido',1,0,'C');

$X=30;
$Y=30;


$this->SetXY($X,$Y);



	//Logo
//	$this->Image('sec1.jpg',10,8,33);
	//Arial bold 15
//	$this->SetFont('Arial','B',15);
	//Movernos a la derecha
//	$this->Cell(80);
	//Título
//	$this->Cell(30,10,'Title',1,0,'C');
	//Salto de línea
	$this->Ln(5);
}

//Pie de página
function Footer()
{
	//Posición: a 1,5 cm del final
	$this->SetY(-15);
	//Arial italic 8
	$this->SetFont('Arial','I',8);
	//Número de página
	$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
	$this->SetY(-15);
	$this->Cell(50,5,'Fecha de Impresion: '.date('d/m/Y'),0,0,'C');
	//date('Y/m/d')
}
}


//Creación del objeto de la clase heredada
$pdf=new PDF('L');
//$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);




$pdf->SetFont('Arial','',8);


///////////////////






$pdf->SetWidths(array(13,65,55,50,20,70,17));


	
$resu="Select * From asistentes Inner join material on asistentes.matricula=material.matricula where asistentes.activo=1 order by asistentes.matricula asc" ; 


				

$result1a=mysql_query($resu,$link);
$nn=mysql_num_rows($result1a);
while($row = mysql_fetch_array($result1a))

	{

	$pdf->Row(array($row["matricula"],utf8_decode(ucwords(strtolower($row["apellidos"]))).' '.utf8_decode(ucwords(strtolower($row["nombre"]))),$row["email"],utf8_decode(ucwords(strtolower($row["institucion"]))),$row["telefono"],utf8_decode(ucwords(strtolower($row["material"]))),fechanueva(substr($row['fecha'],0,10))));
	
	}
	
	



$result1=mysql_query("SELECT matricula, count( * ) AS Repetido
FROM material AS Tmp
GROUP BY matricula
HAVING Count( * ) >1",$link);

 $pdf->AddPage();
   $X=3;
$Y=50;
$pdf->SetFont('Arial','I',10);

$pdf->SetXY($X,$Y);
while($row1 = mysql_fetch_array($result1))

	{
$pdf->MultiCell(291,5,"Matricula: ".$row1['matricula']." Repetido: ".$row1['Repetido'],0,C,0);
	}
   
  


    $pdf->Text(40,60,'Numero de Material Entregado: '.$nn);
	  $pdf->Text(135,45,'Repetidos');
	


$pdf->Output();
?>
<?php
}else{

header("Location: denegado.php");
}



?>
