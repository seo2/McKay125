<?php include('header.php') ?>

<body class="body-offcanvas">

  <div class="container">
    <div class="row">
	    <div class="col-sm-12">
	      <img src="assets/img/title.png" alt="" class="img-responsive center-block">
	    </div>
    </div>
    <div class="row">
     <div class="col-sm-12" id="formcod">
        <?php 
	    if( $detect->isMobile() && !$detect->isTablet() ){
			include('include-form-codigo-mobile.php'); 
		}else{
	        include('include-form-codigo-desk.php'); 
		}
		?>  
      </div>  <!-- col-sm-12 -->
    </div> <!-- row -->
    <div class="row">
	    <?php
		    $invisible = 0;
		  	$resultado = $db->rawQuery('select * from mckay125_ganadores order by ganiD DESC limit 1');
			if($resultado){
				foreach ($resultado as $r) {
					$mk125_ID   = $r["ganID"];
					$mk125_Nom  = $r["ganNom"];
					$mk125_Rut  = $r["ganRut"];
					$mk125_Fec  = $r["ganFec"];
					$invisible  = 1;
				}
			}     
			$newDate = date("d-m-Y", strtotime($mk125_Fec));
	    ?>
        <div class="box_ganador center-block <?php if($invisible == 0){ ?>invisible<?php } ?>">
            <div class="text">
              <h3>GANADOR <?php echo $newDate; ?></h3>
              <h4><?php echo $mk125_Nom; ?></h4>
            </div>
            <span class="small" style="
    color: #fff;
    bottom: 10px;
    position: absolute;
    display: block;
    text-align: center;
    width: 100%;
    left: 0;
">*Ganador sujeto a validación</span>
        </div>
        <section class="ingreso_datos hide" id="ingreso_datos">
              <h3>ingresa tus datos</h3>
            <form id="form_datos" class="form-horizontal">
              <div class="box_edad"> 
              <p>¿eres mayor de edad?</p>
              
                <label class="radio-inline">
                	<input type="radio" name="mayor" id="inlineRadio1" value="1"> sí
                </label>
                <label class="radio-inline">
                	<input type="radio" name="mayor" id="inlineRadio2" value=""> no
                </label> 
                
              </div> <!-- box edad -->
              <div class="col-sm-12 col-md-4">
                     <div class="form-group">
                      <label for="nombre" class="col-xs-12 col-md-4">nombre completo</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" required >
                            <input type="hidden" name="codigo2" id="codigo2">
                            <input type="hidden" name="hora2" id="hora2">
                            <input type="hidden" id="sueno" name="sueno">
                        </div>
                    </div>
                     <div class="form-group">
                      <label for="rut" class="col-xs-12 col-md-4">rut</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="rut" name="rut" placeholder=""required>
                        </div>
                    </div>
                     <div class="form-group">
                      <label for="email" class="col-xs-12 col-md-4">Mail</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control" id="email" name="email" placeholder="" required>
                        </div>
                    </div>
              </div>
              <div class="col-sm-12 col-md-4">
                     <div class="form-group border_top">
                      <label for="fecha" class="col-xs-12 col-md-4">fecha de nacimiento</label>
                        <div class="col-md-8">
                            <input type="date" class="form-control" id="fecha" name="fn" placeholder="" required>
                        </div>
                    </div>
                     <div class="form-group">
                      <label for="telefono" class="col-xs-12 col-md-4">Teléfono</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="telefono" name="fono" placeholder="" required>
                        </div>
                    </div>

                     <div class="form-group border_bottom">
                      <label for="ciudad" class="col-xs-12 col-md-4">Región</label>
                        <div class="col-md-8">
	                        <select class="form-control" name="region" id="region" required>
		                        
							  <option value="">Seleccione Región</option>
						  <?php
						  	$resultado = $db->rawQuery('select * from region');
							if($resultado){
								foreach ($resultado as $r) {
									$region_id   = $r["region_id"];
									$region_nombre  = $r["region_nombre"];
							?>
							  <option value="<?php echo $region_id; ?>"><?php echo $region_nombre; ?></option>  
								<?php  
										}
									}                           
								?>
							</select>
                        </div>
                    </div>

              </div>
              <div class="col-sm-12 col-md-4">
                    <div class="box_slider">
                       <p>Si fueses ganador del Gran sueño, ¿Qué categoría de sueño te gustaría cumplir? </p>
                      <div class="slider_categoria owl-carousel owl-theme">
                         <div class="item" data-sueno="viajes">
	                         <i class="fa fa-check-circle" aria-hidden="true"></i>
                           	<img src="assets/img/viajes.png" class="center-block">
                            <p>Viajes</p>
                         </div>
                         <div class="item" data-sueno="estudios">
	                         	<i class="fa fa-check-circle" aria-hidden="true"></i>
	                           <img src="assets/img/estudios.png" class="center-block">
	                            <p>Estudios</p>
                         </div>
                             <div class="item" data-sueno="emprendimiento">
	                             <i class="fa fa-check-circle" aria-hidden="true"></i>
                               <img src="assets/img/emprendimiento.png" class="center-block">
                                <p>Emprendimiento</p>
                         </div>
                           <div class="item" data-sueno="felicidad">
	                           <i class="fa fa-check-circle" aria-hidden="true"></i>
                               <img src="assets/img/amor.png" class="center-block">
                                <p>Felicidad, Salud</p>
                         </div>
                           <div class="item" data-sueno="auto">
	                           <i class="fa fa-check-circle" aria-hidden="true"></i>
                               <img src="assets/img/auto.png" class="center-block">
                                <p>Auto, etc.</p>
                         </div>
                      </div> <!-- slider categoria -->
                    </div> <!-- box slider -->
              </div>
              <div class="clearfix"></div>
            <button type="submit" class="btn btn-default btn_amarillo center-block" id="btnEnviar">enviar</button>
 		</form>
        </section>
    </div><!-- row -->
  </div> <!-- container -->
  
