/*! 
 Theme Name: E-SAKIP 1.0
 Description: UX Template
 *
 * @author Vicky Nitinegoro [http://vicky.work]
 * @since 1.0 2017
 * 
 */ 
$(function() 
{
	$("#stickerButton100x").sticky({topSpacing:100});

	$('.summernote').summernote({
		height: 250
	});

	$('a[data-key="prestasi"]').on('click', function() 
	{
		var ID = $(this).data('id');

		switch($(this).data('action')) 
		{
			case 'update':
				$.get(base_url + '/prestasi/getprestasijson/' + ID, function(result) 
				{
					$('#update-prestasi').val(result.deskripsi);

			        $('#update-tahun option').filter(function() 
			        {
			            return this.textContent == result.tahun;
			        }).prop('selected', true);

			        $('#update-tingkat option').filter(function() 
			        {
			            return this.textContent == result.tingkat;
			        }).prop('selected', true);

					$('div#modal-update').modal('show');

					$( "#form-update" ).submit(function( event ) 
					{
					  	event.preventDefault();

					  	$.post(base_url + '/prestasi/updateprestasi/' + ID, {
					  		prestasi : $('#update-prestasi').val(),
					  		tahun : $('#update-tahun').val(),
					  		tingkat : $('#update-tingkat').val()
					  	}, function(response) 
					  	{
					  		console.log(response.status);

					  		if( response.status === 'success') {
					  			$('div#modal-update').modal('hide');
					  			window.location.reload();
					  		}
					  	})
					});
				});
			break;
			case 'delete':
			$('#modal-delete').modal('show');
			$('a#btn-yes').attr('href', base_url + '/prestasi/delete/' + $(this).data('id'));
			break;
		}
	});

	$('a[data-key="satuan"]').on('click', function() 
	{
		var ID = $(this).data('id');

		switch($(this).data('action')) 
		{
			case 'update':
				$.get(base_url + '/satuan/getsatuanjson/' + ID, function(result) 
				{
					$('#update-satuan').val(result.nama);

			        $('#update-jenis option').filter(function() 
			        {
			            return this.textContent == result.jenis;
			        }).prop('selected', true);

					$('div#modal-update').modal('show');

					$( "#form-update" ).submit(function( event ) 
					{
					  	event.preventDefault();

					  	$.post(base_url + '/satuan/updatesatuan/' + ID, {
					  		satuan : $('#update-satuan').val(),
					  		jenis : $('#update-jenis').val()
					  	}, function(response) 
					  	{
					  		console.log(response.status);

					  		if( response.status === 'success') {
					  			$('div#modal-update').modal('hide');
					  			window.location.reload();
					  		}
					  	})
					});
				});
			break;
			case 'delete':
			$('#modal-delete').modal('show');
			$('a#btn-yes').attr('href', base_url + '/satuan/delete/' + $(this).data('id'));
			break;
		}
	});
});

$(function() {
  	var $progress = $('#progress');
  	$(document).ajaxStart(function() 
  	{
    	if ($progress.length === 0) {
      		$progress = $('<div><dt/><dd/></div>').attr('id', 'progress');
      		$("body").append($progress);
    	}
    	$progress.width((50 + Math.random() * 30) + "%");
  	});

  	$(document).ajaxComplete(function() 
  	{
    	$progress.width("100%").delay(200).fadeOut(400, function() {
      		$progress.width("0%").delay(200).show();
    	});
  	});
});
