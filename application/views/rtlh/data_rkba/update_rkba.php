<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-7">
		<div class="box box-primary">
			<?php

			echo form_open(current_url(), array('class' => 'form-horizontal'));
			?>
			<div class="box-body" style="margin-top: 10px;">
								
				<div class="form-group">
					<label for="id_daftar_bencana" class="control-label col-md-3 col-xs-12">Korban Bencana : <strong class="text-red">*</strong></label>
					<div class="col-md-9">
						<select name="id_daftar_bencana" class="form-control select2">
							<option value="">-- PILIH --</option>
							<?php foreach ($this->data_rkba->get_all_daftar_bencana() as $value): ?>
								<option value="<?php echo $value->id_bencana ?>" <?php if ($value->id_bencana == $get->id_daftar_bencana ): ?>
									selected
								<?php endif ?>><?php echo $value->nama ?></option>
							<?php endforeach ?>

						</select>
						<p class="help-block"><?php echo form_error('id_daftar_bencana', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="jenis_kerusakan" class="control-label col-md-3 col-xs-12 ">Jenis Kerusakan : <strong class="text-red">*</strong></label>
					<div class="col-md-9">
						<select name="jenis_kerusakan" class="form-control select2">
							<option value="">-- PILIH --</option>
							<option value="Ringan" <?php if($get->jenis_kerusakan=='Ringan') echo 'selected'; ?>>Ringan</option>
							<option value="Sedang" <?php if($get->jenis_kerusakan=='Sedang') echo 'selected'; ?>>Sedang</option>
							<option value="Berat" <?php if($get->jenis_kerusakan=='Berat') echo 'selected'; ?>>Berat</option>
						</select>
						<p class="help-block"><?php echo form_error('jenis_kerusakan', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="jenis_kegiatan" class="control-label col-md-3 col-xs-12">Jenis Kegiatan : <strong class="text-red">*</strong></label>
					<div class="col-md-9">
						<select name="jenis_kegiatan" class="form-control select2">
							<option value="">-- PILIH --</option>
							<option value="Rehab" <?php if($get->jenis_kegiatan=='Rehab') echo 'selected'; ?>>Rehab</option>
							<option value="Pembangunan Baru" <?php if($get->jenis_kegiatan=='Pembangunan Baru') echo 'selected'; ?>>Pembangunan Baru</option>
						</select>
						<p class="help-block"><?php echo form_error('jenis_kegiatan', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="tahun" class="control-label col-md-3 col-xs-12">Tahun : <strong class="text-red">*</strong></label>
					<div class="col-md-9">
						<input type="text" name="tahun" class="form-control" value="<?php echo $get->tahun; ?>">
						<p class="help-block"><?php echo form_error('tahun', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-md-3 col-xs-12">Koordinat : <strong class="text-red">*</strong></label>
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-6 ">
								<input type="text" placeholder="Latitude" name="latitude" class="form-control" value="<?php echo $get->latitude ?>">
								<p class="help-block"><?php echo form_error('latitude', '<small class="text-red">', '</small>'); ?></p>
							</div>
							<div class="col-md-6">
								<input type="text" placeholder="Longitude" name="longitude" class="form-control" value="<?php echo $get->longitude; ?>">
								<p class="help-block"><?php echo form_error('longitude', '<small class="text-red">', '</small>'); ?></p>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="jumlah_bantuan" class="control-label col-md-3 col-xs-12">Jumlah Bantuan : <strong class="text-red">*</strong></label>
					<div class="col-md-9">
						<input type="text" name="jumlah_bantuan" class="form-control" value="<?php echo $get->jumlah_bantuan; ?>">
						<p class="help-block"><?php echo form_error('jumlah_bantuan', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="sumber_anggaran" class="control-label col-md-3 col-xs-12">Sumber Anggaran : <strong class="text-red">*</strong></label>
					<div class="col-md-9">
						<select name="sumber_anggaran" class="form-control select2" style="width: 100%">
							<option value="">-- PILIH --</option>
							<option value="APBN" <?php if($get->sumber_anggaran=='APBN') echo 'selected'; ?>>APBN
							<option value="DAK" <?php if($get->sumber_anggaran=='DAK') echo 'selected'; ?>>DAK
							<option value="APBD1" <?php if($get->sumber_anggaran=='APBD1') echo 'selected'; ?>>APBD 1
							<option value="APBD2" <?php if($get->sumber_anggaran=='APBD2') echo 'selected'; ?>>APBD 2
							<option value="CSR" <?php if($get->sumber_anggaran=='CSR') echo 'selected'; ?>>CSR
							<option value="DABA" <?php if($get->sumber_anggaran=='DABA') echo 'selected'; ?>>DABA
							<option value="Lainnya" <?php if($get->sumber_anggaran=='Lainnya') echo 'selected'; ?>>Lainnya
						</select>
						<p class="help-block"><?php echo form_error('sumber_anggaran', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
			</div>
			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('data_rkba') ?>" class="btn btn-app pull-right">
						<i class="ion ion-reply"></i> Kembali
					</a>
				</div>
				<div class="col-md-6 col-xs-6">
					<button type="submit" class="btn btn-app pull-right">
					<i class="fa fa-save"></i> Simpan
					</button>
				</div>
			</div>
			<div class="box-footer with-border">
				<small><strong class="text-red">*</strong> Field wajib diisi!</small> <br>
				<small><strong class="text-blue">*</strong>	Field Optional</small>
			</div>
			<?php
				echo form_close();
			?>
		</div>
	</div>
	<div class="col-md-5">
		<table class="table table-bordered" >
			<tbody width="100%">
				<tr>
					<th width="200" class="bg-blue text-right">NIK :</th>
					<td ><?php echo $this->data_rkba->get_penduduk($get->nik, null)->nik ?></td>
				</tr>
				<tr>
					<th class="bg-blue text-right">Nama :</th>
					<td><?php echo $this->data_rkba->get_penduduk($get->nik, null)->nama_lengkap ?></td>
				</tr>
				<tr>
					<th class="bg-blue text-right">Tempat, Tanggal Lahir :</th>
					<td><?php echo $this->data_rkba->get_penduduk($get->nik, null)->tmp_lahir.', '.date_id($this->data_rkba->get_penduduk($get->nik, null)->tgl_lahir) ?></td>
				</tr>
				<tr>
					<th class="bg-blue text-right">Jenis Kelamin :</th>
					<td><?php echo $this->data_rkba->get_penduduk($get->nik, null)->jns_kelamin ?></td>
				</tr>
				<tr>
					<th class="bg-blue text-right">Alamat :</th>
					<td><?php echo $this->data_rkba->get_penduduk($get->nik, null)->alamat ?></td>
				</tr>
				<tr>
					<th class="bg-blue text-right">Agama :</th>
					<td><?php echo ucwords($this->data_rkba->get_penduduk($get->nik, null)->agama) ?></td>
				</tr>
				<tr>
					<th class="bg-blue text-right">Status Perkawinan :</th>
					<td><?php echo strtoupper($this->data_rkba->get_penduduk($get->nik, null)->status_kawin) ?></td>
				</tr>
				<tr>
					<th class="bg-blue text-right">Kewarganegaraan :</th>
					<td><?php echo strtoupper($this->data_rkba->get_penduduk($get->nik, null)->kewarganegaraan) ?></td>
				</tr>
			</tbody>
		</table>
	</div>

</div>