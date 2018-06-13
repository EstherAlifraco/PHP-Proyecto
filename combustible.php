<?PHP
	session_start();

	if(!isset($_SESSION['usuario'])){
	session_destroy();
	header("Location: login_movil.php");
	exit();
	}
	$idViaje = $_GET['idViaje'];
?>
<?php
	if(isset($_POST['cargar'])){
		include_once("conexion.php");
		$link= Conectarse();
		
		
		$com_real=$_POST['comb_real'];
		
		
		$sql="UPDATE bitacora SET combustible=$com_real WHERE id_viaje = $idViaje ";
		
		$result=mysqli_query($link,$sql);
		//$resul=mysqli_query($link,"UPDATE bitacora SET combustible_real=$com_real");
		//cerramos la conexión con el motor de BD
		mysqli_close($link);
		
	}
	
?>




<html>
<head>
<title>Aplicacion celu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/css.css" rel="stylesheet" type="text/css"> <!-- css general -->
   
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/site.css" rel="stylesheet" type="text/css">
    <!--
	<link href="css/bootstrap-yeti-theme.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css">
	-->
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
	
	/* modifica los botones */
	.btn {
		height: 5%;
		min-width: 10%;
		color: black;
		font-family: Montserrat, sans-serif;
		font-size: 15px
		
	}
	
	.btn:hover{
		color:white;
		background-color:rgba(0, 0, 0, 0.25);
	}
	input{
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

	<?php
		echo '<form action="combustible.php?idViaje='.$idViaje.'" method="post">';
		echo '	<div class="input-group">';
		echo '	<span class="input-group-addon" id="basic-addon1">Litros</span>';
		echo '	<input type="text" name="comb_real"  id="inputCombrea" class="form-control" placeholder="Ingrese combustible real" aria-describedby="basic-addon1" >';
		echo '	</div>';
		echo '<br>';
		
		echo '	<button type="submit" class="btn" id="cargar" name="cargar">CARGAR</button><br>';	
		
		
		echo '<br>';
		
		echo '</form>';
	?>
	
	<BR><BR>
	
	
	
	
	
	
	
	
	
	
	
	
	
 </div>


</body>
</html>
	