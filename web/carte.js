window.onload = function(){
	var map = new OpenLayers.Map('map');

	// Position de départ sur la carte
	var lat = 14.6937000;
	var lng = -17.4440600;
	var zoom = 10;

	//-var osmLayer = new OpenLayers.Layer.OSM();
	//-map.addLayer(osmLayer);
	//map.zoomToMaxExtent();
	
	//addBus(lat, lng, 18, map, zoom)

	/*var popup = new OpenLayers.Popup.FramedCloud("Popup", coord.getBounds().getCenterLonLat(), null,null, null, true);  // <-- true if we want a close (X) button, false otherwise
	
	map.addPopup(popup);*/

	//-calqueMarkers = new OpenLayers.Layer.Markers("Repères");
	//-map.addLayer(calqueMarkers);


	refreshBusLigne(6, map, zoom); //raffraichissement toutes les 6 secondes

} 

function addCenter(lat, lng, mat, map, zoom, calqueMarkers){
	coord = new OpenLayers.LonLat(lng, lat);
	if(!map.getCenter()){
		
		var lonLat = coord.transform(new OpenLayers.Projection("EPSG:4326"), map.getProjectionObject());
		map.setCenter (lonLat, zoom);
	}

//	calqueMarkers = new OpenLayers.Layer.Markers("Repères");
//	map.addLayer(calqueMarkers);

	var dakar = new OpenLayers.Marker(coord);
	calqueMarkers.addMarker(dakar);
}

function addBus(lat, lng, mat, map, zoom, calqueMarkers){
	coord = new OpenLayers.LonLat(lng, lat);

	var bus = new OpenLayers.Marker(coord);
	calqueMarkers.addMarker(bus);
}

function refreshBusLigne(delai, map, zoom){ 

	var osmLayer = new OpenLayers.Layer.OSM();
	map.addLayer(osmLayer);
	calqueMarkers = new OpenLayers.Layer.Markers("Repères");
	map.addLayer(calqueMarkers);
	console.log(map);
	//map.updateSize();
	/*var source = osmLayer.getSource();
	var params = source.getParams();
	params.t = new Date().getMilliseconds();
	source.updateParams(params);*/

	var ligne = document.getElementById("search");
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
			       	var bus, id_bus, lat, lng, alt, mat, nom_ligne, ladate, heure, vitesse;
			       	
			       	
			        if(xhr.status  == 200) {
			        	var valeur = xhr.responseText;
			           
			           //console.log(ligne.value);
			           label.innerText = valeur;

			           //recuperer l'ensemble des données et l'afficher sur la carte
			           res = valeur.split("*");
			          // console.log(res);
			           for(var i=0; i<res.length; i++){
			           		bus = res[i];
			           		bus = bus.split("_");
			           		//console.log(bus);
			           		if(i==0)
			           			addCenter(bus[3],bus[4], bus[1], map, zoom, calqueMarkers)
			           		else
			           			addCenter(bus[3],bus[4], bus[1], map, zoom, calqueMarkers);

			           }
			           map.updateSize();
			           //
			           
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