<?php include('header.php') ?>
<body>
  <div class="container">
   <h3 class="visible-xs">contacto</h3>
    <div class="row">
        <section class="contacto ">
            <img class="img-responsive center-block hidden-xs" src="assets/img/heading_como_gano.png" alt="">
            <img class="img-responsive center-block visible-xs" src="assets/img/heading_como_gano_xs.png" alt="">
          <div class="content_contacto clearfix">
            <div class="heading_contacto">
              <h3>¿TIENES ALGO QUE DECIR? </h3>
              <p>ESCRÍBENOS ACÁ</p>
            </div>
            <div class="row">
	        	<div class="col-sm-12">
					<?php include('include-form-contacto.php'); ?>	
	        	</div>
            </div>
            <div class="footer_contacto">
              <p>O LLÁMANOS AL <a href="tel:+56224871400">+56 2 2487 1400</a></p>
            </div>
          </div><!-- content contacto -->
        </section> <!-- contacto -->
    </div><!-- row -->
  </div> <!-- container -->
<?php include('footer.php') ?>

