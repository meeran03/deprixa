<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="keywords" content="Courier DEPRIXA-Integral Web System">
		<meta name="author" content="Jaomweb">
		<meta name="description" content="">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- For Window Tab Color -->
		<!-- Chrome, Firefox OS and Opera -->
		<meta name="theme-color" content="#fff">
		<!-- Windows Phone -->
		<meta name="msapplication-navbutton-color" content="#fff">
		<!-- iOS Safari -->
		<meta name="apple-mobile-web-app-status-bar-style" content="#fff">
		<title>Track Shipment Result	| <?php echo $core->site_name;?></title>
		<!-- favicon -->
        <link rel="icon" type="image/png" sizes="56x56" href="uploads/favicon.png">
        <!-- Bootstrap -->
        <link href="<?php SITEURL ?>assets/theme_deprixa/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="<?php SITEURL ?>assets/theme_deprixa/css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Slider -->               
        <link rel="stylesheet" href="<?php SITEURL ?>assets/theme_deprixa/css/owl.carousel.min.css"/> 
        <link rel="stylesheet" href="<?php SITEURL ?>assets/theme_deprixa/css/owl.theme.css"/> 
        <link rel="stylesheet" href="<?php SITEURL ?>assets/theme_deprixa/css/owl.transitions.css"/>  
        <!-- Main css --> 
        <link href="<?php SITEURL ?>assets/theme_deprixa/css/style.css" rel="stylesheet" type="text/css" />
		
		<link rel="stylesheet" href="<?php SITEURL ?>assets/assets-theme/css/bundle.css">
		<link rel="stylesheet" href="<?php SITEURL ?>assets/assets-theme/css/style.css">
		<script type="text/javascript" src="<?php SITEURL ?>assets/assets/js/jquery.js"></script>
		<script type="text/javascript" src="<?php SITEURL ?>assets/assets/js/jquery-ui.js"></script>
		
		<link rel="stylesheet" type="text/css" href="<?php SITEURL ?>assets/assets-theme/main.css">
		<link rel="stylesheet" href="<?php SITEURL ?>assets/assets-theme/themify-icons.css">
		<!--[if lt IE 8]><!-->
		<link rel="stylesheet" href="<?php SITEURL ?>assets/assets-theme/ie7/ie7.css">
		
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9INLAuOPMqm6Pj8Z8jL1ixTTBcls_SKA&callback=myMap.initMap&libraries=places"></script>
		<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();   
		});
		</script>
		<style>
			ul.a {
				list-style-type: none;
			}
			
			/* Contenedor del popup */
			.popup {
				position: relative;
				display: inline-block;
				cursor: pointer;
			}

			/* pop-up actual */
			.popup .popuptext {
				visibility: hidden;
				width: 260px;
				background-color: #555;
				color: #fff;
				text-align: center;
				border-radius: 4px;
				padding: 8px 0;
				position: absolute;
				z-index: 1;
				bottom: 125%;
				left: 50%;
				margin-left: -130px;
			}
			
			.button4 {
				background-color: white;
				color: black;
				border: 2px solid #e7e7e7;
			}

			.button4:hover {background-color: #e7e7e7;}

			/* Muestra del Pop-up*/
			.popup .popuptext::after {
				content: "";
				position: absolute;
				top: 100%;
				left: 50%;
				margin-left: -5px;
				border-width: 5px;
				border-style: solid;
				border-color: #555 transparent transparent transparent;
			}

			/* Cambio para mostrar/ocultar el contenedor del pop-up */
			.popup .show {
				visibility: visible;
				-webkit-animation: fadeIn 1s;
				animation: fadeIn 1s
			}

			/* AnimaciĂ³n del pop-up */
			@-webkit-keyframes fadeIn {
				from {opacity: 0;} 
				to {opacity: 1;}
			}

			@keyframes fadeIn {
				from {opacity: 0;}
				to {opacity:1 ;}
			}
		</style>
		<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();   
		});
		</script>
		<script>
			function mostrarMensaje() {
				var popup = document.getElementById("myPopup");
				popup.classList.toggle("show");
			}
		</script>	
		<style>
			#map-canvas{
				width: 100%;
				height: 250px;
			}
		</style>

		<style>
		.center {
		  margin: auto;
		  width: 60%;
		  padding: 10px;
		}
		</style>	
	</head>

<body>