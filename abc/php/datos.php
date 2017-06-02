<?php
	require("utilerias.php");
	function valida(){
		$respuesta=false;
		$conexion=conecta();
		$u=GetSQLValueString($_POST["usuario"],"text");
		$c=GetSQLValueString(md5($_POST["clave"]),"text");
		$consulta=sprintf("select usuario,clave 
			               from usuarios 
			               where usuario=%s and clave=%s 
			               limit 1",$u,$c);
		$resultado=mysql_query($consulta);
		if(mysql_num_rows($resultado)>0){
			$respuesta=true;
		}
		$salidaJSON = array('respuesta' => $respuesta);
		print(json_encode($salidaJSON));
	}
	function datosUsuario(){
		$respuesta=false;
		$usuario=GetSQLValueString($_POST["usuario"],"text");
		$conexion=conecta();
		$consulta=sprintf("select * from usuarios where usuario=%s limit 1",$usuario);
		$resultado=mysql_query($consulta);
		$nombre="";
		$clave="";
		$departamento=0;
		$vigencia=0;
		if(mysql_num_rows($resultado)>0){
			$respuesta=true;
			if($registro=mysql_fetch_array($resultado)){
				$nombre       = $registro["nombre"];
				$clave        = $registro["clave"];
				$departamento = $registro["departamento"];
				$vigencia     = $registro["vigencia"];
			}
		}
		$salidaJSON = array('respuesta'   => $respuesta, 
							'nombre'      => $nombre,
							'clave'       => $clave,
							'departamento'=> $departamento,
							'vigencia'    => $vigencia);
		print json_encode($salidaJSON);
	}
	function alta(){
		$respuesta=false;
		$conexion=conecta();
		$u=GetSQLValueString($_POST["usuario"],"text");
		$n=GetSQLValueString($_POST["nombre"],"text");
		$c=GetSQLValueString(md5($_POST["clave"]),"text");
		$d=GetSQLValueString($_POST["departamento"],"int");
		$v=GetSQLValueString($_POST["vigencia"],"int");
		//Buscar si existe
		$busca=sprintf("select usuario from usuarios where usuario=%s",$u);
		$resultadoBusca=mysql_query($busca);
		if(mysql_num_rows($resultadoBusca)==0){//Si no existe
			$inserta=sprintf("insert into usuarios values(default,%s,%s,%s,%d,%d)",$u,$n,$c,$d,$v);
			mysql_query($inserta);
			if(mysql_affected_rows()>0){ 
				$respuesta=true;
			}	
		}
		$salidaJSON = array('respuesta' => $respuesta );
		print json_encode($salidaJSON);
	}
	//Menú principal
	$opcion=$_POST["opcion"];
	switch ($opcion) {
		case 'valida':
			valida();
			break;
		case 'datosusuario':
			datosUsuario();
			break;	
		case 'alta':
			alta();
			break;	
		default:
			# code...
			break;
	}
?>










