<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title>Principal</title>
	<!-- Load google font -->
	<link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" type="text/javascript"></script>
	<!-- Load styles -->
	<link href="Estilo/css/bootstrap.css" rel="stylesheet">
	<link href="Estilo/css/style.css" rel="stylesheet">
	<link href="Estilo/css/icons.css" rel="stylesheet">
	<link href="Estilo/css/colorbox.css" rel="stylesheet">
	<link rel="stylesheet" href="Aplicacion/js/css/bootstrap.min.css">
    <link rel="stylesheet" href="Aplicacion/Iconos/css/all.min.css">
	<!-- Load javascrips libraries-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="Estilo/js/jquery.bxslider.js"></script>
	<script src="Estilo/js/jquery.easypiechart.js"></script>
	<script src="Estilo/js/jquery.colorbox.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script src="Aplicacion/Gandero.js"></script>
	<script src="Aplicacion/Iconos/js/all.min.js"></script>
    <script src="Aplicacion/js/bootstrap.min.js"></script>
	
</head>
<body>
	<!-- Offsite canvas navigation start -->
	<nav class="main-nav">
		<a href="#" class="close"><i class="icon-cancel"></i></a>
		<img class="logo" src="Estilo/images/ford-logo.png" alt="">
		<h2>Ford Motors</h2>
		<hr>
		<ul class="nav nav-pills nav-stacked">
			<li>
				<a href="index.php" title="Home page">Principal <i class="icon-angle-right"></i></a>
			</li>
			<li>
				<a href="#service" title="Home page">Acerca de <i class="icon-angle-right"></i></a>
			</li>
			<li>
				<a href="#works" title="Home page">Contactenos <i class="icon-angle-right"></i></a>
			</li>
			<li>
				<a href="#registro" title="Home page">Registrar <i class="icon-angle-right"></i></a>
			</li>
			<li>
				<a href="Presentacion/login.php" title="Home page">Iniciar Session <i class="icon-angle-right"></i></a>
			</li>
		</ul>
		<hr>
	</nav>

	<div class="navbar navbar-default navbar-fixed-top">
		<div class="navbar-inner">
			<a href="#" class="navbar-brand">
				<img src="Estilo/images/ford-logo.png" alt="Logo" />
				
			</a>
			<a href="#" id="nav-expander" class="nav-expander pull-right">Menu
				<i class="icon-align-justify"></i>
			</a>
		</div>
	</div>

	<div id="main-slider" class="slider">
		<div class="slide slide-01">
			<div class="content">
				<div class="mask">
					<h1>Ford Motors</h1>
					<p>Mejorando sus necesidades</p>
				</div>
			</div>
		</div>
		<div class="slide slide-02">
			<div class="content">
				<div class="mask">
                    <h1>Ford Motors</h1>
					<p>Mejorando sus necesidades</p>
				</div>
			</div>
		</div>
	</div>
	<div class="jumbotron" id="home">
		<div class="container">
			<img class="logo" src="Estilo/images/ford-logo.png" alt="logo">
			<h1><big>Ford Motors</big></h1>
			<hr>
			<p>En un mundo en constante cambio, nuestro sentido de propósito es constante.<br>
                <span>En Ford Motors</span> <br>
                Honramos nuestro legado mientras construimos el futuro, un mundo mejor para las generaciones venideras.</p>
             
		</div>
	</div>

	<div id="service" class="services">
		<div class="intro">
			<h2>¿Quienes Somos?</h2>
			<div class="text">
				<div class="container">
					<p>Ford es una empresa familiar, que se extiende por todo el mundo y valoramos el servicio a los demás,<br> 
                    estamos acostumbrados a adaptarnos y liderar el cambio.</p>
				</div>
			</div>
		</div>
		<div class="quote" data-stellar-background-ratio="0.5">
			<div class="mask"></div>
			<div class="container">
				<p class="pattern"></p>
				<p class="quote-text">Los mejores vehiculos en el mercado</p>
				<p class="pattern"></p>
			</div>
		</div>
	</div>
	<div id="registro" class="container">
            <div class="container">
                <div class="card-header bg-info">
				<p class="pattern"></p>
				<p class="quote-text">Registrar Ganadero</p>
				<p class="pattern"></p>
                </div>

            </div>
            <div class="card-body">
                <input type="hidden" name="id" id="id"/>
                <div class="row">
                    <div class="col-md-6">
						<div class="container">
							<p>Nombre:</p>
						</div>
                        <input type="text" name="nombre" id="nombre" placeholder="Ingrese Nombre" class="form-control"> 
                    </div>
                    <div class="col-md-6">
						<div class="container">
							<p>Apellidos:</p>
						</div>
                        <input type="text" name="apellidos" id="apellidos" placeholder="Ingrese Apellidos" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
						<div class="container">
							<p>Cedula:</p>
						</div>
                        <input type="text" name="cedula" id="cedula" placeholder="Ingrese La Cédula" class="form-control">
                    </div>
                    <div class="col-md-6">
						<div class="container">
							<p>Contraseña:</p>
						</div>
                        <input type="password" name="contra" id="contra" placeholder="Ingrese una contraseña" class="form-control">
                    </div>
                </div>
				<br>
				<div class="row">
                    <div class="btn-group-sm">
                        <button class="btn btn-outline-info" onclick="Crear();"><spam class="fa fa-save"></spam> Guardar</button>
                    </div>
                </div>

            </div>

        </div>

	<div class="works" id="works">
		<div class="intro-second">
			<div class="title">
				<div class="container">
					<h2>Contactenos</h2>
				</div>
			</div>
			<div class="intro-text">
				<div class="container">
                <p>Ford Motor Company, Customer Relationship Center</p>
					<p>Correo</p>
                    <p>fordmotors@gmail.com</p>
                    <p>Telefono</p>
                    <p>8387-9333</p>
				</div>
			</div>
		</div>


	<div class="footer">
		<div class="container">
			<img class="logo" src="Estilo/images/ford-logo.png" alt="...">
			<a href="#" class="toTop">Volvel al Inicio</a>
			<p class="copiright">&copy; Copyright 2021. Todos los Derechos Reservados.</p>
		</div>
	</div>
	<!-- Footer section end -->
