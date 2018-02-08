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
					<label for="nama_proyek" class="control-label col-md-3 col-xs-12">Nama Proyek : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="nama_proyek" class="form-control" value="<?php echo $get->nama_proyek ?>">
						<p class="help-block"><?php echo form_error('nama_proyek', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="tahun" class="control-label col-md-3 col-xs-12">Tahun : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<select name="tahun" class="form-control input-sm select2">
							<option value="">-- PILIH --</option>
							<?php for ($i = $this->rtpp->get_year_proyek('asc')->tahun-5; $i <= $this->rtpp->get_year_proyek('desc')->tahun+5; $i++) { ?>
								<option value="<?php echo $i ?>" <?php if($get->tahun==$i) echo 'selected'; ?>><?php echo $i ?></option>
							<?php } ?>
						</select>
						<p class="help-block"><?php echo form_error('tahun', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="lokasi_proyek" class="control-label col-md-3 col-xs-12">Lokasi Proyek : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<textarea name="lokasi_proyek" class="form-control"><?php echo $get->lokasi_proyek ?></textarea>
						<p class="help-block"><?php echo form_error('lokasi_proyek', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="status_proyek" class="control-label col-md-3 col-xs-12">Status Proyek : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<select name="status_proyek" class="form-control">
							<option value="">-- PILIH --</option>
							<option value="Provinsi" <?php if($get->status_proyek=='Provinsi') echo 'selected'; ?>>Provinsi</option>
				        	<option value="Kabupaten" <?php if($get->status_proyek=='Kabupaten') echo 'selected'; ?>>Kabupaten/Kota</option>
				        	<option value="Kecamatan" <?php if($get->status_proyek=='Kecamatan') echo 'selected'; ?>>Kecamatan</option>
				        	<option value="Kelurahan" <?php if($get->status_proyek=='Kelurahan') echo 'selected'; ?>>Kelurahan/Desa</option>
						</select>
						<p class="help-block"><?php echo form_error('status_proyek', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
							
			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('rtpp/proyek') ?>" class="btn btn-app pull-right">
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