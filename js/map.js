
var view = new ol.View({
    projection: 'EPSG:3857',
    //center: [1492505.6361, 7185109.5981],
    center: [1398990.6997,7127425.0314],
    zoom: 8
 })

ol3map = new ol.Map(
{
    controls: ol.control.defaults(
    {
	attributionOptions: /** @type {olx.control.AttributionOptions} */ (
	{
	    collapsible: false
	})
    }).extend([mousePositionControl3857,mousePositionControl4326,scaleline]),
    layers: [rasterlayer,vectorlayer],
    target: 'ol3map',
    view: view,
});

ol3map.on('pointermove', function(evt)
{
    if (evt.dragging)
    {
	return;
    }
    var pixel = ol3map.getEventPixel(evt.originalEvent);
    displayFeatureInfo(pixel);
    });

ol3map.on('click', function(evt)
{
    console.log(evt.pixel);
    //displayFeatureInfo(evt.pixel);
});



var highlightStyleCache = {};

var featureOverlay = new ol.layer.Vector({
  source: new ol.source.Vector(),
  map: ol3map,
  style: function(feature, resolution) {
    var text = resolution < 5000 ? feature.get('name') : '';
    if (!highlightStyleCache[text]) {
      highlightStyleCache[text] = [new ol.style.Style({
        stroke: new ol.style.Stroke({
          color: '#f00',
          width: 1
        }),
        fill: new ol.style.Fill({
          color: 'rgba(255,0,0,0.1)'
        }),
        text: new ol.style.Text({
          font: '12px Calibri,sans-serif',
          text: text,
          fill: new ol.style.Fill({
            color: '#000'
          }),
          stroke: new ol.style.Stroke({
            color: '#f00',
            width: 3
          })
        })
      })];
    }
    return highlightStyleCache[text];
  }
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