<script type="text/javascript">

/*
 * Initialize switcher on conact section from address view to contat form.
 * We use bxSlider for this.
 * More information and documentation on http://bxslider.com/
 */
$('.contact-slider').bxSlider({
	nextSelector: '#contact-form',
	prevSelector: '#go-to-address',
	autoControls: false,
	pager: false,
	nextText: "Drop a line",
	prevText: "View address",
});

/*
 * Initialize slider for team members.
 * We use bxSlider for this.
 * More information and documentation on http://bxslider.com/
 */
$('#slider').bxSlider({
 	pagerCustom: '#person-pager',
 	autoControls: false,
 	controls: false,
});

/*
 * Initialize lightbox for images in portfolio.
 * We use ColorBox for this.
 * More information and documentation http://www.jacklmoore.com/colorbox/
 */
$(".portfolio-search").colorbox({
	rel:'portfolio-search',
	height:"75%"
});

/*
 * Show or hide offsite navigation.
 *
 */
$('#nav-expander').on('click', function(e) {
	e.preventDefault();
	$('.main-nav').toggleClass('nav-expanded');
	$('.navbar-default').toggleClass('expanded');
});
$('.main-nav .close').on('click', function(e) {
	e.preventDefault();
	$('.main-nav').toggleClass('nav-expanded');
	$('.navbar-default').toggleClass('expanded');
});


/*
 * Link navigation and webpage sections.
 *
 */
