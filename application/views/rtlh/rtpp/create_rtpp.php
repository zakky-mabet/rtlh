<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-7">
		<div class="box box-primary">
			<?php echo form_open(current_url(), array('class' => 'form-horizontal')); ?>

			<div class="box-body" style="margin-top: 10px;">

				<div class="form-group">
					<label for="id_proyek_rtpp" class="control-label col-md-3 col-xs-12">Terkena Proyek : <strong class="text-red">*</strong></label>
					<div class="col-md-9">
						<select name="id_proyek_rtpp" class="form-control select2" style="width: 100%">
							<option value="">-- PILIH --</option>
							<?php foreach ($this->rtpp->get_all_proyek() as $key => $value): ?>
								<option value="<?php echo $value->id_proyek ?>" <?php if(set_value('id_proyek_rtpp')==$value->id_proyek) echo 'selected'; ?>><?php echo $value->nama_proyek ?>
							<?php endforeach ?>
						</select>
						<p class="help-block"><?php echo form_error('id_proyek_rtpp', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="aksi" class="control-label col-md-3 col-xs-12">Aksi : <strong class="text-red">*</strong></label>
					<div class="col-md-9">
						<input type="text" name="aksi" placeholder="Contoh : Gusur" class="form-control" value="<?php echo set_value('aksi'); ?>">
						<p class="help-block"><?php echo form_error('aksi', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="lokasi_rumah" class="control-label col-md-3 col-xs-12">Lokasi Rumah : <strong class="text-red">*</strong></label>
					<div class="col-md-9">
						<textarea name="lokasi_rumah" class="form-control"><?php echo set_value('lokasi_rumah'); ?></textarea>
						<p class="help-block"><?php echo form_error('lokasi_rumah', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="sumber_anggaran" class="control-label col-md-3 col-xs-12">Sumber Anggaran : <strong class="text-red">*</strong></label>
					<div class="col-md-9">
						<select name="sumber_anggaran" class="form-control select2" style="width: 100%">
							<option value="">-- PILIH --</option>
							<?php foreach ($this->muniversal->get_sumber_anggaran() as $key => $value): ?>
								<option value="<?php echo $value->slug ?>" <?php if(set_value('sumber_anggaran')==$value->slug) echo 'selected'; ?>><?php echo $value->nama ?>
							<?php endforeach ?>
						</select>
						<p class="help-block"><?php echo form_error('sumber_anggaran', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
								
				<div class="form-group">
					<label for="jumlah_bantuan" class="control-label col-md-3 col-xs-12">Jumlah Bantuan : <strong class="text-red">*</strong></label>
					<div class="col-md-9">
						<input type="number" name="jumlah_bantuan" class="form-control" value="<?php echo set_value('jumlah_bantuan'); ?>">
						<p class="help-block"><?php echo form_error('jumlah_bantuan', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="tahun" class="control-label col-md-3 col-xs-12">Tahun : <strong class="text-red">*</strong></label>
					<div class="col-md-9">
						<select name="tahun" class="form-control input-sm select2">
							<option value="">-- PILIH --</option>
							<?php for ($i = date('Y')-5; $i <= date('Y')+5; $i++) { ?>
								<option value="<?php echo $i ?>" <?php if($this->input->post('tahun')==$i) echo 'selected'; ?>><?php echo $i ?></option>
							<?php } ?>
						</select>
						<p class="help-block"><?php echo form_error('tahun', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

			</div>

			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('rtpp') ?>" class="btn btn-app pull-right">
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
					<td ><?php echo $this->data_rkba->get_penduduk($param, null)->nik ?></td>
				</tr>
				<tr>
					<th class="bg-blue text-right">Nama :</th>
					<td><?php echo $this->data_rkba->get_penduduk($param, null)->nama_lengkap ?></td>
				</tr>
				<tr>
					<th class="bg-blue text-right">Tempat, Tanggal Lahir :</th>
					<td><?php echo $this->data_rkba->get_penduduk($param, null)->tmp_lahir.', '.date_id($this->data_rkba->get_penduduk($param, null)->tgl_lahir) ?></td>
				</tr>
				<tr>
					<th class="bg-blue text-right">Jenis Kelamin :</th>
					<td><?php echo $this->data_rkba->get_penduduk($param, null)->jns_kelamin ?></td>
				</tr>
				<tr>
					<th class="bg-blue text-right">Alamat :</th>
					<td><?php echo $this->data_rkba->get_penduduk($param, null)->alamat ?></td>
				</tr>
				<tr>
					<th class="bg-blue text-right">Agama :</th>
					<td><?php echo ucwords($this->data_rkba->get_penduduk($param, null)->agama) ?></td>
				</tr>
				<tr>
					<th class="bg-blue text-right">Status Perkawinan :</th>
					<td><?php echo strtoupper($this->data_rkba->get_penduduk($param, null)->status_kawin) ?></td>
				</tr>
				<tr>
					<th class="bg-blue text-right">Kewarganegaraan :</th>
					<td><?php echo strtoupper($this->data_rkba->get_penduduk($param, null)->kewarganegaraan) ?></td>
				</tr>
			</tbody>
		</table>
	</div>

</div>