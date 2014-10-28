<?php session_cache_limiter('nocache,private');
session_start();
$p_usuario=$_SESSION['p_usua'];
 $p_nombre=$_SESSION['p_noma'];
 $p_tipo=$_SESSION['p_tipoa'];
 
 
 
if ($p_usuario!="" and $p_nombre!="" and $p_tipo=="admin"  )
{

include("conecta.php");
 $link=conectarse();
 
     	
class taller {


public function abrir ($nombr){	
  $dep=@mysql_query("select * from taller where nombre='$nombr'");
  
  $num=@mysql_num_rows ($dep);
  return $num;
 
}

function editar ($id){
 $dep=@mysql_query("select * from taller where id_taller=$id");
  $depp = @mysql_fetch_array($dep);
   @mysql_close($link);
  return $depp;
 
}

function guardar ($nombr,$cant, $fec,$hora,$cor,$lugar){
	
  @mysql_query("insert into taller values ('','$nombr',$cant,'$fec','$hora','$cor','$lugar')");
 }

  function modificar ($nombr,$cant, $fec,$hora,$cor,$lugar, $id	){
 @mysql_query("update taller set nombre='$nombr', cantidad=$cant, fecha='$fec', hora='$hora', coordinador='$cor', lugar='$lugar' where id_taller='$id'");
    }

function baja ($id){
@mysql_query("delete from taller where id_taller='$id'");

    }



function error(){
return ('Error'.'<br>'.'Verifique con el Admnistrador' );
}
}

}else{
	header("Location: denegado.php");
	
	}

?>
