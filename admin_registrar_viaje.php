<?php
session_start();

	if(!isset($_SESSION['usuario'])){
		session_destroy();
		header("Location: login.php");
	}
?>

<?php

    if(isset($_POST['btnCrearViaje']))
    {
    	include_once("sql_abm_viaje.php");

		$link= Conectarse();
		$id_viaje=$_POST['id_viaje'];
		$origen=$_POST['origen'];
		$destino=$_POST['destino'];
		$fecha_salida=$_POST['fecha_salida'];
		$fecha_llegada=$_POST['fecha_llegada'];
		$tipo_carga=$_POST['carga'];
		$km_previsto=$_POST['km_previsto'];
		$km_real=$_POST['km_real'];
		$combustible_previsto=$_POST['comb_previsto'];
		$combustible_real=$_POST['comb_real'];
		$tiempo_estimado=$_POST['tiempo_previsto'];
		$tiempo_real=$_POST['tiempo_real'];
		$id_cliente=$_POST['cliente'];
		$usuario=$_POST['usuario'];
		
	
   		$sql="INSERT INTO viaje (id_viaje,origen,destino,fecha_salida,fecha_llegada,tipo_carga,km_recorrido_previsto,km_recorrido_real,combustible_previsto,combustible_real,tiempo_estimado,tiempo_real,id_cliente,usuario)values($id_viaje,'$origen','$destino','$fecha_salida','$fecha_llegada','$tipo_carga',$km_previsto,$km_real,$combustible_previsto,$combustible_real,'$tiempo_estimado','$tiempo_real',$id_cliente,'$usuario')";
		
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
  	<h1 class="form-signin-heading">REGISTRAR VIAJE</h1>
  	<form class="form-horizontal" method="POST" action="admin_registrar_viaje.php"  >
		
<!-- COLUMNA IZQUIERDA -->    	
<div class="col-sm-6"> 

    <div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Id Viaje</span>
			<input type="text" name="id_viaje"  id="inputId" class="form-control" placeholder="Ingrese ID" aria-describedby="basic-addon1" >
	</div>


	 <div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Origen</span>
			<input type="text" name="origen"  id="inputOrigen" class="form-control" placeholder="Ingrese origen" aria-describedby="basic-addon1" >
	</div>

		    <div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Destino</span>
			<input type="text" name="destino"  id="inputDestino" class="form-control" placeholder="Ingrese destino" aria-describedby="basic-addon1" >
	</div>


	<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Salida</span>
			<input type="text" name="fecha_salida"  id="inputSalida" class="form-control" placeholder="Ingrese fecha de salida" aria-describedby="basic-addon1" >
	</div>

	 <div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Llegada</span>
			<input type="text" name="fecha_llegada"  id="inputLlegada" class="form-control" placeholder="Ingrese fecha de llegada" aria-describedby="basic-addon1" >
	 </div>


	 <div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Carga</span>
			<input type="text" name="carga"  id="inputCarga" class="form-control" placeholder="Ingrese tipo de carga" aria-describedby="basic-addon1" >
	 </div>

	  <div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Cliente</span>
			<input type="text" name="cliente"  id="inputCliente" class="form-control" placeholder="Ingrese cliente" aria-describedby="basic-addon1" >
      </div>

 
    
</div>

 <!-- COLUMNA DERECHA -->  
<div class="col-sm-6">

      <div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Usuario</span>
			<input type="text" name="usuario"  id="inputUsuario" class="form-control" placeholder="Ingrese usuario" aria-describedby="basic-addon1" >
      </div>

       <div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Km</span>
			<input type="text" name="km_previsto"  id="inputKmpre" class="form-control" placeholder="Ingrese km previsto" aria-describedby="basic-addon1" >
      </div>

            <div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Km</span>
			<input type="text" name="km_real"  id="inputKmprea" class="form-control" placeholder="Ingrese km real" aria-describedby="basic-addon1" >
      </div>
      
          
<!-- COMBUSTIBLE PREVISTO Y REAL -->  

           <div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Litros</span>
			<input type="text" name="comb_previsto"  id="inputCombpre" class="form-control" placeholder="Ingrese combustible previsto" aria-describedby="basic-addon1" >
      </div>

           <div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Litros</span>
			<input type="text" name="comb_real"  id="inputCombrea" class="form-control" placeholder="Ingrese combustible real" aria-describedby="basic-addon1" >
      </div>

      <div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Tiempo </span>
			<input type="text" name="tiempo_previsto"  id="inputTiempopre" class="form-control" placeholder="Ingrese tiempo previsto" aria-describedby="basic-addon1" >
      </div>

         <div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Tiempo </span>
			<input type="text" name="tiempo_real"  id="inputTiemporea" class="form-control" placeholder="Ingrese tiempo real" aria-describedby="basic-addon1" >
      </div>

    <br>
  </div>

   <br>
	<button type="submit" class="btn" id="btnCrearViaje" name="btnCrearViaje">Crear Viaje</button><br>


  </form>
</div>
   <center><a href="admin_viajes.php"> <button class=btn >Volver</button> </a> </center>
</body>
</html>
	
	
	
	
	
	
