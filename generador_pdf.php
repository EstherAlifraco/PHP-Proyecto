<?php
	include("Conectarbd.php");
	include("dompdf-master/dompdf_config.inc.php");
	require 'phpqrcode/qrlib.php';
		//https://www.youtube.com/watch?v=S7pn5twfMTA

	$idViaje = $_GET['idViaje'];
	 //sanitizar
	 //chequear permisos


	$dir ='images/';

	$contenido ="localhost/logistica/login_movil.php?idViaje=$idViaje";

	$filename =$dir.'test.png';
	$level ='M';
	$tamanio = 10;
	$frameSize = 3;

	QRcode::png($contenido,$filename,$level,$tamanio,$frameSize);



	$html = "<html><head></head><body>";

	$html .= "<img src='logo.png'><br><br><br>";
	$html .= "<center><u>Viajes</u></center>";
	$html .= "<center><table>";



	$sql = "select * from viaje where id_viaje= " . $idViaje;
	$con = New conectarBD();
	$reg = $con->ConsultaSelect($sql);
	$html .=  "<tr>";
	$html .=  "<th>ID</th>";
	$html .=  "<th>Origen</th>";
	$html .=  "<th>Destino</th>";
	$html .=  "<th>Salida</th>";
	$html .=  "<th>Llegada</th>";
	$html .=  "<th>Carga</th>";
	$html .=  "<th>Km<br>aprox</th>";
	$html .=  "<th>Km<br>real</th>";
	$html .=  "<th>comb<br>aprox</th>";
	$html .=  "<th>comb<br>real</th>";
	$html .=  "<th>tiempo<br>aprox</th>";
	$html .=  "<th>tiempo<br>real</th>";
	$html .=  "<th>id<br>cliente</th>";
	$html .=  "<th>usuario</th>";
	$html .=  "</tr>";

	if($fila = mysqli_fetch_assoc($reg)) {
		$html .=  "<tr>";

		$html .=  "<td>" . $fila["id_viaje"]. "</td>";
		$html .=  "<td>" . $fila["origen"]. "</td>";
		$html .=  "<td>" . $fila["destino"]. "</td>";
		$html .=  "<td>" . $fila["fecha_salida"]. "</td>";
		$html .=  "<td>" . $fila["fecha_llegada"]. "</td>";
		$html .=  "<td>" . $fila["tipo_carga"]. "</td>";
		$html .=  "<td>" . $fila["km_recorrido_previsto"]. "</td>";
		$html .=  "<td>" . $fila["km_recorrido_real"]. "</td>";
		$html .=  "<td>" . $fila["combustible_previsto"]. "</td>";
		$html .=  "<td>" . $fila["combustible_real"]. "</td>";
		$html .=  "<td>" . $fila["tiempo_estimado"]. "</td>";
		$html .=  "<td>" . $fila["tiempo_real"]. "</td>";
		$html .=  "<td>" . $fila["id_cliente"]. "</td>";
		$html .=  "<td>" . $fila["usuario"]. "</td>";
		$html .=  "</tr>";
	}
	$html .=  "</table>";

	$html .="<img src='images/test.png'>";
	$html .= "</center></body></html>";


	// Este echo es para que pueda ver el pdf Lau desde la mac //
	// echo "$html";



	$mipdf = new DOMPDF();
	$mipdf->set_paper("A4", "portait");
	$mipdf->load_html(utf8_decode($html));
	$mipdf->render();
	$mipdf->stream("PDFViaje.pdf"); 





?>






















