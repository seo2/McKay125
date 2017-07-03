<?php
		include('header.php');
		include('sidebar.php');
		$fecini = $_GET['fecini'];
		$horini = $_GET['horini'];
		$fecfin = $_GET['fecfin'];
		$horfin = $_GET['horfin'];


		function total_participantes($desde,$hasta){
			$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
		  	$db->where ('mk125_rts', $desde, ">=");
		  	$db->where ('mk125_rts', $hasta, "<=");
		  	$participantes = $db->getValue ("mckay125_participantes", "count(*)");
			return $participantes;
		}
		
		function total_codigos($desde,$hasta){
			$codigos = 0;
			$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
		  	$db->where ('codRTS', $desde, ">=");
		  	$db->where ('codRTS', $hasta, "<=");
		  	$codigos = $db->getValue ("mckay125_codigos", "count(*)");
			return $codigos;
		}
				
			
		$desde =  substr($fecini, 6,4).'-'.substr($fecini, 3,2).'-'.substr($fecini, 0,2).' '.$horini.':00';
		$hasta =  substr($fecfin, 6,4).'-'.substr($fecfin, 3,2).'-'.substr($fecfin, 0,2).' '.$horfin.':00';
		                  
		
		
?>

		<!-- start: Content -->
		<div class="main">
			<ul class="statistics">
				<li>
					<i class="icon-users"></i>
					<div class="number"><?php echo total_participantes($desde,$hasta); ?></div>
					<div class="title">Participantes</div>
					<div class="progress thin">
					  	<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
					    	<span class="sr-only">73% Complete (success)</span>
					  	</div>
					</div>
				</li>
				<li>
					<i class="icon-badge"></i>
					<div class="number"><?php echo total_codigos($desde,$hasta); ?></div>
					<div class="title">Códigos</div>
					<div class="progress thin">
					  	<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="73" aria-valuemin="0" aria-valuemax="100" style="width: 73%">
					    	<span class="sr-only">73% Complete (success)</span>
					  	</div>
					</div>
				</li>
			</ul>			
			
			<?php
				function get_participante($mk125_ID){
					$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);
				  	$resultado = $db->rawQuery("select * from mckay125_participantes where mk125_ID = $mk125_ID");
					if($resultado){
						foreach ($resultado as $r) {
							$mk125_Nom  = $r["mk125_nom"];
					
						}
					}   
					return $mk125_Nom;
				}      
									  
			?>
				
			<div class="row">		
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading" data-original-title>
							<h2><i class="fa fa-user"></i><span class="break"></span>Códigos desde <?php echo $fecini .' '.$horini ; ?> hasta <?php echo $fecfin .' '.$horfin ; ?></h2>
						</div>
						<div class="panel-body">
							<table class="table table-striped table-bordered datatable">
							  <thead>
								  <tr>
									  <th>Ingreso</th>
									  <th>Código</th>
									  <th>Lote</th>
									  <th>Usuario</th>
									  
								  </tr>
							  </thead>   
							  <tbody>
								  <?php
									//echo "select * from mckay125_codigos where codRTS >= '$desde' and codRTS <= '$hasta'";
								  	//$resultado = $db->rawQuery("select * from mckay125_codigos where codRTS >= '$desde' and codRTS <= '$hasta'");
								  	
								  	$db->where ('codRTS', $desde, ">=");
								  	$db->where ('codRTS', $hasta, "<=");
								  	$resultado = $db->get ('mckay125_codigos');
								  	
									if($resultado){
										foreach ($resultado as $r) {
											$codTS   = $r["codRTS"];
											$codCod  = $r["codCod"];
											$codHora = $r["codHora"];
											$codUS 	 = $r["codUS"];
									?>
								<tr>
									<td><?php echo $codTS; ?></td>
									<td><?php echo $codCod ?></td>
									<td><?php echo $codHora; ?></td>
									<td><?php echo get_participante($codUS) ?></td>
								</tr>   
								<?php  
										}
									}                           
								?>
							  </tbody>
							</table>  
   
						</div>
					</div>
				</div><!--/col-->
			</div><!--/row-->
			<div class="row">			    
			    <div class="col-lg-12">
			        <div class="panel panel-default">
			            <div class="panel-heading">
			                <h2><i class="fa fa-edit"></i>Consultar Códigos otra Fecha</h2>
			            </div>
			            <div class="panel-body">
			                <form role="form" action="codigos_x_fecha.php" method="get"> 
				                <div class="row">
				                    <div class="form-group col-sm-3">
				                        <label class="control-label" for="date01">Fecha Desde</label>
				                        <div class="controls">
				                            <div class="input-group date col-sm-12">
				                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				                                <input type="text" class="form-control date-picker" id="date01" data-date-format="dd/mm/yyyy" name="fecini" value="<?php echo $fecini; ?>"/>
				                            </div>
				                        </div>
				                    </div>
	
				                    <div class="form-group col-sm-3">
				                        <label class="control-label" for="timepicker1">Hora Desde</label>
				                        <div class="controls">
				                            <div class="input-group col-sm-12 bootstrap-timepicker">
				                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
				                                <input type="text" class="form-control timepicker" id="timepicker1" name="horini" value="<?php echo $horini; ?>">
				                            </div>
				                        </div>
				                    </div>
				                    <div class="form-group col-sm-3">
				                        <label class="control-label" for="date01">Fecha Hasta</label>
				                        <div class="controls">
				                            <div class="input-group date col-sm-12">
				                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
				                                <input type="text" class="form-control date-picker" id="date01" data-date-format="dd/mm/yyyy"  name="fecfin" value="<?php echo $fecfin; ?>"/>
				                            </div>
				                        </div>
				                    </div>
	
				                    <div class="form-group col-sm-3">
				                        <label class="control-label" for="timepicker1">Hora hasta</label>
				                        <div class="controls">
				                            <div class="input-group col-sm-12 bootstrap-timepicker">
				                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
				                                <input type="text" class="form-control timepicker" id="timepicker1"  name="horfin" value="<?php echo $horfin; ?>">
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
			<div class="row">			    
				<div class="col-lg-4">
			        <div class="panel panel-default">
			            <div class="panel-heading">
			                <h2><i class="fa fa-edit"></i>Sacar Ganador</h2>
			            </div>
			            <div class="panel-body">
			                <form role="form" action="codigos_x_fecha.php" method="post" id="formSorteo1"> 
				                <div class="row">
				                    <div class="form-group col-sm-12">
				                        <label for="nf-email">Nombre</label>
				                        <input type="text" id="nombre" name="nombre" class="form-control" disabled>
				                        <input type="hidden" name="desde" value="<?php echo $desde; ?>" class="form-control">
				                        <input type="hidden" name="hasta" value="<?php echo $hasta; ?>"class="form-control">
				                    </div>
				                    <div class="form-group col-sm-12">
				                        <label for="nf-password">RUT</label>
				                        <input type="text" id="rut" name="rut" class="form-control" disabled>
				                    </div>
				                    <div class="form-group col-sm-12">
				                        <label for="nf-password">Código</label>
				                        <input type="text" id="codigo" name="codigo" class="form-control" disabled>
				                    </div>
				                    <div class="form-group col-sm-12">
				                        <label for="nf-password">Hora</label>
				                        <input type="text" id="hora" name="hora" class="form-control" disabled>
				                    </div>
				                </div>
			                    <div class="form-group form-actions">
			                        <button type="submit" class="btn btn-sm btn-success" id="btnSorteo1">Aleatorio</button>
			                    </div>

			                </form>

			            </div>
			        </div>
			    </div><!--/col-->
			    <div class="col-md-8">
			        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" id="formGanador" readonly>
			        <div class="panel panel-default">
			            <div class="panel-heading">
			                <h2>Agregar Ganador</h2>
			            </div>
			            <div class="panel-body">
		                    <div class="row">
		                    	<div class="col-sm-6">
				                    <div class="form-group">
				                        <label class="col-md-4 control-label" for="text-input">Nombre</label>
				                        <div class="col-md-8">
				                            <input type="text" class="form-control" placeholder=""  name="ganNom" required value="<?php echo $mk125_Nom; ?>"	>
				                            <? if($_GET['ganID']){ ?>
				                            <input type="hidden" name="ganID" value="<?php echo $_GET['ganID']; ?>">
											<? } ?>
				                        </div>
				                    </div>			                    		
		                    	</div>
		                    	<div class="col-sm-6">
				                    <div class="form-group">
				                        <label class="col-md-4 control-label" for="text-input">RUT</label>
				                        <div class="col-md-8">
				                            <input type="text" class="form-control"  value="<?php echo $mk125_Rut; ?>" name="ganRut">
				                        </div>
				                    </div>			                    		
		                    	</div>
		                    </div>
		                    <div class="row">
		                    	<div class="col-sm-6">
				                    <div class="form-group">
				                        <label class="col-md-4 control-label" for="text-input">Fecha</label>
				                        <div class="col-md-8">
				                            <input type="date" class="form-control" placeholder=""  name="ganFec" required value="<?php echo $mk125_Fec; ?>">
				                        </div>
				                    </div>			                    		
		                    	</div>
		                    </div>
									
			            </div>    		
			            

			            <div class="panel-footer">
			            	<button type="submit" class="btn btn-sm btn-primary" id="btnSubir"  ><i class="fa fa-dot-circle-o"></i> Guardar</button>
			            </div>
			        </div>

			        </form>

			    </div>

			</div><!--/row-->
			

				
		</div>
		<!-- end: Content -->
		
		
		<footer>

			<div class="row">

				<div class="col-sm-5">
					&copy; 2017 Seo2
				</div><!--/.col-->

				
			</div><!--/.row-->	

		</footer>
		
				<div class="modal fade" id="myModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Modal title</h4>
					</div>
					<div class="modal-body">
						<p>Here settings can be configured...</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save changes</button>
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
		<script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script> 
		<script src="assets/plugins/datepicker/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/plugins/timepicker/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/plugins/datatables/js/dataTables.bootstrap.min.js"></script>
	

		<!-- theme scripts -->
		<script src="assets/plugins/pace/pace.min.js"></script>
		<script src="assets/js/jquery.mmenu.min.js"></script>
		<script src="assets/js/core.min.js"></script>
		
		<!-- inline scripts related to this page -->
		<script src="assets/js/pages/table.js"></script>
		<script src="assets/js/pages/form-elements.js"></script>
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
