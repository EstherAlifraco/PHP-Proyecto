<?php
session_start();

	if(!isset($_SESSION['usuario'])){
		session_destroy();
		header("Location: login.php");
	}
?>

<?php 
  /* include("sql_abm.php"); 
   $link=Conectarse();
	/* el siguiente bloque provoca un error, lo comente hasta saber que hace. by mel  
	Notice: Object of class mysqli could not be converted to int in C:\xampp\htdocs\logistica\admin_empleados.php on line 14
		if ($link==0)
		{
			echo "<H1>Error en apertura de bases de datos.</H1>";
			exit();
		}
	
	//cambie el orden para k funcione con i
	$result=mysqli_query($link,"select * from empleado");*/
?>
<html>
	<head>
		<title>ABM EMPLEADOS</title>
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
	</head>
	<style>
		/* para cambiar el color del contenido*/
		.jumbotron {
			  background-color: #C39BD3; /* cambio */
			  color: #fff;
			  padding: 100px 25px;
			  font-family: Montserrat, sans-serif;
		  }

		  .btn,.table{
			color:black;
		}
	</style>

	<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
					
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar" >
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>	
					<a class="navbar-brand" href="admin_perfil.php">LOGISTICA</a>
				</div>
				
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-right">
							<li><a href="admin_empleados.php">EMPLEADOS</a></li>
							<li><a href="admin_viajes.php">VIAJES</a></li>
							<!--<li><a href="">REPORTES</a></li>-->
							<li><a href="admin_flota.php">FLOTA</a></li>
							<li><a href="admin_grafico.php">GRÁFICOS</a></li>
							<li><a href="salir.php">SALIR</a></li>
					
					</ul>
				</div>
	
			</div>
		</nav> 
		<div class="jumbotron text-center">
	<h3>· Complete el siguiente formulario para crear un nuevo Empleado ·</h3>
  <a href="admin_registro.php"><button class="btn" type="button">Registrar empleado</button></a>
   <br><br>
	<table class="table table-hover">
    <thead>
      <tr>
	    <th>ID</th>
        <th>USUARIO</th>
        <th>PASSWORD</th> 
		<th>ROL</th>
        <th>NOMBRE</th>
        <th>APELLIDO</th>
        <th>DNI</th>
       
     
      </tr>
    </thead>
    <tbody>
	<?php
	include_once("sql_abm.php");
	$link= Conectarse();
	$result=mysqli_query($link,"select * from empleado order by id");
	$output=array();
	// $query="SELECT * FROM empleado GROUP BY usuario"; consulta tabla empleado
	/* estas dos lineas serian con abrir conexion $result=mysqli_query($conexion,$query);*/
	while($row=mysqli_fetch_array($result)) {
		echo"<tr>";
		echo "<TD>&nbsp;" . $row["id"] . "</TD>";
		echo "<TD>&nbsp;" . $row["usuario"] . "</TD>";
		echo "<TD>&nbsp;" . $row["password"] . "</TD>";
		echo "<TD>&nbsp;" . $row["rol"] . "</TD>";
		echo "<TD>&nbsp;" . $row["nombre"] . "</TD>";
		echo "<TD>&nbsp;" . $row["apellido"] . "</TD>";
		echo "<TD>&nbsp;" . $row["dni"] . "</TD>";	
		echo"<td><a href='abm.php?accion=datos_modificacion&id=".$row["id"]."'><button class=btn  type=button> Modificar </button></a></td>";
		echo"<td><a href='abm.php?accion=baja&id=".$row["id"]."'><button class=btn  type=button >Eliminar </button></a></td>";
   	}
   //liberamos memoria que ocupa la consulta...
   mysqli_free_result($result);
   
   //cerramos la conexión con el motor de BD
   mysqli_close($link);
?>


	
    
    </tbody>
  </table>
		
	</body>

</html>