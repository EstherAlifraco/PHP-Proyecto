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
				
				min-width:110px;// if you want width please write here //
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
				include("sql_abm_viaje.php");

				//me conecto a la BD y SELECCIONO el registro cuyo ID fue pasado.
				$conexion = Conectarse();

					if (!$conexion)
					{
						echo "<h1>Error al intentar conectar a base</h1>";
						echo "<br>" . "<a href='admin_viajes.php'><button class=btn >Volver</button></a>";
						exit();
					}
                $id = $_GET['idviaje'];
				$consulta = "SELECT * FROM viaje WHERE id_viaje = $id";

				

				
				$resultado=mysqli_query($conexion,$consulta);
                $fila = mysqli_fetch_array($resultado);

				if (!$fila)
				{
					echo "<h1>Registro inexistente</h1>";
					echo "<br>" . "<a href='admin_viajes.php'><button class=btn >Volver</button></a>";
					exit();
				}

				//cargo los datos del registro en variables para que sea más cómodo trabajar.
                $id = $fila["id_viaje"];
				$origen = $fila["origen"];
                $destino = $fila["destino"];
				$fecha_s = $fila["fecha_salida"];
				$fecha_ll = $fila["fecha_llegada"];
				$tipo_c = $fila["tipo_carga"];
				$km_rec_prev = $fila["km_recorrido_previsto"];
				$km_rec_real = $fila["km_recorrido_real"];
				$comb_p = $fila["combustible_previsto"];
				$comb_r = $fila["combustible_real"];
				$tiempo_e = $fila["tiempo_estimado"];
				$tiempo_r = $fila["tiempo_real"];
				$id_c = $fila["id_cliente"];
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
				echo "<FORM ACTION=\"abm_viaje.php\" CLASS=\"form-signin\"  METHOD=\"GET\">";
				
				
				echo "<div class='input-group'>";
				
				echo "" . "<INPUT TYPE=\"hidden\" CLASS=\"form-control\" NAME=\"txtid\" VALUE=\"$id\">" . "<BR>";
				echo"</div>";
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Origen</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname\" VALUE=\"$origen\">" . "<BR>";
				echo"</div>";
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Destino</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname1\" VALUE=\"$destino\">" . "<BR>";
				echo"</div>";
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Salida</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname2\" VALUE=\"$fecha_s\">" . "<BR>";
				echo"</div>";	
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Llegada</span>";
				echo "" . "<INPUT TYPE=\"TEXT\" CLASS=\"form-control\" NAME=\"txtname3\" VALUE=\"$fecha_ll\">" . "<BR>";
				echo"</div>";
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Carga</span>";
                echo "" . "<INPUT TYPE=\"TEXT\" CLASS=\"form-control\" NAME=\"txtname4\" VALUE=\"$tipo_c\">" . "<BR>";
				echo"</div>";
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>KM</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname5\" VALUE=\"$km_rec_prev\">" . "<BR>";
				echo "<span class='input-group-addon' id='basic-addon1'>Aprox.</span>";
				echo"</div>";
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>KM </span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname6\" VALUE=\"$km_rec_real\">" . "<BR>";
				echo "<span class='input-group-addon' id='basic-addon1'>Real </span>";
				echo"</div>";
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Combustible</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname7\" VALUE=\"$comb_p\">" . "<BR>";
				echo "<span class='input-group-addon' id='basic-addon1'>Aprox.</span>";
				echo"</div>";
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Combustible</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname8\" VALUE=\"$comb_r\">" . "<BR>";
				echo "<span class='input-group-addon' id='basic-addon1'>Real</span>";
				echo"</div>";
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Tiempo</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname9\" VALUE=\"$tiempo_e\">" . "<BR>";
				echo "<span class='input-group-addon' id='basic-addon1'>Aprox.</span>";
				echo"</div>";
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Tiempo</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname10\" VALUE=\"$tiempo_r\">" . "<BR>";
				echo "<span class='input-group-addon' id='basic-addon1'>Real</span>";
				echo"</div>";
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Cliente</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname11\" VALUE=\"$id_c\">" . "<BR>";
				echo"</div>";
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Usuario</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname12\" VALUE=\"$usuario\">" . "<BR>";
				echo"</div>";
				
                echo "<BR>";
				//echo "<INPUT TYPE=\"submit\" NAME=\"submit\"class=btn >";
				echo"<button class=btn >GUARDAR</button>";
				echo "<INPUT TYPE=\"hidden\" NAME=\"accion\" VALUE=\"realizar_modificacion\">";
				echo "<INPUT TYPE=\"hidden\" NAME=\"id\" VALUE=\"$id\">";
				echo "</FORM>";

				echo "<br>" . "<a href='admin_viajes.php'><button class=btn >Volver</button></a>";
			}
		?>

		<?php
			// Acá, en base al ID recibido, hacemos la modificación.
			if ($_GET["accion"] == "realizar_modificacion")
			{
				include("sql_abm_viaje.php");
				$id = $_GET["txtid"];
				$origen = $_GET["txtname"];
				$destino = $_GET["txtname1"]; 
				$fecha_s = $_GET["txtname2"];
				$fecha_ll = $_GET["txtname3"];
				$tipo_c = $_GET["txtname4"];
				$km_rec_prev = $_GET["txtname5"];
				$km_rec_real = $_GET["txtname6"];
				$comb_p = $_GET["txtname7"];
				$comb_r = $_GET["txtname8"];
				$tiempo_e = $_GET["txtname9"];
				$tiempo_r = $_GET["txtname10"];
				$id_c = $_GET["txtname11"];
				$usuario = $_GET["txtname12"];
				
				
				modificacion($id, $origen, $destino, $fecha_s, $fecha_ll, $tipo_c, $km_rec_prev, $km_rec_real, $comb_p, $comb_r, $tiempo_e, $tiempo_r, $id_c, $usuario);
				echo "<br>" . "<a href='admin_viajes.php'><button class=btn >Volver</button></a>";
			}
		?>

		<?php
			// Acá mostramos la pantalla de carga de BAJAS en viajes.
			if ($_GET["accion"] == "baja")
			{
				
				$id_viaje = $_GET["idviaje"];
				
				echo "<h1> BAJA DE VIAJES</h1>";
				echo "<br>";
				
				echo "<h3>Esta seguro que desea eliminar el registro con id : ".$id_viaje."</h3>";
				
				echo "<FORM ACTION=\"abm_viaje.php\" CLASS=\"form-signin\" METHOD=\"GET\">";
					
					echo "<div class='input-group'>";
					echo"<a href='abm_viaje.php?accion=realizar_baja&idviaje=".$id_viaje."'><button class=btn2  type=button >Eliminar </button></a>";
					echo "</div>";
				
				echo "</FORM>";
				
				echo "<br>" . "<a href='admin_viajes.php'><button class=btn >Volver</button></a>";
				
				exit();
			}
		?>

		<?php
			// Acá, en base al ID recibido, hacemos la baja.
			if ($_GET["accion"] == "realizar_baja")
			{
				include_once("sql_abm_viaje.php");
				
				$id = $_GET["idviaje"];
				
				baja($id);
				
				echo "<br>" . "<a href='admin_viajes.php'><button class=btn >Volver</button></a>";
			}
		?>
  </div>
	</body>
</html>


