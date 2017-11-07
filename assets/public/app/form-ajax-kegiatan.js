var NO = 0;

$(document).ready( function() 
{
	$('button#btn-add-kegiatan').on('click', function(e) 
	{
		 e.preventDefault();

		var ID = $(this).data('id');
		var nomor = $('tbody#data-'+ ID ).children().length;

		add_form_kegiatan(ID, NO++);
	});

	$('textarea#deskripsi-update').on('focusout', function () 
	{
		var kegiatan = $(this).data('id');
		var program = $(this).data('program');
		
		var tahunUpdate = new Array();
		$('input[name="update[tahun]['+kegiatan+'][]"]:checked').each(function(i, e) {
			tahunUpdate.push($(this).val());
		});

		$.post(base_url + '/kegiatan/savekegiatan', {
			program : program,
			kegiatan : kegiatan,
			deskripsi : this.value,
			tahun : tahunUpdate
		}, function(result) 
		{
			$.notify({
				icon: 'fa fa-check',
				message: "Data berhasil disimpan"
			},{
				type: 'success',
				allow_dismiss: false,
				delay:2000,
					placement: {
				from: "top",
					align: "center"
				},
			});	
		});
	});

});

function add_form_kegiatan(data, nomor) 
{
	$.post(base_url + '/kegiatan/addformkegiatan', {
		program : data
	}, function(response) 
	{
		if( response )
		{
			var html = '<tr id="baris-'+data+'-'+nomor+'"><td>'+response.nomor+'</td>';
				html += '<td>';

			for( var tahun = $('tbody#data-' + data).data('tahun-awal'); tahun <= $('tbody#data-' + data).data('tahun-akhir'); tahun++)
			{
				html += '<div class="col-md-6"><label>';
				html += '<input type="checkbox" name="ajaxCreate[tahun]['+response.id_kegiatan+'][]" value="'+tahun+'"> ' + tahun;
				html += '</label></div>';
			}
				html += '</td><td>';
				html += '<textarea id="deskripsi-'+response.id_kegiatan+'" name="ajaxCreate[deskripsi]['+response.id_kegiatan+']" class="form-control" rows="4"></textarea>';
				html += '</td>';
				html += '<td class="text-center">',
				html += '<a href="javascript:void(0)" id="delete-form" data-delete="tr#baris-'+data+'-'+nomor+'" title="Hapus Kegiatan ini?" class="btn btn-default"><i class="fa fa-times"></i></a>';
			    html += '</td>';
			    html += '</tr>';

			$(html).appendTo('tbody#data-' + data).hide().fadeIn(500).addClass('bg-silver');

			$('textarea#deskripsi-'+response.id_kegiatan).on('focusout', function () 
			{
				var tahunUpdate = new Array();
				$('input[name="ajaxCreate[tahun]['+response.id_kegiatan+'][]"]:checked').each(function(i, e) {
				    tahunUpdate.push($(this).val());
				});
				$.post(base_url + '/kegiatan/savekegiatan', {
					program : data,
					kegiatan : response.id_kegiatan,
					deskripsi : this.value,
					tahun : tahunUpdate
				}, function(result) 
				{
					$.notify({
						icon: 'fa fa-check',
						message: "Data berhasil disimpan"
					},{
						type: 'success',
						allow_dismiss: false,
						delay:2000,
							placement: {
						from: "top",
							align: "center"
						},
					});	
				});
			});

			$('a#delete-form').on('click', function()
			{
				NO--;
				nomor--;

				var remove = $(this).data('delete');
				$.post(base_url + '/kegiatan/delete/' + response.id_kegiatan + '/kegiatan', function(result) 
				{
					if( result.status === 'success')
					{
						$(remove).addClass('bg-red').fadeOut(300, function() {
							$(this).remove();
						});
					} else {
						alert("Terjadi kesalahan saat menhapus data!");
					}
					$(document).ajaxComplete(function(e, xhr, opt)
					{
						$.notify({
							icon: 'fa fa-check',
							message: "Data berhasil Dihapus"
						},{
							type: 'success',
							allow_dismiss: false,
							delay:2000,
								placement: {
							from: "top",
								align: "center"
							},
						});	
					});
				});

			});
		}
	});

	setInterval(function() {
		$('tr#baris-'+data+'-'+nomor).fadeIn(500).removeClass('bg-silver');
	}, 400);
}
