<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-8 col-md-offset-2 col-xs-12">
		<div class="box box-primary">
<?php  
/**
 * Open Form
 *
 * @var string
 **/
echo form_open(current_url(), array('class' => 'form-horizontal'));
?>
			<div class="box-body" style="margin-top: 10px;">
			
				<div class="form-group">
					<label for="nama_kegiatan" class="control-label col-md-3 col-xs-12">Nama Kegiatan: <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="nama_kegiatan" class="form-control" value="<?php echo set_value('nama_kegiatan'); ?>">
						<p class="help-block"><?php echo form_error('nama_kegiatan', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				
				<div class="form-group">
					<label for="kabupaten" class="control-label col-md-3 col-xs-12">Kabupaten/Kota : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<select name="kabupaten" class="form-control select2" style="width: 100%">
							<option value="">-- PILIH --</option>
							<?php foreach ($this->psu->get_all_kabupaten(19) as $key => $value): ?>
							<option value="<?php echo $value->id ?>" <?php if($this->input->post('kabupaten')==$value->id) echo 'selected'; ?>><?php echo $value->name_regencies ?></option>
							<?php endforeach ?>
						</select>
						<p class="help-block"><?php echo form_error('kabupaten', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

			<div class="form-group">
				<label for="sumber_dana" class="control-label col-md-3 col-xs-12">Sumber Dana : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<select name="sumber_dana" class="form-control select2" style="width: 100%">
							<option  value="">-- PILIH --</option>
							<option <?php if($this->input->post('sumber_dana')=='APBN') echo 'selected'; ?> value="APBN">APBN
							<option <?php if($this->input->post('sumber_dana')=='DAK') echo 'selected'; ?> value="DAK">DAK
							<option <?php if($this->input->post('sumber_dana')=='APBD1') echo 'selected'; ?> value="APBD1">APBD 1
							<option <?php if($this->input->post('sumber_dana')=='APBD2') echo 'selected'; ?> value="APBD2">APBD 2
							<option <?php if($this->input->post('sumber_dana')=='CSR') echo 'selected'; ?> value="CSR">CSR
							<option <?php if($this->input->post('sumber_dana')=='DABA') echo 'selected'; ?> value="DABA">DABA
							<option <?php if($this->input->post('sumber_dana')=='Lainnya') echo 'selected'; ?> value="Lainnya">Lainnya
						</select>
				<p class="help-block"><?php echo form_error('sumber_dana', '<small class="text-red">', '</small>'); ?></p>
				</div>
			</div>

			<div class="form-group">
				<label for="nilai_kontrak" class="control-label col-md-3 col-xs-12">Nilai Anggaran : <strong class="text-red">*</strong></label>
				<div class="col-md-8">
					<input type="text" name="nilai_kontrak" class="form-control" value="<?php echo set_value('nilai_kontrak'); ?>">
					<p class="help-block"><?php echo form_error('nilai_kontrak', '<small class="text-red">', '</small>'); ?></p>
				</div>
			</div>

			

				<div class="form-group">
					<label for="alamat" class="control-label col-md-3 col-xs-12">Alamat : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<textarea name="alamat" class="form-control"><?php echo set_value('alamat'); ?></textarea>
						<p class="help-block"><?php echo form_error('alamat', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

			<div class="form-group">
					<label for="id_pelaksana" class="control-label col-md-3 col-xs-12">Pelaksana : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<select name="id_pelaksana" class="form-control select2" style="width: 100%">
							<option value="">-- PILIH --</option>
							<?php foreach ($this->psu->get_all_pelaksana() as $key => $value): ?>
							<option value="<?php echo $value->id_pelaksana_psu ?>" <?php if($this->input->post('id_pelaksana')==$value->id_pelaksana_psu) echo 'selected'; ?>><?php echo $value->nama_perusahaan ?></option>
							<?php endforeach ?>
						</select>
						<p class="help-block"><?php echo form_error('id_pelaksana', '<small class="text-red">', '</small>'); ?></p>
					</div>
			</div>

			<div class="form-group">
					<label for="id_jenis_psu" class="control-label col-md-3 col-xs-12">Jenis Pekerjaan : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<select name="id_jenis_psu" class="form-control select2" style="width: 100%">
							<option value="">-- PILIH --</option>
							<?php foreach ($this->psu->get_all_jenis() as $key => $value): ?>
							<option value="<?php echo $value->id ?>" <?php if($this->input->post('id_jenis_psu')==$value->id) echo 'selected'; ?>><?php echo $value->nama_jenis ?></option>
							<?php endforeach ?>
						</select>
						<p class="help-block"><?php echo form_error('id_jenis_psu', '<small class="text-red">', '</small>'); ?></p>
					</div>
			</div>

			<div class="form-group">
				<label for="item_pekerjaan" class="control-label col-md-3 col-xs-12">Item Pekerjaan : <strong class="text-red">*</strong></label>
				<div class="col-md-8">
					<input type="text" name="item_pekerjaan" class="form-control" value="<?php echo set_value('item_pekerjaan'); ?>">
					<p class="help-block"><?php echo form_error('item_pekerjaan', '<small class="text-red">', '</small>'); ?></p>
				</div>
			</div>

			<div class="form-group">
					<label for="deskripsi" class="control-label col-md-3 col-xs-12">Deskripsi : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<textarea name="deskripsi" class="form-control"><?php echo set_value('deskripsi'); ?></textarea>
						<p class="help-block"><?php echo form_error('deskripsi', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('psu') ?>" class="btn btn-app pull-right">
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
				<small><strong class="text-red">*</strong>	Field wajib diisi!</small> <br>
				<small><strong class="text-blue">*</strong>	Field Optional</small>
			</div>
<?php  
// End Form
echo form_close();
?>
		</div>
	</div>
</div>