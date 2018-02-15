<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="col-md-7">
					<h3 class="box-title">Data Penduduk</h3>
				</div>
			</div>
<?php  
/**
 * Start Form Pencarian
 *
 * @return string
 **/
echo form_open(current_url(), array('method' => 'get'));
?>
			<div class="box-body">
				<div class="col-md-4">
					Tampilkan 
					<select name="per_page" class="form-control input-sm" style="width:60px; display: inline-block;" onchange="window.location = '<?php echo site_url('population?per_page='); ?>' + this.value + '&query=<?php echo $this->input->get('query'); ?>&kelurahan=<?php echo $this->input->get('kelurahan'); ?>&kecamatan=<?php echo $this->input->get('kecamatan'); ?>&kabupaten=<?php echo $this->input->get('kabupaten'); ?>&provinsi=<?php echo $this->input->get('provinsi'); ?>';">
					<?php  
					/**
					 * Loop 10 to 100
					 * Guna untuk limit data yang ditampilkan
					 * 
					 * @var 10
					 **/
					$start = 20; 
					while($start <= 100) :
						$selected = ($start == $this->input->get('per_page')) ? 'selected' : '';
						echo "<option value='{$start}' " . $selected . ">{$start}</option>";

						$start += 10;
					endwhile;
					?>
					</select>
					per halaman
				</div>
				<div class="pull-right">
				
					<a href="<?php echo site_url('population/create') ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-plus"></i> Tambah Baru</a>
				
					<a href="<?php echo site_url("population/print_out?{$this->input->server('QUERY_STRING')}") ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm btn-print"><i class="fa fa-print"></i> Cetak</a>

					<a href="<?php echo site_url("population/export?{$this->input->server('QUERY_STRING')}") ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-download"></i> Ekspor</a>
								
				</div>
			</div>
			<div class="box-body">
				
				<div class="col-md-3">
				    <div class="form-group">
				        <label>Provinsi :</label>
				        <select name="provinsi" id="provinsi" class="form-control  select2">
				        	<option value="">-- PILIH --</option>
						<?php foreach ($provinsi as $key => $value): ?>
                        	<option value="<?php echo $value->id; ?>" <?php if($this->input->get('provinsi')==$value->id) echo 'selected'; ?>><?php echo $value->name_provinces; ?></option>
                        <?php endforeach;?>	
					
				        </select>	
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="form-group">
				        <label>Kabupaten/ Kota :</label>
				        <select name="kabupaten" id="kabupaten-kota" class="form-control  select2">
							<option value="">-- PILIH --</option>
							<?php if ($this->input->get('provinsi')== 19): ?>
								<?php foreach ($this->population->get_kabupaten(19) as $key => $value): ?>
		                        	<option value="<?php echo $value->id; ?>" <?php if($this->input->get('kabupaten')==$value->id) echo 'selected'; ?>><?php echo $value->name_regencies; ?></option>
		                        <?php endforeach;?>	
							<?php endif ?>
						</select>	
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="form-group">
				        <label>Kecamatan :</label>
				        <select name="kecamatan" id="kecamatan" class="form-control  select2">
							<option value="">-- PILIH --</option>
							<?php if ($this->input->get('kabupaten')!=NULL): ?>
								<?php foreach ($this->population->get_kecamatan($this->input->get('kabupaten')) as $key => $value): ?>
		                        	<option value="<?php echo $value->id; ?>" <?php if($this->input->get('kecamatan')==$value->id) echo 'selected'; ?>><?php echo $value->name_districts; ?></option>
		                        <?php endforeach;?>	
							<?php endif ?>
						</select>
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="form-group">
				        <label>Desa / Kelurahan :</label>
				        <select name="kelurahan" id="kelurahan-desa" class="form-control  select2 ">
				        	<option value="">-- PILIH --</option>

				        	<?php if ($this->input->get('kecamatan')!=NULL): ?>
								<?php foreach ($this->population->get_kelurahan($this->input->get('kecamatan')) as $key => $value): ?>
		                        	<option value="<?php echo $value->id; ?>" <?php if($this->input->get('kelurahan')==$value->id) echo 'selected'; ?>><?php echo $value->name_villages; ?></option>
		                        <?php endforeach;?>	
							<?php endif ?>
					
				        </select>	
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="form-group">
				        <label>Kata Kunci :</label>
				        <input type="text" name="query" class="form-control input-sm" value="<?php echo $this->input->get('query') ?>" placeholder="NIK / Nama . . . ">
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="form-group">
                    <button type="submit" class="btn btn-warning hvr-shadow top"><i class="fa fa-filter"></i> Filter</button>
                    <a href="<?php echo site_url('population') ?>" class="btn btn-warning hvr-shadow top" style="margin-left: 10px;"><i class="fa fa-times"></i> Reset</a>
				    </div>
				</div>
			</div>
<?php  
// End form pencarian
echo form_close();
?>
			<div class="box-body">

<?php  

/**
 * Start Form Multiple Action
 *
 * @return string
 **/