<!-- Modal -->
<div class="modal fade" id="modal_mensaje" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

    <!-- <img id="mensaje" class="img-responsive center-block" src="assets/img/mensaje.png" alt=""> -->
      <div class="mensaje">
        <p class="texto_blanco">¡Ya estás participando por el </p>
         <p class="texto_amarillo_large">gran sueño</p>
         <p class="small">(equivalente a $25.000.000)</p>
        <p class="texto_blanco"> o uno de los</p>
         <p class="texto_amarillo_small">sueños diarios</p>
        <p class="small"> (equivalente a $1.000.000)</p>
         <p class="texto_blanco">que tenemos para ti ! </p>
      </div>

       <img id="caja_suenos" class="img-responsive center-block" src="assets/img/caja_suenos.png?v=2" alt="">
      </div>
      <div class="modal-footer">
             *<span>Guarda tus envases</span> ya que son requisito para poder canjear 
tu premio en caso de resultar ganador
      </div>
    </div> <!-- modal content -->
  </div>
</div> <!-- modal mensaje -->

<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal_instawin">
 modal instawin
</button> -->

<!-- Modal -->
<div class="modal fade" id="modal_instawin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <p class="texto_blanco_large">¡FELICIDADES!</p>
        <p class="texto_blanco"> eres ganador de un pack de galletas mckay</p>
       <img id="pack_galletas" class="img-responsive center-block" src="assets/img/pack_galletas.png" alt="">
         <p class="texto_blanco_med">dentro de los próximos días 
te contactaremos vía correo electrónico
para coordinar la entrega de tu premio</p>
      </div>
      <div class="modal-footer">
            tus códigos ingresados siguen participando
por uno de los sueños diarios que mckay tiene para ti
      </div>
    </div> <!-- modal content -->
  </div>
</div> <!-- modal mensaje -->  
  
<?php include('footer.php') ?>

