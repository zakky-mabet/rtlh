<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="col-md-7">
					<h3 class="box-title">Data Penerima Bantuan RTLH</h3>
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
					<select name="per_page" class="form-control input-sm" style="width:60px; display: inline-block;" onchange="window.location = '<?php echo site_url('data_penerima?per_page='); ?>' + this.value + '&query=<?php echo $this->input->get('query'); ?>&village=<?php echo $this->input->get('village'); ?>';">
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
				
					<!-- <a href="<?php echo site_url("data_penerima/print_out?{$this->input->server('QUERY_STRING')}") ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm btn-print"><i class="fa fa-print"></i> Cetak</a>
					<a href="<?php echo site_url("data_penerima/export?per_page={$this->per_page}&page={$this->page}") ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-download"></i> Ekspor</a>	 -->
				
					<!-- <a href="<?php echo site_url('data_penerima/import') ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-upload"></i> Impor</a> -->
				
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-2">
				    <div class="form-group">
				        <label>Jenis Kelamin :</label>
				        <select name="gender" class="form-control input-sm">
				        	<option value="">-- PILIH --</option>
				        	<option value="laki-laki" <?php if($this->input->get('gender')=='laki-laki') echo 'selected'; ?>>Laki-laki</option>
				        	<option value="perempuan" <?php if($this->input->get('gender')=='perempuan') echo 'selected'; ?>>Perempuan</option>
				        </select>	
				    </div>
				</div>
				<!-- <div class="col-md-3">
				    <div class="form-group">
				        <label>Desa / Kelurahan :</label>
				        <select name="village" class="form-control input-sm">
				        	<option value="">-- PILIH --</option>
					
				        </select>	
				    </div>
				</div> -->
				<div class="col-md-3">
				    <div class="form-group">
				        <label>Kata Kunci :</label>
				        <input type="text" name="query" class="form-control input-sm" value="<?php echo $this->input->get('query') ?>" placeholder="NIK / Nama . . . ">
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="form-group">
                    <button type="submit" class="btn btn-warning hvr-shadow top"><i class="fa fa-filter"></i> Filter</button>
                    <a href="<?php echo site_url('data_penerima') ?>" class="btn btn-warning hvr-shadow top" style="margin-left: 10px;"><i class="fa fa-times"></i> Reset</a>
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
echo form_open(site_url('data_penerima/bulk_action'));
?>
				<table class="table table-hover table-bordered mini-font" style="margin-top: 10px;">
					<thead class="bg-silver">
						<tr>
							<th width="40">
							
			                   NO
					
							</th>
							<th class="text-center">NIK</th>
							<th class="text-center">Nama</th>
							<th class="text-center">Jenis Kelamin</th>
							<th class="text-center">Tempat, Tanggal Lahir</th>
							<th class="text-center">Desa / Kelurahan</th>
							<th width="200" class="text-center">Alamat</th>
							<th class="text-center" width="100">Status Realisasi</th>
							<th width="130"></th>
						</tr>
					</thead>
					<tbody>
				<?php  
				/*
				* Loop data penduduk
				*/
				$number = ( ! $this->page ) ? 0 : $this->page;

				foreach($data_candidate as $row) :
				?>
						<tr>
							<td class="text-center">
							
			                   <?php echo ++$number ?>
						
							</td>
							<td class="text-center"><?php echo $row->nik; ?></td>
							<td><?php echo ucwords($row->nama_lengkap); ?></td>
							<td class="text-center"><?php echo ucfirst($row->jns_kelamin) ?></td>
							<td class="text-center"><?php echo ucwords($row->tmp_lahir).', '.date_id($row->tgl_lahir) ?></td>
							<td class="text-center"><?php echo $this->data_penerima->get_nama_desa($row->village)->name_villages;  ?></td>
							<td><?php echo $row->alamat; ?></td>
							<td class="text-center"><?php echo ucfirst($row->status_realisasi); ?></td>
							<td class="text-center" style="font-size: 12px;" id="tombol-filter">
							
								<a href="#" class="icon-button text-red get-status" data-id="<?php echo $row->nik; ?>" data-toggle="tooltip" data-placement="top" title="Sunting Status Realisasi"><i class="fa fa-eye"></i></a>

								<a href="#" class="icon-button text-yellow get-dibatal" data-id="<?php echo $row->nik; ?>" data-toggle="tooltip" data-placement="top" title=" <?php if($row->ket_status_realisasi == NULL){ echo "Dibatalkan Realisasi ini "; } else { echo $row->ket_status_realisasi; } ?>"><i class="fa fa-eye-slash"></i></a>

								<a href="<?php echo site_url("data_penerima/update/{$row->nik}") ?>" class="icon-button text-blue" data-toggle="tooltip" data-placement="top" title="Sunting"><i class="fa fa-pencil"></i></a>

								<a href="<?php echo site_url("data_candidate/foto/{$row->nik}") ?>" class="icon-button text-yellow" data-toggle="tooltip" data-placement="top" title="Foto Rumah"><i class="fa fa-camera"></i></a>
						
								<a class="icon-button text-red get-delete-penerima" data-id="<?php echo $row->nik; ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></a>
				
							</td>
						</tr>
				<?php  
				endforeach;
				?>
					</tbody>
					<tfoot>
					
				
						<th colspan="10">
							
							<small class="pull-right"><?php echo count($data_candidate) . " dari " . $num_data_candidate . " data"; ?></small>
						</th>
					
					</tfoot>
				</table>

				<div class="modal animated fadeIn modal-danger" id="modal-delete-calon-multiple" tabindex="-1" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog modal-sm">
				        <div class="modal-content">
				           	<div class="modal-header">
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus!</h4>
				                <span>Hapus data yang terpilih dari Calon Penerima?</span>
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



