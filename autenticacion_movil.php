<?php
	include("sql_abm.php");
	include("Empleado.php");
	$usuario = $_POST['usuario'];
	$password = $_POST['password'];
	$link= Conectarse();
	// prueba
/*
	$idViaje = $_GET['idViaje'];
	echo"".$idViaje;
	exit();
*/
	$idViaje = $_GET['idViaje'];
	$resultado = Empleado::getRol($usuario,$password);

	if($resultado==1){ 
		session_start();   
		$_SESSION['usuario']=$usuario;
		header ("Location: admin_perfil.php");
	}else{
		if($resultado == 2){
			session_start();   
			$_SESSION['usuario']=$usuario;
			header ("Location: chofer_celular.php?idViaje=$idViaje");
			exit();
		}else{
			if($resultado == 3){
				session_start();   
				$_SESSION['usuario']=$usuario;
				header ("Location: mecanico_perfil.php");
				exit();
			}
		}
		echo"<html>";
		echo"<head></head>";
		echo"<style>
		*{
			background-color: #884EA0;color: #fff;
			padding: 100px 25px;
			font-family: Montserrat, sans-serif;} 
		h3 {
			font-size: 21px;
			line-height: 1.375em;
			color: white;
			font-weight: 400;
			margin-bottom: 30px;
			margin-left:20%;
		}		
	   a{
		color:white ;
		font-size: 20px;
		margin-left:20%;
	   }</style>";
		echo"<body>";
		echo"<h3>Corroborar datos ingresados o bien comuniquese con su administrador para que le designe un rol</h3>";

		echo"<a href=login_movil.php>volver al login </a>";
		echo"</body>";
		echo"<html>";
		exit();
		//o directo al login
	header("location:login_movil.php");

}





 mysqli_close($link);


 ?>




 
 

