$(function(){
        $('#changestylefillcolor').colorpicker({format:'rgba'});
	$('#changestylestrokecolor').colorpicker({format:'rgba'});
    });

$(function(){
        $('.mycolorpicker').colorpicker({format:'rgba'});
    });
$('#colorinfos').on('click',function()
{
    console.log('jo');
    console.log($('#strokecolorpicker').colorpicker('getValue'));
});