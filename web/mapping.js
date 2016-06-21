var val_zoom = 15;
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
	var delai = 10; //, delaimax;
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
		console.log(data);

		if(data.allee!=null){
			trailCoords.push([data.allee.position.lng, data.allee.position.lat]);
			trailCoords.splice(0, Math.max(0, trailCoords.length - 5));

	        ajout_marker_bus(data.allee.position.lat, data.allee.position.lng, "Bus<br/>Matricule:"+data.allee.bus.matricule);
	        //mettre à jour le tableau
	        document.getElementById("loc_bus_palais").innerHTML = "latitude:"+data.allee.position.lat+",longitude:"+data.allee.position.lng;
	        document.getElementById("dist_bus_palais").innerHTML = (parseInt(data.allee.position.reste)/1000.0)+"";
	        document.getElementById("arret_bus_palais").innerHTML = data.allee.arrets.nom+",latitude:"+parseFloat(data.allee.arrets.lat).toFixed(6)+", longitude:"+parseFloat(data.allee.arrets.lng).toFixed(6);
	        document.getElementById("rest_bus_palais").innerHTML = data.allee.arrets.reste;
		}

		if(data.retour!=null){
			trailCoords.push([data.retour.position.lng, data.retour.position.lat]);
			trailCoords.splice(0, Math.max(0, trailCoords.length - 5));

	        ajout_marker_bus(data.retour.position.lat, data.retour.position.lng, "Bus<br/>Matricule:"+data.retour.bus.matricule);
	        //mettre à jour le tableau
	        document.getElementById("loc_bus_liberte").innerHTML = "latitude:"+data.retour.position.lat+",longitude:"+data.retour.position.lng;
	        document.getElementById("dist_bus_liberte").innerHTML = (parseInt(data.retour.position.reste)/1000.0)+"";
	        document.getElementById("arret_bus_liberte").innerHTML = data.retour.arrets.nom+",latitude:"+parseFloat(data.retour.arrets.lat).toFixed(6)+", longitude:"+parseFloat(data.retour.arrets.lng).toFixed(6);
	        document.getElementById("rest_bus_liberte").innerHTML = data.retour.arrets.reste;		
		}
		


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
	var marker = L.marker([parseFloat(lat).toFixed(6), parseFloat(lng).toFixed(6)]).addTo(map);
    marker.bindPopup(libelle+"<br/>latitude:"+lat+", longitude:"+lng)
        .on('mouseover', function(e){ marker.openPopup(); })
        .on('mouseout', function(e){ marker.closePopup(); });

    return marker;
}

function ajout_marker_client(lat, lng) {
	var marker = L.marker([parseFloat(lat).toFixed(6), parseFloat(lng).toFixed(6)], {icon: visitor_icon}).addTo(map);
    marker.bindPopup("Vous:<br/>latitude:"+lat+", longitude:"+lng)
        .on('mouseover', function(e){ marker.openPopup(); })
        .on('mouseout', function(e){ marker.closePopup(); });

    return marker;
}

function ajout_marker_arret(lat, lng, libelle) {
	var marker = L.marker([parseFloat(lat).toFixed(6), parseFloat(lng).toFixed(6)]).addTo(map);
    marker.bindPopup(libelle)
        .on('mouseover', function(e){ marker.openPopup(); })
        .on('mouseout', function(e){ marker.closePopup(); });

    return marker;
}

function ajout_marker_bus(lat, lng, libelle) {
	var marker = L.marker([parseFloat(lat).toFixed(6), parseFloat(lng).toFixed(6)], {icon: bus_icon}).addTo(map);
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
			           		latitude = arret[arret.length-2];
			           		longitude = arret[arret.length-1];
			           		

			           		var desc = "Arret<br/>N°:"+arret[10]+",arret:"+arret[11]+"<br/>Latitude:"+parseFloat(latitude).toFixed(6)+"<br/>Longitude:"+parseFloat(longitude).toFixed(6);
			           		
			           		ajout_marker_arret(parseFloat(latitude).toFixed(6), parseFloat(longitude).toFixed(6), desc);

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
			
			document.getElementById("lab_lat").innerHTML = parseFloat(position.coords.latitude).toFixed(6);
			document.getElementById("lab_lng").innerHTML = parseFloat(position.coords.longitude).toFixed(6);
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
	//14.681335 -17.466754
    var centre = ajout_marker(14.681335,-17.466754, "Ecole Supérieure Polytechnique");
	ajout_arrets(ligne);
}


/*
	créer une icone sur la carte leaflet
*/
function create_icone(image, shadow){
	return new LeafIcon({iconUrl: image, shadowUrl: shadow});
}
