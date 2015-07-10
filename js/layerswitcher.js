var activerasterlayer = 'osm';
$( "#osmbutton" ).on( "click", function() {
    if(activerasterlayer == 'sat')
    {
	activerasterlayer = 'osm';
	$("#satbutton").removeClass('active');
	rasterlayer.setSource(null);
	rasterlayer.setSource(osmsource);
	$(this).addClass('active');
    }
});
$("#satbutton").on( "click", function() {
    if(activerasterlayer == 'osm')
    {
	activerasterlayer = 'sat';
	$("#osmbutton").removeClass('active');
	rasterlayer.setSource(null);
	rasterlayer.setSource(satsource);
	$(this).addClass('active');
    }
});