echo form_open(site_url('population/bulk_action'));
?>
				<table class="table table-hover table-bordered  mini-font" style="margin-top: 10px;">
					<thead class="bg-silver">
						<tr>
							<th width="40">
							
			                    <div class="checkbox checkbox-inline">
			                        <input id="checkbox1" type="checkbox"> <label for="checkbox1"></label>
			                    </div>
					
							</th>
							<th class="text-center">NIK</th>
							<th class="text-center">Nama</th>
							<th class="text-center">Jenis Kelamin</th>
							<th class="text-center">Tempat, Tanggal Lahir</th>
							<th class="text-center">Kabupaten / Kota</th>
							<th class="text-center">Kecamatan</th>
							<th class="text-center">Desa / Kelurahan</th>
							<th width="200" class="text-center">Alamat</th>
	
							<th class="text-center" width="100">Pengguna</th>
							<th width="100"></th>
						</tr>
					</thead>
					<tbody>
				<?php  
				/*
				* Loop data penduduk
				*/
				$number = ( ! $this->page ) ? 0 : $this->page;

				foreach($population as $row) :
				?>
						<tr>
							<td>
							
			                    <div class="checkbox checkbox-inline">
			                        <input id="checkbox1" type="checkbox" name="populations[]" value="<?php echo $row->ID; ?>"> <label for="checkbox1"></label>
			                    </div>
						
							</td>
							<td class="text-left"><?php echo highlight_phrase($row->nik, $this->input->get('query'),'<span style="color:red; font-weight: bold;">', '</span>'); ?></td>
							<td><?php echo  highlight_phrase(ucwords($row->nama_lengkap), $this->input->get('query'),'<span style="color:red; font-weight: bold;">', '</span>'); ?></td>
							<td class="text-center"><?php echo ucfirst($row->jns_kelamin) ?></td>
							<td class="text-center"><?php echo ucwords($row->tmp_lahir).', '.date_id($row->tgl_lahir) ?></td>
							<td class="text-center"><?php echo $this->population->get_nama_kabupaten($row->regency)->name_regencies;  ?></td>
							<td class="text-center"><?php echo $this->population->get_nama_kecamatan($row->district)->name_districts;	 ?></td>
							<td class="text-center"><?php echo $this->population->get_nama_desa($row->village)->name_villages;  ?></td>
							<td><?php echo $row->alamat; ?></td>
							<td class="text-center"><?php echo $this->population->pengguna($row->user)->nama; ?></td>
							<td class="text-center" style="font-size: 12px;" id="tombol-filter">
								
								<a href="<?php echo site_url("population/updateverifikasi/{$row->ID}") ?>" class="icon-button <?php if ($row->status_data==1): ?> text-green <?php else: ?>text-orange<?php endif ?>" data-toggle="tooltip" data-placement="top" title="Status Data Penduduk <?php if ($row->status_data==1): ?> Terverifikasi<?php else: ?>Belum Terverifikasi<?php endif ?>"><i class="fa <?php if ($row->status_data==1): ?> fa-check<?php else: ?>fa-times<?php endif ?>"></i></a>

								<a href="<?php echo site_url("population/update/{$row->ID}") ?>" class="icon-button text-blue" data-toggle="tooltip" data-placement="top" title="Sunting"><i class="fa fa-pencil"></i></a>
						
								<a class="icon-button text-red get-delete-population" data-id="<?php echo $row->ID; ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></a>
				
							</td>
						</tr>
				<?php  
				endforeach;
				?>
					</tbody>
					<tfoot>
					
						<th>
		                    <div class="checkbox checkbox-inline">
		                        <input id="checkbox1" type="checkbox"> <label for="checkbox1"></label>
		                    </div>
						</th>
						<th colspan="10">
							<label style="font-size: 11px; margin-right: 10px;">Yang terpilih :</label>
							<a class="btn btn-xs btn-round btn-danger get-delete-population-multiple"><i class="fa fa-trash-o"></i> Hapus</a>
							<small class="pull-right"><?php echo count($population) . " dari " . $num_population . " data"; ?></small>
						</th>
					
					</tfoot>
				</table>

				<div class="modal animated fadeIn modal-danger" id="modal-delete-population-multiple" tabindex="-1" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog modal-sm">
				        <div class="modal-content">
				           	<div class="modal-header">
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus!</h4>
				                <span>Hapus data penduduk yang terpilih dari sistem?</span>
				           	</div>
				           	<div class="modal-footer">
				                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
				                <button type="submit" name="action" value="delete" id="btn-delete" class="btn btn-outline"> Hapus </button>
				           	</div>
				        </div>
				    </div>
				</div>
<?php  
// End Form Multiple Action
echo form_close();
?>
			</div>
			<div class="box-footer text-center">
				<?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
	</div>
</div>



<div class="modal animated fadeIn modal-danger" id="modal-delete-population" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
           	<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus!</h4>
                <span>Hapus data penduduk ini dari sistem?</span>
           	</div>
           	<div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                <a href="#" id="btn-delete" class="btn btn-outline"> Hapus </a>
           	</div>
        </div>
    </div>
</div>

<script>
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
</script>