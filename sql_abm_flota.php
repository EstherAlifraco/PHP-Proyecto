

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
	$link= Conectarse();


	function baja ($id)
	{
		$conexion = Conectarse();

			if (!$conexion)
			{
				echo "<h1>No se puede dar de baja. Error al conectar.</h1>";
				exit();
			}

		// NO poner comillas simples en nombre de tabla, ni de campos, sólo en valores alfanuméricos.
		$consulta = "DELETE FROM vehiculo WHERE id_vehiculo = '$id'";

		echo "El registro correspondiente a el id numero ".$id." se ha borrado correctamente" . "<BR>";

        //cambie el orden para k funcione con i
		$resultado=mysqli_query($conexion,$consulta);

		//echo "Resultado de la operaci&oacute;n: " . $resultado;

			//cerramos la conexión con el motor de BD
			mysqli_close($conexion);

	}

	//--------------------------

	function modificacion ($id_vehiculo, $patente, $nro_motor, $nro_chasis, $marca, $modelo,$usuario)
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

		$consulta = "UPDATE vehiculo SET id_vehiculo = '$id_vehiculo',
		                                 patente= '$patente',
		                                 nro_motor = '$nro_motor',
		                                 nro_chasis = '$nro_chasis',
										 marca = '$marca',
										 modelo = '$modelo',
										 usuario = '$usuario'";
										 
                $consulta = $consulta . "WHERE id_vehiculo = '$id_vehiculo'";

		echo $consulta;

		$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

			//cerramos la conexión con el motor de BD
			mysqli_close($conexion);
	}

?>