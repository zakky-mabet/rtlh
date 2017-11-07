$(document).ready( function() 
{
	// Target Nilai Target Output
	$('input#update-target-output-kegiatan').on('focusout', function () 
	{
		var ID = $(this).data('id');

		$.post(base_url + '/kegiatan/savatargetoutput/' + ID, {
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

	// Delete Target Output
	$('button.delete-target-output-kegiatan').on('click', function() {
		var ID =  $(this).data('id');
		
		$('#modal-delete').modal('show');

		$('a#btn-yes').on('click', function() 
		{
			$.post(base_url + '/kegiatan/delete/' + ID + '/' + 'target-output-kegiatan', function(result) 
			{
				$('#modal-delete').modal('hide');
				if( result.status === 'success')
				{
					$('input[data-id="'+ID+'"]').attr('disabled', true).val('');
					
					$('button[data-id="'+ID+'"]').fadeOut(300, function() {
						$(this).remove();
					});
				} else {
					alert("Terjadi kesalahan saat menhapus data!");
				}
				$(document).ajaxComplete(function(e, xhr, opt)
				{

				});
			});
		});
	});

	// PK Target Nilai Target Output Tahun
	$('input#update-pk-target').on('focusout', function () 
	{
		var ID = $(this).data('id');

		$.post(base_url + '/pkkegiatan/savepkoutputkegiatan/' + ID, {
			target : $(this).val(),
			sebab : $('textarea[data-id="'+ID+'"]').val()
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
	$('textarea#update-pk-sebab').on('focusout', function () 
	{
		var ID = $(this).data('id');

		$.post(base_url + '/pkkegiatan/savepkoutputkegiatan/' + ID, {
			target : $('input[data-id="'+ID+'"]').val(),
			sebab : $(this).val()
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


	// Delete PK Target Output
	$('button.delete-pk-target-output-kegiatan').on('click', function() {
		var ID =  $(this).data('id');
		
		$('#modal-delete').modal('show');

		$('a#btn-yes').on('click', function() 
		{
			$.post(base_url + '/kegiatan/delete/' + ID + '/' + 'target-pk-output-kegiatan', function(result) 
			{
				$('#modal-delete').modal('hide');
				if( result.status === 'success')
				{
					$('input[data-id="'+ID+'"]').attr('disabled', true).val('');
					$('textarea[data-id="'+ID+'"]').attr('disabled', true).val('');
					
					$('button[data-id="'+ID+'"]').fadeOut(300, function() {
						$(this).remove();
					});
				} else {
					alert("Terjadi kesalahan saat menhapus data!");
				}
				$(document).ajaxComplete(function(e, xhr, opt)
				{

				});
			});
		});
	});
});