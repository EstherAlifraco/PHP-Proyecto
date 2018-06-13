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
		//include("sql_abm_viaje.php");

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

      // linea como se hizo en el registro,  guarda si el id no exuste
		//if(!$resul=mysqli_query($link,"INSERT INTO viaje (id_viaje,origen,destino,fecha_salida,fecha_llegada,tipo_carga,km_recorrido_previsto,km_recorrido_real,combustible_previsto,combustible_real,tiempo_estimado,tiempo_real,id_cliente,usuario)values($id_viaje,'$origen','$destino','$fecha_salida','$fecha_llegada','$tipo_carga',$km_previsto,$km_real,$combustible_previsto,$combustible_real,'$tiempo_estimado','$tiempo_real',$id_cliente,'$usuario')"))
								
	
						
    }
?>

<html>
	<head>
		<title>Viajes</title>
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
			  overflow-y: hidden;
			  font-family: Montserrat, sans-serif;
		  }
		.btn:hover{
			color:#C39BD3;
			background-color:rgba(0,0,0,0.4); 
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
		</nav>

	<div class="jumbotron text-center">
<h3>· Complete el siguiente formulario para crear un nuevo VIAJE ·</h3>

   <div class="container">
 	<a href="admin_registrar_viaje.php"><button class="btn" type="button">Crear Viaje</button></a>


</div>
	
<h3>LISTA DE VIAJES</h3>

<table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Origen</th>
        <th>Destino</th>
        <th>F.salida</th>
        <th>F.llegada</th>
        <th>Carga</th>
        <th>Km previsto</th>
        <th>Km real</th>
        <th>Comb previsto</th>
        <th>Comb real</th>  
		<th>Tiempo estimado</th>
		<th>Tiempo real</th>
		<th>Cliente</th>

      </tr>
    </thead>
    <tbody>
<?PHP  
include_once("sql_abm_viaje.php");
$link= Conectarse();
$result=mysqli_query($link,"SELECT * FROM viaje GROUP BY id_viaje");
$output=array();

while($fila=mysqli_fetch_array($result)){ // tabla con los datos cargados por el admin
	echo"<tr>";
		echo"<td>".$fila["id_viaje"]."</td>";
		echo"<td>".$fila["origen"]."</td>";
		echo"<td>".$fila["destino"]."</td>";
		echo"<td>".$fila["fecha_salida"]."</td>";
		echo"<td>".$fila["fecha_llegada"]."</td>";
		echo"<td>".$fila["tipo_carga"]."</td>";
		echo"<td>".$fila["km_recorrido_previsto"]."</td>";
		echo"<td>".$fila["km_recorrido_real"]."</td>";
		echo"<td>".$fila["combustible_previsto"]."</td>";
		echo"<td>".$fila["combustible_real"]."</td>";
		echo"<td>".$fila["tiempo_estimado"]."</td>";
		echo"<td>".$fila["tiempo_real"]."</td>";
		echo"<td>".$fila["id_cliente"]."</td>";
		//botones
		echo"<td><a href='generador_pdf.php?idViaje=" . $fila["id_viaje"] . "'> <button class=btn  type=button>PDF </button></a></td>";
		echo"<td><a href='abm_viaje.php?accion=datos_modificacion&idviaje=".$fila["id_viaje"]."'><button class=btn  type=button> Modificar </button></a></td>";
		echo"<td><a href='abm_viaje.php?accion=baja&idviaje=".$fila["id_viaje"]."'><button class=btn  type=button >Eliminar </button></a></td>";

	echo"</tr>";
  }
 ?>      
    </tbody>
  </table>

	</div>
	</body>

</html>