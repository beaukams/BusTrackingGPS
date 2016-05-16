function init() 
{
var map = new OpenLayers.Map('map');

// Position de départ sur la carte
var lat=14.6937000;
var lon=-17.4440600;
var zoom=10;

var osmLayer = new OpenLayers.Layer.OSM();
map.addLayer(osmLayer);
//map.zoomToMaxExtent();

if( ! map.getCenter() ){
coord = new OpenLayers.LonLat(lon, lat)
var lonLat = coord.transform(new OpenLayers.Projection("EPSG:4326"), map.getProjectionObject());
map.setCenter (lonLat, zoom);}

calqueMarkers = new OpenLayers.Layer.Markers("Repères");
map.addLayer(calqueMarkers);

var dakar=new OpenLayers.Marker(coord);
calqueMarkers.addMarker(dakar);

 var popup = new OpenLayers.Popup.FramedCloud("Popup", 
        coord.getBounds().getCenterLonLat(), null,null, null,
        true // <-- true if we want a close (X) button, false otherwise
    );
	 map.addPopup(popup);
	

} 
