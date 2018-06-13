<?php
session_start();

	if(!isset($_SESSION['usuario'])){
		session_destroy();
		header("Location: login.php");
	}
?>


<?php

    if(isset($_POST['btnCrearVehiculo']))
    {
    	include_once("sql_abm_flota.php");

		$link= Conectarse();
		$id_vehiculo=$_POST['id_vehiculo'];
		$patente=$_POST['patente'];
		$nro_motor=$_POST['nro_motor'];
		$nro_chasis=$_POST['nro_chasis'];
		$marca=$_POST['marca'];
		$modelo=$_POST['modelo'];
		$usuario=$_POST['usuario'];
	
   		$sql="INSERT INTO vehiculo (id_vehiculo,patente,nro_motor,nro_chasis,marca,modelo,usuario)values('$id_vehiculo','$patente',$nro_motor,$nro_chasis,'$marca','$modelo','$usuario')";
		
		$result=mysqli_query($link,$sql);	

    						
						
    }
?>

<html>
<head>
  <title>REGISTRAR</title>
    <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
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
</nav> -->
<div class="jumbotron text-center">
  <div class="container">
  	<h1 class="form-signin-heading">REGISTRAR FLOTA</h1>
  	<form class="form-signin" method="POST" action="admin_registrar_flota.php"  >
	<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Id Vehiculo</span>
			<input type="text" name="id_vehiculo"  id="inputvehiculo" class="form-control" placeholder="Ingrese ID Vechiculo" aria-describedby="basic-addon1" >
	</div>


	 <div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Patente</span>
			<input type="text" name="patente"  id="inputPatente" class="form-control" placeholder="Ingrese patente" aria-describedby="basic-addon1" >
	</div>

		    <div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Marca</span>
			<input type="text" name="marca"  id="inputMarca" class="form-control" placeholder="Ingrese marca" aria-describedby="basic-addon1" >
	</div>


	<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Modelo</span>
			<input type="text" name="modelo"  id="inputModelo" class="form-control" placeholder="Ingrese modelo" aria-describedby="basic-addon1" >
	</div>

	 <div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Nº Chasis</span>
			<input type="text" name="nro_chasis"  id="inputChasis" class="form-control" placeholder="Ingrese Nro Chasis" aria-describedby="basic-addon1" >
	 </div>


	 <div class="input-group">
			<span class="input-group-addon" id="basic-addon1">NºMotor</span>
			<input type="text" name="nro_motor"  id="inputMotor" class="form-control" placeholder="Ingrese Nro Motor" aria-describedby="basic-addon1" >
	 </div>

	  <div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Usuario</span>
			<input type="text" name="usuario"  id="inputUsiario" class="form-control" placeholder="Ingrese usuario" aria-describedby="basic-addon1" >
      </div>
 
   <br>
	<button type="submit" class="btn" id="btnCrearVehiculo" name="btnCrearVehiculo">Crear Vechiculo</button>

	<br>	

  </form>
</div><br>
   <center><a href="admin_flota.php"> <button class=btn >Volver</button> </a> </center>
</body>
</html>
	
	
	
	
	
	
