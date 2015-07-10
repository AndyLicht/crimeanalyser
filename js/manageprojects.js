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



/*
*
*
* ein bestehendes Projekt loeschen, dabei wird ein Vorgang angestossen der saemtliche dazugehoerige Tabellen und Spalten loescht
*
*/
$('#deleteproject').on('click',function()
{
    if(Object.keys($('#projecttable').bootstrapTable('getAllSelections')).length>0)
    {
	$('#statusmeldung').html('Vorgang wird bearbeitet');
	var base_url = window.location.origin;
	$.ajax({
	    type:'POST',
	    url: base_url+'/php/projects/deleteproject.php',
	    data: {todelete:$('#projecttable').bootstrapTable('getAllSelections')}
	})
	.done(function(response)
        {
	    $('#statusmeldung').html(response);
	    $('#projecttable').bootstrapTable('refresh');
	    refresh_dropdown(base_url);
	})
	.fail(function()
	{
	    $('#statusmeldung').html('keine Verbindung zum Connector oder andere Systemfehler');
	});
    }
    else
    {
	$('#statusmeldung').html('bitte mindestens ein Projekt zum loeschen waehlen');
    }
});

/*
*
* Beim Anlegen und Loeschen von Projekten aendert sich auch das DropDown-Menue dieses wird ueber folgende Funktion aktualisiert
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

