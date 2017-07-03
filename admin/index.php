<?php
		include('header.php');
		include('sidebar.php');

		$lol = 0;

						
	function lunes_semana($week,$year){
        $timestamp = mktime( 0, 0, 0, 1, 1,  $year ) + ( $week * 7 * 24 * 60 * 60 );
        $timestamp_for_monday = $timestamp - 86400 * ( date( 'N', $timestamp ) - 1 );
        $date_for_monday = date( 'd-m-Y', $timestamp_for_monday );
        return $date_for_monday;
	}

	function total_participantes($lol){
		$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
		$resultado = $db->rawQuery('select count(*) as total from mckay125_participantes');
		if($resultado){
			foreach ($resultado as $r) {
				$participantes   = $r["total"];
			}
		}  
		return $participantes;
	}

	function total_codigos($lol){
		$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
	  	$resultado = $db->rawQuery('select count(*) as total from mckay125_codigos');
		if($resultado){
			foreach ($resultado as $r) {
				$codigos   = $r["total"];
			}
		}  
		return $codigos;
	}

	function total_instawins($lol){
		$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
	  	$resultado = $db->rawQuery('select count(*) as total from mckay125_participantes where mk125_gan = 1');
		if($resultado){
			foreach ($resultado as $r) {
				$instawins   = $r["total"];
			}
		}   
		return $instawins;
	}

	function total_hombres($lol){
		$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
	  	$resultado = $db->rawQuery('select count(*) as total from mckay125_participantes where mk125_sexo LIKE "Hombre"');
		if($resultado){
			foreach ($resultado as $r) {
				$instawins   = $r["total"];
			}
		}   
		return $instawins;
	}

	function total_mujeres($lol){
		$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
	  	$resultado = $db->rawQuery('select count(*) as total from mckay125_participantes where mk125_sexo LIKE "Mujer"');
		if($resultado){
			foreach ($resultado as $r) {
				$instawins   = $r["total"];
			}
		}   
		return $instawins;
	}

	function region($id){
		$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
	  	$resultado = $db->rawQuery('select * from region where region_id = '.$id);
		if($resultado){
			foreach ($resultado as $r) {
				$region   = $r["region_nombre"];
			}
		}   
		return $region;
	}
	
	 
	function codigos_dia($dia){
		
		$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
	  	$resultado = $db->rawQuery("SELECT count(*) as total FROM mckay125_codigos WHERE DAYOFWEEK(codRTS) = $dia");
		if($resultado){
			foreach ($resultado as $r) {
				$total   = $r["total"];
			}
		}   
		return $total;
	}
	
	 
	function participantes_dia($dia){
		
		$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
	  	$resultado = $db->rawQuery("SELECT count(*) as total FROM mckay125_participantes WHERE DAYOFWEEK(mk125_rts) = $dia");
		if($resultado){
			foreach ($resultado as $r) {
				$total   = $r["total"];
			}
		}   
		return $total;
	}
	
                      
?>

		<!-- start: Content -->
		<div class="main">
			
						
			<ul class="statistics">
				<li>
					<i class="icon-users"></i>
					<div class="number"><?php echo total_participantes($lol); ?></div>
					<div class="title">Participantes</div>
					<div class="progress thin">
					  	<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
					    	<span class="sr-only">73% Complete (success)</span>
					  	</div>
					</div>
				</li>
<!--
				<li>
						<?php
							
							$porcentaje		= round((100 * total_hombres($lol))/total_participantes($lol),2);
						?>
					<i class="icon-symbol-male"></i>
					<div class="number"><?php echo total_hombres($lol); ?></div>
					<div class="title">Hombres <?php echo $porcentaje; ?>%</div>
					<div class="progress thin">
					  	<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje; ?>%">
					    	<span class="sr-only">73% Complete (success)</span>
					  	</div>
					</div>
				</li>
				<li>
					<?php
						
						$porcentaje		= round((100 * total_mujeres($lol))/total_participantes($lol),2);
					?>
					<i class=" icon-symbol-female"></i>
					<div class="number"><?php echo total_mujeres($lol); ?></div>
					<div class="title">Mujeres <?php echo $porcentaje; ?>%</div>
					<div class="progress thin">
					  	<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje; ?>%">
					    	<span class="sr-only">73% Complete (success)</span>
					  	</div>
					</div>
				</li>
