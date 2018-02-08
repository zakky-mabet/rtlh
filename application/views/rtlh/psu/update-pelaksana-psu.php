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
					<label for="nama_perusahaan" class="control-label col-md-3 col-xs-12">Nama Perusahaan : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="nama_perusahaan" class="form-control" value="<?php echo $get->nama_perusahaan; ?>">
						<p class="help-block"><?php echo form_error('nama_perusahaan', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="direktur" class="control-label col-md-3 col-xs-12">Nama Direktur : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="direktur" class="form-control" value="<?php echo $get->direktur; ?>">
						<p class="help-block"><?php echo form_error('direktur', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="kategori" class="control-label col-md-3 col-xs-12">Kategori : <strong class="text-red">*</strong></label>
						<div class="col-md-8">
							<select name="kategori" class="form-control select2" style="width: 100%">
								<option  value="">-- PILIH --</option>
								<option <?php if($get->kategori=='Pengembang') echo 'selected'; ?> value="Pengembang">Pengembang
								<option <?php if($get->kategori=='Pihak Ketiga') echo 'selected'; ?> value="Pihak Ketiga">Pihak Ketiga
							</select>
					<p class="help-block"><?php echo form_error('kategori', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="alamat_kantor" class="control-label col-md-3 col-xs-12">Alamat Kantor: <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<textarea name="alamat_kantor" rows="5" class="form-control"><?php echo $get->alamat_kantor; ?></textarea>
						<p class="help-block"><?php echo form_error('alamat_kantor', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				
				<div class="box-footer with-border">
					<div class="col-md-4 col-xs-5">
						<a href="<?php echo site_url('psu/daftar_pelaksana') ?>" class="btn btn-app pull-right">
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