window.onload = function () 
{
	var map = new OpenLayers.Map('map');

	// Position de départ sur la carte
	var lat = 14.6937000;
	var lng = -17.4440600;
	var zoom = 10;

	var osmLayer = new OpenLayers.Layer.OSM();
	map.addLayer(osmLayer);
	//map.zoomToMaxExtent();
	
	//addBus(lat, lng, 18, map, zoom)

	/*var popup = new OpenLayers.Popup.FramedCloud("Popup", coord.getBounds().getCenterLonLat(), null,null, null, true);  // <-- true if we want a close (X) button, false otherwise
	
	map.addPopup(popup);*/

	refreshBusLigne(6, lat, lng, 18, map, zoom); //raffraichissement toutes les 6 secondes

} 

function addBus(lat, lng, mat, map, zoom){
	if( ! map.getCenter() ){

		coord = new OpenLayers.LonLat(lng, lat);
		var lonLat = coord.transform(new OpenLayers.Projection("EPSG:4326"), map.getProjectionObject());
		map.setCenter (lonLat, zoom);
	}

	calqueMarkers = new OpenLayers.Layer.Markers("Repères");
	map.addLayer(calqueMarkers);

	var dakar = new OpenLayers.Marker(coord);
	calqueMarkers.addMarker(dakar);
}

function refreshBusLigne(delai,lat, lng, mat, map, zoom){ 
	var ligne = document.getElementById("search")
    setInterval(function(){
		   	var xhr; 

		    try {  
		    	xhr = new ActiveXObject('Msxml2.XMLHTTP');   
		  
		    }catch (e) {
		        try {   
		        	xhr = new ActiveXObject('Microsoft.XMLHTTP'); 
		        }
		        catch (e2) {
		           try {  
		           	xhr = new XMLHttpRequest();  
		           }
		           catch(e3) {  
		           	xhr = false;
		           }
		         }
		    }
		  
		    xhr.onreadystatechange  = function() { 
		       if(xhr.readyState  == 4){
			       	var label = document.getElementById("label");
			       	
			        if(xhr.status  == 200) {
			        	var valeur = xhr.responseText;
			           label.innerHTML += valeur; 
			           //console.log(ligne.value);
			           addBus(lat, lng, 18, map, zoom)
			       	}
			        else{
			            label.innerText ="Error code " + xhr.status;
			        }
		        }
		    }; 
		 
		   
		   if(ligne.value == "")  {
		   	xhr.open("POST", "position_bus.php",  true); 
		   	xhr.send(null);
		   	} 
		   else{
		   	xhr.open("POST", "position_bus.php",  true); 
		    xhr.send(ligne.value); 
			}

    	},
    	delai*1000
    );

} 