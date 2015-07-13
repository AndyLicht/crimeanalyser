//Controlls
var mousePositionControl3857 = new ol.control.MousePosition({
  coordinateFormat: ol.coordinate.createStringXY(4),
  projection: 'EPSG:3857',
  className: 'custom-mouse-position',
  target: document.getElementById('mouse-position-3857'),
  undefinedHTML: '&nbsp;'
});
var mousePositionControl4326 = new ol.control.MousePosition({
  coordinateFormat: ol.coordinate.createStringXY(4),
  projection: 'EPSG:4326',
  className: 'custom-mouse-position',
  target: document.getElementById('mouse-position-4326'),
  undefinedHTML: '&nbsp;'
});
var scaleline = new ol.control.ScaleLine({
    className: 'ol-scale-line',
    target: document.getElementById('scaleline')
  });



var highlight;
var displayFeatureInfo = function(pixel)
{
    var feature = ol3map.forEachFeatureAtPixel(pixel, function(feature, layer)
    {
	return feature;
    });

    //var info = document.getElementById('info');
    if (feature)
    {
	console.log(feature.getId() + ': ' + feature.get('object'));
    }
    else
    {
    }

    if (feature !== highlight)
    {
	if (highlight)
	{
	    featureOverlay.getSource().removeFeature(highlight);
	}
	if (feature)
	{
	    featureOverlay.getSource().addFeature(feature);
    }
	highlight = feature;
    }
};


