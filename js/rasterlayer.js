
//Raster
var satsource = new ol.source.MapQuest({layer: 'sat'});
var osmsource = new ol.source.OSM();

var rasterlayer = new ol.layer.Tile();
rasterlayer.setSource(osmsource);

