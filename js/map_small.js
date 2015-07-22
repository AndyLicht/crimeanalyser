//Raster

var rasterlayer_small = new ol.layer.Tile();
rasterlayer_small.setSource(osmsource);

var view_small = new ol.View({
    projection: 'EPSG:3857',
    center: [1492505.6361, 7185109.5981],
    zoom: 8
 })


ol3map_small = new ol.Map(
{
    layers: [rasterlayer_small],
    target: 'ol3map_small',
    view: view_small,
});

$('#modal-data').on('shown.bs.modal', function (e) {
    ol3map_small.updateSize();
})

ol3map_small.on('click', function(evt)
{
    var coor4326 = ol.proj.transform(evt.coordinate, 'EPSG:3857', 'EPSG:4326');
    $('#dataxcoor').val(coor4326[0]);
    $('#dataycoor').val(coor4326[1]);
});

