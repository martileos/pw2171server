<?php
include("utilerias.php");
$conexion=conecta();//servidor y bd
$u=GetSQLValueString($_POST["txtUsuario"],"text");
$n=GetSQLValueString($_POST["txtNombre"],"text");
$c=GetSQLValueString(md5($_POST["txtClave"]),"text");
$d=GetSQLValueString($_POST["txtDepto"],"int");
$v=GetSQLValueString($_POST["txtVigencia"],"int");
//Validar que no sea repetido el usuario
$repetido=sprintf("select usuario from usuarios where usuario=%s",$u);
$respuesta = mysql_query($repetido);
if(mysql_num_rows($respuesta)>0){
	print("Usuario repetido :(");
	return;
}
//esta consulta está mal ¿porqué?
$consulta=sprintf("insert into usuarios values(default,%s,%s,%s,%d,%d)",$u,$n,$c,$d,$v);
mysql_query($consulta);
if(mysql_affected_rows()>0){
	print("Usuario agregado :)");
}
else{
	print("Usuario no agregado :(");
}
?>







