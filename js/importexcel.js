$("form#uploadForm").submit(function()
{
    var base_url = window.location.origin;
    var formData = new FormData($(this)[0]);
    console.log(formData);
    formData.append('project',$('#currentproject').attr('machinename'));
    $.ajax({
        url: base_url+'/php/data/importexcel.php',
        type: 'POST',
        data: formData,
        async: false,
        success: function (data) {
            console.log(data)
	    $('#datatable').bootstrapTable('refresh',{url: 'php/data/getdata_json.php?project='+$('#currentproject').attr('machinename')});
        },
        cache: false,
        contentType: false,
        processData: false
    });
    return false;
});






$(document).on('change', '.btn-file :file', function()
{
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [label,numFiles]);
});

$(document).ready( function()
{
    $('.btn-file :file').on('fileselect', function(event, label, count)
    {
        $('#filetoimport').val(label);
    });
});


