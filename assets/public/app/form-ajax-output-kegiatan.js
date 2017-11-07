$(document).ready( function() 
{
	$('button#btn-add-output-kegiatan').on('click', function(e) 
	{
		 e.preventDefault();

		var ID = $(this).data('id');
		var nomor = $('tbody#data-'+ ID ).children().length;
		add_form_output_kegiatan(ID, nomor++);
	});

	$('textarea#deskripsi-update').on('focusout', function () 
	{
		var output = $(this).data('id');
		var kegiatan = $(this).data('kegiatan');
		
		var tahunUpdate = new Array();
		$('input[name="update[tahun]['+output+'][]"]:checked').each(function(i, e) {
			tahunUpdate.push($(this).val());
		});

		$.post(base_url + '/kegiatan/saveoutputkegiatan', {
			kegiatan : kegiatan,
			output : output,
			deskripsi : this.value,
			tahun : tahunUpdate,
			satuan : $('select[data-id="' + output+'"]').val()
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

	$('select#select-update').on('change', function () 
	{
		var output = $(this).data('id');
		var kegiatan = $(this).data('kegiatan');

		var tahunUpdate = new Array();
		$('input[name="update[tahun]['+output+'][]"]:checked').each(function(i, e) {
			tahunUpdate.push($(this).val());
		});
		$.post(base_url + '/kegiatan/saveoutputkegiatan', {
			kegiatan : kegiatan,
			output : output,
			deskripsi : $('textarea[data-id="'+output).val(),
			tahun : tahunUpdate,
			satuan : $(this).val()
		}, function(result) 
		{
			$.notify({
				icon: 'fa fa-check',
				message: "Data berhasil disimpan"
			},{
				type: 'success',
				allow_dismiss: false,
				delay:2000,
				placement: { from: "top", align: "center" },
			});	
		});
	});
});

function add_form_output_kegiatan(kegiatan, nomor) 
{
	$.post(base_url + '/kegiatan/addformoutputkegiatan', {
		kegiatan : kegiatan
	}, function(response) 
	{
		if( response )
		{
			var html = '<tr id="baris-'+kegiatan+'-'+nomor+'"><td>'+ response.nomor +'</td>';
				html += '<td>';
			for( var tahun = $('tbody#data-' + kegiatan).data('tahun-awal'); tahun <= $('tbody#data-' + kegiatan).data('tahun-akhir'); tahun++)
			{
				html += '<div class="col-md-6"><label>';
				html += '<input type="checkbox" name="create[tahun]['+response.id_output_kegiatan_program+'][]" value="'+tahun+'"> ' + tahun;
				html += '</label></div>'
			}
				html += '</td><td>';
				html += '<textarea id="deskripsi-'+response.id_output_kegiatan_program+'" class="form-control" rows="4"></textarea>';
				html += '</td><td>';
				html += '<select name="create[satuan]['+response.id_output_kegiatan_program+']" id="select-'+response.id_output_kegiatan_program+'" class="form-control input-sm" required="required">';

			    html +=	'</select></td>';
				html += '<td class="text-center">',
				html += '<a href="javascript:void(0)" id="delete-form" data-delete="tr#baris-'+kegiatan+'-'+nomor+'" title="Hapus tujuan ini?" class="btn btn-default"><i class="fa fa-times"></i></a>';
			    html += '</td>';
			    html += '</tr>';

			get_satuan_json('select#select-' + response.id_output_kegiatan_program);

			$(html).appendTo('tbody#data-' + kegiatan).hide().fadeIn(500).addClass('bg-silver');	

			/* SAVE FROM DESKRIPSI */
			$('textarea#deskripsi-'+response.id_output_kegiatan_program).on('focusout', function () 
			{
				var tahunUpdate = new Array();
				$('input[name="create[tahun]['+response.id_output_kegiatan_program+'][]"]:checked').each(function(i, e) {
				    tahunUpdate.push($(this).val());
				});
				$.post(base_url + '/kegiatan/saveoutputkegiatan', {
					kegiatan : kegiatan,
					output : response.id_output_kegiatan_program,
					deskripsi : this.value,
					tahun : tahunUpdate,
					satuan : $('select#select-' + response.id_output_kegiatan_program).val()
				}, function(result) 
				{
					$.notify({
						icon: 'fa fa-check',
						message: "Data berhasil disimpan"
					},{
						type: 'success',
						allow_dismiss: false,
						delay:2000,
						placement: { from: "top", align: "center" },
					});	
				});
			});

			/* SAVE FROM SATUAN */
			$('select#select-' + response.id_output_kegiatan_program).on('change', function () 
			{
				var tahunUpdate = new Array();
				$('input[name="create[tahun]['+response.id_output_kegiatan_program+'][]"]:checked').each(function(i, e) {
				    tahunUpdate.push($(this).val());
				});
				$.post(base_url + '/kegiatan/saveoutputkegiatan', {
					kegiatan : kegiatan,
					output : response.id_output_kegiatan_program,
					deskripsi : $('textarea#deskripsi-'+response.id_output_kegiatan_program).val(),
					tahun : tahunUpdate,
					satuan : $(this).val()
				}, function(result) 
				{
					$.notify({
						icon: 'fa fa-check',
						message: "Data berhasil disimpan"
					},{
						type: 'success',
						allow_dismiss: false,
						delay:2000,
						placement: { from: "top", align: "center" },
					});	
				});
			});

			$('a#delete-form').on('click', function()
			{
				nomor--;
				var remove = $(this).data('delete');
				$.post(base_url + '/kegiatan/delete/' + response.id_output_kegiatan_program + '/output-kegiatan', function(result) 
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
							placement: { from: "top", align: "center" },
						});	
					});
				});

			});
		}
	});

	setInterval(function() {
		$('tr#baris-'+kegiatan + '-' + nomor).fadeIn(500).removeClass('bg-silver');
	}, 400);
}

function get_satuan_json(selector) {
	var option = '<option value="">-- PILIH -- </option>';
	$.get(base_url + '/tujuan/get_satuan_json', function(resultSatuan) {
		$.each(resultSatuan, function(key, value)
		{                    			
		    option += '<option value="'+value.id+'">'+value.nama+'</option>';
		});
		$(selector).html(option);
	});
}