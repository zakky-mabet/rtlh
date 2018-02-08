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
					<label for="nama_jenis" class="control-label col-md-3 col-xs-12">Nama Jenis : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="nama_jenis" class="form-control" value="<?php echo $get->nama_jenis; ?>">
						<p class="help-block"><?php echo form_error('nama_jenis', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="keterangan" class="control-label col-md-3 col-xs-12">Keterangan : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="keterangan" class="form-control" value="<?php echo $get->keterangan ?>">
						<p class="help-block"><?php echo form_error('keterangan', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>

			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('psu/master_jenis') ?>" class="btn btn-app pull-right">
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