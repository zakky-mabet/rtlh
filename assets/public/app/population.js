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