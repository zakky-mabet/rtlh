<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="col-md-7">
					<h3 class="box-title">Data Prasarana Sarana dan Utilitas</h3>
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
					<select name="per_page" class="form-control input-sm" style="width:60px; display: inline-block;" onchange="window.location = '<?php echo site_url('psu?per_page='); ?>' + this.value + '&query=<?php echo $this->input->get('query'); ?>&kabupaten=<?php echo $this->input->get('kabupaten'); ?>';">
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
					

					<a href="<?php echo site_url('psu/create') ?>" class="btn btn-success hvr-shadow btn-flat btn-sm"><i class="fa fa-plus"></i> Tambah Baru</a>
					
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-3">
					<div class="form-group">
						<label>Jenis :</label>
						<select name="jenis" class="form-control input-sm">
							<option value="">-- PILIH --</option>
							<?php foreach ($this->psu->get_all_jenis() as $key => $value): ?>
							<option value="<?php echo $value->id ?>" <?php if($this->input->get('jenis')==$value->id) echo 'selected'; ?>><?php echo $value->nama_jenis ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Kabupaten :</label>
						<select name="kabupaten" class="form-control input-sm">
							<option value="">-- PILIH --</option>
							<?php foreach ($this->psu->get_all_kabupaten(19) as $key => $value): ?>
							<option value="<?php echo $value->id ?>" <?php if($this->input->get('kabupaten')==$value->id) echo 'selected'; ?>><?php echo $value->name ?></option>
							<?php endforeach ?>							
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Kata Kunci :</label>
						<input type="text" name="query" class="form-control input-sm" value="<?php echo $this->input->get('query') ?>" placeholder="Nama Kegiatan. . . ">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<button type="submit" class="btn btn-warning hvr-shadow top"><i class="fa fa-filter"></i> Filter</button>
						<a href="<?php echo site_url('psu') ?>" class="btn btn-warning hvr-shadow top" style="margin-left: 10px;"><i class="fa fa-times"></i> Reset</a>
					</div>
				</div>
			</div>
			<?php
			// End form pencarian
			echo form_close();
			?>
			<div class="box-body">
				
				<table class="table table-hover table-bordered  mini-font" style="margin-top: 10px;">
					<thead class="bg-silver">
						<tr>
							<th width="40">NO</th>
							<th class="text-center">Nama Kegiatan</th>
							<th class="text-center">Jenis </th>
							<th class="text-center">Kabupaten</th>
							<th class="text-center">Pelaksana</th>
							<th class="text-center">Sumber Dana</th>
							<th class="text-center">Nilai Kontrak</th>
							<th class="text-center">Alamat</th>
							<th class="text-center">User</th>
							<th width="100"></th>
						</tr>
					</thead>
					<tbody>
						<?php
						/*
						* Loop data
						*/
						$number = ( ! $this->page ) ? 0 : $this->page;
						foreach($psu as $row) :
						?>
						<tr>
							<td class="text-center">
								<?php echo ++$number ?>
							</td>
							<td><?php echo $row->nama_kegiatan; ?></td>
							<td><?php echo $this->psu->get_jenis($row->id_jenis_psu)->nama_jenis; ?></td>
							<td><?php echo  $this->psu->get_kabupaten($row->kabupaten)->name; ?></td>
							<td class="text-center"><?php echo $this->psu->get_pelaksana($row->id_pelaksana)->nama_perusahaan; ?></td>
							<td class="text-center"><?php echo ucwords($row->sumber_dana) ?></td>
							<td class="text-center"><?php echo ucwords($row->nilai_kontrak) ?></td>
							<td><?php echo $row->alamat; ?></td>
							<td class="text-center"><?php echo $this->account->get_account($row->user)->nama; ?> </td>
							<td class="text-center" style="font-size: 12px;" id="tombol-filter">
								<a href="<?php echo site_url("psu/update/{$row->id}") ?>" class="icon-button text-blue" data-toggle="tooltip" data-placement="top" title="Sunting"><i class="fa fa-pencil"></i></a>
								<a href="<?php echo site_url("psu/foto/{$row->id}") ?>" class="icon-button text-yellow" data-toggle="tooltip" data-placement="top" title="Foto Rumah"><i class="fa fa-camera"></i></a>
								<a class="icon-button text-red get-delete-psu" data-id="<?php echo $row->id; ?>"  data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						<?php
						endforeach;
						?>
					</tbody>
					<tfoot>
					
					<th colspan="9">
						
						<small class="pull-right"><?php echo count($psu) . " dari " . $num_psu . " data"; ?></small>
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
				
			</div>

			<div class="box-footer text-center">
				<?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
	</div>
</div>

<div class="modal animated fadeIn modal-danger" id="modal-delete-psu" tabindex="-1" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus!</h4>
				<span>Hapus data ini?</span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
				<a href="#" id="btn-delete" class="btn btn-outline"> Hapus </a>
			</div>
		</div>
	</div>
</div>