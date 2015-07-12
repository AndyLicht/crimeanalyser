/*
*
* ein neues Projekt anlegen
*
*/
function refresh_dropdown(base_url)
{
    $('#currentproject').html('Projekt <span class="caret"></span>');
    $('#currentproject').attr('projectid','');
    $('#currentproject').attr('machinename','');

    $.ajax({
	type:'POST',
	url: base_url+'/php/projects/getprojects_dropdown.php',
	data:{echo:'true'}
    })
    .done(function(response)
    {
	$('#projectselection').html(response);
	$('.customtoolbar').hide();
	$('#datatable').bootstrapTable('refresh',{url: 'php/data/getdata_json.php'});
    })
    .fail(function()
    {
        $('#statusmeldung').append('konnte die Projektliste nicht erneuern');
    });
    timefilterdata = null;
    timefilternumber = null;
};

