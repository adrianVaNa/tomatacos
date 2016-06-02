function creaMapa(){
	
	//Inicializa el mapa y lo pone en el div gmap_canvas

	var myOptions = {
			zoom 		: 	16,
			center		: 	new google.maps.LatLng(19.513056818661333,-101.6093156524658), 
			mapTypeId 	: 	google.maps.MapTypeId.ROADMAP
		};

		map  = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions); //pone el mapa en el div indicado

		return map;
}

function geolocalizacion(map){

	//Crea mapa y centra de acuerdo a la posición global
	//En caso de fallar posición global se sitúa en Pátzcuaro mich

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
}

function puntos(){
		
		//

		map = creaMapa();
		geolocalizacion(map);

		var lugares;
		$.ajax({
			type  		: 	'GET',
			url 		: 	'api/locations_file',
			dataType 	: 	'json',
			success: function(data){
				var i=0;
				var marker = new Array();
				$.each(data, function(){

					//En cada punto de interés creará una infowindow distinta
					infowindow = new google.maps.InfoWindow({
						content 	: 	"<h2>"+this['nombre']+"</h2><h3>"+this['texto']+"</h3><br/>Domicilio: "+this['domicilio']+"<br/>"+this['ciudad']+"<br/>"+this['estado']+"<br/>Teléfono: "+this['telefono']+"<br/>"
										+"<a href='#''>Editar</a>"
					});


					marker[i] = new google.maps.Marker({
						map 		:  	map,
						position 	: 	new google.maps.LatLng(parseFloat(this['coord_lat']), parseFloat(this['coord_lon'])),
						animation 	: 	google.maps.Animation.DROP,
						infowindow 	: 	infowindow,
						icon 		:  	'assets/img/taco.png'
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

function nuevoPunto(){

		//Función que crea un mapa con el evento click para capturar coordenadas

		map = creaMapa();
		geolocalizacion(map);

		google.maps.event.addListener(map, "click", function(event) {
		    var lat = event.latLng.lat();
		    var lng = event.latLng.lng();

		    marca = new google.maps.Marker({
				map 		:  	map,
				position 	: 	event.latLng,
				title 		: 	"Tacos aquí!"
			});
		    // populate yor box/field with lat, lng
		    //alert("Lat=" + lat + "; Lng=" + lng);
		    $("#inputLat").val(lat);
		    $("#inputLen").val(lng);
		});
}