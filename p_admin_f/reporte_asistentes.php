<?php session_start();
session_cache_limiter('nocache,private');

//include("out.php");

$p_usuario=$_SESSION['p_usua'];
 $p_nombre=$_SESSION['p_noma'];
 $p_tipo=$_SESSION['p_tipoa'];
 
 
 
if ($p_usuario!="" and $p_nombre!="" and $p_tipo=="admin"  )
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
require('fpdf.php');
//$link=conectarse();

$tl="Todos";






class PDF extends FPDF
{ 

	
	
//Cabecera de p�gina
function Header()
{global $link, $tl;
$this->SetMargins(3,3);
$this->SetFont('Arial','B',14);
////////////////Logos//////////////////////////////////////////////
//$this->Image('../images/dicre.jpg',10,10,30,25);
$this->Text(70,15,'Foro Nacional De Software Libre');
if ($tl=="Todos"){

$resu="SELECT *
FROM asistentes where asistentes.activo=1 order by asistentes.apellidos asc" ; }

elseif($tl==""){}
else{
	
	 $resu="SELECT expediente.fecha_ins, expediente.matricula, asistentes.nombre, asistentes.apellidos, asistentes.email, asistentes.institucion, expediente.id_taller, (taller.nombre) as taller
FROM taller INNER JOIN (asistentes INNER JOIN expediente ON asistentes.matricula = expediente.matricula) ON taller.id_taller = expediente.id_taller where taller.id_taller=".$tl." and asistentes.activo=1" ;
	
	}


		$result1a=mysql_query($resu,$link);
		$num_r=mysql_num_rows($result1a);
		if ($tl=="Todos"){}else{
		$res="SELECT * from taller where id_taller=".$tl ;
		$result2=mysql_query($res,$link);
		$roww = mysql_fetch_array($result2);
		}
		if ($tl=="Todos"){
$this->Text(70,23,'Reporte de Asistentes Registrados.     Registrados: '.$num_r);
		}elseif($tl==""){}else{
$this->Text(60,23,'Reporte de Registrados a : '.utf8_decode($roww['nombre']));
		}



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

$this->Cell(30,5,'Fecha de Registro',1,0,'C');
$this->Cell(57,5,'Asistencia',1,0,'C');


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
	//T�tulo
//	$this->Cell(30,10,'Title',1,0,'C');
	//Salto de l�nea
	$this->Ln(5);
}

//Pie de p�gina
function Footer()
{
	//Posici�n: a 1,5 cm del final
	$this->SetY(-15);
	//Arial italic 8
	$this->SetFont('Arial','I',8);
	//N�mero de p�gina
	$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
	$this->SetY(-15);
	$this->Cell(50,5,'Fecha de Impresion: '.date('d/m/Y'),0,0,'C');
	//date('Y/m/d')
}
}


//Creaci�n del objeto de la clase heredada
$pdf=new PDF('L');
//$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);




$pdf->SetFont('Arial','',8);


///////////////////






$pdf->SetWidths(array(13,65,55,50,20,30,57));


	

   if ($tl=="Todos"){

$resu="SELECT *
FROM asistentes where asistentes.activo=1 order by asistentes.apellidos asc" ; }elseif($tl==""){}else{
	
	$resu="SELECT  expediente.fecha_ins, expediente.matricula, asistentes.nombre, asistentes.apellidos, asistentes.email,  asistentes.telefono, asistentes.institucion, expediente.id_taller, (taller.nombre) as taller
FROM taller INNER JOIN (asistentes INNER JOIN expediente ON asistentes.matricula = expediente.matricula) ON taller.id_taller = expediente.id_taller where taller.id_taller=".$tl." and asistentes.activo=1 order by asistentes.apellidos asc" ;
	
	}

				

$result1a=mysql_query($resu,$link);
$nn=mysql_num_rows($result1a);
while($row = mysql_fetch_array($result1a))

	{

	$pdf->Row(array($row["matricula"],utf8_decode(ucwords(strtolower($row["apellidos"]))).' '.utf8_decode(ucwords(strtolower($row["nombre"]))),$row["email"],utf8_decode(ucwords(strtolower($row["institucion"]))),$row["telefono"],substr($row['fecha'],0,10),""));
	
	}
	



   


$pdf->Output();
?>
<?php
}else{

header("Location: denegado.php");
}



?>
