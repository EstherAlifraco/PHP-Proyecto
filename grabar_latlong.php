<?php
	include_once("conexion.php");
	$link=Conectarse();

	$latitud =$_POST["latitud"];
	$longitud =$_POST["longitud"];
	$idViaje =$_POST["idViaje"];
	
	
	
	$sql="INSERT INTO bitacora (latitud,longitud,combustible,id_viaje) values ('$latitud','$longitud',0,$idViaje)";


	echo mysqli_query($link,$sql); // si se ejecuta con exito regresa un 1 si no 0 
	
?>

