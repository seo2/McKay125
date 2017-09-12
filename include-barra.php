<div class="container">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3" id="caja-barra">
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2">
					<img src="https://s219687.gridserver.com/clientes/modo/mckay/logo-sueno.png" class="img-responsive" id="logo-millonario">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12 text-center">
					<div id="grafico">
	<?php 
	  	$resultado = $db->rawQuery('select count(*) as total from mckay125_sueno');
		if($resultado){
			foreach ($resultado as $r) {
				$instawins   = $r["total"];
			}
		}   
		
		$porcentaje = (100 * ($instawins + 2483)) / 75000;
		
	?>
						<div id="grafico-interior" data-total="8000" data-porcentaje="<?php echo $porcentaje; ?>">
							
						</div>
						<div id="diezmil" class="codigosingresados">
							<span class="hidden-xs"><strong>pista 1</strong><br><small>10 mil códigos</small></span>
							<span class="visible-xs"><strong>pista 1</strong><br><small>10 mil<br>códigos</small></span>
						</div>
						<div id="veiticincomil" class="codigosingresados">
							<span class="hidden-xs"><strong>pista 2</strong><br><small>25 mil códigos</small></span>
							<span class="visible-xs"><strong>pista 2</strong><br><small>25 mil<br>códigos</small></span>
						</div>
						<div id="cuarentaycincomil" class="codigosingresados">
							<span class="hidden-xs"><strong>pista 3</strong><br><small>45 mil códigos</small></span>
							<span class="visible-xs"><strong>pista 3</strong><br><small>45 mil<br>códigos</small></span>
						</div>
					</div>
					<img src="https://s219687.gridserver.com/clientes/modo/mckay/javi.png" id="txt-codigos2"  >
				</div>
			</div>
		</div>
	</div>	
</div>