<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-10 col-md-offset-1 col-xs-12">
		<div class="box box-primary">
<?php  
/**
 * Open Form
 *
 * @var string
 **/
echo form_open(current_url(), array('class' => 'form-horizontal'));

echo form_hidden('ID', $population->ID); 
?>
			<div class="box-body" style="margin-top: 10px;">
				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">NIK : <strong class="text-red">*</strong></label>
					<div class="col-md-4">
						<input type="number" disabled class="form-control" value="<?php echo $population->nik; ?>">
						<p class="help-block"><?php echo form_error('nik', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="control-label col-md-3 col-xs-12">No. KK : <strong class="text-primary">*</strong></label>
					<div class="col-md-4">
						<input type="number" name="kk" class="form-control" value="<?php echo $population->no_kk; ?>">
						<p class="help-block"><?php echo form_error('kk', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="control-label col-md-3 col-xs-12">Nama : <strong class="text-red">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="name" class="form-control" value="<?php echo $population->nama_lengkap; ?>">
						<p class="help-block"><?php echo form_error('name', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="status_kk" class="control-label col-md-3">Status KK : <strong class="text-blue">*</strong></label>
					<div class="col-md-6">
				       	<div class="radio radio-inline radio-primary">
				           <input name="status_kk" type="radio" value="kepala keluarga" <?php if($population->status_kk=='kepala keluarga') echo "checked"; ?>> <label for="status_kk"> Kepala Keluarga</label>
				       	</div>
				       	<div class="radio radio-inline radio-primary">
				           <input name="status_kk" type="radio" value="istri" <?php if($population->status_kk=='istri') echo "checked"; ?>> <label for="status_kk"> Istri</label>
				       	</div>
				       	<div class="radio radio-inline radio-primary">
				           <input name="status_kk" type="radio" value="anak" <?php if($population->status_kk=='anak') echo "checked"; ?>> <label for="status_kk"> Anak</label>
				       	</div>
				       	<div class="radio radio-inline radio-primary">
				           <input name="status_kk" type="radio" value="ayah" <?php if($population->status_kk=='ayah') echo "checked"; ?>> <label for="status_kk"> Ayah</label>
				       	</div>
				       	<div class="radio radio-inline radio-primary">
				           <input name="status_kk" type="radio" value="ibu" <?php if($population->status_kk=='ibu') echo "checked"; ?>> <label for="status_kk"> Ibu</label>
				       	</div>
				       	<p class="help-block"><?php echo form_error('status_kk', '<small class="text-red">', '</small>'); ?></p>
					</div>
				</div>
				
				<div class="form-group">
					<label for="tmp_lahir" class="control-label col-md-3 col-xs-12">Tempat, Tanggal Lahir : <strong class="text-blue">*</strong></label>
					<div class="col-md-4">
						<input type="text" name="tmp_lahir" class="form-control" value="<?php echo $population->tmp_lahir; ?>">
						<p class="help-block"><?php echo form_error('tmp_lahir', '<small class="text-blue">', '</small>'); ?></p>
					</div>
					<div class="col-md-4">
					  	<div class="input-group">
					    	<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
					    	<input type="text" class="form-control" name="birts" id="datepicker" value="<?php echo $population->tgl_lahir; ?>" placeholder="Ex : 1980-12-31">
					  	</div>
						<p class="help-block"><?php echo form_error('birts', '<small class="text-blue">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="gender" class="control-label col-md-3">Jenis Kelamin : <strong class="text-blue">*</strong></label>
					<div class="col-md-6">
				       	<div class="radio radio-inline radio-primary">
				           <input name="gender" type="radio" value="LAKI-LAKI" <?php if($population->jns_kelamin=='LAKI-LAKI') echo "checked"; ?>> <label for="gender"> Laki-laki</label>
				       	</div>
				       	<div class="radio radio-inline radio-primary">
				           <input name="gender" type="radio" value="PEREMPUAN" <?php if($population->jns_kelamin=='PEREMPUAN') echo "checked"; ?>> <label for="gender"> Perempuan</label>
				       	</div>
				       	<p class="help-block"><?php echo form_error('gender', '<small class="text-blue">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="agama" class="control-label col-md-3 col-xs-12">Agama : <strong class="text-blue">*</strong></label>
					<div class="col-md-4">
						<select name="agama" class="form-control select2">
							<option value="">-- PILIH --</option>
							<option value="islam" <?php if($population->agama=='islam') echo "selected"; ?>>Islam</option>
							<option value="kristen" <?php if($population->agama=='kristen') echo "selected"; ?>>Kristen</option>
							<option value="katholik" <?php if($population->agama=='katholik') echo "selected"; ?>>Katholik</option>
							<option value="hindu" <?php if($population->agama=='hindu') echo "selected"; ?>>Hindu</option>
							<option value="buddha" <?php if($population->agama=='buddha') echo "selected"; ?>>Buddha</option>
							<option value="khonghucu" <?php if($population->agama=='khonghucu') echo "selected"; ?>>Khonghucu</option>
							<option value="aliran kepercayaan" <?php if($population->agama=='aliran kepercayaan') echo "selected"; ?>>Lainnya</option>
						</select>
						<p class="help-block"><?php echo form_error('agama', '<small class="text-blue">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="control-label col-md-3">Status Perkawinan : <strong class="text-blue">*</strong></label>
					<div class="col-md-6">
				       	<div class="radio radio-inline radio-primary">
				           <input name="status_kawin" type="radio" value="belum kawin" <?php if($population->status_kawin=='belum kawin') echo "checked"; ?>> <label> Belum Kawin</label>
				       	</div>
				       	<div class="radio radio-inline radio-primary">
				           <input name="status_kawin" type="radio" value="kawin" <?php if($population->status_kawin=='kawin') echo "checked"; ?>> <label> Kawin</label>
				       	</div>
				       	<div class="radio radio-inline radio-primary">
				           <input name="status_kawin" type="radio" value="cerai hidup" <?php if($population->status_kawin=='cerai hidup') echo "checked"; ?>> <label> Cerai Hidup</label>
				       	</div>
				       	<div class="radio radio-inline radio-primary">
				           <input name="status_kawin" type="radio" value="cerai mati" <?php if($population->status_kawin=='cerai mati') echo "checked"; ?>> <label> Cerai Mati</label>
				       	</div>
				       	<p class="help-block"><?php echo form_error('status_kawin', '<small class="text-blue">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="control-label col-md-3">Kewarganegaraaan : <strong class="text-blue">*</strong></label>
					<div class="col-md-6">
				       	<div class="radio radio-primary">
				           <input name="kewarganegaraan" type="radio" value="wni" <?php if($population->kewarganegaraan=='wni') echo "checked"; ?>> <label for="kewarganegaraan"> WNI (Warga Negara Indonesia)</label>
				       	</div>
				       	<div class="radio radio-primary">
				           <input name="kewarganegaraan" type="radio" value="wna" <?php if($population->kewarganegaraan=='wna') echo "checked"; ?>> <label for="kewarganegaraan"> WNA (Warga Negara Asing)</label>
				       	</div>
				       	<p class="help-block"><?php echo form_error('kewarganegaraan', '<small class="text-blue">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="pekerjaan" class="control-label col-md-3 col-xs-12">Pekerjaan : <strong class="text-blue">*</strong></label>
					<div class="col-md-8">
						<input type="text" name="pekerjaan" class="form-control" value="<?php echo $population->pekerjaan; ?>">
						<p class="help-block"><?php echo form_error('pekerjaan', '<small class="text-blue">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="gol_darah" class="control-label col-md-3 col-xs-12">Golongan Darah : <strong class="text-blue">*</strong></label>
					<div class="col-md-3">
						<select name="gol_darah" class="form-control select2">
							<option value="">-- PILIH --</option>
							<option value="A" <?php if($population->gol_darah=='A') echo "selected"; ?>>A</option>
							<option value="B" <?php if($population->gol_darah=='B') echo "selected"; ?>>B</option>
							<option value="AB" <?php if($population->gol_darah=='AB') echo "selected"; ?>>AB</option>
							<option value="O" <?php if($population->gol_darah=='O') echo "selected"; ?>>O</option>
							<option value="A+" <?php if($population->gol_darah=='A+') echo "selected"; ?>>A+</option>
							<option value="A-" <?php if($population->gol_darah=='A-') echo "selected"; ?>>A-</option>
							<option value="B+" <?php if($population->gol_darah=='B+') echo "selected"; ?>>B+</option>
							<option value="B-" <?php if($population->gol_darah=='B-') echo "selected"; ?>>B-</option>
							<option value="AB+" <?php if($population->gol_darah=='AB+') echo "selected"; ?>>AB+</option>
							<option value="AB-" <?php if($population->gol_darah=='AB-') echo "selected"; ?>>AB-</option>
							<option value="O+" <?php if($population->gol_darah=='O+') echo "selected"; ?>>O+</option>
							<option value="O-" <?php if($population->gol_darah=='O-') echo "selected"; ?>>O-</option>
							<option value="tidak tahu"<?php if($population->gol_darah=='TIDAK TAHU') echo "selected"; ?>>TIDAK TAHU</option>
						</select>
						<p class="help-block"><?php echo form_error('gol_darah', '<small class="text-blue">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="alamat" class="control-label col-md-3">Alamat : <strong class="text-blue">*</strong></label>
					<div class="col-md-8">
						<textarea name="alamat" rows="3" class="form-control"><?php echo $population->alamat; ?></textarea>
						<p class="help-block"><?php echo form_error('alamat', '<small class="text-blue">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="name" class="control-label col-md-3">RT / RW : <strong class="text-blue">*</strong></label>
					<div class="col-md-2">
						<input type="text" name="rt" class="form-control" value="<?php echo $population->rt; ?>">
						<p class="help-block"><?php echo form_error('rt', '<small class="text-blue">', '</small>'); ?></p>
					</div>
					<div class="col-md-2">
						<input type="text" name="rw" class="form-control" value="<?php echo $population->rw; ?>">
						<p class="help-block"><?php echo form_error('rw', '<small class="text-blue">', '</small>'); ?></p>
					</div>
				</div>

				<div class="form-group">
					<label for="provinsi" class="control-label col-md-3 col-xs-12">Provinsi : <strong class="text-blue">*</strong></label>
					<div class="col-md-6">
						<select name="provinsi" id="provinsi" class="form-control select2">
							<option value="0">-- PILIH --</option>
							<?php foreach ($provinsi as $key => $value): ?>

                                <option value="<?php echo $value->id; ?>" <?php if($population->province==$value->id) echo "selected"; ?>><?php echo $value->name; ?></option>
                            <?php endforeach;?>
					
						</select>
						<p class="help-block"><?php echo form_error('provinsi', '<small class="text-blue">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="kabupaten" class="control-label col-md-3 col-xs-12">Kabupaten/kota : <strong class="text-blue">*</strong></label>
					<div class="col-md-6">
						<select name="kabupaten" id="kabupaten-kota" class="form-control select2">
							<option value="0">-- PILIH --</option>
							<option value="<?php echo $population->regency; ?>" <?php if($population->regency==$population->regency) echo "selected"; ?>><?php echo $this->population->get_nama_kabupaten($population->regency)->name; ?></option>
						</select>
						<p class="help-block"><?php echo form_error('kabupaten', '<small class="text-blue">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="kecamatan" class="control-label col-md-3 col-xs-12">Kecamatan : <strong class="text-blue">*</strong></label>
					<div class="col-md-6">
						<select name="kecamatan" id="kecamatan" class="form-control select2">
							<option value="0">-- PILIH --</option>
							<option value="<?php echo $population->district; ?>" <?php if($population->district==$population->district) echo "selected"; ?>><?php echo $this->population->get_nama_kecamatan($population->district)->name; ?></option>
						</select>
						<p class="help-block"><?php echo form_error('kecamatan', '<small class="text-blue">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="kelurahan" class="control-label col-md-3 col-xs-12">Kelurahan/Desa : <strong class="text-blue">*</strong></label>
					<div class="col-md-6">
						<select name="kelurahan" id="kelurahan-desa" class="form-control select2">
							<option value="0">-- PILIH --</option>
							<option value="<?php echo $population->village; ?>" <?php if($population->village==$population->village) echo "selected"; ?>><?php echo $this->population->get_nama_desa($population->village)->name; ?></option>
						</select>
						<p class="help-block"><?php echo form_error('kelurahan', '<small class="text-blue">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="telepon" class="control-label col-md-3 col-xs-12">Telepon : <strong class="text-primary">*</strong></label>
					<div class="col-md-6">
						<input type="text" name="telepon" class="form-control" value="<?php echo $population->telepon; ?>">
						<p class="help-block"><?php echo form_error('telepon', '<small class="text-blue">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="telepon" class="control-label col-md-3 col-xs-12">Kode Pos : <strong class="text-blue">*</strong></label>
					<div class="col-md-6">
						<input type="number" name="kd_pos" class="form-control" value="<?php echo $population->kd_pos; ?>">
						<p class="help-block"><?php echo form_error('kd_pos', '<small class="text-blue">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="jml_keluarga" class="control-label col-md-3 col-xs-12">Jumlah KK dlm Keluarga : <strong class="text-blue">*</strong></label>
					<div class="col-md-6">
						<input type="number" name="jml_keluarga" class="form-control" value="<?php echo $population->jml_keluarga; ?>">
						<p class="help-block"><?php echo form_error('jml_keluarga', '<small class="text-blue">', '</small>'); ?></p>
					</div>
				</div>
				<div class="form-group">
					<label for="penghasilan" class="control-label col-md-3 col-xs-12">Penghasilan : <strong class="text-blue">*</strong></label>
					<div class="col-md-6">
						<input type="text" name="penghasilan" class="form-control" value="<?php echo $population->penghasilan; ?>">
						<p class="help-block"><?php echo form_error('penghasilan', '<small class="text-blue">', '</small>'); ?></p>
					</div>
				</div>
			</div>

			<div class="box-footer with-border">
				<div class="col-md-4 col-xs-5">
					<a href="<?php echo site_url('population') ?>" class="btn btn-app pull-right">
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

<script>
	$(function(){

		$.ajaxSetup({
		type:"POST",
		url: "<?php echo base_url('index.php/population/ambil_data') ?>",
		cache: false,
		});

		$("#provinsi").change(function(){

		var value=$(this).val();
		if(value>0){
		$.ajax({
		data:{modul:'kabupaten',id:value},
		success: function(respond){
		$("#kabupaten-kota").html(respond);
		}
		})
		}

		});


		$("#kabupaten-kota").change(function(){
		var value=$(this).val();
		if(value>0){
		$.ajax({
		data:{modul:'kecamatan',id:value},
		success: function(respond){
		$("#kecamatan").html(respond);
		}
		})
		}
		})

		$("#kecamatan").change(function(){
		var value=$(this).val();
		if(value>0){
		$.ajax({
		data:{modul:'kelurahan',id:value},
		success: function(respond){
		$("#kelurahan-desa").html(respond);
		}
		})
		} 
		})
	})
</script>