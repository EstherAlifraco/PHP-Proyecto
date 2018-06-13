<html>
<head>
<title>Login</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/css.css" rel="stylesheet" type="text/css">
	
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
	
/* separar los input*/
    .input-group{
      padding: 1pt; 

    }
    /*para lo gris de los imput tengan el mismo tamaño */
    .input-group-addon {
      color: #884EA0;
      min-width:80px;// if you want width please write here //
      text-align:right;
      
    }
    /* para coinsidir el icono de block en la password*/
    .input-group .form-control {
        margin: 0px !important;
    }
	
	.btn {
		margin-top: 1pt;
	}
	
	</style>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<div class="jumbotron text-center">
  <h1>LOGISTICA</h1> 
  <div class="container">
      <form class="form-signin" action="autenticacion.php" method="POST">
        <h2 class="form-signin-heading">INGRESA</h2>
		  <br>
        <!-- usuario -->
    <div class="input-group">
      <span class="input-group-addon" id="basic-addon1">Usuario</span>
      <input type="text" name="usuario" id="inputUsu" class="form-control" placeholder="ingrese Usuario" aria-describedby="basic-addon1">
    </div>


      <!-- PASSWORD -->
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
          <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Contrase&ntilde;a" aria-describedby="basic-addon3" >
      </div>

        <button class="btn btn-lg btn-default btn-block" type="submit" name="guardar_clave">ENTRAR</button>
        
      </form>
	  
	  	<br> 
	  
    <!--
		-MODIFICAR POR QUE EL REGISTRO LO HACE EL ADMINISTRADOR-
		<a href="registro.php"> Registrate </a>
	  	<br> <br>
	  	<a href="recordatorio.php">¿Has olvidado tu contrase&ntildea?</a>
     -->   
    </div>

</body>
</html>