-->
				<li>
					<i class="icon-badge"></i>
					<div class="number"><?php echo total_codigos($lol); ?></div>
					<div class="title">Códigos</div>
					<div class="progress thin">
					  	<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" style="width: 73%">
					    	<span class="sr-only">73% Complete (success)</span>
					  	</div>
					</div>
				</li>
				<li>
					<i class="icon-trophy"></i>
					<div class="number"><?php echo total_instawins($lol); ?></div>
					<div class="title">Instawins</div>
					<div class="progress thin">
					  	<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" style="width: 73%">
					    	<span class="sr-only">73% Complete (success)</span>
					  	</div>
					</div>
				</li>
<!--
				<li>
					<i class="icon-pie-chart"></i>
					<div class="number">28%</div>
					<div class="title">Returning Visitors</div>
					<div class="progress thin">
					  	<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" style="width: 73%">
					    	<span class="sr-only">73% Complete (success)</span>
					  	</div>
					</div>
				</li>
				<li>
					<i class="icon-speedometer"></i>
					<div class="number">5:34:11</div>
					<div class="title">Avg. time</div>
					<div class="progress thin">
					  	<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" style="width: 73%">
					    	<span class="sr-only">73% Complete (success)</span>
					  	</div>
					</div>
				</li>
				<li>
					<i class="icon-speech"></i>
					<div class="number">972</div>
					<div class="title">New comments</div>
					<div class="progress thin">
					  	<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" style="width: 73%">
					    	<span class="sr-only">73% Complete (success)</span>
					  	</div>
					</div>
				</li>
