<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<?php
	echo form_open(site_url('data_rkba/foto/'.$param), array('enctype' => 'multipart/form-data'));
	?>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo $title; ?> </h3>
			</div>
			<div class="box-body" style="margin-top: 10px;">
				<div class="col-sm-4 ">
					<label>Nama Foto :</label>
					<div class="form-group">
						<input type="text" class="form-control"  name="nama" value="<?php echo set_value('nama') ?>" placeholder="Nama Foto">
						<p class="help-block"><?php echo form_error('nama', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				
				<div class="col-sm-3 ">
					<label>Kategori :</label>
					<div class="form-group">
						<select class="form-control"  name="kategori">
							<option value="">-- PILIH --</option>
							<option <?php if(set_value('kategori')=='sebelum') echo "selected"; ?> value="sebelum">Sebelum Bantuan</option>
							<option <?php if(set_value('kategori')=='setelah') echo "selected"; ?> value="setelah">Setelah Bantuan</option>
						</select>
						<p class="help-block"><?php echo form_error('kategori', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="col-sm-3 ">
					<label>Foto :</label>
					<div class="form-group">
						<input type="file" class="form-control"  name="foto" required="required">
					</div>
				</div>
				
				<div class="col-md-2">
					<div class="form-group pull-left">
						<button type="submit" class="btn bg-blue  margin-top-23"><i class="fa fa-save"></i> Simpan</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php
	// End Form
	echo form_close();
	?>
	<div class="col-md-6 ">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Rumah Sebelum Bantuan</h3>
			</div>
			<div class="box-body">
				<table class="table table-hover table-bordered ">
					<thead class="bg-info">
						<tr>
							<th class="text-center">NO</th>
							<th class="text-center">FOTO</th>
							<th width="320">NAMA FOTO</th>
							<th class="text-center" width="">AKSI</th>
						</tr>
					</thead>
					<tbody>
						
						<?php if (!$this->data_rkba->foto_rkba($param,'sebelum')): ?>
						<tr>
							<td colspan="4" class="text-center" style="vertical-align: middle;">
								Belum ada data !
							</td>
						</tr>
						<?php else: ?>

						<?php foreach ($this->data_rkba->foto_rkba($param, 'sebelum') as $key => $value): ?>
						<tr>
							<td style="vertical-align: middle;" class="text-center"><?php echo ++$key ?> </td>
							<td style="vertical-align: middle;">
								<img class="img-responsive" src="<?php echo base_url('assets/rtlh/img/foto_rkba/'.$value->foto) ?>" alt="<?php echo $value->nama_foto ?>">
							</td>
							<td style="vertical-align: middle;"><?php echo $value->nama_foto ?></td>
							<td class="text-center " style="vertical-align: middle;"><a class="icon-button text-red get-delete-foto-rkba" data-id="<?php echo $value->id; ?>" data-back="<?php echo $param; ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></a></td>
						</tr>
						<?php endforeach ?>
						<?php endif ?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="col-md-6 ">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Rumah Setelah Bantuan</h3>
			</div>
			<div class="box-body">
				<table class="table table-hover table-bordered ">
					<thead class="bg-info">
						<tr>
							<th class="text-center">NO</th>
							<th class="text-center">FOTO</th>
							<th width="320">NAMA FOTO</th>
							<th class="text-center" width="">AKSI</th>
						</tr>
					</thead>
					<tbody>
						
						<?php if (!$this->data_rkba->foto_rkba($param,'setelah')): ?>
						<tr>
							<td colspan="4" class="text-center" style="vertical-align: middle;">
								Belum ada data !
							</td>
						</tr>
						<?php else: ?>
						<?php foreach ($this->data_rkba->foto_rkba($param,'setelah') as $key => $value): ?>
						<tr>
							<td style="vertical-align: middle;" class="text-center"><?php echo ++$key ?></td>
							<td style="vertical-align: middle;">
								<img class="img-responsive" src="<?php echo base_url('assets/rtlh/img/foto_rkba/'.$value->foto) ?>" alt="<?php echo $value->nama_foto ?>">
							</td>
							<td style="vertical-align: middle;"><?php echo $value->nama_foto ?></td>
							<td class="text-center " style="vertical-align: middle;"><a class="icon-button text-red get-delete-foto-rkba" data-id="<?php echo $value->id; ?>" data-back="<?php echo $param; ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></a></td>
						</tr>
						<?php endforeach ?>
						<?php endif ?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal animated fadeIn modal-danger" id="modal-delete-foto" tabindex="-1" data-backdrop="static" data-keyboard="false">
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