$(document).ready( function() 
{
	$('input[name="penanggung"]').on('focusout', function () 
	{
		var ID = $(this).data('id');

		$.post(base_url + '/kegiatan/savepenanggungjawab/' + ID, {
			penanggung : $(this).val()
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

	$('a.delete-penanggungjawab').on('click', function() {
		var ID =  $(this).data('id');
		
		$('#modal-delete').modal('show');

		$('a#btn-yes').on('click', function() 
		{
			$.post(base_url + '/kegiatan/delete/' + ID + '/' + 'penanggungjawab', function(result) 
			{
				$('#modal-delete').modal('hide');
				if( result.status === 'success')
				{
					$('input[data-id="'+ID+'"]').attr('disabled', true).val('');
					
					$('a[data-id="'+ID+'"]').fadeOut(300, function() {
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