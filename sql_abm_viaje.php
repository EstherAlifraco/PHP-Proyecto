

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
		$consulta = "DELETE FROM viaje WHERE id_viaje = '$id'";

		echo "El registro correspondiente a el id numero ".$id." se ha borrado correctamente" . "<BR>";

        //cambie el orden para k funcione con i
		$resultado=mysqli_query($conexion,$consulta);

		//echo "Resultado de la operaci&oacute;n: " . $resultado;

			//cerramos la conexión con el motor de BD
			mysqli_close($conexion);

	}

	//--------------------------

	function modificacion ($id, $origen, $destino, $fecha_s, $fecha_ll, $tipo_c, $km_rec_prev, $km_rec_real, $comb_p, $comb_r, $tiempo_e, $tiempo_r, $id_c, $usuario)
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

		$consulta = "UPDATE viaje SET id_viaje = '$id',
		                                 origen = '$origen',
		                                 destino = '$destino',
		                                 fecha_salida = '$fecha_s',
										 fecha_llegada = '$fecha_ll',
										 tipo_carga = '$tipo_c',
										 km_recorrido_previsto = '$km_rec_prev',
										 km_recorrido_real = '$km_rec_real',
										 combustible_previsto = '$comb_p',
										 combustible_real = '$comb_r',
										 tiempo_estimado = '$tiempo_e',
										 tiempo_real = '$tiempo_r',
										 id_cliente = '$id_c',
										 usuario = '$usuario'";
										 
                $consulta = $consulta . "WHERE id_viaje = '$id'";

		echo $consulta;

		$resultado=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

			//cerramos la conexión con el motor de BD
			mysqli_close($conexion);
	}

?>