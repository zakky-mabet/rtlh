<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12 col-lg-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="col-md-7 col-lg-7">
					<h3 class="box-title">Data Rumah Terkena Proyek Pemerintah</h3>
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
					<select name="per_page" class="form-control input-sm" style="width:60px; display: inline-block;" onchange="window.location = '<?php echo site_url('rtpp?per_page='); ?>' + this.value + '&query=<?php echo $this->input->get('query'); ?>&kabupaten=<?php echo $this->input->get('kabupaten'); ?>';">
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
					<a href="<?php echo site_url("rtpp/print_out?{$this->input->server('QUERY_STRING')}") ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm btn-print"><i class="fa fa-print"></i> Cetak</a>
					<a href="<?php echo site_url("rtpp/export?{$this->input->server('QUERY_STRING')}") ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-download"></i> Ekspor</a>
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
						<label>Sumber Anggaran : </label>
						<select name="sumber_anggaran" class="form-control input-sm select2">
							<option value="">-- PILIH --</option>
							<?php foreach ($this->rtpp->get_all_sumber_anggaran() as $key => $value): ?>
								<option value="<?php echo $value->sumber_anggaran ?>" <?php if($this->input->get('sumber_anggaran')==$value->sumber_anggaran) echo 'selected'; ?>><?php echo $value->sumber_anggaran ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label>Proyek : </label>
						<select name="proyek" class="form-control input-sm select2">
							<option value="">-- PILIH --</option>
							<?php foreach ($this->rtpp->get_all_proyek() as $key => $value): ?>
								<option value="<?php echo $value->id_proyek ?>" <?php if($this->input->get('proyek')==$value->id_proyek) echo 'selected'; ?>><?php echo $value->nama_proyek ?></option>
							<?php endforeach ?>
						</select>
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label>Tahun : </label>
						<select name="tahun" class="form-control input-sm select2">
							<option value="">-- PILIH --</option>
							<?php for ($i = $this->rtpp->get_year('asc')->tahun; $i <= $this->rtpp->get_year('desc')->tahun; $i++) { ?>
							<option value="<?php echo $i ?>" <?php if($this->input->get('tahun')==$i) echo 'selected'; ?>><?php echo $i ?></option>
							<?php } ?>
						</select>
					</div>
				</div>


				<div class="col-md-3">
					<div class="form-group">
						<label>Kata Kunci :</label>
						<input type="text" name="query" class="form-control input-sm" value="<?php echo $this->input->get('query') ?>" placeholder="NIK / Nama Lengkap. . . ">
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<button type="submit" class="btn btn-warning hvr-shadow top"><i class="fa fa-filter"></i> Filter</button>
						<a href="<?php echo site_url('rtpp') ?>" class="btn btn-warning hvr-shadow top" style="margin-left: 10px;"><i class="fa fa-times"></i> Reset</a>
					</div>
				</div>
			</div>
			<?php
			// End form pencarian
			echo form_close();
			?>
			<div class="box-body table-responsive col-lg-12">
				
				<table class="table table-hover table-bordered mini-font " style="margin-top: 10px;">
					<thead class="bg-silver">
						<tr>
							<th width="40">NO </th>
							<th class="text-center">NIK</th>
							<th class="text-center">Nama Lengkap </th>
							<th class="text-center">Kabupaten <i class="fa fa-info-circle text-info" data-toggle="tooltip" data-placement="bottom" title="Sumber data Kabupaten didapat dari data Penduduk"></i></th>
							<th class="text-center">Sumber Anggaran</th>
							<th class="text-center">Jumlah Bantuan</th>
							<th class="text-center">Tahun</th>
							<th class="text-center">Terkena Proyek</th>
							<th class="text-center">Lokasi Rumah</th>
							<th class="text-center">User</th>
							<th width="100"></th>
						</tr>
					</thead>
					<tbody>
						<?php if (!$rtpp): ?>
						
						<td colspan="11">
							<div class="col-md-8 col-md-offset-2">
								<div class="alert alert-danger">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<strong>Maaf!</strong> Tidak ada data di database ...
								</div>
							</div>
						</td>

						<?php else : ?>
						<?php
						/*
						* Loop
						*/
						$number = ( ! $this->page ) ? 0 : $this->page;
						
						foreach($rtpp as $key => $row) :
						?>
						<tr>
							<td class="text-center">
								<?php echo ++$number ?>
							</td>
							<td><?php echo highlight_phrase($row->nik, $this->input->get('query'),'<span style="color:red; font-weight: bold;">', '</span>'); ?></td>
							<td><?php echo highlight_phrase($row->nama_lengkap, $this->input->get('query'),'<span style="color:red; font-weight: bold;">', '</span>'); ?></td>
							<td class="text-center" ><?php echo $this->muniversal->get_kabupaten($row->regency)->name_regencies; ?> </td>
							<td class="text-center"><?php echo highlight_phrase($row->sumber_anggaran, $this->input->get('sumber_anggaran'),'<span style="color:red; font-weight: bold;">', '</span>'); ?> </td>
							<td>Rp. <?php echo number_format($row->jumlah_bantuan,'0'); ?> </td>
							<td class="text-center"><?php echo highlight_phrase($row->tahun, $this->input->get('tahun'),'<span style="color:red; font-weight: bold;">', '</span>'); ?> </td>
							<td class="text-left"><?php echo $this->rtpp->get_proyek($row->id_proyek_rtpp)->nama_proyek; ?> </td>
							<td><?php echo $row->lokasi_rumah; ?> </td>
							<td class="text-center"><?php echo $this->account->get_account($row->user)->nama; ?> </td>
							<td class="text-center" style="font-size: 12px;" id="tombol-filter">
								<a href="<?php echo site_url("rtpp/update/{$row->id_rtpp}") ?>" class="icon-button text-blue" data-toggle="tooltip" data-placement="top" title="Sunting"><i class="fa fa-pencil"></i></a>
								<a href="<?php echo site_url("rtpp/foto/{$row->id_rtpp}") ?>" class="icon-button text-yellow" data-toggle="tooltip" data-placement="top" title="Foto Rumah"><i class="fa fa-camera"></i></a>
								<a class="icon-button text-red get-delete-rtpp" data-id="<?php echo $row->id_rtpp; ?>"  data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						<?php
						endforeach;
						?>
						<?php endif ?>
					</tbody>
					<tfoot>
					
					<th colspan="11">
						<small class="pull-right"><?php echo count($rtpp) . " dari " . $num_rtpp . " data"; ?></small>
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

<div class="modal animated fadeIn modal-danger" id="modal-delete-rtpp" tabindex="-1" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus!</h4>
				<span>Jika anda menghapus data ini, secara otomatis data foto rumah akan terhapus.</span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
				<a href="#" id="btn-delete" class="btn btn-outline"> Hapus </a>
			</div>
		</div>
	</div>
</div>