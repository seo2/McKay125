<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');
$ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
if ($ajax) {
	require_once("_lib/config.php");
	require_once("_lib/MysqliDb.php");
	$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
	
	$mk125_nom	 	= filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
	$mk125_fono	 	= filter_var($_POST["fono"], FILTER_SANITIZE_STRING);
	$mk125_mail 	= filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
	$mensaje	   	= filter_var($_POST["mensaje"], FILTER_SANITIZE_STRING);

	$to 	 = 'mckay@sinergika.cl';
	
	//$to 	 = 'seodos@gmail.com';
	
	$message = '<html><body>';
	$message .= '<div>';
	$message .= "<p>De:  <strong>".$mk125_nom." </strong></p>";  
	$message .= "<p>Correo: <strong>".$mk125_mail." </strong></p>";  
	$message .= "<p>Fono: <strong>".$mk125_fono." </strong></p>";  
	$message .= "<p>Mensaje:</p>"; 
	$message .= "<p> <strong>".$mensaje." </strong></p>";  
	$message .= "</div>";
	$message .= "</body></html>";
	$headers = array('Content-Type: text/html; charset=UTF-8');
	
	
	$subject = 'Mensaje desde McKay.cl';
	$headers = "From: " . "<no-reply@mckay.cl> Contacto McKay" . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	mail($to, $subject, $message, $headers);


	echo 'ok';
}else{
	echo 'error';
}
?>