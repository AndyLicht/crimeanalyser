
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
    layers: [rasterlayer,vectorlayer,featureoverlay,featureinfooverlay],
    target: 'ol3map',
    view: view,
});