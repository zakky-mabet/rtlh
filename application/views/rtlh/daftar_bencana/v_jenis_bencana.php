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
			echo form_open(current_url(), array('method' => 'get'));
			?>
			<div class="box-body">
				<div class="col-md-4">
					Tampilkan
					<select name="per_page" class="form-control input-sm" style="width:60px; display: inline-block;" onchange="window.location = '<?php echo site_url('daftar_bencana/jenis_bencana?per_page='); ?>' + this.value + '&query=<?php echo $this->input->get('query'); ?>'">
						<?php
						/**
						* Loop 10 to 100
						* Guna untuk limit data yang ditampilkan
						*
						* @var 10
						**/
						$start = 10;
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
					<a href="<?php echo site_url('daftar_bencana/create_jenis'); ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-plus"></i> Tambah Baru</a>
					<a href="<?php echo site_url("daftar_bencana/print_out_jenis?{$this->input->server('QUERY_STRING')}") ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm btn-print"><i class="fa fa-print"></i> Cetak</a>
					<a href="<?php echo site_url("daftar_bencana/excel"); ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-file-o"></i> Exspor </a>
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-3">
					<div class="form-group">
						<label>Kata Kunci :</label>
						<input type="text" name="query" class="form-control input-sm" value="<?php echo $this->input->get('query') ?>" placeholder="Nama Jenis Bencana">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<button type="submit" class="btn btn-warning hvr-shadow top"><i class="fa fa-filter"></i> Filter</button>
						<a href="<?php echo site_url('daftar_bencana/jenis_bencana') ?>" class="btn btn-warning hvr-shadow top" style="margin-left: 10px;"><i class="fa fa-times"></i> Reset</a>
					</div>
				</div>
			</div>
			<?php
			// End form pencarian
			echo form_close();
			?>
			<div class="box-body">
		
				<table class="table table-hover table-bordered mini-tab" style="margin-top: 10px;">
					<thead class="bg-silver">
						<tr>
							<th width="40">No</th>
							<th width="300" class="text-center">Nama Jenis Bencana</th>
							<th class="text-center">Keterangan </th>
							<th width="150" ></th>
						</tr>
					</thead>
					<tbody>
						<?php
						if (!$daftar_bencana) { ?>
						<td colspan="4" class="text-center text-blue">
							Maaf data tidak ditemukan !
						</td>
						<?php } else {
											
						/*
						* Loop data 
						*/
						$number = ( ! $this->page ) ? 0 : $this->page;
						foreach($daftar_bencana as $row) :
						?>
						<tr>
							<td class="text-center"><?php echo ++$number ?></td>
							<td><?php echo ucwords($row->nama); ?></td>
							<td><?php echo ucwords($row->keterangan); ?></td>
							<td class="text-center">
								
								<a href="<?php echo site_url("daftar_bencana/update_jenis/{$row->id}") ?>" class="icon-button text-blue" data-toggle="tooltip" data-placement="top" title="Sunting"><i class="fa fa-pencil"></i></a>
								<a class="icon-button text-red get-delete-jenis-bencana" data-id="<?php echo $row->id; ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></a>
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

			</div>
			<div class="box-footer text-center">
				<?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
	</div>
</div>

<div class="modal animated fadeIn modal-danger" id="modal-delete-jenis-bencana" tabindex="-1" data-backdrop="static" data-keyboard="false">
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