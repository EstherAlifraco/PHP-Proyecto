<?php



class Empleado{
		/* Se agregan estos 2 atributos para resolver este problema. 
		Notice: Undefined variable: usuario in C:\xampp\htdocs\LOGISTICA\Empleado.php on line 20
		Notice: Undefined variable: password in C:\xampp\htdocs\LOGISTICA\Empleado.php on line 20
 		*/
	
		private $usuario ;
		private $password;
	
		public static function getRol($usu,$clave) {
		
		include("Conectarbd.php");
		$usuario = $usu;
		$password = $clave;
		
		$sql_rol = "SELECT rol FROM empleado WHERE usuario = '$usuario' AND password = '$password'";
		$conexion= new conectarBD();
		$result_rol=$conexion->ConsultaSelect($sql_rol);
		$rows = mysqli_fetch_assoc($result_rol);
		return($rows["rol"]); 

		/* si la base de datos la usamos con objetos  se usa esto
		$db = new Base();
		return($db->ejecutar($sql_rol)); // devuel ve fila 

		*/

	}




} 


?>


<!--
ejemplo sin objetos 

class Empleado{
		/* Se agregan estos 2 atributos para resolver este problema. 
		Notice: Undefined variable: usuario in C:\xampp\htdocs\LOGISTICA\Empleado.php on line 20
		Notice: Undefined variable: password in C:\xampp\htdocs\LOGISTICA\Empleado.php on line 20
 		*/
	
		private $usuario ;
		private $password;
	
	public static function getRol($usu,$clave) {
		
		include("abrir_conexion.php");
		$usuario = $usu;
		$password = $clave;
		
		$sql_rol = "SELECT rol FROM empleado WHERE usuario = '$usuario' AND password = '$password'";
		$result_rol = mysqli_query($conexion,$sql_rol);
		$rows = mysqli_fetch_assoc($result_rol);
		return($rows["rol"]); 

		/* si la base de datos la usamos con objetos  se usa esto
		$db = new Base();
		return($db->ejecutar($sql_rol)); // devuel ve fila 

		*/

	}




} 
-->
