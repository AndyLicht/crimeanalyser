/*
*
* Allgemeine Funktion zum Erzeugen von Projekten, Daten und Stiles.
*
*/
$('.newdata').on('click',function()
{
    modal = $(this).closest('.modal');
    form = $(modal).find('.createitem-formular');
    $(form).show();
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
    /* stop form from submitting normally */
    event.preventDefault();

    /* get some values from elements on the page: */
    var $form = $( this ),
          url = $form.attr( 'action' );

    var postdata = {};
    $(this).find('.myforminput').each(function(index)
    {
	postdata[$(this).attr('id')] = $(this).val();
    });
    postdata['modal'] = $(this).closest('.modal').attr('id');
    postdata['project'] = $('#currentproject').attr('machinename');
    postdata['projectid'] = $('#currentproject').attr('projectid');
    
    /* Send the data using post */
    var posting = $.post(url,postdata);
    posting.done(function( response )
    {
	console.log(response);
	$(modal).find('div.statusmeldung').html(response);
	//entsprechende Tabellen aktualisieren
	$(modal).find('table').each(function()
	{
	    $(this).bootstrapTable('refresh');
	});
	$(modal).find('.createitem-formular')[0].reset();
	$(form).hide();
    });
});