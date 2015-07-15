//Select und Get
ol3map.on('pointermove', function(evt)
{
    if (evt.dragging)
    {
	return;
    }
    var pixel = ol3map.getEventPixel(evt.originalEvent);
    displayOverFeature(pixel);
    });

ol3map.on('click', function(evt)
{
    displayFeatureInfo(evt.pixel);
});

//Funktion die greift, wenn der Cursor über einem Feature ist
var displayOverFeature = function(pixel)
{
    var feature = ol3map.forEachFeatureAtPixel(pixel, function(feature, layer)
    {
	return feature;
    });
    if(feature)
    {
	if ((highlightedfeature == null) || (feature.getId() != highlightedfeature.getId()))
	{
	    var selectstyle = null;
	    $(newstyleinformation).each(function()
	    {
		if(feature.get('object') == this.object)
		{
		    selectstyle = buildselectStyle(this.radius,this.strokewidth);
		}
	    });
	    highlightedfeature = feature;
	    //highlightedfeature.setStyle(selectstyle);
	    featureoverlay.getSource().addFeature(highlightedfeature);
	}
    }
    else
    {
	if(highlightedfeature)
	{
	    featureoverlay.getSource().removeFeature(highlightedfeature);
	    highlightedfeature = null;
	}
    }
};

//Funktion die ein Feature selektiert und dessen Werte im Info-Bereich ausgibt
var displayFeatureInfo = function(pixel)
{
    var feature = ol3map.forEachFeatureAtPixel(pixel, function(feature, layer)
    {
	return feature;
    });

    //muss noch ausgebaut werden, dass auch wirklich jedes Feature aufgezeigt wird
    if(feature)
    {
	if ((selectedfeature == null) || (feature.getId() != selectedfeature.getId()))
	{
	    if(selectedfeature)
	    {
		featureinfooverlay.getSource().removeFeature(selectedfeature);
		selectedfeature = null;
	    }

	    /*
	    var selectstyle = null;
	    $(newstyleinformation).each(function()
	    {
		if(feature.get('object') == this.object)
		{
		    selectstyle = buildselectStyle(this.radius,this.strokewidth);
		}
	    });*/
	    var infopanel = '';
	    $(feature.getKeys()).each(function()
	    {
		if(this != 'geometry')
		{
		    console.log(feature.get(this));
		    infopanel=infopanel+'<p>'+this+': '+feature.get(this)+'<p>';
		}
		else
		{
		    console.log('geometrie: '+feature.get($(this)));
		}
	    });
	    $('#infopanel').html(infopanel);
	    console.log(infopanel);
	    selectedfeature = feature;
	    //selectedfeature.setStyle(selectstyle);
	    featureinfooverlay.getSource().addFeature(selectedfeature);
	}
    }
    else
    {
	if(selectedfeature)
	{
	    featureinfooverlay.getSource().removeFeature(selectedfeature);
	    selectedfeature = null;
	    $('#infopanel').html('');
	}
    }
};


function buildselectStyle(fradius,fstrokewidth)
{
    var Style = [new ol.style.Style(
    {
	image:new ol.style.Circle(
	{
	    radius: fradius,
	    fill: new ol.style.Fill(
	    {
		color: 'red',
	    }),
	    stroke: new ol.style.Stroke(
	    {
	    	color: 'green',
	    	width: fstrokewidth
	    })
	})
    })];
    return Style;
}