<?php

	function validaEntrada(){
		$respuesta = false;
		$usuario = "'".$_POST["usuario"]."'";
		$clave	 = "'".md5($_POST["clave"])."'";
		mysql_connect("localhost","root","");
		mysql_select_db("pw2171");
		$consulta=sprintf("select * from usuarios where usuario=%s and clave=%s limit 1",$usuario,$clave);
		$resultado=mysql_query($consulta);
		if(mysql_num_rows($resultado)>0){
			$respuesta=true;
		}
		$salidaJSON = array('respuesta' =>  $respuesta);
		print json_encode($salidaJSON);
	}

	$opcion  = $_POST["opcion"];

	switch ($opcion) {
		case 'entrar':
			validaEntrada();
			break;
		
		default:
			# code...
			break;
	}
?>