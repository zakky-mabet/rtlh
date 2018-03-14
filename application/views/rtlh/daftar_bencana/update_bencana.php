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
					<label for="nama" class="control-label col-md-3 col-xs-12">Nama  Bencana : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="nama" class="form-control" value="<?php echo $get->nama; ?>">
						<p class="help-block"><?php echo form_error('nama', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="no_sk" class="control-label col-md-3 col-xs-12">Nomor SK : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="no_sk" class="form-control" value="<?php echo $get->no_sk; ?>">
						<p class="help-block"><?php echo form_error('no_sk', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="tanggal" class="control-label col-md-3 col-xs-12">Tanggal : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="tanggal" class="form-control" id="datepicker" value="<?php echo $get->tanggal; ?>">
						<p class="help-block"><?php echo form_error('tanggal', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				
				<div class="form-group">
					<label for="id_jenis_bencana" class="control-label col-md-3 col-xs-12">Jenis Bencana : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<select name="id_jenis_bencana" class="form-control">
							<option value="">-- PILIH --</option>
							<?php foreach ($this->daftar_bencana->all_jenis_bencana() as $key => $value): ?>
								<option value="<?php echo $value->id ?>" <?php if($get->id_jenis_bencana==$value->id) echo 'selected'; ?>><?php echo ucwords($value->nama)  ?></option>
							<?php endforeach ?>
							
						</select>
						<p class="help-block"><?php echo form_error('id_jenis_bencana', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="tahun" class="control-label col-md-3 col-xs-12">Tahun : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<select name="tahun" class="form-control">
							<option value="">-- PILIH --</option>
							<?php 
							for ($i = date("Y")-3; $i <= date("Y")+5; $i++) { ?>
								<option value="<?php echo $i ?>" <?php if($get->tahun==$i ) echo 'selected'; ?>><?php echo $i ?></option>
							<?php } ?>
						</select>
						<p class="help-block"><?php echo form_error('tahun', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="lokasi" class="control-label col-md-3 col-xs-12">Lokasi Bencana : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<textarea name="lokasi" cols="30" class="form-control" rows="5"><?php echo $get->lokasi; ?></textarea>
						<p class="help-block"><?php echo form_error('lokasi', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="status_bencana" class="control-label col-md-3 col-xs-12">Status Bencana : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<select name="status_bencana" class="form-control">
							<option value="">-- PILIH --</option>
							<option value="Nasional" <?php if($get->status_bencana=='Nasional') echo 'selected'; ?>>Nasional</option>
							<option value="Provinsi" <?php if($get->status_bencana=='Provinsi') echo 'selected'; ?>>Provinsi</option>
				        	<option value="Kabupaten" <?php if($get->status_bencana=='Kabupaten') echo 'selected'; ?>>Kabupaten/Kota</option>
				        	<option value="Kecamatan" <?php if($get->status_bencana=='Kecamatan') echo 'selected'; ?>>Kecamatan</option>
				        	<option value="Kelurahan" <?php if($get->status_bencana=='Kelurahan') echo 'selected'; ?>>Kelurahan/Desa</option>
						</select>
						<p class="help-block"><?php echo form_error('status_bencana', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="luas" class="control-label col-md-3 col-xs-12">Luas  Bencana : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="luas" class="form-control" value="<?php echo $get->luas ?>">
						<p class="help-block"><?php echo form_error('luas', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="jumlah" class="control-label col-md-3 col-xs-12">Jumlah Korban : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="jumlah" class="form-control" value="<?php echo $get->jumlah; ?>">
						<p class="help-block"><?php echo form_error('jumlah', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

			</div>

			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('daftar_bencana') ?>" class="btn btn-app pull-right">
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