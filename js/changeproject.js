$('body').on('click','.projectchangelink',function()
{
    $('#currentproject').html($(this).text()+' <span class="caret"></span>');
    $('#currentproject').attr('projectid',$(this).attr('projectid'));
    $('#currentproject').attr('machinename',$(this).attr('machinename'));
    $('.customtoolbar').show();
    $('#datatable').bootstrapTable('refresh',{url: 'php/data/getdata_json.php?project='+$('#currentproject').text()});
    $('#stylestable_default').bootstrapTable('refresh',{url: 'php/style/getstyle_json.php?projectid='+$(this).attr('projectid')+'&default=true&project='+$('#currentproject').text()});
    $('#stylestable').bootstrapTable('refresh',{url: 'php/style/getstyle_json.php?projectid='+$(this).attr('projectid')});
    refreshVectorSource($(this).attr('machinename'),$(this).attr('projectid'));
    $('#infopanel').html(infopanel);
    hoverSource.clear();
    highlightedfeature = null;
    if(selectedfeature)
    {
	selectedSource.removeFeature(selectedfeature);
	selectedfeature = null;
    }
});
function refreshVectorSource(var_machinename,var_projectid)
{
    timefilternumber = 0;
    $.ajax({
	type:'GET',
	dataType: 'json',
        url: base_url+'/php/filter/gettimefilterdata_json.php',
        data: {project:var_machinename,filterart:'time'},
    })
    .done(function(response)
    {
	timefilterdata = response;
    })
    .fail(function()
    {
    });

    var newstyle;
    var newsource;

    $.ajax({
	type:'GET',
	dataType: 'json',
	url: base_url+'/php/style/getstyle_json.php',
	data: {projectid:var_projectid},
    })
    .done(function(response)
    {
	newstyleinformation = response;
	objectitems = [];
	for(i = 0;i < newstyleinformation.length;++i)
	{
	    objectitems.push(newstyleinformation[i].object);
	};
	newstyle = function(feature, resolution)
	{
	    if(objectitems.indexOf(feature.get('object')) >= 0)
	    {
		return buildStyle(newstyleinformation[objectitems.indexOf(feature.get('object'))]);
	    }
	    else
	    {
		return defaultStyle;
	    }
	};
	vectorlayer.setStyle(newstyle);
    })
    .fail(function()
    {
    });

    newsource = new ol.source.Vector(
    {
        url: 'php/data/getdata_geojson.php?machinename='+var_machinename,
	format: new ol.format.GeoJSON()
    });
    vectorlayer.setSource(newsource);
};
function buildStyle(item)
{
    var itemStyle = [new ol.style.Style(
    {
	image:new ol.style.Circle(
	{
	    radius: item.radius,
	    fill: new ol.style.Fill(
	    {
	        color: item.fillcolor,
	    }),
	    stroke: new ol.style.Stroke(
	    {
	        color: item.strokecolor,
		width: 4,
	    })
	})
    })];
    return itemStyle;
}