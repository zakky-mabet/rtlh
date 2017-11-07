$(document).ready(function() 
{

	$(".inputmask").maskMoney({prefix:'', allowNegative: false, thousands:',', affixesStay: false,  precision:0});

	$(".inputmask").change(function(){
		var records = {

		};

		var ID = $(this).data('id');

		records["nilai"] = $(this).val();

		$.post(base_url + "/panggarankegiatan/update/" + ID, records, function(response){
			if (response.status === 'success') 
			{
							
			} else {
				alert("Data gagal disimpan");
			}
		});
	});
})