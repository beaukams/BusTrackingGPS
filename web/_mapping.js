var zoom = 13;
window.onload=function(){
	var delai = 10 //, delaimax;
	var ligne = document.getElementById("bussearch");

	geolocalise();

	var map = L.map('map'),
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

	//esp 14.681293, -17.467403
	var cent = L.marker([14.681293, -17.467403]).addTo(map);
    cent.bindPopup("Ecole SUpérieure Polytechnique")
    .on('mouseover', function(e){ marker.openPopup(); })
    .on('mouseout', function(e){ marker.closePopup(); });

	//map.fitBounds(realtime.getBounds(), {minZoom:5,maxZoom: 12});
	map.setView([14.681293, -17.467403], zoom);//document.getElementById("lab_lat").innerHTML, document.getElementById("lab_lng").innerHTML]);


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

			            var marker = L.marker([data.position.lat, data.position.lng]).addTo(map);
                      /*  marker.bindPopup("Dakar")
                              .on('mouseover', function(e){ marker.openPopup(); })
                              .on('mouseout', function(e){ marker.closePopup(); });*/
			            success({
			                type: 'FeatureCollection',
			                features: [data, trail]
			            });
			        })
			        .catch(error);
			    }, {
			        interval: 10 * 1000
			    }).addTo(map);
			    //http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png
			  
			L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
			    attribution: 'DIC2TRS-ESP'
			}).addTo(map);

			//map.setView([document.getElementById("lab_lat").value, document.getElementById("lab_lng").value])
			realtime.on('update', function() {
			  	//map.fitBounds(realtime.getBounds(), {minZoom:13,maxZoom: 14});
			    //map.setView([14.7645042, -17.3660286]);
			    zoom = map.getZoom();
			    map.setView([14.681293, -17.467403], zoom);
	});
}


function geolocalise(){
	if(navigator.geolocation){
		navigator.geolocation.getCurrentPosition(function(position){
			
			document.getElementById("lab_lat").innerHTML = position.coords.latitude;
			document.getElementById("lab_lng").innerHTML = position.coords.longitude;
			//document.getElementById("lab_alt").innerHTML = position.coords.altitude;
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


