<!DOCTYPE html>
<html class="no-js" lang="es-mx" prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#"  itemscope="" itemtype="http://schema.org/LocalBusiness" xmlns="http://www.w3.org/1999/xhtml" xml:lang="es-mx">

<head>
	<title>Tomatacos | ¿Quieres tacos?</title>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="author" content="Adrian Vazquez">
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="dc.language" content="es_MX"/>
    <meta property="og:locale" content="es_MX"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>

	<link rel="shortcut icon"  type="image/x-icon" href="assets/img/favicon.ico">
	<!--codigo de fuentes-->
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300,100,300italic,700,900,700italic,400italic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	
	<!--Link script-->
	<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<!-- CSS for app -->
    <link rel="stylesheet" href="assets/menu/slicknav.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css" > 
	
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBlOxsFrd1V_q-Bc8kPCiswH9myVuaH0N4"></script>
	<script type="text/javascript" src="assets/js/main.js"></script>
</head>
<body>
<header id="header" class="header">
	<menu type="context toolbar">
		<li></li>
	</menu>

</header>

<section class="map" id="map">
	<div style="overflow:hidden;height:500px;width:100%;">
		<div id="gmap_canvas" style="height:500px;width:100%;">
			<style>
				#gmap_canvas img{max-width:none!important;background:none!important}
			</style>
		</div>
	</div>

	<script type="text/javascript"> 
	function init_map(){
		var myOptions = {
			zoom 		: 	16,
			center		: 	new google.maps.LatLng(19.513056818661333,-101.6093156524658), 
			mapTypeId 	: 	google.maps.MapTypeId.ROADMAP
		};

		map  = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions); //pone el mapa en el div indicado

		var infoWindow = new google.maps.InfoWindow({map: map}); //Crea una infowindow para el punto "Estoy aquí"

		//Obtiene la geolocalización del navegador
		if (navigator.geolocation) {
		    navigator.geolocation.getCurrentPosition(function(position) {
		      var pos = {
		        lat: position.coords.latitude,
		        lng: position.coords.longitude
		      };
		      marker_here = new google.maps.Marker({
					map 		:  	map,
					position 	: 	new google.maps.LatLng(pos)
			  });

		      infoWindow.setPosition(pos);
		      infoWindow.setContent('Aquí estoy.');
		      map.setCenter(pos);
		    }, function() {
		      handleLocationError(true, infoWindow, map.getCenter());
		    });
		} else {
		    // Browser doesn't support Geolocation
		    handleLocationError(false, infoWindow, map.getCenter());
		}

		function handleLocationError(browserHasGeolocation, infoWindow, pos) {
		  infoWindow.setPosition(pos);
		  infoWindow.setContent(browserHasGeolocation ?
		                        'Error: The Geolocation service failed.' :
		                        'Error: Your browser doesn\'t support geolocation.');
		}

		var lugares;
		$.ajax({
			type  		: 	'GET',
			url 		: 	'api/locations',
			dataType 	: 	'json',
			success: function(data){
				var i=0;
				var marker = new Array();
				$.each(data, function(){

					//En cada punto de interés creará una infowindow distinta
					infowindow = new google.maps.InfoWindow({
						content 	: 	"<b>Plaza grande</b><br/>Patzcuaro<br/> Michoacán " + i
					});


					marker[i] = new google.maps.Marker({
						map 		:  	map,
						position 	: 	new google.maps.LatLng(parseFloat(this['coord_lat']), parseFloat(this['coord_lon'])),
						animation 	: 	google.maps.Animation.DROP,
						infowindow 	: 	infowindow
					});	
					
					//En cada punto de interés se crea el evento de abrir la información
					google.maps.event.addListener(marker[i], "click", function(){
						this.infowindow.open(map,this);
						map.setCenter(this.getPosition());
					});
					i++;
				});
				
			},
			error: function(xhr, resp, text) {
            	console.log(xhr, resp, text);
        	}
		});
	}

	google.maps.event.addDomListener(window, 'load', init_map);
	</script>
</section>

<section class="form" id="form">
	<div class="container">
		<form id="nuevoLugar" method="post">
			<p>Latitud: <input type="text" name="latitud" id="inputLat" value=""></p>
			<p>Longitud: <input type="text" name="longitud" id="inputLen" value=""></p>

			<input type="button" name="enviar" value="Guardar" id="botonGuardar">
		</form>
	</div>
</section>

<!-- begin download section -->
<section class="download" id="download">
	<div class="container">
		<div class="row left">
			<a href="#" class="btn btn-download" >
				For businnes try it now
			</a>
		</div>
		<div class="row right">
			<a href="#" class="btn btn-download" >					
				For individual downolad app
			</a>
		</div>
	</div>
</section>
<!-- end download section -->

<!-- begin footer section -->
<footer class="footer" id="footer">
	<div class="container">
		<ul class="list-inline">
			<li>
				<a href="#"><img src="https://cdn4.iconfinder.com/data/icons/miu/24/circle_social-twitter-outline-stroke-24.png" alt=""></a>
			</li>
			<li>
				<a href="#"><img src="https://cdn4.iconfinder.com/data/icons/miu/24/circle_social-facebook-outline-stroke-24.png" alt=""></a>
			</li>
			<li>
				<a href="#"><img src="https://cdn4.iconfinder.com/data/icons/miu/24/circle_social-linkedin-outline-stroke-24.png" alt=""></a>
			</li>
		</ul>

		<p>
			<small>2016 footer &copy; </small><br>
			<a href="#" title="">Legal</a> | <a href="#" title="">Terms of services</a>
		</p>
	</div>
</footer>
<!-- end footer section -->
</body>



</body>
</html>