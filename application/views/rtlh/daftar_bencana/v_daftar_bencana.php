<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="col-md-7">
					<h3 class="box-title">Data Daftar Bencana</h3>
				</div>
			</div>
			<?php
			/**
			* Start Form Pencarian
			*
			* @return string
			**/
			echo form_open(current_url(), array('method' => 'get','accept-charset' =>'utf-8' ));
			?>
			<div class="box-body">
				<div class="col-md-4">
					Tampilkan
					<select name="per_page" class="form-control input-sm" style="width:60px; display: inline-block;" onchange="window.location = '<?php echo site_url('daftar_bencana?per_page='); ?>' + this.value + '&query=<?php echo $this->input->get('query'); ?>&jenis=<?php echo $this->input->get('jenis'); ?>'">
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
					
					<a href="<?php echo site_url('daftar_bencana/create') ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-plus"></i> Tambah Baru</a>
					<a href="<?php echo site_url("daftar_bencana/print_out?{$this->input->server('QUERY_STRING')}") ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm btn-print"><i class="fa fa-print"></i> Cetak</a>
					<a href="<?php echo site_url("daftar_bencana/export?{$this->input->server('QUERY_STRING')}") ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-download"></i> Ekspor</a>
					
				</div>
			</div>
			<div class="box-body">
				
				<div class="col-md-3">
					<div class="form-group">
						<label>Kata Kunci :</label>
						<input type="text" name="query" class="form-control input-sm" value="<?php echo $this->input->get('query') ?>" placeholder=" Nama Bencana">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Jenis Bencana:</label>
						<select name="jenis" class="form-control input-sm select2">
							<option value="">-- PILIH --</option>
							<?php foreach ($this->daftar_bencana->all_jenis_bencana() as $value): ?>
							<option value="<?php echo $value->id ?>" <?php if($this->input->get('jenis')==$value->id) echo 'selected'; ?>><?php echo ucwords($value->nama) ?></option>
							<?php endforeach ?>
							
						</select>
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="form-group">
						<button type="submit" class="btn btn-warning hvr-shadow top"><i class="fa fa-filter"></i> Filter</button>
						<a href="<?php echo site_url('daftar_bencana') ?>" class="btn btn-warning hvr-shadow top" style="margin-left: 10px;"><i class="fa fa-times"></i> Reset</a>
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
				echo form_open(site_url('daftar_bencana/bulk_action'));
				?>
				<table class="table table-hover table-bordered mini-tab" style="margin-top: 10px;">
					<thead class="bg-silver">
						<tr>
							<th width="40">No</th>
							<th class="text-center">Nama Bencana</th>
							<th>Jenis Bencana</th>
							<th>Tahun</th>
							<th>Lokasi</th>
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (!$daftar_bencana) { ?>
						<td colspan="6" class="text-center text-blue">
							Maaf data tidak ditemukan !
						</td>
						<?php } else {
											
						/*
						* Loop data penduduk
						*/
						$number = ( ! $this->page ) ? 0 : $this->page;
						foreach($daftar_bencana as $row) :
						?>
						<tr>
							<td class="text-center"><?php echo ++$number ?></td>
							<td><?php echo ucwords($row->nama); ?></td>
							<td class="text-center" style="font-size: 12px;">
								<?php  if ($row->id_jenis_bencana!=0) {
									echo ucwords($this->daftar_bencana->get_jenis_bencana($row->id_jenis_bencana)->nama );
								} else { echo "<span class='text-blue'>Jenis bencana belum di entri.</span>";} ?>
							</td>
							<td><?php echo ucwords($row->tahun); ?></td>
							<td><?php echo ucwords($row->lokasi); ?></td>
							<td><?php echo ucwords($row->status_bencana); ?></td>
							<td class="text-center">
								
								<a href="<?php echo site_url("daftar_bencana/update/{$row->id_bencana}") ?>" class="icon-button text-blue" data-toggle="tooltip" data-placement="top" title="Sunting"><i class="fa fa-pencil"></i></a>
								<a href="<?php echo site_url("daftar_bencana/foto_bencana/{$row->id_bencana}") ?>" class="icon-button text-yellow" data-toggle="tooltip" data-placement="top" title="Foto-foto Bencana"><i class="fa fa-camera"></i></a>
								
								<a class="icon-button text-red get-delete-daftar-bencana" data-id="<?php echo $row->id_bencana; ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						<?php
						endforeach;
						}
						?>
					</tbody>
					<tfoot>
					
					
					<th colspan="10">
						
						<small class="pull-right"><?php echo count($daftar_bencana) . " dari " . $num_daftar_bencana . " data"; ?></small>
					</th>
					
					</tfoot>
				</table>
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
<div class="modal animated fadeIn modal-danger" id="modal-delete-daftar-bencana" tabindex="-1" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus!</h4>
				<span>Hapus data bencana ini?</span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
				<a href="#" id="btn-delete" class="btn btn-outline"> Hapus </a>
			</div>
		</div>
	</div>
</div>