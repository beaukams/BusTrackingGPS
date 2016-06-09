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
coord1 = new OpenLayers.LonLat(lon, lat)
coord2= new OpenLayers.LonLat(-17.271058,14.432651 )
var lonLat = coord1.transform(new OpenLayers.Projection("EPSG:4326"), map.getProjectionObject());
map.setCenter (lonLat, zoom);}

calqueMarkers = new OpenLayers.Layer.Markers("Repères");
map.addLayer(calqueMarkers);

var dakar=new OpenLayers.Marker(coord1);
calqueMarkers.addMarker(dakar);
var arret15=new OpenLayers.Marker(coord2);
calqueMarkers.addMarker(arret15);

calqueMarkers.events.register("touchstart",calqueMarkers,cliquemarker);
//

AutoSizeAnchored = OpenLayers.Class(OpenLayers.Popup.Anchored, {            'autoSize': true});

markers = new OpenLayers.Layer.Markers("zibo");
map.addLayer(markers);

function addMarker(ll, popupClass, popupContentHTML, closeBox, overflow) {
            var feature = new OpenLayers.Feature(markers, ll); 
            feature.closeBox = closeBox;
            feature.popupClass = popupClass;
            feature.data.popupContentHTML = popupContentHTML;
            feature.data.overflow = (overflow) ? "auto" : "hidden";
                    
            var marker = feature.createMarker();

            var markerClick = function (evt) {
                if (this.popup == null) {
                    this.popup = this.createPopup(this.closeBox);
                    map.addPopup(this.popup);
                    this.popup.show();
                } else {
                    this.popup.toggle();
                }
                currentPopup = this.popup;
                OpenLayers.Event.stop(evt);
            };
            marker.events.register("mousedown", feature, markerClick);

            markers.addMarker(marker);
}
/*var longlat, popupClass, popupContentHTML;
<?php while ($donnees = mysql_fetch_array($retour))
        {       
            $lon = $donnees['lon'];
            $lat = $donnees['lat'];
?>
longlat = new OpenLayers.LonLat(<?php echo $lon.",".$lat ; ?>).transform(new OpenLayers.Projection("EPSG:4326"), map.getProjectionObject());
popupClass = AutoSizeAnchored;
popupContentHTML = '<img src="small.jpg"></img>';
addMarker(longlat, popupClass, popupContentHTML);
<?php
        }
?>*/
	

}