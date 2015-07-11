/*
*
* einen neuen Datensatz anlegen
*
*/
$('#newdata').on('click',function()
{
    $('#dataaddform').show();
});
$('body').on('click','.editData',function()
{
    row = $(this).closest('tr');
    $('#changedataoid').text(row.children().eq(1).text());
    $('#changedatatime').val(row.children().eq(2).text());
    $('#changedataobject').val(row.children().eq(3).text());
    $('#changedatadescription').val(row.children().eq(4).text());
    $('#changedatalocation').val(row.children().eq(6).text());
    coor = row.children().eq(5).text().replace('POINT(','').replace(')','').split(' ');
    $('#changedataxcoor').val(coor[0]);
    $('#changedataycoor').val(coor[1]);
    $('#datachangeform').show();
});


$('#savechangedata').on('click',function()
{
    var base_url = window.location.origin;
    $.ajax({
	type:'POST',
	url: base_url+'/php/data/changedata.php',
	data: {project:$('#currentproject').text(),oid:$('#changedataoid').val(),time:$('#changedatatime').val(),object:$('#changedataobject').val(),description:$('#changedatadescription').val(),location:$('#changedatalocation').val(),xcoor:$('#changedataxcoor').val(),ycoor:$('#changedataycoor').val()},
    })
    .done(function(response)
    {
	$('#data-statusmeldung').html(response);
	$('#datatable').bootstrapTable('refresh');
	$('#datachangeform').hide();
    })
    .fail(function()
    {
	$('#data-statusmeldung').html('keine Verbindung zum Connector oder andere Systemfehler');
    });
});


$('#savenewdata').on('click',function()
{
    var base_url = window.location.origin;
    $.ajax({
	type:'POST',
	url: base_url+'/php/data/createdata.php',
	data: {project:$('#currentproject').text(),oid:$('#newdataoid').val(),time:$('#newdatatime').val(),object:$('#newdataobject').val(),description:$('#newdatadescription').val(),location:$('#newdatalocation').val(),xcoor:$('#newdataxcoor').val(),ycoor:$('#newdataycoor').val()},
    })
    .done(function(response)
    {
	console.log(response);
	$('#data-statusmeldung').html(response);
	$('#datatable').bootstrapTable('refresh');
	$('#dataaddform').hide();
    })
    .fail(function()
    {
	$('#data-statusmeldung').html('keine Verbindung zum Connector oder andere Systemfehler');
    });	
});

/*
*
*
* ein bestehendes Projekt loeschen, dabei wird ein Vorgang angestossen der saemtliche dazugehoerige Tabellen und Spalten loescht
*
*/
/*
$('#deletedata').on('click',function()
{
    if(Object.keys($('#datatable').bootstrapTable('getAllSelections')).length > 0)
    {
	$('#data-statusmeldung').html('Vorgang wird bearbeitet');
	var base_url = window.location.origin;
	$.ajax({
	    type:'POST',
	    url: base_url+'/php/data/deletedata.php',
	    data: {project:$('#currentproject').attr('machinename'),todelete:$('#datatable').bootstrapTable('getAllSelections')}
	})
	.done(function(response)
        {
	    $('#data-statusmeldung').html(response);
	    $('#datatable').bootstrapTable('refresh');
	})
	.fail(function()
	{
	    $('#statusmeldung').html('keine Verbindung zum Connector oder andere Systemfehler');
	});
    }
    else
    {
	$('#data-statusmeldung').html('bitte mindestens einen Datensatz zum löschen wählen');
    }
});
*/
