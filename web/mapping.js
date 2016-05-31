/* Creation d'un tableau qui va contenir nos donnes */
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
			        L.Realtime.reqwest({
			            url: 'http://localhost/gpstracking/web/position_bus.php',
			            crossOrigin: true,
			            type: 'json'
			        })
			        .then(function(data) {
			        	
			            var trailCoords = trail.geometry.coordinates;
			            trailCoords.push([data.position.lng, data.position.lat]);
			            trailCoords.splice(0, Math.max(0, trailCoords.length - 5));
			            success({
			                type: 'FeatureCollection',
			                features: [data, trail]
			            });
			        })
			        .catch(error);
			    }, {
			        interval: 20 * 1000
			    }).addTo(map);

			L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
			    attribution: 'DIC2TRS-ESP'
			}).addTo(map);

			realtime.on('update', function() {
			    map.fitBounds(realtime.getBounds(), {maxZoom: 10});
			});