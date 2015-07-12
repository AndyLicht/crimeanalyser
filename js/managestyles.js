/*$('body').on('click','.editStylesDefault',function()
{
    row = $(this).closest('tr');
    clearChangeForm();
    $('#changestyleobject').val(row.children().eq(0).text());
    $('#stylestatus').val('new');
    $('#stylechangeform').show();
});
$('body').on('click','.editStyles',function()
{
    $('#stylestatus').val('change');
    row = $(this).closest('tr');
    $('#changestyleobject').val(row.children().eq(2).text());
    $('#changestyleradius').val(row.children().eq(3).text());
    $('#changestylefillcolor').val(row.children().eq(4).text());
    $('#changestylestrokecolor').val(row.children().eq(5).text());
    $('#changestylestrokewidth').val(row.children().eq(6).text());
    $('#stylechangeform').show();
});
*/

function clearChangeForm()
{
    $('#changestyleobject').val('');
    $('#changestyleradius').val('');
    $('#changestylefillcolor').val('');
    $('#changestylestrokecolor').val('');
    $('#changestylestrokewidth').val('');
}

$('#savechangestyles').on('click',function()
{
    var base_url = window.location.origin;
    $.ajax({
	type:'POST',
	url: base_url+'/php/style/createstyle.php',
	data: {projectid:$('#currentproject').attr('projectid'),status:$('#stylestatus').val(),object:$('#changestyleobject').val(),radius:$('#changestyleradius').val(),fillcolor:$('#changestylefillcolor').val(),strokecolor:$('#changestylestrokecolor').val(),strokewidth:$('#changestylestrokewidth').val()}
    })
    .done(function(response)
    {
	$('#styles-statusmeldung').html(response);
	$('#stylestable').bootstrapTable('refresh');
	$('#stylestable_default').bootstrapTable('refresh');
	clearChangeForm();
	$('#stylechangeform').hide();
    })
    .fail(function()
    {
	//$('#styles-statusmeldung').html('keine Verbindung zum Connector oder andere Systemfehler');
    });
});
