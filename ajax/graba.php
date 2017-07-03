<?php
$ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
if ($ajax) {
	require_once("_lib/config.php");
	require_once("_lib/MysqliDb.php");
	$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
	
	$mk125_nom	 	= filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
	$mk125_rut	 	= filter_var($_POST["rut"], FILTER_SANITIZE_STRING);
	$mk125_mail 	= filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
	$mk125_fn   	= filter_var($_POST["fn"], FILTER_SANITIZE_STRING);
	$mk125_fono 	= preg_replace('/[^0-9]/', '', $_POST["fono"]);
	$mk125_reg	 	= filter_var($_POST["region"], FILTER_SANITIZE_STRING);
	$mk125_cat   	= filter_var($_POST["sueno"], FILTER_SANITIZE_STRING);
	$codigo   		= filter_var($_POST["codigo2"], FILTER_SANITIZE_STRING);
	$hora   		= filter_var($_POST["hora2"], FILTER_SANITIZE_STRING);

// validate birthday
function validateAge($birthday, $age = 18)
{
    // $birthday can be UNIX_TIMESTAMP or just a string-date.
    if(is_string($birthday)) {
        $birthday = strtotime($birthday);
    }

    // check
    // 31536000 is the number of seconds in a 365 days year.
    if(time() - $birthday < $age * 31536000)  {
        return false;
    }

    return true;
}

	
	$existe = 0;
	$participante = $db->rawQuery('select * from mckay125_participantes where mk125_rut LIKE "'.$mk125_rut.'"');
	if($participante){
		foreach ($participante as $p) {
			$existe = 1;
			$mk125_ID  = $p['mk125_ID'];
			$mk125_gan = $p['mk125_gan'];
		}
	}  
	date_default_timezone_set('America/Santiago');
	$ahora 	= date("Y-m-d H:i:s");
	$hoy	= date('Y-m-d');

	if(validateAge($mk125_fn, $age = 18)){
		
	
		if($existe==0){
			$data = Array (
				"mk125_nom" 	=> $mk125_nom,
				"mk125_rut" 	=> $mk125_rut,
				"mk125_mail" 	=> $mk125_mail,
				"mk125_fn" 		=> $mk125_fn,
				"mk125_fono" 	=> $mk125_fono,
				"mk125_reg"		=> $mk125_reg,
				"mk125_cat" 	=> $mk125_cat,
				"mk125_rts" 	=> $ahora
			);
			
			$mk125_ID = $db->insert ('mckay125_participantes', $data);		
			$mk125_gan = 0;
		}
		$i = 0;
		$resultado = $db->rawQuery('select * from mckay125_codigos where codUS = "'.$mk125_ID.'" and codCod LIKE "'.$codigo.'" and codHora LIKE "'.$hora.'"');
		if($resultado){
			foreach ($resultado as $r) {
				$i++;
			}
		}  
		
		if($i<15){
		
		
			$data = Array (
				"codUS" 	=> $mk125_ID,
				"codCod" 	=> $codigo,
				"codHora" 	=> $hora,
				"codRTS" 	=> $ahora
			);
			
			$id = $db->insert ('mckay125_codigos', $data);
			
			
			if($id){
							
				if($mk125_gan==0){ // si aún no ha ganado nada.
					$quedan = 0;
					$random = rand(1,20); // saco un número aleatorio
					
					if($random==3){ // si el número es 3 puede ganar, y veo si quedan premios para darle
						$premiospordia = $db->rawQuery('select * from mckay125_premios where mk125p_fec = "'.$hoy.'" ');
						if($premiospordia){
							foreach ($premiospordia as $ppd) {
								$canjeados 	= $ppd['mk125p_can'];
								$fecha 		= $ppd['mk125p_fec'];
								
								if($ppd['mk125p_tot'] > $ppd['mk125p_can']){							
									$quedan = 1;
								}
								
							}
						}  
						
						if($quedan==1){ // quedan premios
							$canjeados = $canjeados + 1;
							$data1 = Array (
								"mk125p_can" 	=> $canjeados
							);
							$db->where ('mk125p_fec', $fecha);
							$id1 = $db->update('mckay125_premios', $data1);	
							
							$data2 = Array (
								"mk125_gan" 	=> 1
							);
							$db->where ('mk125_ID', $mk125_ID);
							$id2 = $db->update('mckay125_participantes', $data2);
							
							$data3 = Array (
								"codGan" 	=> 1
							);	
							$db->where ('codID', $id);
							$id4 = $db->update('mckay125_codigos', $data3);
							
							echo 'Ganaste';					
						}else{
							echo 'No Quedan Premios';
						}
					}else{
						echo 'Sigue participando. (1)';
					}
				}else{
					echo 'Sigue participando. (2)';
				}
				
			}else{
				echo 'error';
			}
		}else{
			echo 'error1';
		}
	}else{
		echo 'error2';
	}
	
}else{
	echo 'error';
}
?>