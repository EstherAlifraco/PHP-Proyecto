<?php
	function Conectarse() {
	$host = "localhost";    
    $basededatos = "base";     
    $usuariodb = "root";     
    $clavedb = "";    
    $tabla_db1 = "Empleado"; 

	if (!($link = mysqli_connect($host,$usuariodb,$clavedb,$basededatos)))
		{
			return 0;
		}
		
		return $link;
	}


?>