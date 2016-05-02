<!DOCTYPE html>
<html>
<head>
<title>MAPAS</title>
<meta charset="UTF-8">

<style>
 /* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}
</style>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery.modal.js"></script>
<link rel="stylesheet" href="../js/jquery.modal.css" type="text/css" media="screen" />

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=set_to_true_or_false"></script>
<script type="text/javascript">

    var locations = [
      ['Bondi Beach', -33.890542, 151.274856, 4],
      ['Coogee Beach', -33.923036, 151.259052, 5],
      ['Cronulla Beach', -34.028249, 151.157507, 3],
      ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
      ['Maroubra Beach', -33.950198, 151.259302, 1]
    ];


$(document).ready(function() {
    initialize();
});
 
var map;
var geocoder;
var maker;
var infowindow;
  
function initialize() {

    geocoder = new google.maps.Geocoder();
    var myLatlng = new google.maps.LatLng(-33.489758, -70.618294);
    
	var myOptions = {
	  zoom: 8,
	  center: myLatlng,
	  mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	map = new google.maps.Map($("#map_canvas").get(0), myOptions);

	marker = new google.maps.Marker({
	  position: myLatlng,
	  map: map,
	  title:"Zoom"
	});

  map.addListener('center_changed', function() {
    // 3 seconds after the center of the map has changed, pan back to the
    // marker.
    window.setTimeout(function() {
      map.panTo(marker.getPosition());
    }, 3000);
  });

  marker.addListener('click', function() {
    map.setZoom(14);
    map.setCenter(marker.getPosition());
  });


	var contentString = '<div id="div_ejemplo">'+
		'<table>'+
		'<tr><td>Temperatura</td><td>:</td><td>18&deg</td></tr>'+
		'<tr><td>Humedad</td><td>:</td><td>18&deg</td></tr>'+
		'<tr><td>Precipitaciones</td><td>:</td><td>1mm</td></tr>'+
		'<tr><td>Viento</td><td>:</td><td>10km/h</td></tr>'+
		'<tr><td>Calidad del Aire</td><td>:</td><td>Buena</td></tr>'+
		'<tr><td colspan=2>Ver detalle</td></tr>'+
		'</table>'+
		'</div>';
 
	infowindow = new google.maps.InfoWindow({
		content: contentString,
		maxWidth: 200
	});
 
	google.maps.event.addListener(marker, 'click', function() {
		infowindow.open(map,marker);
	});
	
	
    var i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });
	}
	

}


	$('#search').live('click', function() {
	// Obtenemos la dirección y la asignamos a una variable
	var address = $('#address').val();
	// Creamos el Objeto Geocoder
	var geocoder = new google.maps.Geocoder();
	// Hacemos la petición indicando la dirección e invocamos la función
	// geocodeResult enviando todo el resultado obtenido
	geocoder.geocode({ 'address': address}, geocodeResult);
	});
 
function geocodeResult(results, status) {
    // Verificamos el estatus
    if (status == 'OK') {
        // Si hay resultados encontrados, centramos y repintamos el mapa
        // esto para eliminar cualquier pin antes puesto
        var mapOptions = {
            center: results[0].geometry.location,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map($("#map_canvas").get(0), mapOptions);
        // fitBounds acercará el mapa con el zoom adecuado de acuerdo a lo buscado
        map.fitBounds(results[0].geometry.viewport);
        // Dibujamos un marcador con la ubicación del primer resultado obtenido
        var markerOptions = { position: results[0].geometry.location }
        var marker = new google.maps.Marker(markerOptions);
        marker.setMap(map);
    } else {
        // En caso de no haber resultados o que haya ocurrido un error
        // lanzamos un mensaje con el error
        alert("Geocoding no tuvo éxito debido a: " + status);
    }
}

//_________ BUSCAR POR LAT Y LONG

function codeLatLng() {
  var input = $('#latlng').val();
  var latlngStr = input.split(',', 2);
  var lat = parseFloat(latlngStr[0]);
  var lng = parseFloat(latlngStr[1]);
  var latlng = new google.maps.LatLng(lat, lng);
  geocoder.geocode({'latLng': latlng}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      if (results[0]) {
        map.fitBounds(results[0].geometry.viewport);
                marker.setMap(map);
                marker.setPosition(latlng);
        $('#address_2').text(results[0].formatted_address);
        infowindow.setContent(results[0].formatted_address);
        infowindow.open(map, marker);
        google.maps.event.addListener(marker, 'click', function(){
            infowindow.setContent(results[0].formatted_address);
            infowindow.open(map, marker);
        });
      } else {
        alert('No results found');
      }
    } else {
      alert('Geocoder failed due to: ' + status);
    }
  });
}

</script>
</head>
<body>

<div>
   <input id="latlng" type="textbox" value="20.68009, -101.35403">
</div>
<div>
   <input type="button" value="Reverse Geocode" onclick="codeLatLng()">
</div>
<table class="width2">
	<tr>
		<td class="unitx1"><strong>Dirección:</strong></td>
   		<td><div id="address_2"></div></td>
	</tr>
</table>


<hr>


<div><input type="text" maxlength="100" id="address" placeholder="Dirección" /> 
<input type="button" id="search" value="Buscar" /></div>
<br/>
<div id='map_canvas' style="width:800px; height:600px;"></div>

</body>
</html>