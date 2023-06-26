<?php session_start();	
	
$idUsuario = $_SESSION["email"];
		$_SESSION = array();	
	if(session_destroy()){		
        echo "http://localhost/ObrasSP/login.php";	
}
?>