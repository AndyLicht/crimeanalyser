//Vector
vectorsource = new ol.source.Vector({
    url: 'php/data/getdata_geojson.php',
    format: new ol.format.GeoJSON()
  });
var firststyle =  new ol.style.Style(
{
    image: new ol.style.Circle(
    {
	fill: new ol.style.Fill(
	{
    	    color: 'rgba(97,11,246,0.9)'
        }),
        radius: 5,
        stroke: new ol.style.Stroke(
	{
    	    color: '#ff0',
    	    width: 1
        })
    })
});

vectorlayer = new ol.layer.Vector({
    title: 'Project',
    source: vectorsource,
    projection:'EPSG:3857',
    style:firststyle,
});

