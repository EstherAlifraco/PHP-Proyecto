<?PHP
session_start();

if(!isset($_SESSION['usuario'])){
session_destroy();
header("Location: login.php");
exit();
}

?>

<html>
<head>
<title>VISTA CHOFER</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/css.css" rel="stylesheet" type="text/css"> <!-- css general -->
    <link href="css/bootstrap-yeti-theme.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/site.css" rel="stylesheet" type="text/css">
    
    <link href="css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css">

    <script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="js/momentjs-with-locale.js" type="text/javascript"></script>
    <script src="js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="js/site.js" type="text/javascript"></script>
</head>

<style>
 .jumbotron {
		background-color: #C39BD3; /* cambio */
		color: #fff;
		padding: 100px 25px;
		font-family: Montserrat, sans-serif;	  
	   
		overflow-y:hidden;
		  }

  .btn,.table{
      color:black;
    }


  </style>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="chofer_perfil.php">LOGISTICA</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        
        <li><a href="chofer_viajes.php">VIAJES</a></li>
        <li><a href="chofer_reportes.php">REPORTES</a></li>
        <li><a href="salir.php">SALIR</a></li>
 
      </ul>
    </div>
  </div>
</nav>

<div class="jumbotron text-center">

<br>

<h3>TABLA VIAJES</h3>

<table class="table table-hover"> 
    <thead>
      <tr>
        <th>ID</th>
        <th>ORIGEN</th>
        <th>DESTINO</th>
        <th>FECHA SALIDA</th>
        <th>FECHA LLEGADA</th>
        <th>TIPO DE CARGA</th>
        <th>KM REAL</th>
        <th>COMBUSTIBLE REAL</th>  
		    <th>TIEMPO REAL</th>
		    <th>CLIENTE</th>
		    <th>ADMINISTRADOR</th>
      </tr>
    </thead>
    <tbody>
<?PHP  
include("sql_abm.php");
$link= Conectarse();
$result=mysqli_query($link,"SELECT * FROM viaje GROUP BY id_viaje");
$output=array();
/*
$query="SELECT * FROM viaje GROUP BY id_viaje"; //consulta tabla viajes
$result=mysqli_query($conexion,$query);
*/
while($fila=mysqli_fetch_array($result)){ //arma la tabla con los reales x el chofer
	echo"<tr>";
		echo"<td>".$fila["id_viaje"]."</td>";
		echo"<td>".$fila["origen"]."</td>";
		echo"<td>".$fila["destino"]."</td>";
		echo"<td>".$fila["fecha_salida"]."</td>";
		echo"<td>".$fila["fecha_llegada"]."</td>";
		echo"<td>".$fila["tipo_carga"]."</td>";	
		echo"<td>".$fila["km_recorrido_real"]."</td>";
		echo"<td>".$fila["combustible_real"]."</td>";
		echo"<td>".$fila["tiempo_real"]."</td>";
		// aca faltaria meter magia con sql para traer datos mas representativos del cliente y el administrador
		echo"<td>".$fila["id_cliente"]."</td>";
		echo"<td>".$fila["usuario"]."</td>";

	echo"</tr>";
  }
 ?>      
    </tbody>
  </table>

  <br><br><br><br>
 </div>


</body>
</html>