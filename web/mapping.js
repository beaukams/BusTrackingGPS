/* Creation d'un tableau qui va contenir nos donnes */
window.onload=function(){
	var delai = 10, delaimax;
	var ligne = document.getElementById("bussearch");
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
			    	console.log(ligne.value);
			    	if(!ligne.value){
			    		data = "10";
			    		
			    	}
			    	else{
			    		data = ligne.value;

	}



	L.Realtime.reqwest({
		url: 'http://localhost/gpstracking/web/position_bus.php',
		method: "post",
		crossOrigin: true,
		type: 'json',
		data: {'ligne': data}
	}).then(function(data) {
			        	
			            var trailCoords = trail.geometry.coordinates;
			            trailCoords.push([data.position.lng, data.position.lat]);
			            trailCoords.splice(0, Math.max(0, trailCoords.length - 5));

			            var marker = L.marker([data.position.lat, data.position.lng]).addTo(map);
                        marker.bindPopup("Dakar")
                              .on('mouseover', function(e){ marker.openPopup(); })
                              .on('mouseout', function(e){ marker.closePopup(); });
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

			realtime.on('update', function() {
			    map.fitBounds(realtime.getBounds(), {maxZoom: 15});
	});
}


