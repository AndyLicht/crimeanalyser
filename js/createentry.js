/*
*
* Allgemeine Funktion zum Erzeugen von Projekten, Daten und Stiles.
* leider noch überhaupt nicht allgemein
*/
/*Plus Button in jedem Modal*/
$('.newdata').on('click',function()
{
    modal = $(this).closest('.modal');
    form = $(modal).find('.createitem-formular');
    $(form).show();
});


$('body').on('click','.editData',function()
{
    ol3map_small.updateSize();
    row = $(this).closest('tr');
    $('#dataoid').text(row.children().eq(1).text());
    $('#datatime').val(row.children().eq(2).text());
    $('#dataobject').val(row.children().eq(3).text());
    $('#datadescription').val(row.children().eq(4).text());
    $('#datalocation').val(row.children().eq(7).text());
    $('#dataxcoor').val(row.children().eq(5).text());
    $('#dataycoor').val(row.children().eq(6).text());
    row = $(this).closest('tr');
    modal = $(this).closest('.modal');
    form = $(modal).find('.createitem-formular');
    $(form).show();
});


$('body').on('click','.editDefaultStyle',function()
{
    row = $(this).closest('tr');
    modal = $(this).closest('.modal');
    form = $(modal).find('.createitem-formular');
    $('#styleobject').val(row.children().eq(0).text());
    $('#fillpicker').colorpicker('setValue','rgba(43,147,242,1)');
    $('#strokepicker').colorpicker('setValue','rgba(28,9,245,1)');
    $('#stylestatus').val('new');
    $(form).show();
});

$('body').on('click','.editStyle',function()
{
    row = $(this).closest('tr');
    modal = $(this).closest('.modal');
    form = $(modal).find('.createitem-formular');
    $('#stylestatus').val('change');
    $(form).show();
    $('#styleoid').val(row.children().eq(1).text());
    $('#styleobject').val(row.children().eq(2).text());
    $('#styleradius').val(row.children().eq(3).text());
    $('#fillpicker').colorpicker('setValue',row.children().eq(4).text());
    $('#strokepicker').colorpicker('setValue',row.children().eq(5).text());
    $('#stylestrokewidth').val(row.children().eq(6).text());
});

$(".createitem-formular").submit(function(event)
{
    event.preventDefault();

    var form = $( this ),
          url = form.attr( 'action' );

    var postdata = {};
    $(this).find('.myforminput').each(function(index)
    {
	postdata[$(this).attr('id')] = $(this).val();
    });
    postdata['modal'] = $(this).closest('.modal').attr('id');
    postdata['project'] = $('#currentproject').attr('machinename');
    postdata['projectid'] = $('#currentproject').attr('projectid');
    
    var posting = $.post(url,postdata);
    posting.done(function( response )
    {
	$(modal).find('div.statusmeldung').html(response);
	//entsprechende Tabellen aktualisieren
	$(modal).find('table').each(function()
	{
	    $(this).bootstrapTable('refresh');
	});
	$(modal).find('.createitem-formular')[0].reset();
	console.log('jetzt sollte das Formular ausgeblendet werden');
	$(form).hide();
	if($(modal).attr('id') == 'modal-projects')
	{
	    refresh_dropdown(base_url);
	}
	if($(modal).attr('id') == 'modal-styles' || $(modal).attr('id') == 'modal-data')
	{
	    refreshVectorSource($('#currentproject').attr('machinename'),$('#currentproject').attr('projectid'));
	}
    });
});