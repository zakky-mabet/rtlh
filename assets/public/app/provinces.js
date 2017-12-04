$(function(){

		$.ajaxSetup({
		type:"POST",
		url: "<?php echo base_url('index.php/population/ambil_data') ?>",
		cache: false,
		});

		$("#provinsi").change(function(){

			var value=$(this).val();

			if(value>0){
				$.ajax({
					data:{modul:'kabupaten',id:value},
					success: function(respond){
					$("#kabupaten-kota").html(respond);
					}
				})
			}
		});

		$("#kabupaten-kota").change(function(){
			var value=$(this).val();
				if(value>0){
					$.ajax({
					data:{modul:'kecamatan',id:value},
					success: function(respond){
					$("#kecamatan").html(respond);
					}
				})
			}
		})

		$("#kecamatan").change(function(){
			var value=$(this).val();
				if(value>0){
					$.ajax({
					data:{modul:'kelurahan',id:value},
					success: function(respond){
					$("#kelurahan-desa").html(respond);
					}
				})
			} 
		})
})