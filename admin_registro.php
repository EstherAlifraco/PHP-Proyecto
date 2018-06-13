<?php
    $error1="";
    $error2="";
    $error3="";
    $error4="";
    $error5="";
	$error6="";
	$error7="";
	$error8="";
	$error9="";
	$error10="";

    if(isset($_POST['btn1']))
    {
		include("sql_abm.php");
		$link= Conectarse();
		//$result=mysqli_query($link,"select * from empleado");
		$id=$_POST['id'];
		$usuario=$_POST['usuario'];
		$password=$_POST['password'];
		$password2=$_POST['password2'];
		$rol=$_POST['rol'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$dni=$_POST['dni'];
		
		// se valida el resto? porque quedamos en que eran vacios 
		$area=$_POST['area'];
		$licencia=$_POST['licencia'];
		$matricula=$_POST['matricula'];
		
		// Solo inserta si el usuario no existe
		if(!$resul=mysqli_query($link,"INSERT INTO empleado (id,usuario,password,rol,nombre,apellido,dni,area,licencia,matricula)values($id,'$usuario','$password',$rol,'$nombre','$apellido',$dni,'$area','$licencia','$matricula')"))
								{
									$error4="ERROR! Pruebe ingresando otro usuario";
								}
	
			
		
	}/* cierra le if del btni*/
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
  	<h1 class="form-signin-heading">REGISTRAR</h1>
  	<form class="form-signin" method="POST" action="admin_registro.php"  >
		<!-- ID -->
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Id</span>
			<input type="text" name="id" class="form-control" placeholder="ingrese ID aqu&iacute" aria-describedby="basic-addon1"  >
			<!-- autofocus value= <?php /* if(isset($id))echo $id;*/ ?> -->
		</div>
		
		<!-- NOMBRE -->
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Nombre</span>
			<input type="text" name="nombre" class="form-control" placeholder="ingrese nombre aqu&iacute" aria-describedby="basic-addon1"  >
		</div>
		
		<!-- APELLIDO -->
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Apellido</span>
			<input type="text" name="apellido" class="form-control" placeholder="ingrese apellido aqu&iacute" aria-describedby="basic-addon1">
		</div>
		
		<!-- DNI -->
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">DNI</span>
			<input type="text" name="dni" class="form-control" placeholder="ingrese DNI aqu&iacute" aria-describedby="basic-addon1" >
		</div>
		
		<!-- ROL -->
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Rol</span>
			<input type="text" name="rol" class="form-control" placeholder="ingrese rol aqu&iacute;" aria-describedby="basic-addon1" >
		</div>
		
		<br>
		
		<label for="basic-url">Segun corresponda</label>
		<!-- AREA -->
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon3">Area  </span> 			
			<input type="text" name="area" class="form-control" id="basic-url" placeholder="ingrese area aqu&iacute;" aria-describedby="basic-addon3" >
			
		</div>
		
		<!-- LICENCIA -->
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon3">Licencia</span>
			<input type="text" name="licencia" class="form-control" id="basic-url" placeholder="ingrese licencia aqu&iacute;" aria-describedby="basic-addon3" >
		</div>
		
		<!-- MATRICULA -->
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon3">Matricula</span>
			<input type="text" name="matricula" class="form-control" id="basic-url" placeholder="ingrese matricula aqu&iacute;" aria-describedby="basic-addon3" >
		</div>
		
		<br>
		<label for="basic-url">Designaci&oacute;n de usuario</label>
		
		<!-- USUARIO -->
		<div class="input-group">
			<span class="input-group-addon" id="basic-addon3">Usuario</span>
			<input type="text" name="usuario" class="form-control" id="basic-url" placeholder="ingrese usuario aqu&iacute;" aria-describedby="basic-addon3" >
		</div>
		
		<!-- PASSWORD -->

		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      		<input type="password" class="form-control" name="password" id="basic-url" placeholder="Contrase&ntilde;a" aria-describedby="basic-addon3" >
   		</div>

		
		
		
		
		<!-- PASSWORD 2-->
		<div class="input-group">
			<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      		<input type="password" class="form-control" name="password2" id="basic-url" placeholder="Confirmar contrase&ntilde;a"  aria-describedby="basic-addon3">
   		</div>
			
	
	<br>	
   <!-- <input  class="btn" type="submit" id="btn1" name="btn1">-->
    <button class=btn type="submit" id="btn1" name="btn1" >Crear Empleado</button>

            <div class="alert alert-secondary" role="alert">
             <?php
                    echo $error1;
                    echo $error2;
                    echo $error3;
                    echo $error4;
                    echo $error5;
					echo $error6;
					echo $error7;
					echo $error8;
             ?>
        </div>
  </form>
</div>
   <center><a href="admin_empleados.php"> <button class=btn >Volver</button></a> </center>
</body>
</html>
	
	
	
	
	
	
