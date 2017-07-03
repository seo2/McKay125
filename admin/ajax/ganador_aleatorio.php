<?php
$ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
  	$jsondata = array();
if ($ajax) {
	require_once("../_lib/config.php");
	require_once("../_lib/MysqliDb.php");
	$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
	

  	$db->orderBy("RAND ()");
  	$resultado 	= $db->getOne ('mckay125_codigos');
  	$codUS 	 	= $resultado["codUS"];	
  	$codCod 	 = $resultado["codCod"];	
  	$codHora 	 = $resultado["codHora"];	
	$jsondata['codCod'] = $codCod;
	$jsondata['codHora'] = $codHora;


	//echo $codUS;

  	$resultado = $db->rawQuery("select * from mckay125_participantes where mk125_ID = $codUS");
	if($resultado){
		foreach ($resultado as $r) {
			$mk125_Nom  = $r["mk125_nom"];
			$jsondata['success'] = true;
			$jsondata['mk125_Nom'] = $r["mk125_nom"];
			$jsondata['mk125_rut'] = $r["mk125_rut"];
		}
	}  	
	
}else{
	$jsondata['success'] = false;
}


	header('Content-type: application/json; charset=utf-8');
    echo json_encode($jsondata);
    exit();

?>