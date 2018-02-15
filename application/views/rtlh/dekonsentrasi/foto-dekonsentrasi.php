<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<?php
	echo form_open(site_url('dekonsentrasi/foto/'.$param), array('enctype' => 'multipart/form-data'));
	?>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Upload <?php echo $title; ?> </h3>
			</div>
			<div class="box-body" style="margin-top: 10px;">
				<div class="col-sm-4">
					<label>Nama Foto :</label>
					<div class="form-group">
						<input type="text" class="form-control"  name="nama" value="<?php echo set_value('nama') ?>" placeholder="Nama Foto">
						<p class="help-block"><?php echo form_error('nama', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				
				<div class="col-sm-4 ">
					<label>Foto :</label>
					<div class="form-group">
						<input type="file" class="form-control"  name="foto" required="required">
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="form-group pull-left">
						<button type="submit" class="btn bg-blue  margin-top-23"><i class="fa fa-save"></i> Simpan</button>
						<a class="btn btn-default  margin-top-23" href="<?php echo base_url('dekonsentrasi') ?>" > <i class="fa fa-repeat"></i> Kembali</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php
	// End Form
	echo form_close();
	?>
	<div class="col-md-12 ">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Daftar <?php echo $title; ?></h3>
			</div>
			<div class="box-body gallery">
				<table class="table table-hover table-bordered ">
					<thead class="bg-info">
						<tr>
							<th width="20" class="text-center">NO</th>
							<th class="text-center">FOTO</th>
							<th width="320">NAMA FOTO</th>
							<th class="text-center" width="">AKSI</th>
						</tr>
					</thead>
					<tbody>
						
						<?php if (!$this->dekonsentrasi->foto($param)): ?>
						<tr>
							<td colspan="4" class="text-center" style="vertical-align: middle;">
								Belum ada data !
							</td>
						</tr>
						<?php else: ?>
						<?php foreach ($this->dekonsentrasi->foto($param) as $key => $value): ?>
						<tr>
							<td style="vertical-align: middle;" class="text-center"><?php echo ++$key ?></td>
							<td  width="210" style="vertical-align: middle;">
								
								<figure>
									<img class="img-responsive" src="<?php echo base_url('assets/rtlh/img/foto_dekon/'.$value->foto) ?>" alt="<?php echo $value->nama ?>" />
									<figcaption><small><?php echo $value->nama?></small></figcaption>
								</figure>
							</td>
							<td style="vertical-align: middle;"><?php echo $value->nama ?></td>
							<td class="text-center " style="vertical-align: middle;"><a class="icon-button text-red get-delete-foto-dekonsentrasi" data-id="<?php echo $value->id_foto; ?>" data-back="<?php echo $value->id_dekonsentrasi; ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></a></td>
						</tr>
						<?php endforeach ?>
						<?php endif ?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal animated fadeIn modal-danger" id="modal-delete-foto-dekonsentrasi" tabindex="-1" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus!</h4>
				<span>Hapus foto ini?</span>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
				<a href="#" id="btn-delete" class="btn btn-outline"> Hapus </a>
			</div>
		</div>
	</div>
</div>

<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="display:none;">
  <symbol id="close" viewBox="0 0 18 18">
    <path fill-rule="evenodd" clip-rule="evenodd" fill="red" d="M9,0.493C4.302,0.493,0.493,4.302,0.493,9S4.302,17.507,9,17.507
			S17.507,13.698,17.507,9S13.698,0.493,9,0.493z M12.491,11.491c0.292,0.296,0.292,0.773,0,1.068c-0.293,0.295-0.767,0.295-1.059,0
			l-2.435-2.457L6.564,12.56c-0.292,0.295-0.766,0.295-1.058,0c-0.292-0.295-0.292-0.772,0-1.068L7.94,9.035L5.435,6.507
			c-0.292-0.295-0.292-0.773,0-1.068c0.293-0.295,0.766-0.295,1.059,0l2.504,2.528l2.505-2.528c0.292-0.295,0.767-0.295,1.059,0
			s0.292,0.773,0,1.068l-2.505,2.528L12.491,11.491z"/>
  </symbol>
</svg>
