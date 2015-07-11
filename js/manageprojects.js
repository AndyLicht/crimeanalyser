/*
*
* ein neues Projekt anlegen
*
*/
$('#newproject').on('click',function()
{
    $('#projectform').show();
});

$('#savenewproject').on('click',function()
{
    if(($('#newprojectname').val().length == 0) || ($('#newprojectdescription').val().length == 0))
    {
	$('#statusmeldung').html('bitte geben Sie einen Namen und eine Beschreibung an');
    }
    else
    {
	//Check
	$('#statusmeldung').html('Vorgang wird bearbeitet');
	var base_url = window.location.origin;
	$.ajax({
		type:'POST',
		url: base_url+'/php/projects/createproject.php',
		data: {projectname:$('#newprojectname').val(),projectdescription:$('#newprojectdescription').val()},
	    })
	    .done(function(response)
	    {
		$('#statusmeldung').html(response);
		$('#projecttable').bootstrapTable('refresh');
		$('#projectform').hide();
		//Funktion zum erneuern des DriopDown Menues
		refresh_dropdown(base_url);
		$('#newprojectname').val('');
		$('#newprojectdescription').val('');
	    })
	    .fail(function()
	    {
		$('#statusmeldung').html('keine Verbindung zum Connector oder andere Systemfehler');
	    });
    }
});

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

