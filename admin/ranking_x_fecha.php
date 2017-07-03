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
									  <th>Total de Códigos</th>
									  <th>Usuario</th>
									  
								  </tr>
							  </thead>   
							  <tbody>
								  <?php
									//echo "select * from mckay125_codigos where codRTS >= '$desde' and codRTS <= '$hasta'";
								  	//$resultado = $db->rawQuery("select * from mckay125_codigos where codRTS >= '$desde' and codRTS <= '$hasta'");

								    $con=mysql_connect("internal-db.s92700.gridserver.com","db92700_seo2","lD>60i1P957aSnM.");
								    $db=mysql_select_db("db92700_seo2",$con);
//								    echo "select count(*) as total, codRTS,codCod,codHora,codUS from mckay125_codigos where codRTS >= '$desde' and codRTS <= '$hasta'  GROUP BY codUS order by total DESC limit 3";
								    $query=mysql_query("select count(*) as total, codUS from mckay125_codigos where codRTS >= '$desde' and codRTS <= '$hasta' GROUP BY codUS order by total DESC limit 10");
								    while( $r=mysql_fetch_assoc($query))
								    {
											$total   = $r["total"];
											$codUS 	 = $r["codUS"];
									?>
								<tr>
									<td><?php echo $total; ?></td>
									<td><a href="codigos_x_fecha_x_usuario.php?mk125_ID=<?php echo $codUS; ?>&fecini=<?php echo $fecini; ?>&horini=<?php echo $horini; ?>&fecfin=<?php echo $fecfin; ?>&horfin=<?php echo $horfin; ?>"><?php echo get_participante($codUS) ?></a></td>
								</tr>   
								<?php  
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
			                <form role="form" action="ranking_x_fecha.php" method="get"> 
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
