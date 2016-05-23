window.onload = mapping;

function mapping(){

	// Position de départ sur la carte
	var lat = 14.6937000;
	var lng = -17.4440600;
	var zoom = 10;

	var map = new ol.Map({
        layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          })
        ],
        target: 'map',
        view: new ol.View({
          projection: 'EPSG:4326',
          center: [lng, lat],
          zoom: zoom
        })
      });

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

function addBus(lat, lng, mat, map, zoom){
	
	map.innerText = "";

	map = new ol.Map({
    	layers: [
          new ol.layer.Tile({
            source: new ol.source.OSM()
          })
    	],
    	target: 'map',
        view: new ol.View({
          projection: 'EPSG:4326',
          center: [lng, lat],
          zoom: zoom
        })
    });

}

function refreshBusLigne(delai, map, zoom){ 
	map = document.getElementById("map");

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
			          
			           for(var i=0; i<res.length; i++){
			           		bus = res[i];
			           		bus = bus.split("_");
			           		if(i==0){

			           			addBus(bus[3],bus[4], bus[1], map, zoom)
			           		}
			           		else{
			           			//addBus(bus[3],bus[4], bus[1], map, zoom);
			           		}
			           }
			           map.getLayers()['a'][0].getSource().refresh();
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