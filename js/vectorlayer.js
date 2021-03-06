//Vector
vectorsource = new ol.source.Vector(
{
    url: 'php/data/getdata_geojson.php',
    format: new ol.format.GeoJSON()
});

vectorlayer = new ol.layer.Vector(
{
    title: 'Project',
    source: vectorsource,
    projection:'EPSG:3857',
    style:defaultStyle,
});



//Overlay
featureoverlay = new ol.layer.Vector(
{
    title: 'FeatureOverlay',
    source: hoverSource,
    projection:'EPSG:3857',
    style:overlayStyle,
});
featureinfooverlay = new ol.layer.Vector(
{
    title: 'FeatureSelected',
    source: selectedSource,
    projection:'EPSG:3857',
    style:selectedStyle,
});
