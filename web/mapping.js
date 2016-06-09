var val_zoom = 10;
var map;
var LeafIcon = L.Icon.extend({
	    options: {
	       // shadowAnchor: [1, 41],
	     /*   iconSize: [25, 41],
			iconAnchor: [12, 41],
			popupAnchor: [1, -34],
			shadowSize: [41, 41]*/
	    }
});

/*
	créer les icones
*/
var bus_icon;
var arret_icone;
var visitor_icon;


window.onload=function(){
	var delai = 10 //, delaimax;
	var ligne = document.getElementById("bussearch");
	bus_icon = create_icone("images/marker_bus.png", "images/marker_bus_shadow.png");
	arret_icon = create_icone("images/marker_arret_bus.png", "images/marker-shadow.png");
	visitor_icon = create_icone("images/marker_visitor.png", "images/marker_visitor_shadow.png");

	map = L.map('map',{
			center: [14.681293, -17.467403],
    		zoom: val_zoom
		}),
    trail = {
			        type: 'Feature',
			        properties: {
			            id: 1
			        },
			        geometry: {
			            type: 'LineString',
			            coordinates: []
			        }
	},
	realtime = L.realtime(function(success, error) {
			    	var data;
			    	
			    	if(!ligne.value){
			    		data = "10";
			    		
			    	}
			    	else{
			    		data = ligne.value;

	}

	init_carte(ligne);
	

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', { //http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png
			    attribution: 'DIC2TRS-ESP'
	}).addTo(map);

	

	map.on('zoomend', function(e){
		val_zoom = map.getZoom();
	})

	L.Realtime.reqwest({
		url: 'position_bus.php',
		method: "post",
		crossOrigin: true,
		type: 'json',
		data: {'ligne': data}
	}).then(function(data) {
			        	
		var trailCoords = trail.geometry.coordinates;
		trailCoords.push([data.position.lng, data.position.lat]);
		trailCoords.splice(0, Math.max(0, trailCoords.length - 5));

        ajout_marker_bus(data.position.lat, data.position.lng, "Bus");
        val_zoom = map.getZoom();
		success({
			                type: 'FeatureCollection',
			                features: [data, trail]
			            });
			        })
			        .catch(error);
		}, {
			interval: 10 * 1000
	}).addTo(map);
			    
}

function ajout_marker(lat, lng, libelle) {
	var marker = L.marker([lat, lng]).addTo(map);
    marker.bindPopup(libelle+"<br/>latitude:"+lat+", longitude:"+lng)
        .on('mouseover', function(e){ marker.openPopup(); })
        .on('mouseout', function(e){ marker.closePopup(); });

    return marker;
}

function ajout_marker_client(lat, lng) {
	var marker = L.marker([lat, lng], {icon: visitor_icon}).addTo(map);
    marker.bindPopup("Vous:<br/>latitude:"+lat+", longitude:"+lng)
        .on('mouseover', function(e){ marker.openPopup(); })
        .on('mouseout', function(e){ marker.closePopup(); });

    return marker;
}

function ajout_marker_arret(lat, lng, libelle) {
	var marker = L.marker([lat, lng]).addTo(map);
    marker.bindPopup(libelle)
        .on('mouseover', function(e){ marker.openPopup(); })
        .on('mouseout', function(e){ marker.closePopup(); });

    return marker;
}

function ajout_marker_bus(lat, lng, libelle) {
	var marker = L.marker([lat, lng], {icon: bus_icon}).addTo(map);
    marker.bindPopup(libelle+"<br/>latitude:"+lat+", longitude:"+lng)
        .on('mouseover', function(e){ marker.openPopup(); })
        .on('mouseout', function(e){ marker.closePopup(); });

    return marker;
}

/*
	ajouter tous les arrets de la ligne
*/
function ajout_arrets(ligne){
	var xhr; 
	try {  
		xhr = new ActiveXObject('Msxml2.XMLHTTP');    
	}catch(e){
		try {   
		    xhr = new ActiveXObject('Microsoft.XMLHTTP'); 
		}catch (e2) {
		    try {  
		        xhr = new XMLHttpRequest();  
			}catch(e3){  
		           	xhr = false;
		 	}
		}
	}

	if(xhr){
		xhr.onreadystatechange  = function() { 
		       if(xhr.readyState  == 4){
			       	
			        if(xhr.status  == 200) {
			        	var valeur = xhr.responseText;
			        	

			           	var arrets = valeur.split("*");

			           	/*id_ligne
						nom_ligne
						terminus1
						terminus2
						id_arretligne
						id_arret
						id_ligne
						sens
						num_arretDansLigne
						id_arret
						nom_arret
						latitude_arret
						longitude_arret
						*/
			          
			           	for(var i=0; i<arrets.length; i++){
			           		var arret = arrets[i];
			           		arret = arret.split("_");
			           		var desc = "Arret:"+arret[9]+"<br/>Latitude:"+arret[11]+"<br/>Longitude:"+arret[12];
			           		ajout_marker_arret(arret[11], arret[12], desc);
			           }
			       	}
			        else{
			           // label.innerText ="Error code " + xhr.status;
			        }
		        }

		};

		xhr.open("POST", "arrets_ligne.php",  true); 
		xhr.setRequestHeader("Access-Control-Allow-Methods", "REQUEST,GET,HEAD,OPTIONS,POST,PUT");
		xhr.setRequestHeader("Access-Control-Allow-Headers","Content-Type, Access-Control-Allow-Headers,Access-Control-Allow-Origin, Authorization, X-Requested-With, Access-Control-Allow-Methods");
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.send("ligne="+ligne.value); 
	}
}

function geolocalise(){
	if(navigator.geolocation){
		navigator.geolocation.getCurrentPosition(function(position){
			
			document.getElementById("lab_lat").innerHTML = position.coords.latitude;
			document.getElementById("lab_lng").innerHTML = position.coords.longitude;
			//document.getElementById("lab_alt").innerHTML = position.coords.altitude;
			ajout_marker_client(document.getElementById("lab_lat").innerHTML, document.getElementById("lab_lng").innerHTML);
		},
		function(error){
			 var info = "Erreur lors de la géolocalisation : ";
			    switch(error.code) {
			    case error.TIMEOUT:
			    	info += "Timeout !";
			    break;
			    case error.PERMISSION_DENIED:
			    info += "Vous n’avez pas donné la permission";
			    break;
			    case error.POSITION_UNAVAILABLE:
			    	info += "La position n’a pu être déterminée";
			    break;
			    case error.UNKNOWN_ERROR:
			    	info += "Erreur inconnue";
			    break;
			    document.getElementById("lab_lat").innerHTML = info;
			    document.getElementById("lab_lng").innerHTML = info;
				}
			},
			{maximumAge:600000,enableHighAccuracy:true});
		}
}


function init_carte(ligne){
	geolocalise();
	//esp 14.681293, -17.467403
    var centre = ajout_marker(14.681293, -17.467403, "Ecole Supérieure Polytechnique");
	ajout_arrets(ligne);
}


/*
	créer une icone sur la carte leaflet
*/
function create_icone(image, shadow){
	return new LeafIcon({iconUrl: image, shadowUrl: shadow});
}
