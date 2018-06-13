

<?php
	/* function Conectarse()
	{//introducimos los datos de  host que son "Server", "usuario" y "contraseña" 
		if (!($link=mysql_connect("localhost","root","")))//aca hay que introducir los datos que especifique arriba!!!
		{
			return 0;
		}
		if (!mysql_select_db("base",$link))
		{
			return 0;
		}
		return $link;
	}
	*/
	include("conexion.php");
	$link=Conectarse();



	//--------------------------

	function alta ($id, $usuario, $password, $rol, $nombre, $apellido, $dni)
	{
		$conexion = Conectarse();

			if (!$conexion)
			{
				echo "<h1>No se puede dar de alta. Error al conectar.</h1>";
				exit();
			}

		// NO poner comillas simples en nombre de tabla, ni de campos, sólo en valores alfanuméricos.
		$consulta = "INSERT INTO empleado (id, usuario, password, rol, nombre, apellido, dni) VALUES ('$id', '$usuario','$password','$rol', '$nombre','$apellido','$dni')";
		
		echo $consulta;

		$resultado=mysqli_query($conexion,$consulta);

			//cerramos la conexión con el motor de BD
			mysqli_close($conexion);
	}

	//--------------------------

	function baja ($id)
	{
		$conexion = Conectarse();

			if (!$conexion)
			{
				echo "<h1>No se puede dar de baja. Error al conectar.</h1>";
				exit();
			}

		// NO poner comillas simples en nombre de tabla, ni de campos, sólo en valores alfanuméricos.
		$consulta = "DELETE FROM empleado WHERE id = '$id'";

		echo "El registro correspondiente a el id numero ".$id." se ha borrado correctamente" . "<BR>";

        //cambie el orden para k funcione con i
		$resultado=mysqli_query($conexion,$consulta);

		//echo "Resultado de la operaci&oacute;n: " . $resultado;

			//cerramos la conexión con el motor de BD
			mysqli_close($conexion);

	}

	//--------------------------

	function modificacion ($id, $usuario, $password, $rol, $nombre, $apellido, $dni)
	{
		$conexion = Conectarse();

			if (!$conexion)
			{
				echo "<h1>No se puede dar de alta. Error al conectar.</h1>";
				exit();
			}

		// NO poner comillas simples en nombre de tabla, ni de campos, sólo en valores alfanuméricos.

		/*
		UPDATE `agenda` SET `nombre` = 'pepe3',
						`tel` = '467641_1',
						`direccion` = 'ch 149_1',
						`mail` = 'pepe@host2.com.ar' WHERE `agenda`.`id` =2
		*/

		$consulta = "UPDATE empleado SET usuario = '$usuario',
		                                 password = '$password',
		                                 rol = '$rol',
										 nombre = '$nombre',
										 apellido = '$apellido',
										 dni = '$dni'";
                $consulta = $consulta . "WHERE usuario = '$usuario'";

		echo $consulta;

		$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error());

			//cerramos la conexión con el motor de BD
			mysqli_close($conexion);
	}

?>