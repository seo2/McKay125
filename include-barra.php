<div class="row">
	<div class="col-sm-8 col-sm-offset-2" id="caja-barra">
		<div class="row">
			<div class="col-sm-7">
				<img src="https://s219687.gridserver.com/clientes/modo/mckay/logo_sueno_millonario.png" class="img-responsive" id="logo-millonario">
			</div>
			<div class="col-sm-3 text-center">
				<img src="https://s219687.gridserver.com/clientes/modo/mckay/75mil.png" id="txt-codigos1" style="width: 120px;">
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
						<span><img src="https://s219687.gridserver.com/clientes/modo/mckay/10mil.png"></span>
					</div>
					<div id="veiticincomil" class="codigosingresados">
						<span><img src="https://s219687.gridserver.com/clientes/modo/mckay/25mil.png"></span>
					</div>
					<div id="cuarentaycincomil" class="codigosingresados">
						<span><img src="https://s219687.gridserver.com/clientes/modo/mckay/45mil.png"></span>
					</div>
				</div>
				<img src="https://s219687.gridserver.com/clientes/modo/mckay/txt-codigos-ingresados.png" id="txt-codigos2"  style="width: 90px;" >
			</div>
		</div>
	</div>
</div>