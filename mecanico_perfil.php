<?PHP
session_start();

if(!isset($_SESSION['usuario'])){
session_destroy();
header("Location: login.php");
exit();
}

?>
<DOCTYPE>
<html>

	<head>
		<title>PERFIL MECANICO</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
			<link href="css/css.css" rel="stylesheet" type="text/css"> <!-- css general -->
			<link href="css/perfil.css" rel="stylesheet" type="text/css">
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
	


	<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
		<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container">
			  
			  
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>                        
			  </button>
			  <a class="navbar-brand" href="#myPage">LOGISTICA</a>
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
			
			

			<h3 class="text-left">
				<?PHP 
				echo "Bienvenido Mecanico " . $_SESSION['usuario']."!";
				?>
			</h3> 

			<div class="row">
				<div class="col-lg-5 col-sm-6">

					<div class="card hovercard">
												

						<div class="cardheader">
								
						</div>
						<div class="avatar">
							<a href="peerfil2.png"><img alt="" src="peerfil2.png"></a>
						</div>
					
						<div class="info">

							<?PHP  
								include("sql_abm.php");
								$link= Conectarse();
								$result=mysqli_query($link,"SELECT nombre,apellido,dni,licencia,matricula  FROM Empleado WHERE usuario='".$_SESSION['usuario']."'");
								$output=array();
								/*
								$query="SELECT nombre,apellido,dni,licencia,matricula  FROM Empleado WHERE usuario='".$_SESSION['usuario']."'"; //consulta tabla empleados para traer la info del logueado
								$result=mysqli_query($conexion,$query);
								*/
								while($fila=mysqli_fetch_array($result)){
									echo"<p>Nombre:".$fila["nombre"]."</p>";
									echo"<p>Apellido:".$fila["apellido"]."</p>";
									echo"<p>Dni:".$fila["dni"]."</p>";
									echo"<p>Licencia:".$fila["licencia"]."</p>";
									echo"<p>Matricula: ".$fila["matricula"]."</p>";
								} 
							?>
	   					</div>
						
						
						<div class="bottom">
							<a class="btn btn-primary btn-twitter btn-sm" href="https://twitter.com/webmaniac">
								<i class="fa fa-twitter"></i>
							</a>
							<a class="btn btn-danger btn-sm" rel="publisher"
							   href="https://plus.google.com/">
								<i class="fa fa-google-plus"></i>
							</a>
							<a class="btn btn-primary btn-sm" rel="publisher"
							   href="https://www.facebook.com/">
								<i class="fa fa-facebook"></i>
							</a>
							
						</div>
						
					</div>
					
				
						
				</div>
				<div class="perfil2">
					<a href="peerfil2.png"><img src="peerfil2.png" ></a>
				</div>
			</div>


		 
		</div>


	</body>
</html>