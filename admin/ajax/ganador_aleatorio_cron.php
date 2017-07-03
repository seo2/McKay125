<?php

	require_once("../_lib/config.php");
	require_once("../_lib/MysqliDb.php");
	$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
	

  	$db->orderBy("RAND ()");
  	$resultado 	= $db->getOne ('mckay125_codigos');
  	$codUS 	 	= $resultado["codUS"];	
  	$codCod 	 = $resultado["codCod"];	
  	$codHora 	 = $resultado["codHora"];	


  	$resultado = $db->rawQuery("select * from mckay125_participantes where mk125_ID = $codUS");
	if($resultado){
		foreach ($resultado as $r) {
			$mk125_Nom = $r["mk125_nom"];
			$mk125_rut = $r["mk125_rut"];
		}
	}  	

	$mk125_rut = substr($mk125_rut, 0,-5).'XXX-X';


	$ganFec = date('Y-m-d');

	$data = Array (
		"ganNom" 	=> $mk125_Nom,
		"ganRut" 	=> $mk125_rut,
		"ganFec" 	=> $ganFec,
		"ganCod" 	=> $codCod,
		"ganHor" 	=> $codHora
	);

print_r($data);

	
		$mk125_ID = $db->insert ('mckay125_ganadores', $data);		
		echo 'ok';

	


/*
	header('Content-type: application/json; charset=utf-8');
    echo json_encode($jsondata);
    exit();
*/

?>