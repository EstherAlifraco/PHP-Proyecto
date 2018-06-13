<!DOCTYPE>
<html>
	<head>
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="css/css.css" rel="stylesheet" type="text/css"> <!-- css general -->
		
		<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="css/site.css" rel="stylesheet" type="text/css">
		
		<script src="js/jquery-1.11.3.min.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js" type="text/javascript"></script>
		<script src="js/momentjs-with-locale.js" type="text/javascript"></script>
		<script src="js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
		<script src="js/site.js" type="text/javascript"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		
		<title>Geoposicionamiento</title>
		<script src="jquery-3.2.1.min.js"></script>
		<script src="https://maps.google.com/maps/api/js?key=AIzaSyDI10bY8TxXFtPMX3JrnOwfIK8a4MJ2x_8"></script>
		
		<script>
			var x = document.getElementById("demo");
			function getLocation() {
				if (navigator.geolocation) {
					navigator.geolocation.getCurrentPosition(mostrarPosicion, showError);
				} else { 
					x.innerHTML = "La geolocacion no es soportada por su navegador.";
				}
			}

			function mostrarPosicion(posicion) {
				var latitud = posicion.coords.latitude;
				var longitud = posicion.coords.longitude;
				document.getElementById("lti").innerHTML=latitud;
				document.getElementById("lgi").innerHTML=longitud;
				var latlon = new google.maps.LatLng(latitud, longitud)
				var mapa = document.getElementById('mapa')
				mapa.style.height = '250px';
				mapa.style.width = '500px';

				var myOptions = {
				center:latlon,zoom:14,
				mapTypeId:google.maps.MapTypeId.ROADMAP,
				mapTypeControl:false,
				navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
				}

				var map = new google.maps.Map(document.getElementById("mapa"), myOptions);
				var marker = new google.maps.Marker({position:latlon,map:map,title:"Uste esta aqui."});
				
				
				 // alert("latitud:"+latitud+"longitud:"+longitud);				
			
				document.getElementById("latitud").value =latitud; // input latitud
				document.getElementById("lti").innerHTML =latitud; // span latitud
				
				document.getElementById("longitud").value=longitud; //input longitud
				document.getElementById("lgi").innerHTML =longitud; //span  longitud
				
		

				}


			function showError(error) {
				switch(error.code) {
					case error.PERMISSION_DENIED:
						x.innerHTML = "La geolocacion ha sido denegada por el usuario";
						break;
					case error.POSITION_UNAVAILABLE:
						x.innerHTML = "La localizacion no esta disponible."
						break;
					case error.TIMEOUT:
						x.innerHTML = "El timepo de espera ha expirado"
						break;
					case error.UNKNOWN_ERROR:
						x.innerHTML = "Ha ocurrido un error inesperado."
						break;
					}
				}

			
		</script>

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

		#mapa{
			max-width: 100%;
			height: auto;
			margin:auto;

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
			<p id="demo">Presione para obtener la posicion</p>

			<button onclick="getLocation()" class="btn" type="button" name="posicion">Posicion</button>


		
			<form id="formAjax" method="POST" >
				<br>
				<p>Latitud: <span id="lti" name="latitud" value="" ></span><input type="hidden" id="latitud"  name="latitud" value=""></p>
				<p>Longitud:<span id="lgi" name="longitud" value="" ></span><input type="hidden" id="longitud" name="longitud" value=""></p>
				<?php
					$idViaje = $_GET['idViaje'];
					echo"<input type='hidden' id='idViaje' name='idViaje' value=$idViaje />";
				?>
				
					

				<button class="btn" type="button" id="guardar">Guardar</button>
				<BR><BR>
				<div id="mapa" ></div>
				<br>
				<a href="chofer_reportes.php"><button class="btn" type="button" >Volver</button></a>
				<?php
					$idViaje = $_GET['idViaje'];
				?>
			</form>
					
					
				<div id="prueba">
					<a href="#"></a>
				</div>
		</div>
	</body>
</html>

<?php
	$idViaje = $_GET['idViaje'];
	
		

?>
<script type="text/javascript">

	$(document).ready(function(){
		$('#guardar').click(function(){
			var datos=$('#formAjax').serialize();
			
			
		
			$.ajax({
				type:"POST",
				url:"grabar_latlong.php",
				data:datos,
				success:function(x){
					if(x==1){
						var idViaje ="<?php echo $idViaje;?>";
						
						window.location.replace("redirect.php?idViaje="+idViaje);
					
					}else{
						alert("Fallo el server");
					}
				
				}
			});
			
			return false;
		});
	});

	
	//   https://www.youtube.com/watch?v=bmF0m9BrW20
</script>



















