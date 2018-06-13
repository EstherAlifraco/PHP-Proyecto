

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
		$consulta = "DELETE FROM mantenimiento WHERE id_mantenimiento = '$id'";

		echo "El registro correspondiente a el id numero ".$id." se ha borrado correctamente" . "<BR>";

        //cambie el orden para k funcione con i
		$resultado=mysqli_query($conexion,$consulta);

		//echo "Resultado de la operaci&oacute;n: " . $resultado;

			//cerramos la conexión con el motor de BD
			mysqli_close($conexion);

	}

	//--------------------------

	function modificacion ($id_mantenimiento, $fecha_service, $km_unidad, $costo, $repuestos, $usuario,$id_vehiculo)
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

		$consulta = "UPDATE mantenimiento SET id_mantenimiento = '$id_mantenimiento',
		                                 fecha_service = '$fecha_service',
		                                 km_unidad = '$km_unidad',
		             		         	 costo = '$costo',
										 repuestos = '$repuestos',
										 usuario = '$usuario',
										 id_vehiculo = '$id_vehiculo'";
										 
                $consulta = $consulta . "WHERE id_mantenimiento = '$id_mantenimiento'";

		echo $consulta;

		$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

			//cerramos la conexión con el motor de BD
			mysqli_close($conexion);
	}

?>