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
					<label for="nama" class="control-label col-md-3 col-xs-12">Nama  Sub Kriteria: <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="nama" class="form-control" value="<?php echo set_value('nama'); ?>">
						<p class="help-block"><?php echo form_error('nama', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				
				<div class="form-group">
					<label for="kriteria" class="control-label col-md-3 col-xs-12">Nama Kriteria : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<select name="kriteria" class="form-control input-sm">
				        	<option value="">-- PILIH --</option>
				        	<?php foreach ($this->sub_kriteria->get_all_kriteria() as $key => $value): ?>
				        		<option value="<?php echo $value->id ?>" <?php if($this->input->get('kriteria')== $value->id) echo 'selected'; ?>><?php echo $value->nama ?></option>
				        	<?php endforeach ?>
				        
				        </select>
						<p class="help-block"><?php echo form_error('kriteria', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="nilai" class="control-label col-md-3 col-xs-12">Nilai : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="nilai" class="form-control" value="<?php echo set_value('nilai'); ?>">
						<p class="help-block"><?php echo form_error('nilai', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
			</div>

			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('sub_kriteria') ?>" class="btn btn-app pull-right">
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