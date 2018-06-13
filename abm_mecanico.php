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
			min-width:90px;// if you want width please write here //
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
				include("sql_abm_mec.php");

				//me conecto a la BD y SELECCIONO el registro cuyo ID fue pasado.
				$conexion = Conectarse();

					if (!$conexion)
					{
						echo "<h1>Error al intentar conectar a base</h1>";
						echo "<br>" . "<a href='mecanico_mantenimiento.php'><button class=btn >Volver</button></a>";
						exit();
					}
                $id_mantenimiento = $_GET["id_m"];
				$consulta = "SELECT * FROM mantenimiento WHERE id_mantenimiento = $id_mantenimiento";

			

				
				$resultado=mysqli_query($conexion,$consulta);
                $fila = mysqli_fetch_array($resultado);

				if (!$fila)
				{
					echo "<h1>Registro inexistente</h1>";
					echo "<br>" . "<a href='mecanico_mantenimiento.php'><button class=btn >Volver</button></a>";
					exit();
				}

				//cargo los datos del registro en variables para que sea más cómodo trabajar.
                $id_mantenimiento = $fila["id_mantenimiento"];
				$fecha_service = $fila["fecha_service"];
                $km_unidad = $fila["km_unidad"];
				$costo = $fila["costo"];
				$repuestos = $fila["repuestos"];
				$usuario = $fila["usuario"];
				$id_vehiculo = $fila["id_vehiculo"];
				
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
				echo "<FORM ACTION=\"abm_mecanico.php\" CLASS=\"form-signin\" METHOD=\"GET\">";
				
				echo "<div class='input-group'>";
				
				echo "" . "<INPUT TYPE=\"hidden\"  CLASS=\"form-control\" NAME=\"txtid\" VALUE=\"$id_mantenimiento\">" . "<BR>";
				echo "</div>";			
				
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Fecha</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname\" VALUE=\"$fecha_service\">" . "<BR>";
				echo"</div>";
				
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Unidad</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname1\" VALUE=\"$km_unidad\">" . "<BR>";
				echo"</div>";
				
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>$</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname2\" VALUE=\"$costo\">" . "<BR>";
				echo"</div>";
				
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Repuesto</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname3\" VALUE=\"$repuestos\">" . "<BR>";
				echo"</div>";
								
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Usuario</span>";
               	echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname4\" VALUE=\"$usuario\">" . "<BR>";
				echo"</div>";
				
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Id</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname5\" VALUE=\"$id_vehiculo\">" . "<BR>";
				echo"</div>";
			
                echo"<br>";
				//echo "<INPUT TYPE=\"submit\" NAME=\"submit\"class=btn >";
				echo"<button class=btn>GUARDAR</button>";
				echo "<INPUT TYPE=\"hidden\" NAME=\"accion\" VALUE=\"realizar_modificacion\">";
				echo "<INPUT TYPE=\"hidden\" NAME=\"id\" VALUE=\"$id_mantenimiento\">";
				
			
				echo "</FORM>";
				
				echo "<br>" . "<a href='mecanico_mantenimiento.php'><button class=btn >Volver</button></a>";
			}
		?>

		<?php
			// Acá, en base al ID recibido, hacemos la modificación.
			if ($_GET["accion"] == "realizar_modificacion")
			{
				include("sql_abm_mec.php");
				$id_mantenimiento = $_GET["txtid"];
				$fecha_service = $_GET["txtname"];
				$km_unidad = $_GET["txtname1"]; 
				$costo = $_GET["txtname2"];
				$repuesto = $_GET["txtname3"];
				$usuario = $_GET["txtname4"];
				$id_vehiculo = $_GET["txtname5"];
				
				modificacion($id_mantenimiento, $fecha_service, $km_unidad, $costo, $repuesto, $usuario, $id_vehiculo);
				echo "<br>" . "<a href='mecanico_mantenimiento.php'><button class=btn >Volver</button></a>";
			}
		?>

		<?php
			// Acá mostramos la pantalla de carga de BAJAS en viajes.
			if ($_GET["accion"] == "baja")
			{
			
				
				$id_mantenimiento = $_GET["id_m"];
				
 
				
				echo "<h1> BAJA DE VEHICULOS</h1>";
				
				echo "<h3>Esta seguro que desea eliminar el registro con id : ".$id_mantenimiento."</h3>";
				echo "<br>";
				echo "<FORM ACTION=\"abm_mecanico.php\" CLASS=\"form-signin\" METHOD=\"GET\">";
				
					echo "<div class='input-group'>";
					
					
				
					echo"<a href='abm_mecanico.php?accion=realizar_baja&id_m=".$id_mantenimiento."'><button class=btn2  type='button'> Eliminar </button></a>";
					
					echo "</div>";
					
				
				echo "</FORM>";
				
				echo "<br>" . "<a href='mecanico_mantenimiento.php'><button class=btn >Volver</button></a>";
				
				exit();
			}
		?>

		<?php
			// Acá, en base al ID recibido, hacemos la baja.
			if ($_GET["accion"] == "realizar_baja")
			{
				include_once("sql_abm_mec.php");
				$id_mantenimiento= $_GET["id_m"];
			
				
				baja($id_mantenimiento);
				
				echo "<br>" . "<a href='mecanico_mantenimiento.php'><button class=btn >Volver</button></a>";
			}
		?>
  </div>
	</body>
</html>


