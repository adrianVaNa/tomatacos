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
	google.maps.event.addDomListener(window, 'load', nuevoPunto);
	</script>
</section>

<section class="form" id="form">
	<div class="container">
		<form id="nuevoLugar" method="post">
			<p>Latitud: <input type="text" name="latitud" id="inputLat" value="" disabled></p>
			<p>Longitud: <input type="text" name="longitud" id="inputLen" value="" disabled></p>
			<p>Nombre: <input type="text" name="nombre" id="inputNombre" value="" placeholder="Ej. El paisa"></p>
			<p>Ciudad: <input type="text" name="ciudad" id="inputCiudad" value="" placeholder="Ej. Ciudad de México"></p>
			<p>Estado: <input type="text" name="estado" id="inputEstado" value="" placeholder="Ej. Michoacán"></p>
			<p>Teléfono <input type="tel" name="telefono" id="inputTelefono" value="" placeholder="Ej. 5512234567"></p>
			<p><textarea name="descripción" id="inputTexto" placeholder="Escribe una breve reseña del lugar"></textarea></p>

			<input type="button" name="enviar" value="Guardar" id="botonGuardar">
		</form>
	</div>
</section>


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