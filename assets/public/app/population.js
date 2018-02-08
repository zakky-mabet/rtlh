/*!
* @author Teitra Mega <office@teitramega.co.id>
* @package Jquery, Bootstraps JS,
*/
jQuery(function($) {
	$('.get-delete-population').click( function() {
		$('#modal-delete-population').modal('show');
		$('a#btn-delete').attr('href', base_url + '/population/delete/' + $(this).data('id'));
	});

	$('.get-delete-calon').click( function() {
		$('#modal-delete-calon').modal('show');
		$('a#btn-delete').attr('href', base_url + '/data_candidate/delete/' + $(this).data('id'));
	});

	$('.get-delete-pengguna').click( function() {
		$('#modal-delete-pengguna').modal('show');
		$('a#btn-delete').attr('href', base_url + '/pengguna/delete/' + $(this).data('id'));
	});

	$('.get-delete-penerima').click( function() {
		$('#modal-delete-penerima').modal('show');
		$('a#btn-delete').attr('href', base_url + '/data_penerima/delete/' + $(this).data('id'));
	});

	$('.get-delete-sub-kriteria').click( function() {
		$('#modal-delete-sub-kriteria').modal('show');
		$('a#btn-delete').attr('href', base_url + '/sub_kriteria/delete/' + $(this).data('id'));
	});

	$('.get-delete-jenis-bencana').click( function() {
		$('#modal-delete-jenis-bencana').modal('show');
		$('a#btn-delete').attr('href', base_url + '/daftar_bencana/delete_jenis/' + $(this).data('id'));
	});

	$('.get-delete-foto-bencana').click( function() {
		$('#modal-delete-foto-bencana').modal('show');
		$('a#btn-delete').attr('href', base_url + '/daftar_bencana/delete_foto_bencana/' + $(this).data('id'));
	});

	 $('.get-delete-foto').click( function() {
          $('#modal-delete-foto').modal('show');
          $('a#btn-delete').attr('href', base_url + '/data_candidate/delete_foto/' + $(this).data('id')+'/?nik='+ $(this).data('nik') );
    });

	$('.get-delete-foto-rkba').click( function() {
          $('#modal-delete-foto').modal('show');
          $('a#btn-delete').attr('href', base_url + '/data_rkba/delete_foto/' + $(this).data('id')+'/?back='+ $(this).data('back') );
    });

	 $('.get-delete-foto-psu').click( function() {
		$('#modal-delete-foto-psu').modal('show');
		$('a#btn-delete').attr('href', base_url + '/psu/delete_foto_psu/' + $(this).data('id')+'/?back='+ $(this).data('back') );
	});

	$('.get-delete-pelaksana-psu').click( function() {
		$('#modal-delete-pelaksana-psu').modal('show');
		$('a#btn-delete').attr('href', base_url + '/psu/delete_pelaksana_psu/' + $(this).data('id'));
	});

	$('.get-delete-jenis-psu').click( function() {
		$('#modal-delete-jenis-psu').modal('show');
		$('a#btn-delete').attr('href', base_url + '/psu/delete_jenis_psu/' + $(this).data('id'));
	});

	$('.get-delete-foto-dekonsentrasi').click( function() {
          $('#modal-delete-foto-dekonsentrasi').modal('show');
          $('a#btn-delete').attr('href', base_url + '/dekonsentrasi/delete_foto/' + $(this).data('id')+'/?back='+ $(this).data('back') );
    });

    $('.get-delete-dekonsentrasi').click( function() {
		$('#modal-delete-dekonsentrasi').modal('show');
		$('a#btn-delete').attr('href', base_url + '/dekonsentrasi/delete_dekonsentrasi/' + $(this).data('id'));
	});

	$('.get-delete-jenis-dekonsentrasi').click( function() {
		$('#modal-delete-jenis-dekonsentrasi').modal('show');
		$('a#btn-delete').attr('href', base_url + '/dekonsentrasi/delete_jenis_dekonsentrasi/' + $(this).data('id'));
	});

	$('.get-delete-foto-rtpp').click( function() {
		$('#modal-delete-foto-rtpp').modal('show');
		$('a#btn-delete').attr('href', base_url + '/rtpp/delete_foto/' + $(this).data('id')+'/?back='+ $(this).data('back') );
	});

	$('.get-delete-rtpp').click( function() {
		$('#modal-delete-rtpp').modal('show');
		$('a#btn-delete').attr('href', base_url + '/rtpp/delete/' + $(this).data('id'));
	});

	$('.get-delete-proyek-rtpp').click( function() {
		$('#modal-delete-proyek-rtpp').modal('show');
		$('a#btn-delete').attr('href', base_url + '/rtpp/delete_proyek/' + $(this).data('id'));
	});

	$('.get-delete-sub-kriteria-multiple').click( function() {
		if( $('input[type=checkbox]').is(':checked') != '' ) 
		{
			$('#modal-delete-sub-kriteria-multiple').modal('show');
		} else {
			$.notify({
				icon: 'fa fa-warning',
				message: "Tidak ada data yang dipilih."
			},{
				type: 'warning',
				allow_dismiss: false,
				delay:2000,
					placement: {
				from: "top",
					align: "center"
				},
			});	
		}
	});

	$('.get-delete-population-multiple').click( function() {
		if( $('input[type=checkbox]').is(':checked') != '' ) 
		{
			$('#modal-delete-population-multiple').modal('show');
		} else {
			$.notify({
				icon: 'fa fa-warning',
				message: "Tidak ada data yang dipilih."
			},{
				type: 'warning',
				allow_dismiss: false,
				delay:2000,
					placement: {
				from: "top",
					align: "center"
				},
			});	
		}
	});

	$('.get-delete-calon-multiple').click( function() {
		if( $('input[type=checkbox]').is(':checked') != '' ) 
		{
			$('#modal-delete-calon-multiple').modal('show');
		} else {
			$.notify({
				icon: 'fa fa-warning',
				message: "Tidak ada data yang dipilih."
			},{
				type: 'warning',
				allow_dismiss: false,
				delay:2000,
					placement: {
				from: "top",
					align: "center"
				},
			});	
		}
	});

	$('.get-delete-pengguna-multiple').click( function() {
		if( $('input[type=checkbox]').is(':checked') != '' ) 
		{
			$('#modal-delete-pengguna-multiple').modal('show');
		} else {
			$.notify({
				icon: 'fa fa-warning',
				message: "Tidak ada data yang dipilih."
			},{
				type: 'warning',
				allow_dismiss: false,
				delay:2000,
					placement: {
				from: "top",
					align: "center"
				},
			});	
		}
	});

});