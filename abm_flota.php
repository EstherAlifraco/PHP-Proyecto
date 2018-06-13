<html>
	<head>
		<!-- de acuerdo al contenido de la variable "accion", escribimos el título -->
		<?php
			if ($_GET["accion"] == "alta")
				echo "<title>" . "Alta de registro" . "</title>";

			if ($_GET["accion"] == "modificacion")
				echo "<title>" . "Modificaci&oacuten en agenda" . "</title>";
			
			if ($_GET["accion"] == "baja")
				echo "<title>" . "Baja en la agenda" . "</title>";

		?>
		<title>ABM EMPLEADO</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="css/css.css" rel="stylesheet" type="text/css"> <!-- cssgeneral -->
		<link href="css/bootstrap-yeti-theme.css" rel="stylesheet"type="text/css">
		<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="css/site.css" rel="stylesheet" type="text/css">    
		<link href="css/bootstrap-datetimepicker.css" rel="stylesheet"type="text/css">

		<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js" type="text/javascript"></script>
		<script src="js/momentjs-with-locale.js" type="text/javascript"></script>
		<script src="js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
		<script src="js/site.js" type="text/javascript"></script>

		<style>
			input{
				color:black;
			}
		

			.form-signin {
			  max-width: 430px;
			  padding: 1px;
			  margin: 0 auto;
			}

			/* separar los input*/
			.input-group{
				padding: 1pt;	
			}
			/*para lo gris de los imput tengan el mismo tamaño */
			.input-group-addon {
			color: #884EA0;
			min-width:100px;// if you want width please write here //
			text-align:right;
			
			}
			/* para coinsidir el icono de block en la password*/
			.input-group .form-control {
				margin: 0px !important;
			}
			.btn{
				color:black;
				
				
			}
			.btn2{
				color:black;
				border-radius: 4pt;
				font-family: Montserrat, sans-serif;
				font-size: 16px;
				margin-left:265%;
				padding: 5px;
				border: none;
    		
			}
			
			
		</style>
	</head>

   <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
   <div class="jumbotron text-center">
     
		<?php
			// Acá, en base al ID recibido, pedimos los datos para MODIFICAR.
			if ($_GET["accion"] == "datos_modificacion")
			{
				include("sql_abm_flota.php");

				//me conecto a la BD y SELECCIONO el registro cuyo ID fue pasado.
				$conexion = Conectarse();

					if (!$conexion)
					{
						echo "<h1>Error al intentar conectar a base</h1>";
						echo "<br>" . "<a href='admin_flota.php'><button class=btn >Volver</button></a>";
						exit();
					}
                $id_vehiculo = $_GET["id_vehiculo"];
				$consulta = "SELECT * FROM vehiculo WHERE id_vehiculo = $id_vehiculo";


				
				$resultado=mysqli_query($conexion,$consulta);
                $fila = mysqli_fetch_array($resultado);

				if (!$fila)
				{
					echo "<h1>Registro inexistente</h1>";
					echo "<br>" . "<a href='admin_flota.php'><button class=btn >Volver</button></a>";
					exit();
				}

				//cargo los datos del registro en variables para que sea más cómodo trabajar.
                $id_vehiculo = $fila["id_vehiculo"];
				$patente = $fila["patente"];
                $nro_motor = $fila["nro_motor"];
				$nro_chasis = $fila["nro_chasis"];
				$marca = $fila["marca"];
				$modelo = $fila["modelo"];
				$usuario = $fila["usuario"];
				
				   //liberamos memoria que ocupa la consulta...
				   mysqli_free_result($resultado); 
				   //cerramos la conexión con el motor de BD
				   mysqli_close($conexion);

				/*
				ahora que teóricamente tengo los datos del registro que quiero modificar, muestro
				el formulario de carga.
				*/
				echo "<h1>Modificar un registro</h1>";
				echo "<br>";
				echo "<FORM ACTION=\"abm_flota.php\" CLASS=\"form-signin\" METHOD=\"GET\">";
				
				
				
				echo "<div class='input-group'>";
				
				echo "" . "<INPUT TYPE=\"hidden\"  CLASS=\"form-control\" NAME=\"txtid\" VALUE=\"$id_vehiculo\">" . "<BR>";
				echo"</div>";
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Patente</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname\" VALUE=\"$patente\">" . "<BR>";
				echo"</div>";
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Nro Motor</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname1\" VALUE=\"$nro_motor\">" . "<BR>";
				echo"</div>";
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Nro Chasis</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname2\" VALUE=\"$nro_chasis\">" . "<BR>";
				echo"</div>";
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Marca</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname3\" VALUE=\"$marca\">" . "<BR>";
				echo"</div>";
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Modelo</span>";
                echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname4\" VALUE=\"$modelo\">" . "<BR>";
				echo"</div>";
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Usuario</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname12\" VALUE=\"$usuario\">" . "<BR>";
				echo"</div>";
				
				
                echo "<BR>";
				//echo "<INPUT TYPE=\"submit\" NAME=\"submit\"class=btn >";
				echo"<button class=btn >GUARDAR</button>";
				echo "<INPUT TYPE=\"hidden\" NAME=\"accion\" VALUE=\"realizar_modificacion\">";
				echo "<INPUT TYPE=\"hidden\" NAME=\"id\" VALUE=\"$id_vehiculo\">";
				echo "</FORM>";

				echo "<br>" . "<a href='admin_flota.php'><button class=btn >Volver</button></a>";
			}
		?>

		<?php
			// Acá, en base al ID recibido, hacemos la modificación.
			if ($_GET["accion"] == "realizar_modificacion")
			{
				include("sql_abm_flota.php");
				$id_vehiculo= $_GET["txtid"];
				$patente = $_GET["txtname"];
				$nro_motor = $_GET["txtname1"]; 
				$nro_chasis = $_GET["txtname2"];
				$marca = $_GET["txtname3"];
				$modelo = $_GET["txtname4"];
				$usuario = $_GET["txtname12"];
				
				
				modificacion($id_vehiculo, $patente, $nro_motor, $nro_chasis, $marca, $modelo, $usuario);
				echo "<br>" . "<a href='admin_flota.php'><button class=btn >Volver</button></a>";
			}
		?>

		<?php
			// Acá mostramos la pantalla de carga de BAJAS en viajes.
			if ($_GET["accion"] == "baja")
			{
				
				$id_vehiculo = $_GET["id_vehiculo"];
				
				echo "<h1> BAJA DE VEHICULOS </h1>";
		
				echo "<h3>Esta seguro que desea eliminar el registro con id : ".$id_vehiculo."</h3>";
				echo "<br>";
				echo "<FORM ACTION=\"abm_flota.php\" CLASS=\"form-signin\" METHOD=\"GET\">";
				
				
					echo "<div class='input-group'>";
					echo"<a href='abm_flota.php?accion=realizar_baja&id_vehiculo=".$id_vehiculo."'><button class=btn2  type='button'> Eliminar </button></a>";
					echo "</div>";
				
				
				echo "</FORM>";
				
				echo "<br>" . "<a href='admin_flota.php'><button class=btn >Volver</button></a>";
				
				exit();
			}
		?>

		<?php
			// Acá, en base al ID recibido, hacemos la baja.
			if ($_GET["accion"] == "realizar_baja")
			{
				include_once("sql_abm_flota.php");
				
				$id_vehiculo = $_GET["id_vehiculo"];
				
				baja($id_vehiculo);
				
				echo "<br>" . "<a href='admin_flota.php'><button class=btn >Volver</button></a>";
			}
		?>
  </div>
	</body>
</html>


