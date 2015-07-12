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

$(".createitem-formular").submit(function(event)
{
    /* stop form from submitting normally */
    event.preventDefault();

    /* get some values from elements on the page: */
    var $form = $( this ),
          url = $form.attr( 'action' );

    var postdata = {};
    $('.myforminput').each(function(index)
    {
	postdata[$(this).attr('id')] = $(this).val();
    });
    postdata['modal'] = $(this).closest('.modal').attr('id');
    postdata['project'] = $('#currentproject').attr('machinename');
    
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
    });
});