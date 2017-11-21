<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	  	<?php  
		echo form_open(site_url('data_candidate/foto/'.$param), array('enctype' => 'multipart/form-data'));
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
								        <option <?php if(set_value('kategori')=='sebelum') echo "selected"; ?> value="sebelum">Sebelum Rehabilitasi</option>
								        <option <?php if(set_value('kategori')=='setelah') echo "selected"; ?> value="setelah">Setelah Rehabilitasi</option>
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
              	<h3 class="box-title">Rumah Sebelum Rehabilitasi</h3>
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
						
						<?php if (!$this->data_candidate->foto_rumah($param,'sebelum')): ?>
							<tr>
								<td colspan="4" class="text-center" style="vertical-align: middle;">
									Belum ada data !
								</td>
							</tr>

						<?php else: ?>
							<?php foreach ($this->data_candidate->foto_rumah($param,'sebelum') as $key => $value): ?>
								<tr>
									<td style="vertical-align: middle;" class="text-center"><?php echo ++$key ?></td>
									<td style="vertical-align: middle;">
										<img class="img-responsive" src="<?php echo base_url('assets/rtlh/img/rumah/'.$value->foto) ?>" alt="Tampak Depan">
									</td>
									<td style="vertical-align: middle;"><?php echo $value->nama ?></td>
									<td class="text-center" style="vertical-align: middle;"><a href=""><i class="fa text-red fa-trash-o"></i></a></td>
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
              	<h3 class="box-title">Rumah Setelah Rehabilitasi</h3>
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
						
						<?php if (!$this->data_candidate->foto_rumah($param,'setelah')): ?>
							<tr>
								<td colspan="4" class="text-center" style="vertical-align: middle;">
									Belum ada data !
								</td>
							</tr>

						<?php else: ?>
							<?php foreach ($this->data_candidate->foto_rumah($param,'setelah') as $key => $value): ?>
								<tr>
									<td style="vertical-align: middle;" class="text-center"><?php echo ++$key ?></td>
									<td style="vertical-align: middle;">
										<img class="img-responsive" src="<?php echo base_url('assets/rtlh/img/rumah/'.$value->foto) ?>" alt="Tampak Depan">
									</td>
									<td style="vertical-align: middle;"><?php echo $value->nama ?></td>
									<td class="text-center" style="vertical-align: middle;"><a href=""><i class="fa text-red fa-trash-o"></i></a></td>
								</tr>
							<?php endforeach ?>
						<?php endif ?>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>

<script>
var room = 1;
function multi_foto() {
 
    room++;
    var objTo = document.getElementById('multi_foto')
    var divfoto = document.createElement("div");
	divfoto.setAttribute("class", "form-group animated pulse removeclass"+room);
	var rdiv = 'removeclass'+room;
    divfoto.innerHTML = '<div class="col-sm-4 "><label>Nama Foto :</label>									<div class="form-group">										<input type="text" class="form-control"  name="nama[]" value="" placeholder="Nama Foto">									</div></div>								<div class="col-sm-4 ">									<label>Kategori :</label>								  <div class="form-group">								      <select class="form-control"  name="kategori[]">								        <option value="">-- PILIH --</option>								        <option value="sebelum">Sebelum Rehabilitasi</option>								        <option value="setelah">Setelah Rehabilitasi</option>							      </select>								  </div>								</div>								<div class="col-sm-4 ">									<label>Foto :</label>								  <div class="form-group">								    <div class="input-group">								      <input type="file" class="form-control"  name="foto[]" value="" >								      <div class="input-group-btn">								        <button class="btn btn-danger" type="button"  onclick="remove('+ room +');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button>								      </div>								    </div>								  </div>								</div>';
    
    objTo.appendChild(divfoto)
}
   function remove(rid) {
	   $('.removeclass'+rid).remove();
   }
</script>