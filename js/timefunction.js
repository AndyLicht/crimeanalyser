//Time Funktionen
$('.timelap').on('click',function()
{
	$('#clock').val($(this).first().text());
	$('#time-current').text($(this).children().attr('id').substring(5));
});

//Time-Recorder
$('#time-play').on('click',function()
{
    if(!$(this).hasClass('active'))
    {
	$(".recorder").removeClass('active');
	$(this).addClass('active');
	updateClock();
    }
});


var runningstatus = true;
var run = false;
function updateClock()
{
    if(timefilterdata == null)
    {
    }
    else
    {
	run = true;
	setTimeout(function()
	{
	    if(timefilterdata.length > timefilternumber+1)
	    {	
		if(!runningstatus)
		{
		    runningstatus = true;
		    run = false;
		    return;
		}
		else
		{
		    $('#clock').val(timefilterdata[timefilternumber].time);
		    timefilternumber++;
		    setnewStyle(timefilterdata[timefilternumber].time);
    		    updateClock(); //Rekursion
		}
	    }
	    else
	    {
		run = false;
	    }
	}, $('#intervall').val()*1000);
    };
}

//Reset-Funktion
$('#time-reset').on('click',function()
{
    $(".recorder").removeClass('active');
    if(run)
    {
	runningstatus = false;
    }
    $('#clock').val($('.timelap').first().text());
    timefilternumber = 0;
    setnewStyle(false);
});

//Vor-Funktion
$('#time-forward').on('click',function()
{
//    console.log(timefilterdata);
//    console.log(timefilternumber);
    if(timefilterdata != null && timefilterdata.length > timefilternumber)
    {
	$(".recorder").removeClass('active');
	$('#clock').val(timefilterdata[timefilternumber].time);
	setnewStyle(timefilterdata[timefilternumber].time);
	timefilternumber++;
    }
});

//Zurueck-Funktion
$('#time-backward').on('click',function()
{
    if(timefilternumber > 0 && timefilterdata != null)
    {
	$(".recorder").removeClass('active');
	timefilternumber--;
	$('#clock').val(timefilterdata[timefilternumber].time);
	setnewStyle(timefilterdata[timefilternumber].time);
    }
});



function setnewStyle (timefactor)
{
    objectitems = [];
    for(i = 0;i < newstyleinformation.length;++i)
    {
        objectitems.push(newstyleinformation[i].object);
    };
    newstyle = function(feature, resolution)
    {
	if(timefactor!=false)
	{
//	    console.log($('input[name=timefilterradio]:checked').val());
	    if(feature.get($('input[name=timefilterradio]:checked').val()) == timefactor)
	    {
		if(objectitems.indexOf(feature.get('object')) >= 0)
		{
		    return buildStyle(newstyleinformation[objectitems.indexOf(feature.get('object'))]);
		}
		else
		{
		    return defaultStyle;
		}
	    }
	    else
	    {
		return null;
	    }
	}
	else
	{
	    if(objectitems.indexOf(feature.get('object')) >= 0)
	    {
	        return buildStyle(newstyleinformation[objectitems.indexOf(feature.get('object'))]);
	    }
	    else
	    {
	        return defaultStyle;
	    }
	}
    };
    vectorlayer.setStyle(newstyle);
};

$('input[type=radio][name=timefilterradio]').change(function()
{
    $.ajax({
	    type:'GET',
	    dataType: 'json',
	    url: base_url+'/php/filter/gettimefilterdata_json.php',
	    data: {project:$('#currentproject').attr('machinename'),filterart:$('input[name=timefilterradio]:checked').val()},
    })
    .done(function(response)
    {
	timefilterdata = response;
	timefilternumber = 0;
	$('#clock').val('');
    })
    .fail(function()
    {
    });
});


