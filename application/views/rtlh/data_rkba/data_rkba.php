<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="col-md-7">
					<h3 class="box-title">Data Rumah Korban Bencana Alam</h3>
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
					<select name="per_page" class="form-control input-sm" style="width:60px; display: inline-block;" onchange="window.location = '<?php echo site_url('data_rkba?per_page='); ?>' + this.value + '&query=<?php echo $this->input->get('query'); ?>&village=<?php echo $this->input->get('village'); ?>';">
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
				
					<a href="<?php echo site_url("data_rkba/print_out?{$this->input->server('QUERY_STRING')}") ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm btn-print"><i class="fa fa-print"></i> Cetak</a>
					<a href="<?php echo site_url("data_rkba/export?{$this->input->server('QUERY_STRING')}") ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-download"></i> Ekspor</a>
				
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-3">
					<div class="form-group">
						<label>Kabupaten : </label>
						<select name="kabupaten" class="form-control input-sm select2">
								<option value="">-- PILIH --</option>
							<?php foreach ($this->muniversal->get_all_kabupaten(19) as $key => $value): ?>
								<option value="<?php echo $value->id ?>" <?php if($this->input->get('kabupaten')==$value->id) echo 'selected'; ?>><?php echo $value->name_regencies ?></option>
							<?php endforeach ?>
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
                    <a href="<?php echo site_url('data_rkba') ?>" class="btn btn-warning hvr-shadow top" style="margin-left: 10px;"><i class="fa fa-times"></i> Reset</a>
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
echo form_open(site_url('data_rkba/bulk_action'));
?>
				<table class="table table-hover table-bordered mini-font" style="margin-top: 10px;" >
					<thead class="bg-silver">
						<tr>
							<th width="40">NO</th>
							<th class="text-center">NIK</th>
							<th class="text-center">Nama Lengkap</th>
							<th class="text-center">Kabupaten</th>
							<th class="text-center">Desa / Kelurahan</th>
							<th class="text-center">Alamat</th>
							<th class="text-center">Tahun</th>
							<th class="text-center">Korban Bencana</th>
							<th class="text-center">Sumber Dana</th>
							<th class="text-center">Jumlah Bantuan</th>
							<th class="text-center">User </th>
							<th width="130"></th>
						</tr>
					</thead>
					<tbody>
				<?php  

				$number = ( ! $this->page ) ? 0 : $this->page;

				foreach($data_rkba as $row) :
				?>
						<tr>
							<td class="text-center">
							
			                   <?php echo ++$number ?>
						
							</td>
							<td class="text-left"><?php echo highlight_phrase($row->nik, $this->input->get('query'),'<span style="color:red; font-weight: bold;">', '</span>'); ?></td>
							<td><?php echo highlight_phrase(ucwords($row->nama_lengkap), $this->input->get('query'),'<span style="color:red; font-weight: bold;">', '</span>'); ?></td>
							<td class="text-left"><?php echo $this->data_penerima->get_nama_kabupaten($row->regency)->name_regencies;  ?></td>
							<td class="text-center"><?php echo $this->data_penerima->get_nama_desa($row->village)->name_villages;  ?></td>
							<td><?php echo ucwords($row->alamat); ?></td>
							<td class="text-center"><?php echo ucwords($row->tahun); ?></td>
							<td><?php echo ucwords($this->data_rkba->get_daftar_bencana($row->id_daftar_bencana)->nama); ?> </td>
							<td><?php echo ucwords($row->sumber_anggaran); ?> </td>
							<td >Rp. <?php echo number_format($row->jumlah_bantuan,'0'); ?> </td>
							<td ><?php 	echo $this->muniversal->get_account_by_login($row->user)->nama ?> </td>
							<td class="text-center" style="font-size: 12px;" id="tombol-filter">

								<a href="<?php echo site_url("data_rkba/update/{$row->id}") ?>" class="icon-button text-blue" data-toggle="tooltip" data-placement="top" title="Sunting"><i class="fa fa-pencil"></i></a>

								<a href="<?php echo site_url("data_rkba/foto/{$row->id}") ?>" class="icon-button text-yellow" data-toggle="tooltip" data-placement="top" title="Foto Rumah"><i class="fa fa-camera"></i></a>
								<?php if ($this->muniversal->get_account_by_login($this->session->userdata('ID'))->level == 'Admin'): ?>
								<a class="icon-button text-red get-delete-rkba" data-id="<?php echo $row->id; ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></a>
							<?php endif ?>
				
							</td>
						</tr>
				<?php  
				endforeach;
				?>
					</tbody>
					<tfoot>
					
				
						<th colspan="12">
							<small class="pull-right"><?php echo count($data_rkba) . " dari " . $num_data_rkba . " data"; ?></small>
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