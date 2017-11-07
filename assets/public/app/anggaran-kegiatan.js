$(document).ready(function() 
{
	$(".input-anggaran-resntra").maskMoney({prefix:'', allowNegative: false, thousands:',', affixesStay: false,  precision:0});

	$(".input-anggaran-resntra").change(function(){
		var records = {};

		var ID = $(this).data('id');

		records["anggaran"] = $(this).val();

		$.post(base_url + "/kegiatan/saveanggaran/" + ID, records, function(response){
			if (response.status === 'success') 
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

	$('button.delete-anggaran-kegiatan').on('click', function() {
		var ID =  $(this).data('id');
		
		$('#modal-delete').modal('show');

		$('a#btn-yes').on('click', function() 
		{
			$.post(base_url + '/kegiatan/delete/' + ID + '/' + 'anggaran-kegiatan', function(result) 
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


	$(".input-anggaran-pk").maskMoney({prefix:'', allowNegative: false, thousands:',', affixesStay: false,  precision:0});

	$(".input-anggaran-pk").change(function(){
		var records = {};

		var ID = $(this).data('id');

		records["anggaran"] = $(this).val();

		$.post(base_url + "/pkprogram/savepkanggaran/" + ID, records, function(response){
			if (response.status === 'success') 
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

	$('button.delete-pk-anggaran-kegiatan').on('click', function() {
		var ID =  $(this).data('id');
		
		$('#modal-delete').modal('show');

		$('a#btn-yes').on('click', function() 
		{
			$.post(base_url + '/kegiatan/delete/' + ID + '/' + 'anggaran-pk-kegiatan', function(result) 
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
});