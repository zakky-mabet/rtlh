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
						<input type="text" name="nama_kegiatan" class="form-control" value="<?php echo $get->nama_kegiatan; ?>">
						<p class="help-block"><?php echo form_error('nama_kegiatan', '<small class="text-red">', '</small>'); ?></p>
				</div>
			</div>
				
			<div class="form-group">
				<label for="nilai_anggaran" class="control-label col-md-3 col-xs-12">Nilai Anggaran: <strong class="text-red">*</strong></label>
				<div class="col-md-8">
					<input type="number" name="nilai_anggaran" class="form-control" value="<?php echo $get->nilai_anggaran; ?>">
					<p class="help-block"><?php echo form_error('nilai_anggaran', '<small class="text-red">', '</small>'); ?></p>
				</div>
			</div>

			<div class="form-group">
					<label for="jenis" class="control-label col-md-3 col-xs-12">Jenis Kegiatan: <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<select name="jenis" class="form-control input-sm select2">
							<option value="">-- PILIH --</option>
							<?php foreach ($this->dekonsentrasi->get_all_jenis() as $key => $value): ?>
								<option value="<?php echo $value->id ?>" <?php if($get->id_jenis_kegiatan==$value->id) echo 'selected'; ?>><?php echo $value->nama_jenis ?></option>
							<?php endforeach ?>
						</select>
						<p class="help-block"><?php echo form_error('jenis', '<small class="text-red">', '</small>'); ?></p>
					</div>
			</div>

			<div class="form-group">
					<label for="tahun" class="control-label col-md-3 col-xs-12">Tahun : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<select name="tahun" class="form-control input-sm select2">
							<option value="">-- PILIH --</option>
							<?php for ($i = $this->dekonsentrasi->get_year('asc')->tahun; $i <= $this->dekonsentrasi->get_year('desc')->tahun; $i++) { ?>
								<option value="<?php echo $i ?>" <?php if($get->tahun==$i) echo 'selected'; ?>><?php echo $i ?></option>
							<?php } ?>
						</select>
						<p class="help-block"><?php echo form_error('tahun', '<small class="text-red">', '</small>'); ?></p>
					</div>
			</div>

			<div class="form-group">
				<label for="tanggal_kegiatan" class="control-label col-md-3 col-xs-12">Tanggal Kegiatan: <strong class="text-red">*</strong></label>
				<div class="col-md-8">
					<input type="text" name="tanggal_kegiatan" id="datepicker" class="form-control" value="<?php echo $get->tanggal_kegiatan; ?>">
					<p class="help-block"><?php echo form_error('tanggal_kegiatan', '<small class="text-red">', '</small>'); ?></p>
				</div>
				
			</div>


			

			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('dekonsentrasi') ?>" class="btn btn-app pull-right">
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