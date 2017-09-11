<?php
$ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
if ($ajax) {
	require_once("../_lib/config.php");
	require_once("../_lib/MysqliDb.php");
	$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
	
	$paramVal	= filter_var($_POST["paramVal"], FILTER_SANITIZE_STRING);
	

	$data = Array (
		"paramVal" 	=> $paramVal
	);
	
	$db->where("paramID", 1);
	$db->update('mckay125_parametros', $data);
	echo 'ok';
}else{
	echo 'error';
}
?>