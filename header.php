<?php
	require_once("ajax/_lib/config.php");
	require_once("ajax/_lib/MysqliDb.php");
	$db = new MysqliDb (DBHOST, DBUSER, DBPASS, DBNAME);

	require_once 'Mobile_Detect.php';
	$detect = new Mobile_Detect;

	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	$scriptVersion = $detect->getScriptVersion();

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">

    <title>McKay®</title>

    <link rel="icon" type="image/png" href="assets/img/favicon.png" />

    <!-- CSS -->

    <link href="assets/css/formValidation.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/fonts.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900" rel="stylesheet">
    <link href="assets/css/animate.css" rel="stylesheet">
    <link href="assets/css/hover-min.css" rel="stylesheet">
    <link href="assets/css/owl.carousel.css" rel="stylesheet">
    <link href="assets/css/owl.theme.default.css" rel="stylesheet">
    <link href="assets/css/bootstrap.offcanvas.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <link href="assets/css/custom.css?v=2.2.1" rel="stylesheet">
    <link rel="shortcut icon" href="assets/img/favicon.ico">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<script>

!function(f,b,e,v,n,t,s)

{if(f.fbq)return;n=3Df.fbq=3Dfunction(){n.callMethod?

n.callMethod.apply(n,arguments):n.queue.push(arguments)};

if(!f._fbq)f._fbq=3Dn;n.push=3Dn;n.loaded=3D!0;n.version=3D'2.0';

n.queue=3D[];t=3Db.createElement(e);t.async=3D!0;

t.src=3Dv;s=3Db.getElementsByTagName(e)[0];

s.parentNode.insertBefore(t,s)}(window,document,'script',

'https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '129215334312197');

fbq('track', 'PageView');

</script>
<noscript>
	<img height="1" width="1" src="https://www.facebook.com/tr?id=129215334312197&ev=PageView&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->


  </head>
  <header class="clearfix" id="header1">
      <button type="button" class="navbar-toggle offcanvas-toggle" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="sr-only">Toggle navigation</span>
        </button>
<!-- Static navbar -->
  <nav class="navbar navbar-default navbar-static-top navbar-offcanvas navbar-offcanvas-touch navbar-offcanvas-right" role="navigation" id="js-bootstrap-offcanvas">
      <div class="container">
	      <div class="row">
	      	<div class="col-sm-10 col-sm-offset-1">
		        <div class="navbar-header">
		        <!--  <a class="navbar-brand" href="#">Brand</a> -->
		        </div>
		        <div id="navbar">
		<!--r
			        <div id="galletas" class="visible-xs">
			        	Galletas McKay®
			        </div>
		            <div class="rrss visible-xs">
		               <a href="https://www.facebook.com/GalletasMcKay/" target="_blank">
		                 <img src="assets/img/FB-f-Logo__blue_29.png" class="img-responsive">
		               </a>
		            </div>
		-->
		            <ul id="main_nav" class="nav navbar-nav">
		                <li><a href="index.php">Home</a></li>
		                <li><a href="que-gano.php">qué gano</a></li>
		                <li><a href="como-gano.php">cómo participo</a></li>
		                <li class="visible-xs"><a href="productos.php">productos</a></li>
		                <li class="visible-xs"><a href="ganadores.php">ganadores</a></li>
		                <li><a href="assets/descargas/Bases_McKay_125.pdf">bases legales</a></li>
		                <li><a href="contacto.php">contacto</a></li>
		                <li class="hidden-xs">
			                <a href="javascript:void(0);" class="btnnuevomenu"><i class="fa fa-bars" aria-hidden="true"></i></a>
		                </li>
		                <li class="visible-xs">
		                	<a href="https://www.facebook.com/GalletasMcKay/" target="_blank" class="btn-fb">
			                	<i class="fa fa-facebook" aria-hidden="true"></i>
							</a>
		                </li>

		            </ul>

		        </div><!--/ navbar-->
	      	</div>
	      </div>
      </div>
    </nav> <!-- nav -->
  </header>
  <header class="clearfix hide animated slideInDown" id="header2">
      <button type="button" class="navbar-toggle offcanvas-toggle" data-toggle="offcanvas" data-target="#js-bootstrap-offcanvas">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="sr-only">Toggle navigation</span>
        </button>
<!-- Static navbar -->
  <nav class="navbar navbar-default navbar-static-top navbar-offcanvas navbar-offcanvas-touch navbar-offcanvas-right" role="navigation" id="js-bootstrap-offcanvas">
      <div class="container">
	      <div class="row">
	      	<div class="col-sm-10 col-sm-offset-1">
		        <div class="navbar-header">
		        <!--  <a class="navbar-brand" href="#">Brand</a> -->
		        </div>
		        <div id="navbar">
			        <div id="galletas" class="">
			        	<img src="assets/img/logo-header.png">
			        </div>
		            <div class="rrss visible-xs">
		               <a href="https://www.facebook.com/GalletasMcKay/" target="_blank">
		                 <img src="assets/img/FB-f-Logo__blue_29.png" class="img-responsive">
		               </a>
		            </div>
		            <ul id="main_nav" class="nav navbar-nav primernav">
		                <li><a href="index.php">Home</a></li>
		                <li><a href="que-gano.php">qué gano</a></li>
		                <li><a href="como-gano.php">cómo participo</a></li>
		                <li class="visible-xs"><a href="productos.php">productos</a></li>
		                <li class="visible-xs"><a href="ganadores.php">ganadores</a></li>
		                <li><a href="assets/descargas/Bases_McKay_125.pdf">bases legales</a></li>
		                <li><a href="contacto.php">contacto</a></li>
		                <li class="hidden-xs">
			                <a href="javascript:void(0);" class="btnnuevomenu"><i class="fa fa-times" aria-hidden="true"></i></a>
		                </li>
		            </ul>

					<ul id="main_nav"  class="nav navbar-nav clear segundonav">
		                <li><a href="ganadores.php">ganadores</a></li>

		                <li class="lafacebook">
		                	<a href="https://www.facebook.com/GalletasMcKay/" target="_blank" class="btn-fb">
			                	<i class="fa fa-facebook" aria-hidden="true"></i>
							</a>
		                </li>
		                <li style=" margin: 0 0 0 12px;"><a href="faq.php" >Preguntas Frecuentes</a></li>
		                <li style="float:right;"><a href="productos.php">productos Participantes</a></li>
		            </ul>


		        </div><!--/ navbar-->
	      	</div>
	      </div>
      </div>
    </nav> <!-- nav -->
  </header>


