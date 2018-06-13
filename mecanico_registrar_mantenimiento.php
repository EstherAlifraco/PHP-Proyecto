<?php
session_start();

	if(!isset($_SESSION['usuario'])){
		session_destroy();
		header("Location: login.php");
	}
?>

<?php

    if(isset($_POST['btnCrearMatenimiento']))
    {
		include_once("sql_abm_mec.php");
		$id_mantenimiento=$_POST['id_mantenimiento'];
		$fecha_service=$_POST['fecha_service'];
		$km_unidad=$_POST['km_unidad'];
		$costo=$_POST['costo'];
		$repuestos=$_POST['repuestos'];
		$usuario=$_POST['usuario'];
		$id_vehiculo=$_POST['id_vehiculo'];
			

   		$sql="INSERT INTO mantenimiento (id_mantenimiento,fecha_service,km_unidad,costo,repuestos,usuario,id_vehiculo)values('$id_mantenimiento','$fecha_service',$km_unidad,$costo,'$repuestos','$usuario','$id_vehiculo')";
		
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
			min-width:90px;// if you want width please write here //
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
					<a class="navbar-brand" href="#">LOGISTICA</a>
				</div>
				
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-right">
							<li><a href="mecanico_perfil.php">PERFIL</a></li>
							<li><a href="mecanico_mantenimiento.php">MANTENIMIENTO</a></li>
							<li><a href="salir.php">SALIR</a></li>
					
					</ul>
				</div>
	
			</div>
		</nav>
<div class="jumbotron text-center">
  <div class="container">
  	<h1 class="form-signin-heading">REGISTRAR MANTENIMIENTO</h1>
  	<form class="form-signin" method="POST" action="mecanico_registrar_mantenimiento.php"  >
	
<div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Id</span>
            <input type="text" name="id_mantenimiento"  id="inputMant" class="form-control" placeholder="Ingrese ID Mantenimiento" aria-describedby="basic-addon1" >
    </div>
 
 
     <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Fecha</span>
            <input type="text" name="fecha_service"  id="inputFecha" class="form-control" placeholder="Ingrese fecha de service" aria-describedby="basic-addon1" >
    </div>
 
            <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Km unidad</span>
            <input type="text" name="km_unidad"  id="inputKm" class="form-control" placeholder="Ingrese Km de la unidad" aria-describedby="basic-addon1" >
    </div>
 
 
    <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Costo</span>
            <input type="text" name="costo"  id="inputCosto" class="form-control" placeholder="Ingrese costo" aria-describedby="basic-addon1" >
    </div>
 
     <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Repuestos</span>
            <input type="text" name="repuestos"  id="inputRepuestos" class="form-control" placeholder="Ingrese Repuestos" aria-describedby="basic-addon1" >
     </div>
 
 
     <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Usuario</span>
            <input type="text" name="usuario"  id="inputUsuario" class="form-control" placeholder="Ingrese usuario" aria-describedby="basic-addon1" >
     </div>
 
<!-- id vehiculo debe ser un select con opciones -->
      <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">Id vehiculo</span>
            <input type="text" name="id_vehiculo"  id="inputVehiculo" class="form-control" placeholder="Ingrese Id vehiculo" aria-describedby="basic-addon1" >
      </div>

 <br><br>
<button type="submit" class="btn" id="btnCrearMantenimiento" name="btnCrearMatenimiento">Crear Mantenimiento</button><br>



  </form>
</div><br>
   <center><a href="mecanico_mantenimiento.php"> <button class=btn >Volver</button> </a> </center>
</body>
</html>
	
	
	
	
	
	
