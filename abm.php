
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
				include("sql_abm.php");

				//me conecto a la BD y SELECCIONO el registro cuyo ID fue pasado.
				$conexion = Conectarse();

					if (!$conexion)
					{
						echo "<h1>Error al intentar conectar a base</h1>";
						echo "<br>" . "<a href='admin_empleados.php'><button class=btn >Volver</button></a>";
						exit();
					}
                $id = $_GET["id"];
				$consulta = "SELECT * FROM empleado WHERE id = $id";

				
				
				$resultado=mysqli_query($conexion,$consulta);
                $fila = mysqli_fetch_array($resultado);

				if (!$fila)
				{
					echo "<h1>Registro inexistente</h1>";
					echo "<br>" . "<a href='admin_empleados.php'><button class=btn >Volver</button>/a>";
					exit();
				}

				//cargo los datos del registro en variables para que sea más cómodo trabajar.
                $usuario = $fila["usuario"];
                $password = $fila["password"];
				$rol = $fila["rol"];
				$nombre = $fila["nombre"];
				$apellido = $fila["apellido"];
				$dni = $fila["dni"];
				

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
				echo "<FORM ACTION=\"abm.php\"  CLASS=\"form-signin\" METHOD=\"GET\">";
				
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Usuario</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname\" font color =\"black\"VALUE=\"$usuario\">" . "<BR>";
				echo "</div>";
				
				
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon'><i class='glyphicon glyphicon-lock'></i></span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname1\" VALUE=\"$password\">" . "<BR>";
				echo "</div>";	
				
				
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Rol</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname2\" VALUE=\"$rol\">" . "<BR>";
				echo "</div>";	
				
				
				echo "<div class='input-group '>";
				echo "<span class='input-group-addon' id='basic-addon1'>Nombre</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname3\" VALUE=\"$nombre\">" . "<BR>";
				echo "</div>";	
				
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Apellido</span>";
                echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname4\" VALUE=\"$apellido\">" . "<BR>";
				echo "</div>";	
				
				
				echo "<div class='input-group'>";
				echo "<span class='input-group-addon' id='basic-addon1'>Dni</span>";
				echo "" . "<INPUT TYPE=\"TEXT\"  CLASS=\"form-control\" NAME=\"txtname5\" VALUE=\"$dni\">" . "<BR>";
				echo "</div>";	
				
				
                echo "<BR>";
				//echo "<INPUT TYPE=\"submit\" NAME=\"submit\"class=btn >Guardar</input>";
				echo"<button class=btn >GUARDAR</button>";
				echo "<INPUT TYPE=\"hidden\" NAME=\"accion\" VALUE=\"realizar_modificacion\">";
				echo "<INPUT TYPE=\"hidden\" NAME=\"id\" VALUE=\"$id\">";
				echo "</FORM>";

				echo "<br>" . "<a href='admin_empleados.php'><button class=btn >Volver</button></a>";
			}
		?>

		<?php
			// Acá, en base al ID recibido, hacemos la modificación.
			if ($_GET["accion"] == "realizar_modificacion")
			{
				include("sql_abm.php");
				$id = $_GET["id"];
				$usuario = $_GET["txtname"];
				$password = $_GET["txtname1"]; 
				$rol = $_GET["txtname2"];
				$nombre = $_GET["txtname3"];
				$apellido = $_GET["txtname4"];
				$dni = $_GET["txtname5"];
				
				
				modificacion($id, $usuario,$password, $rol, $nombre, $apellido, $dni);
				echo "<br>" . "<a href='admin_empleados.php'><button class=btn >Volver</button></a>";
			}
		?>

		<?php
			// Acá mostramos la pantalla de carga de BAJAS.
			if ($_GET["accion"] == "baja")
			{
				
				$id = $_GET["id"];
				
				echo "<h1> BAJA DE EMPLEADOS</h1>";
				echo "<br>";
				
				echo "<h3>Esta seguro que desea eliminar el registro con id : ".$id."</h3>";
				
				echo "<FORM ACTION=\"abm.php\" CLASS=\"form-signin\" METHOD=\"GET\">";
				
					echo "<div class='input-group'>";
					echo"<a href='abm.php?accion=realizar_baja&id=".$id."'><button class=btn2  type=button >Eliminar </button></a>";
					echo "</div>";
				
				echo "</FORM>";
				
				echo "<br>" . "<a href='admin_empleados.php'><button class=btn >Volver</button></a>";
				
				exit();
			}
		?>

		<?php
			// Acá, en base al ID recibido, hacemos la baja.
			if ($_GET["accion"] == "realizar_baja")
			{
				include("sql_abm.php");
				
				$id = $_GET["id"];
				
				baja($id);
				
				echo "<br>" . "<a href='admin_empleados.php'><button class=btn >Volver</button></a>";
			}
		?>
		
  </div>
	</body>
</html>