<div class="modal animated fadeIn modal-danger" id="modal-delete-penerima" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
           	<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus!</h4>
                <span>Hapus data ini dari Penerima Bantuan?</span>
           	</div>
           	<div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                <a href="#" id="btn-delete" class="btn btn-outline"> Hapus </a>
           	</div>
        </div>
    </div>
</div>

<div class="modal animated fadeIn modal-default" id="modal-status" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
           	<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Sunting Status Realisasi !</h4>
               
           	</div>
           	<form id="form-update" action="" method="post">
           	<div class="modal-body">
           		
	           		<select name="status" class="form-control" required="required">
	           			<option value="">-- PILIH --</option>
	           			<option value="Belum Terealisasi">Belum Terealisasi</option>
	           			<option value="Terealisasi">Terealisasi</option>
	           			<option value="Sedang dilaksanakan">Sedang dilaksanakan</option>
	           		</select>
           		
           	</div>		
           	<div class="modal-footer">
                <button type="button" class="btn btn-success pull-left" data-dismiss="modal">Tidak</button>
                <button type="submit"  class="btn btn-success"> Simpan </button>
           	</div>
           	</form>
        </div>
    </div>
</div>

<div class="modal animated fadeIn modal-default" id="modal-dibatal" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
           	<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Status Realisasi Dibatalkan !</h4>
               
           	</div>
           	<form id="form-update-dibatal" action="" method="post">
           	<div class="modal-body">
           		<div class="form-horizontal">
					<label for="email" class="control-label">Keterangan :</label>
					<textarea name="keterangan" class="form-control" cols="7" rows="5"></textarea>						
				</div>	       
           	</div>		
           	<div class="modal-footer">
                <button type="button" class="btn btn-success pull-left" data-dismiss="modal">Tidak</button>
                <button type="submit" class="btn btn-success"> Simpan </button>
           	</div>
           	</form>
        </div>
    </div>
</div>

 	<script>
        $('.get-status').click( function() {
        $('form#form-update').attr('action',base_url+'/data_penerima/update_status/' + $(this).data('id'));
        $('#modal-status').modal('show');
    	});

    	 $('.get-dibatal').click( function() {
        $('form#form-update-dibatal').attr('action',base_url+'/data_penerima/update_batal/' + $(this).data('id'));
        $('#modal-dibatal').modal('show');
    	});
    </script>