$(window).load(function() {
	function filterPath(string) {
		return string.replace(/^\//, '').replace(/(index|default).[a-zA-Z]{3,4}$/, '').replace(/\/$/, '');
	}
	$('a[href*=#]').each(function() {
		if (filterPath(location.pathname) == filterPath(this.pathname) && location.hostname == this.hostname && this.hash.replace(/#/, '')) {
			var $targetId = $(this.hash),
			$targetAnchor = $('[name=' + this.hash.slice(1) + ']');
			var $target = $targetId.length ? $targetId : $targetAnchor.length ? $targetAnchor : false;

			if ($target) {

				$(this).click(function() {

					var targetOffset = $target.offset().top - 63;
					$('html, body').animate({
						scrollTop: targetOffset
					}, 800);
					return false;
				});
			}
		}
	});
});


/*
 * Initialize main slider with BxSlider. http://bxslider.com/
 */
$('#main-slider').bxSlider({
	auto: true,
	autoControls: false,
	pager: false,
	controls: false,
	mode: 'fade',
	onSlideAfter: function($slideElement, oldIndex, newIndex) {
						$slideElement.find('.mask h1').addClass("current animated  fadeInRightBig");
						$slideElement.find('.mask p').addClass("current animated  fadeInLeftBig");
					},
					onSlideBefore: function($slideElement, oldIndex, newIndex) {
						$slideElement.find('.mask h1').removeClass("current animated  fadeInRightBig");
						$slideElement.find('.mask p').removeClass("current animated  fadeInLeftBig");
					}
				});

/*
 * Generate "We are good at" pie charts. For this we use http://rendro.github.io/easy-pie-chart/
 */
$('.chart').easyPieChart({
	barColor: '#202835',
	trackColor: '#FB6816',
	lineWidth: 10,
	lineCap: 'butt',
	size: 130,
	scaleLength: 0,
	easing: 'easeOutBounce',
	onStep: function(from, to, percent) {
		$(this.el).find('.percent').text(Math.round(percent));
	}
});

/*
 * This function initialize google map. More info on 
 * https://developers.google.com/maps/documentation/javascript/
 */
function initialize() {

	var mapOptions = {
		zoom: 12,
		zoomControl: false,
		scaleControl: false,
		scrollwheel: false,
		center: new google.maps.LatLng(40.729523, -73.978672),
		mapTypeControlOptions: {
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
		},
		styles: [{
			"featureType": "water",
			"stylers": [{
				"saturation": 43
			}, {
				"lightness": -11
			}, {
				"hue": "#0088ff"
			}
			]
		}, {
			"featureType": "road",
			"elementType": "geometry.fill",
			"stylers": [{
				"hue": "#ff0000"
			}, {
				"saturation": -100
			}, {
				"lightness": 99
			}
			]
		}, {
			"featureType": "road",
			"elementType": "geometry.stroke",
			"stylers": [{
				"color": "#808080"
			}, {
				"lightness": 54
			}
			]
		}, {
			"featureType": "landscape.man_made",
			"elementType": "geometry.fill",
			"stylers": [{
				"color": "#ece2d9"
			}
			]
		}, {
			"featureType": "poi.park",
			"elementType": "geometry.fill",
			"stylers": [{
				"color": "#ccdca1"
			}
			]
		}, {
			"featureType": "road",
			"elementType": "labels.text.fill",
			"stylers": [{
				"color": "#767676"
			}
			]
		}, {
			"featureType": "road",
			"elementType": "labels.text.stroke",
			"stylers": [{
				"color": "#ffffff"
			}
			]
		}, {
			"featureType": "poi",
			"stylers": [{
				"visibility": "off"
			}
			]
		}, {
			"featureType": "landscape.natural",
			"elementType": "geometry.fill",
			"stylers": [{
				"visibility": "on"
			}, {
				"color": "#b8cb93"
			}
			]
		}, {
			"featureType": "poi.park",
			"stylers": [{
				"visibility": "on"
			}
			]
		}, {
			"featureType": "poi.sports_complex",
			"stylers": [{
				"visibility": "on"
			}
			]
		}, {
			"featureType": "poi.medical",
			"stylers": [{
				"visibility": "on"
			}
			]
		}, {
			"featureType": "poi.business",
			"stylers": [{
				"visibility": "simplified"
			}
			]
		}
		]
	};
	map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>
</body>

</html>