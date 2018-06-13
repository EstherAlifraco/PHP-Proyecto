<?php
include("sql_abm.php");
include("Empleado.php");
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$link= Conectarse();
// --------- VA CON EL EJEMPLO SIN ROL --------- //
/*
$sql = "SELECT * FROM Empleado  WHERE usuario = '$usuario' and password = '$password'";
$result = mysqli_query($conexion,$sql); //cant de filas k dio el sql
$count=mysqli_num_rows($result);



$rows=mysqli_fetch_assoc($result);   //esto trae la fila (fetch_assoc trae  de auna fila secuencialmente, num_row trae cantidad de filas)


var_dump($rows); //escupe lo que tiene la variable
exit();
*/

// ---------------  MACHETES  ------------------ //
/* http://php.net/manual/es/function.mysql-result.php
mysql_fetch_row() - Obtiene una fila de resultados como un array numérico
mysql_fetch_array() - Recupera una fila de resultados como un array asociativo, un array numérico o como ambos
mysql_fetch_assoc() - Recupera una fila de resultados como un array asociativo
mysql_fetch_object() - Recupera una fila de resultados como un objeto

http://php.net/manual/es/function.mysql-fetch-row.php
mysql_data_seek() - Mueve el puntero de resultados interno
mysql_fetch_lengths() - Obtiene la longitud de cada salida en un resultado
mysql_result() - Obtener datos de resultado

*/





// --------------- SIN CLASES ------------------ //
/*
$sql_rol = "SELECT rol FROM empleado WHERE usuario = '$usuario' AND password = '$password'";
$result_rol = mysqli_query($conexion,$sql_rol);
$rows = mysqli_fetch_assoc($result_rol);

if($rows["rol"]==1){ 
	session_start();   
    $_SESSION['usuario']=$usuario;
	header ("Location: admin_perfil.php");
}else{
	if($rows["rol"] == 2){
		session_start();   
		$_SESSION['usuario']=$usuario;
		header ("Location: chofer_perfil.php");
		exit();
	}else{
		if($rows["rol"] == 3){
			session_start();   
			$_SESSION['usuario']=$usuario;
			echo ("soy mecaninco");
			exit();
		}
	}
	echo("Comuniquese con su administrador para que le designe un rol");

	echo ("CUAK ! ERRRROR ");
	exit();

}
*/




// --------------- CON CLASES ------------------ //
/* esto pasaria a hacerse en la clase usuario 
$sql_rol = "SELECT rol FROM empleado WHERE usuario = '$usuario' AND password = '$password'";
$result_rol = mysqli_query($conexion,$sql_rol);
$rows = mysqli_fetch_assoc($result_rol);

*/

$resultado = Empleado::getRol($usuario,$password);

if($resultado==1){ 
	session_start();   
    $_SESSION['usuario']=$usuario;
	header ("Location: admin_perfil.php");
}else{
	if($resultado == 2){
		session_start();   
    	$_SESSION['usuario']=$usuario;
		header ("Location: chofer_perfil.php");
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
	
	echo"<a href=login.php>volver al login </a>";
	echo"</body>";
	echo"<html>";
	exit();
	//o directo al login
header("location:login.php");

}




// --------------- SIN ROLES ------------------ //
/*

if ($count>0) { 
    session_start();   
    $_SESSION['usuario']=$usuario;
  
    header ("Location: chofer_perfil.php");
    exit();
    
    } else{
        header("Location: login.php");
        exit();
		}
*/
 mysqli_close($link);


 ?>




 
 