-->
			</ul>			
			
			
			<div class="row">
				

				<div class="col-lg-6 col-sm-6">
					
					<div class="panel panel-default">
						
						<div class="panel-heading">
							<i class="icon-compass"></i><h2>Participantes x Semana</h2>
						</div>
						
						<div class="panel-body">

					<?php
							$sql = "SELECT COUNT(*) AS total,  WEEK(mk125_ts) as week_number FROM  mckay125_participantes GROUP BY WEEK(mk125_rts, 1)";
								$semanas = $db->rawQuery($sql);
								if($semanas){
									foreach ($semanas as $s) {
										$participantes_semana = $s["total"];
										$lunes   		= lunes_semana($s["week_number"],2017);
										$totalparticipantes   = total_participantes($lol);
										
										$porcentaje		= round((100 * $participantes_semana)/$totalparticipantes,2);
										
										
							 ?>
							<h6>Semana <?php echo $lunes; ?> <strong><?php echo $participantes_semana; ?> Participantes</strong> <?php echo $porcentaje; ?>%</h6>
							<div class="progress thin">						  	
								<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje; ?>%">
							    	<span class="sr-only">40% Complete (success)</span>
							  	</div>
							</div>
							<?php					
									}
								}   
							?>
						</div>
					</div>		
				</div><!--/col-->
				
								
				<div class="col-lg-6 col-sm-6">
					
					<div class="panel panel-default">
						
						<div class="panel-heading">
							<i class="icon-compass"></i><h2>Códigos x Semana</h2>
						</div>
						
						<div class="panel-body">

					<?php						
						$sql = "SELECT COUNT(*) AS total,  WEEK(codTS) as week_number FROM mckay125_codigos GROUP BY WEEK(codRTS, 1)";
								$semanas = $db->rawQuery($sql);
								if($semanas){
									foreach ($semanas as $s) {
										$codigos_semana = $s["total"];
										$lunes   		= lunes_semana($s["week_number"],2017);
										$totalcodigos   = total_codigos($lol);
										
										$porcentaje		= round((100 * $codigos_semana)/$totalcodigos,2);
							 ?>
							<h6>Semana <?php echo $lunes; ?> <strong><?php echo $codigos_semana; ?> Códigos</strong> <?php echo $porcentaje; ?>%</h6>
							<div class="progress thin">
							  	<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje; ?>%">
							    	<span class="sr-only"><?php echo $porcentaje; ?>% Complete (success)</span>
							  	</div>
							</div>
							<?php					
									}
								}   
							?>
						</div>
					</div>		
				</div><!--/col-->
											 	
				
			
				
				
			</div><!--/row-->	
			
			
			<div class="row">
				

				<div class="col-lg-6 col-sm-6">
					
					<div class="panel panel-default">
						
						<div class="panel-heading">
							<i class="icon-compass"></i><h2>Participantes x Región</h2>
						</div>
						
						<div class="panel-body">

					<?php
							$sql = "SELECT COUNT(*) AS total, mk125_reg FROM mckay125_participantes GROUP BY mk125_reg";
								$semanas = $db->rawQuery($sql);
								if($semanas){
									foreach ($semanas as $s) {
										$participantes_region 	= $s["total"];
										$region   				= region($s["mk125_reg"]);
										$totalparticipantes   	= total_participantes($lol);
										
										$porcentaje		= round((100 * $participantes_region)/$totalparticipantes,2);
										
										
							 ?>
							<h6> <?php echo $region; ?> <strong><?php echo $participantes_region; ?> Participantes</strong> <?php echo $porcentaje; ?>%</h6>
							<div class="progress thin">						  	
								<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje; ?>%">
							    	<span class="sr-only">40% Complete (success)</span>
							  	</div>
							</div>
							<?php					
									}
								}   
							?>
						</div>
					</div>		
				</div><!--/col-->
				
								
				<div class="col-lg-6 col-sm-6">
					
					<div class="panel panel-default">
						
						<div class="panel-heading">
							<i class="icon-compass"></i><h2>Sueños</h2>
						</div>
						
						<div class="panel-body">

					<?php						
							$sql = "SELECT COUNT(*) AS total, mk125_cat FROM mckay125_participantes GROUP BY mk125_cat";
								$semanas = $db->rawQuery($sql);
								if($semanas){
									foreach ($semanas as $s) {
										$total_sueno = $s["total"];
										$mk125_cat   	= $s["mk125_cat"];
										$totalparticipantes   = total_participantes($lol);
										if($mk125_cat==''){
											$mk125_cat = 'Sin selección';
										}
										$porcentaje		= round((100 * $total_sueno)/$totalparticipantes,2);
							 ?>
							<h6><?php echo $mk125_cat; ?> <strong><?php echo $total_sueno; ?></strong> <?php echo $porcentaje; ?>%</h6>
							<div class="progress thin">
							  	<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje; ?>%">
							    	<span class="sr-only"><?php echo $porcentaje; ?>% Complete (success)</span>
							  	</div>
							</div>
							<?php					
									}
								}   
							?>
						</div>
					</div>		
				</div><!--/col-->
											 	
				
			
				
				
			</div><!--/row-->
			

			<div class="row">
				

				<div class="col-lg-6 col-sm-6">
					
					<div class="panel panel-default">
						
						<div class="panel-heading">
							<i class="icon-compass"></i><h2>Participantes x Día</h2>
						</div>
						
						<div class="panel-body">
							<?php
										$totalparticipantes   = total_participantes($lol);
										$porcentaje			  = round((100 * participantes_dia(2))/$totalparticipantes,2);
							?>
							<h6>Lunes <strong><?php echo participantes_dia(2); ?> Participantes</strong> <?php echo $porcentaje; ?>%</h6>
							<div class="progress thin">						  	
								<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje; ?>%">
							    	<span class="sr-only">40% Complete (success)</span>
							  	</div>
							</div>
							<?php
										$porcentaje			  = round((100 * participantes_dia(3))/$totalparticipantes,2);
							?>
							<h6>Martes <strong><?php echo participantes_dia(3); ?> Participantes</strong> <?php echo $porcentaje; ?>%</h6>
							<div class="progress thin">						  	
								<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje; ?>%">
							    	<span class="sr-only">40% Complete (success)</span>
							  	</div>
							</div>
							<?php
										$porcentaje			  = round((100 * participantes_dia(4))/$totalparticipantes,2);
							?>
							<h6>Miercoles <strong><?php echo participantes_dia(4); ?> Participantes</strong> <?php echo $porcentaje; ?>%</h6>
							<div class="progress thin">						  	
								<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje; ?>%">
							    	<span class="sr-only">40% Complete (success)</span>
							  	</div>
							</div>
							<?php
										$porcentaje			  = round((100 * participantes_dia(5))/$totalparticipantes,2);
							?>
							<h6>Jueves <strong><?php echo participantes_dia(5); ?> Participantes</strong> <?php echo $porcentaje; ?>%</h6>
							<div class="progress thin">						  	
								<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje; ?>%">
							    	<span class="sr-only">40% Complete (success)</span>
							  	</div>
							</div>
							<?php
										$porcentaje			  = round((100 * participantes_dia(6))/$totalparticipantes,2);
							?>
							<h6>Viernes <strong><?php echo participantes_dia(6); ?> Participantes</strong> <?php echo $porcentaje; ?>%</h6>
							<div class="progress thin">						  	
								<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje; ?>%">
							    	<span class="sr-only">40% Complete (success)</span>
							  	</div>
							</div>
							<?php
										$porcentaje			  = round((100 * participantes_dia(7))/$totalparticipantes,2);
							?>
							<h6>Sábado <strong><?php echo participantes_dia(7); ?> Participantes</strong> <?php echo $porcentaje; ?>%</h6>
							<div class="progress thin">						  	
								<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje; ?>%">
							    	<span class="sr-only">40% Complete (success)</span>
							  	</div>
							</div>
							<?php
										$porcentaje			  = round((100 * participantes_dia(1))/$totalparticipantes,2);
							?>
							<h6>Domingo <strong><?php echo participantes_dia(1); ?> Participantes</strong> <?php echo $porcentaje; ?>%</h6>
							<div class="progress thin">						  	
								<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje; ?>%">
							    	<span class="sr-only">40% Complete (success)</span>
							  	</div>
							</div>
						</div>
					</div>		
				</div><!--/col-->

				<div class="col-lg-6 col-sm-6">
					
					<div class="panel panel-default">
						
						<div class="panel-heading">
							<i class="icon-compass"></i><h2>Códgios x Día</h2>
						</div>
						
						<div class="panel-body">
							<?php
										$totalparticipantes   = total_codigos($lol);
										$porcentaje			  = round((100 * codigos_dia(2))/$totalparticipantes,2);
							?>
							<h6>Lunes <strong><?php echo codigos_dia(2); ?> Códigos</strong> <?php echo $porcentaje; ?>%</h6>
							<div class="progress thin">						  	
								<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje; ?>%">
							    	<span class="sr-only">40% Complete (success)</span>
							  	</div>
							</div>
							<?php
										$porcentaje			  = round((100 * codigos_dia(3))/$totalparticipantes,2);
							?>
							<h6>Martes <strong><?php echo codigos_dia(3); ?> Códigos</strong> <?php echo $porcentaje; ?>%</h6>
							<div class="progress thin">						  	
								<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje; ?>%">
							    	<span class="sr-only">40% Complete (success)</span>
							  	</div>
							</div>
							<?php
										$porcentaje			  = round((100 * codigos_dia(4))/$totalparticipantes,2);
							?>
							<h6>Miercoles <strong><?php echo codigos_dia(4); ?> Códigos</strong> <?php echo $porcentaje; ?>%</h6>
							<div class="progress thin">						  	
								<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje; ?>%">
							    	<span class="sr-only">40% Complete (success)</span>
							  	</div>
							</div>
							<?php
										$porcentaje			  = round((100 * codigos_dia(5))/$totalparticipantes,2);
							?>
							<h6>Jueves <strong><?php echo codigos_dia(5); ?> Códigos</strong> <?php echo $porcentaje; ?>%</h6>
							<div class="progress thin">						  	
								<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje; ?>%">
							    	<span class="sr-only">40% Complete (success)</span>
							  	</div>
							</div>
							<?php
										$porcentaje			  = round((100 * codigos_dia(6))/$totalparticipantes,2);
							?>
							<h6>Viernes <strong><?php echo codigos_dia(6); ?> Códigos</strong> <?php echo $porcentaje; ?>%</h6>
							<div class="progress thin">						  	
								<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje; ?>%">
							    	<span class="sr-only">40% Complete (success)</span>
							  	</div>
							</div>
							<?php
										$porcentaje			  = round((100 * codigos_dia(7))/$totalparticipantes,2);
							?>
							<h6>Sábado <strong><?php echo codigos_dia(7); ?> Códigos</strong> <?php echo $porcentaje; ?>%</h6>
							<div class="progress thin">						  	
								<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje; ?>%">
							    	<span class="sr-only">40% Complete (success)</span>
							  	</div>
							</div>
							<?php
										$porcentaje			  = round((100 * codigos_dia(1))/$totalparticipantes,2);
							?>
							<h6>Domingo <strong><?php echo codigos_dia(1); ?> Códigos</strong> <?php echo $porcentaje; ?>%</h6>
							<div class="progress thin">						  	
								<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje; ?>%">
							    	<span class="sr-only">40% Complete (success)</span>
							  	</div>
							</div>
						</div>
					</div>		
				</div><!--/col-->
											 	
				
			
				
				
			</div><!--/row-->				
				
			<div class="row">
			    <div class="col-lg-6">
			        <div class="panel panel-default">
			            <div class="panel-heading">
			                <h2><i class="fa fa-edit"></i>Consultar Códigos por Fecha</h2>
			            </div>
			            <div class="panel-body">
			                <form role="form" action="codigos_x_fecha.php" method="get"> 
				                <div class="row">
				                    <div class="form-group col-sm-6">
				                        <label class="control-label" for="date01">Fecha Desde</label>
				                        <div class="controls">
				                            <div class="input-group date col-sm-12">
				                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				                                <input type="text" class="form-control date-picker" id="date01" data-date-format="dd/mm/yyyy" name="fecini"/>
				                            </div>
				                        </div>
				                    </div>
	
				                    <div class="form-group col-sm-6">
				                        <label class="control-label" for="timepicker1">Hora Desde</label>
				                        <div class="controls">
				                            <div class="input-group col-sm-12 bootstrap-timepicker">
				                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
				                                <input type="text" class="form-control timepicker" id="timepicker1" name="horini">
				                            </div>
				                        </div>
				                    </div>
				                </div>
				                <div class="row">
				                    <div class="form-group col-sm-6">
				                        <label class="control-label" for="date01">Fecha Hasta</label>
				                        <div class="controls">
				                            <div class="input-group date col-sm-12">
				                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				                                <input type="text" class="form-control date-picker" id="date01" data-date-format="dd/mm/yyyy"  name="fecfin"/>
				                            </div>
				                        </div>
				                    </div>
	
				                    <div class="form-group col-sm-6">
				                        <label class="control-label" for="timepicker1">Hora hasta</label>
				                        <div class="controls">
				                            <div class="input-group col-sm-12 bootstrap-timepicker">
				                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
				                                <input type="text" class="form-control timepicker" id="timepicker1"  name="horfin">
				                            </div>
				                        </div>
				                    </div>
				                </div>
			                    <div class="form-group form-actions">
			                        <button type="submit" class="btn btn-sm btn-success">Enviar</button>
			                    </div>

			                </form>

			            </div>
			        </div>
			    </div><!--/col-->
			    <div class="col-lg-6">
			        <div class="panel panel-default">
			            <div class="panel-heading">
			                <h2><i class="fa fa-edit"></i>Consultar Ranking por Fecha</h2>
			            </div>
			            <div class="panel-body">
			                <form role="form" action="ranking_x_fecha.php" method="get"> 
				                <div class="row">
				                    <div class="form-group col-sm-6">
				                        <label class="control-label" for="date01">Fecha Desde</label>
				                        <div class="controls">
				                            <div class="input-group date col-sm-12">
				                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				                                <input type="text" class="form-control date-picker" id="date01" data-date-format="dd/mm/yyyy" name="fecini"/>
				                            </div>
				                        </div>
				                    </div>
	
				                    <div class="form-group col-sm-6">
				                        <label class="control-label" for="timepicker1">Hora Desde</label>
				                        <div class="controls">
				                            <div class="input-group col-sm-12 bootstrap-timepicker">
				                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
				                                <input type="text" class="form-control timepicker" id="timepicker1" name="horini">
				                            </div>
				                        </div>
				                    </div>
				                </div>
				                <div class="row">
				                    <div class="form-group col-sm-6">
				                        <label class="control-label" for="date01">Fecha Hasta</label>
				                        <div class="controls">
				                            <div class="input-group date col-sm-12">
				                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				                                <input type="text" class="form-control date-picker" id="date01" data-date-format="dd/mm/yyyy"  name="fecfin"/>
				                            </div>
				                        </div>
				                    </div>
	
				                    <div class="form-group col-sm-6">
				                        <label class="control-label" for="timepicker1">Hora hasta</label>
				                        <div class="controls">
				                            <div class="input-group col-sm-12 bootstrap-timepicker">
				                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
				                                <input type="text" class="form-control timepicker" id="timepicker1"  name="horfin">
				                            </div>
				                        </div>
				                    </div>
				                </div>
			                    <div class="form-group form-actions">
			                        <button type="submit" class="btn btn-sm btn-success">Enviar</button>
			                    </div>

			                </form>

			            </div>
			        </div>
			    </div><!--/col-->
			</div><!--/row-->
				
		</div>
		<!-- end: Content -->
		
		
		<footer>

			<div class="row">

				<div class="col-sm-5">
					&copy; 2017 Modo
				</div><!--/.col-->

				
			</div><!--/.row-->	

		</footer>
		
				<div class="modal fade" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Filtrar Status por Fecha</h4>
					</div>
					<div class="modal-body">
						<form action="" method="get" enctype="multipart/form-data" class="form-horizontal">
		                    <div class="row">
		                    	<div class="col-sm-12">
				                    <div class="form-group">
				                        <label class="col-sm-2 control-label" for="text-input">Fechas</label>
				                        <div class="col-sm-7">
				                            <div class="controls">
					                            <div class="input-group">
					                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					                                <input type="text" class="form-control" id="daterange" value="" name="fechas">
					                            </div>
					                        </div>
				                        </div>
				                        <div class="col-sm-3">
				                        	<button type="submit" class="btn btn-sm btn-primary"><i class="icon-settings"></i> Filtrar</button>
				                        </div>
				                    </div>			                    		
		                    	</div>
		                    </div>
			        	</form>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
		
		<!-- start: JavaScript-->
		<!--[if !IE]>-->

				<script src="assets/js/jquery-2.1.1.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>

			<script src="assets/js/jquery-1.11.1.min.js"></script>

		<![endif]-->

		<!--[if !IE]>-->

			<script type="text/javascript">
				window.jQuery || document.write("<script src='assets/js/jquery-2.1.1.min.js'>"+"<"+"/script>");
			</script>

		<!--<![endif]-->

		<!--[if IE]>

			<script type="text/javascript">
		 	window.jQuery || document.write("<script src='assets/js/jquery-1.11.1.min.js'>"+"<"+"/script>");
			</script>

		<![endif]-->
		<script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<script src="assets/plugins/jquery-ui/js/jquery-ui-1.10.4.min.js"></script> 
		<script src="assets/plugins/select2/js/select2.min.js"></script>
		<script src="assets/plugins/moment/moment.min.js"></script> 
		<script src="assets/plugins/flot/jquery.flot.min.js"></script>
		<script src="assets/plugins/flot/jquery.flot.pie.min.js"></script>
		<script src="assets/plugins/flot/jquery.flot.stack.min.js"></script>
		<script src="assets/plugins/flot/jquery.flot.resize.min.js"></script>
		<script src="assets/plugins/flot/jquery.flot.time.min.js"></script>
		<script src="assets/plugins/flot/jquery.flot.spline.min.js"></script>
		<script src="assets/plugins/autosize/jquery.autosize.min.js"></script> 
		<script src="assets/plugins/placeholder/jquery.placeholder.min.js"></script> 
		<script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script> 
		<script src="assets/plugins/datatables/js/dataTables.bootstrap.min.js"></script> 
		<script src="assets/plugins/raphael/raphael.min.js"></script> 
		<script src="assets/plugins/morris/js/morris.min.js"></script> 
		<script src="assets/plugins/jvectormap/js/gdp-data.js"></script>
		<script src="assets/plugins/gauge/gauge.min.js"></script>
		<script src="assets/plugins/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/plugins/timepicker/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/plugins/hotkeys/jquery.hotkeys.min.js"></script>
	
	

		<!-- theme scripts -->
		<script src="assets/plugins/pace/pace.min.js"></script>
		<script src="assets/js/jquery.mmenu.min.js"></script>
		<script src="assets/js/core.min.js"></script>
		
		<!-- inline scripts related to this page -->
		<script src="assets/js/pages/form-elements.js"></script>
		<script src="assets/js/pages/charts-flot.js"></script>
		<script src="assets/plugins/jquery-cookie/jquery.cookie.min.js"></script>
		<script src="assets/js/demo.min.js"></script>
		
		<!-- Scritps de Seo2 -->
		<script src="assets/js/sweetalert.min.js"></script>
		<script src="assets/js/jquery.validate.js"></script>
		<script src="assets/js/jquery.Rut.min.js"></script>
		<script src="assets/js/cloudcore.js"></script>

		<!-- end: JavaScript-->

	
		






	</body>
</html>								