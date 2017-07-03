<?php include('header.php') ?>
<body>
  <div class="container">
<!--   <h3 class="visible-xs">PREGUNTAS FRECUENTES</h3> -->
    <div class="row">
        <section class="ganadores">
			<div class="content_ganadores">
				<div class="col-sm-10 col-sm-offset-1">
					<div class="row">
						<div class="col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-0">
							<img class="img-responsive" src="assets/img/logo125.png" alt="">
						</div>
						<div class="col-sm-8">
							<div class="row text-center">
								<h3>GANADORES</h3>
								<h4>REVISA AQUÍ LOS GANADORES*</h4>
							</div>
							<div class="row">
								<div class="col-sm-10 col-sm-offset-1" id="caja_ganadores">
									<div class="row head_caja">
										<div class="col-xs-8 text-center">
											NOMBRE
										</div>
										<div class="col-xs-4 text-center">
											RUT
										</div>
									</div>
								  <?php
								  	$resultado = $db->rawQuery('select * from mckay125_ganadores order by ganID DESC');
									if($resultado){
										foreach ($resultado as $r) {
											$mk125_ID   = $r["ganID"];
											$mk125_Nom  = $r["ganNom"];
											$mk125_Rut  = $r["ganRut"];
											$mk125_Fec  = $r["ganFec"];
									?>
									<div class="row content_caja">
										<div class="col-xs-8 text-center caja_nom">
											<p>
											<?php echo $mk125_Nom; ?>
											</p>
										</div>
										<div class="col-xs-4 text-center caja_rut">
											<p>
											<?php echo $mk125_Rut; ?>
											</p>
										</div>
									</div> 
								<?php  
										}
									}                           
								?>
									
									<div class="row" id="footer_caja">
										<div class="col-sm-12 text-center">
											<p>*Los GANADORES están sujetos a verificación.</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </section>
    </div><!-- row -->
  </div> <!-- container -->
<?php include('footer.php') ?>

