<?php session_start();
session_destroy();


session_cache_limiter('nocache,private');
unset( $_SESSION['p_usua'], $_SESSION['p_noma'],$_SESSION['p_tipoa'],$_SESSION["lastoutaccess"]);




  
class verifica {

public function abrir_usuario ($user, $pass){	


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



  $dep=@mysql_query("select * from usuarios where login='$user' and pass='$pass' and activo=1 limit 1" );
   $num=@mysql_num_rows ($dep);
   
  if ($num==1)
  { 
	$depp = @mysql_fetch_array($dep);
   @mysql_close($link);

 session_start(); 
 session_cache_limiter('nocache,private');
  $_SESSION['p_usua']=$depp['id_usuario'];
  $_SESSION['p_tipoa']=$depp['tipo'];
  $_SESSION['p_noma']=$depp['nombre'];
	    if ($_SESSION['p_tipoa']=="pagoss"){
		header("Location: pagos.php");
		}
		
		if ($_SESSION['p_tipoa']=="admin"){
		header("Location: all.php");
		}
		
		if ($_SESSION['p_tipoa']=="materialls"){
		header("Location: material.php");
		}
  }
 
}




function error(){
return ('Error'.'<br>'.'Verifique con el Admnistrador' );
}
}

?>
