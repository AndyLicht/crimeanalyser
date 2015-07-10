var ol3map;
var vectorlayer;
var vectorsource;
var timefilterdata = null;
var timefilternumber = null;
var base_url = window.location.origin;
var newstyleinformation;
var defaultStyle = [new ol.style.Style(
{
    image:new ol.style.Circle(
    {
	radius: 8,
	fill: new ol.style.Fill(
	{
    	    color: 'rgba(12,185,240,1)',
	}),
	stroke: new ol.style.Stroke(
	{
	    color: 'blue',
	    width: 1
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