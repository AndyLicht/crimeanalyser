/*
*
* allgemeingültige Funktion zum Löschen von Items
*
*/

$('.deletedata').on('click',function()
{
	//ausgeben um was für eine Art Daten es sich handelt
	modal = $(this).closest('.modal');
	table = $(modal).first('table');
	statusmeldungen = $(modal).find('div.statusmeldung');
	if($(table).bootstrapTable('getAllSelections').length > 0)
	{
	    $(statusmeldungen).html('<br><div class="alert alert-warning" role="alert"><p>Wollen Sie die gewählten Elemente unwiederruflich löschen?</p><span id="deletedatas" class="glyphicon glyphicon-ok"></span><span id="canceldelete" class="glyphicon glyphicon-remove"></span></div>');
	}
	else
	{
	    $(statusmeldungen).html('<br><div class="alert alert-info" role="alert">Bitte erst Elemente zum Löschen wählen,eventuell müssen Sie auch erst ein Projekt auswählen.</div>');
	};
});

$('body').on('click','#deletedatas',function()
{
    $.ajax(
    {
	type:'POST',
	url: base_url+'/php/delete.php',
	data: {project:$('#currentproject').attr('machinename'),modal:$(this).closest('.modal').attr('id'),todelete:$(this).closest('.modal').find('table').bootstrapTable('getAllSelections')}
    })
    .done(function(response)
    {
	console.log(response);
	$(this).closest('.modal').find('div.statusmeldung').html('<br><div class="alert alert-success" role="alert">'+response+'</div>');
	$(this).closest('.modal').find('table').bootstrapTable('refresh');
    })
    .fail(function()
    {
	$(this).closest('.modal').find('div.statusmeldung').html('<br><div class="alert alert-danger" role="alert">Bei der Verbindung zum Server ist leider etwas schief gegangen, bitte wenden Sie sich an den Administrator.</div>');
    });
});

$('body').on('click','#canceldelete',function()
{
    $(this).closest('.modal').find('div.statusmeldung').html('');
});
