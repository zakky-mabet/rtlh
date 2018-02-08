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
						<input type="text" name="nama_kegiatan" class="form-control" value="<?php echo $get->nama_kegiatan ?>">
						<p class="help-block"><?php echo form_error('nama_kegiatan', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				
				<div class="form-group">
					<label for="kabupaten" class="control-label col-md-3 col-xs-12">Kabupaten : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<select name="kabupaten" class="form-control select2" style="width: 100%">
							<option value="">-- PILIH --</option>
							<?php foreach ($this->psu->get_all_kabupaten(19) as $key => $value): ?>
							<option value="<?php echo $value->id ?>" <?php if($get->kabupaten==$value->id) echo 'selected'; ?>><?php echo $value->name ?></option>
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
							<option <?php if($get->sumber_dana=='APBN') echo 'selected'; ?> value="APBN">APBN
							<option <?php if($get->sumber_dana=='DAK') echo 'selected'; ?> value="DAK">DAK
							<option <?php if($get->sumber_dana=='APBD1') echo 'selected'; ?> value="APBD1">APBD 1
							<option <?php if($get->sumber_dana=='APBD2') echo 'selected'; ?> value="APBD2">APBD 2
							<option <?php if($get->sumber_dana=='CSR') echo 'selected'; ?> value="CSR">CSR
							<option <?php if($get->sumber_dana=='DABA') echo 'selected'; ?> value="DABA">DABA
							<option <?php if($get->sumber_dana=='Lainnya') echo 'selected'; ?> value="Lainnya">Lainnya
						</select>
				<p class="help-block"><?php echo form_error('sumber_dana', '<small class="text-red">', '</small>'); ?></p>
				</div>
			</div>

			<div class="form-group">
				<label for="nilai_kontrak" class="control-label col-md-3 col-xs-12">Nilai Kontrak: <strong class="text-red">*</strong></label>
				<div class="col-md-8">
					<input type="text" name="nilai_kontrak" class="form-control" value="<?php echo $get->nilai_kontrak; ?>">
					<p class="help-block"><?php echo form_error('nilai_kontrak', '<small class="text-red">', '</small>'); ?></p>
				</div>
			</div>

			<div class="form-group">
				<label for="tanggal_mulai" class="control-label col-md-3 col-xs-12">Tanggal : <strong class="text-red">*</strong></label>
				<div class="col-md-4">
					<input type="text" name="tanggal_mulai" placeholder="Tanggal Mulai" id="datepicker" class="form-control" value="<?php echo $get->tanggal_mulai ?>">
					<p class="help-block"><?php echo form_error('tanggal_mulai', '<small class="text-red">', '</small>'); ?></p>
				</div>
				<div class="col-md-4">
					<input type="text" name="tanggal_selesai" placeholder="Tanggal Selesai"  id="datepicker1" class="form-control" value="<?php echo $get->tanggal_selesai ?>">
					<p class="help-block"><?php echo form_error('tanggal_selesai', '<small class="text-red">', '</small>'); ?></p>
				</div>
			</div>

				<div class="form-group">
					<label for="alamat" class="control-label col-md-3 col-xs-12">Alamat : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<textarea name="alamat" class="form-control"><?php echo $get->alamat ?></textarea>
						<p class="help-block"><?php echo form_error('alamat', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

			<div class="form-group">
					<label for="id_pelaksana" class="control-label col-md-3 col-xs-12">Pelaksana : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<select name="id_pelaksana" class="form-control select2" style="width: 100%">
							<option value="">-- PILIH --</option>
							<?php foreach ($this->psu->get_all_pelaksana() as $key => $value): ?>
							<option value="<?php echo $value->id_pelaksana_psu ?>" <?php if($get->id_pelaksana==$value->id_pelaksana_psu) echo 'selected'; ?>><?php echo $value->nama_perusahaan ?></option>
							<?php endforeach ?>
						</select>
						<p class="help-block"><?php echo form_error('id_pelaksana', '<small class="text-red">', '</small>'); ?></p>
					</div>
			</div>

			<div class="form-group">
					<label for="id_jenis_psu" class="control-label col-md-3 col-xs-12">Jenis : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<select name="id_jenis_psu" class="form-control select2" style="width: 100%">
							<option value="">-- PILIH --</option>
							<?php foreach ($this->psu->get_all_jenis() as $key => $value): ?>
							<option value="<?php echo $value->id ?>" <?php if($get->id_jenis_psu ==$value->id) echo 'selected'; ?>><?php echo $value->nama_jenis ?></option>
							<?php endforeach ?>
						</select>
						<p class="help-block"><?php echo form_error('id_jenis_psu', '<small class="text-red">', '</small>'); ?></p>
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