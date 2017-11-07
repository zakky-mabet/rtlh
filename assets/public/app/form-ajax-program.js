$(document).ready( function() 
{
	// Target Nilai Target Output
	$('input#update-target-indikator-program').on('focusout', function () 
	{
		var ID = $(this).data('id');

		$.post(base_url + '/pkprogram/savetargetindikatorprogram/' + ID, {
			target : $(this).val()
		}, function(result) 
		{
			if(result.status ==='success')
			{
				$.notify({
					icon: 'fa fa-check',
					message: "Data berhasil disimpan"
				},{
					type: 'success',
					allow_dismiss: false,
					delay:2000,
					placement: { from: "top", align: "center"}
				});	
			}
		});
	});

});