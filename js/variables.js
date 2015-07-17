var ol3map;
var ol3map_small;
var vectorlayer;
var featureoverlay;
var featureinfooverlay;
var vectorsource;
var timefilterdata = null;
var timefilternumber = null;
var base_url = window.location.origin;
var newstyleinformation;
var highlightedfeature = null;
var selectedfeature = null;
var defaultStyle = [new ol.style.Style(
{
    image:new ol.style.Circle(
    {
	radius: 8,
	fill: new ol.style.Fill(
	{
    	    color: 'rgba(43,147,242,1)',
	}),
	stroke: new ol.style.Stroke(
	{
	    color: 'rgba(28,9,245,1)',
	    width: 1
	})
    })
})];

var overlayStyle = [new ol.style.Style(
{
    image:new ol.style.Circle(
    {
	radius: 15,
	fill: new ol.style.Fill(
	{
	    color: 'orange',
	}),
	stroke: new ol.style.Stroke(
	{
	    color: 'blue',
	    width: 5
	})
    })
})];

var selectedStyle = [new ol.style.Style(
{
    image:new ol.style.Circle(
    {
	radius: 15,
	fill: new ol.style.Fill(
	{
	    color: 'red',
	}),
	stroke: new ol.style.Stroke(
	{
	    color: 'green',
	    width: 5
	})
    })
})];







$('#timefiltersettings a').on('click', function (event) 
{
    $('#timefiltersettings').addClass('open');
});

$('#timefiltersettingsclose').on('click',function()
{
    $('#timefiltersettings').removeClass('open');
});