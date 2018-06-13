 <?php
	include("conexion.php");
	$conexion = Conectarse();


	//preparamos la consulta
		$SQLDatos = "SELECT * FROM mantenimiento as m join vehiculo as v on m.id_vehiculo=v.id_vehiculo  ";

	//ejecutamos la consulta
	$result = mysqli_query($conexion,$SQLDatos);
	//obtenemos número filas
	$row = mysqli_num_rows($result);

	//cargamos array con los nombres de las métricas a visualizar
	$datos[0] = array('combustible','patente');


	function mysqli_result($result,$row,$datos=0){
		$result->data_seek($row);
		$data=$result->fetch_array();
		return $data[$datos];
	}


	

	//recorremos filas
	for ($i=1; $i<($row+1); $i++)
	{
		$datos[$i] = array(mysqli_result($result, $i-1, "patente"),
		(int) mysqli_result($result, $i-1, "combustible"));
	}

	mysqli_close($conexion);
?>

<html>
<head>
<title>Combustible</title>
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" > </script>
<!-- Load the AJAX API -->
<script type="text/javascript" src="https://www.google.com/jsapi" > </script>
<script type="text/javascript"
src="https://www.google.com/jsapi?autoload={
'modules':[{
'name':'visualization',
'version':'1',
'packages':['corechart']
}]
}"></script>
 
<script type="text/javascript">
google.setOnLoadCallback(drawChart);
 
function drawChart() {
 
//cargamos nuestro array $datos creado en PHP para que se puede utilizar en JavaScript
var cargaDatos = <?php echo json_encode($datos); ?>;
 
var datosFinales = google.visualization.arrayToDataTable(cargaDatos);
 
var options = {
title: 'Rendimiento de Combustible segun patentes',
curveType: 'function',
legend: { position: 'bottom' }
};
 
var chart = new google.visualization.PieChart(document.getElementById('piechart'));
 
chart.draw(datosFinales, options);
}
 
</script>
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
							
							<li><a href="admin_flota.php">FLOTA</a></li>
							<li><a href="admin_grafico.php">GRÁFICOS</a></li>
							<li><a href="salir.php">SALIR</a></li>
					
					</ul>
				</div>
	
			</div>
		</nav> 
		
		<div class="jumbotron text-center">
<center><div id="piechart" style="width: 900px; height: 500px"></div></center>
<br><br>
 <a href="admin_grafico.php"><button class="btn" type="button">Volver</button></a>
</body>
</html>