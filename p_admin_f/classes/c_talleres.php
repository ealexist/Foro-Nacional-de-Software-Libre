<?php session_start();
session_cache_limiter('nocache,private');

//include("out.php");

$p_usuario=$_SESSION['p_usua'];
 $p_nombre=$_SESSION['p_noma'];
 $p_tipo=$_SESSION['p_tipoa'];
 
 
 
if ($p_usuario!="" and $p_nombre!="" and $p_tipo=="admin"  )
{

function conectarse()
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
return $link;
} 
 $link=conectarse();
 
     	
class taller {
	
	public function abrir_tipo ($id,$it){	
  $dep=@mysql_query("select * from asistencia_taller where matricula=".$id." and id_taller=".$it."");
  
    $num=@mysql_num_rows ($dep);

  
  return $num;
 
}



public function abrir_tipon ($id){	

  $dep=@mysql_query("select * from taller where id_taller=".$id);
  $depp= @mysql_fetch_array($dep);
  
  return $depp['nombre']." </br>".$depp['coordinador']." </br>".$depp['fecha']." ".$depp['hora']." ".$depp['lugar'];
  
 
}


public function abrir_todo (){	
  $dep=@mysql_query("SELECT actividades.nom_act, dependencias.nombre, catalago.tipo, actividades.id_actividad, actividades.activo
FROM dependencias INNER JOIN (catalago INNER JOIN actividades ON catalago.id_catalago = actividades.id_catalago) ON dependencias.id_dependencia = actividades.id_dependencia where actividades.activo=1 order by actividades.nom_act asc");
  return $dep;
 
}



	public function abrir_dep (){	
  $dep=@mysql_query("select * from dependencias order by nombre asc ");
  return $dep;
 
}

	public function abrir_depn ($id){	
  $dep=@mysql_query("select * from dependencias where id_dependencia=".$id);
  $depp= @mysql_fetch_array($dep);
  
  return $depp['nombre'];
 
}

public function abrir ($nombr,$id_cat, $deep){	
  $dep=@mysql_query("select * from actividades where nom_act='$nombr' and id_catalago=$id_cat and id_dependencia=$deep and activo=1");
  
  $num=@mysql_num_rows ($dep);
  return $num;
 
}

function editar ($id){
 $dep=@mysql_query("select * from actividades where id_actividad=$id");
  $depp = @mysql_fetch_array($dep);
   @mysql_close($link);
  return $depp;
 
}

function guardar ($nombr,$id_cat, $deep){
	 $fecha=date("Y/m/d");
  @mysql_query("insert into actividades values ('',$id_cat,$deep,'$nombr','1','$fecha')");
 }

  function modificar ($nombr,$id_cat, $deep,$id){
 @mysql_query("update actividades set id_catalago=$id_cat, id_dependencia=$deep, nom_act='$nombr' where id_actividad='$id'");
    }

function baja ($id){
@mysql_query("update actividades set activo='0' where id_actividad='$id'");

    }

function eliminar ($id){
     @mysql_query("delete from dependencias where id_dependencia=$id");

    }

function error(){
return ('Error'.'<br>'.'Verifique con el Admnistrador' );
}
}

}else{
	header("Location: denegado.php");
	
	}

?>
