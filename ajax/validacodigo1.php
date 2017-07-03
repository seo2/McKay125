<?php
	session_start();
	require_once("_lib/config.php");
	require_once("_lib/MysqliDb.php");
	$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);

	$codigo = $_POST['codigo'];
	$hora 	= str_replace(':', '', $_POST['hora']);
	
	$ok = 0;

	$tema = $db->rawQuery('select * from mckay125_lote where loteLote = "'.$codigo.'"');
	if($tema){
		foreach ($tema as $t) {
			
			$horaini = str_replace(':', '', substr( $t['loteHorIni'],0,5));
			$horater = str_replace(':', '', substr( $t['loteHorTer'],0,5));
			if($horaini>$horater){
				if($hora>=$horaini&&$hora>=$horater){
					$ok = 1;
				}elseif($hora<=$horaini&&$hora<=$horater){
					$ok = 1;
				}
			}else{
				if($hora>=$horaini&&$hora<=$horater){
					$ok = 1;
				}
			}
		}
	}
	
	// ahora se validan todos.
	$ok = 1;
	
	echo $ok;

?>