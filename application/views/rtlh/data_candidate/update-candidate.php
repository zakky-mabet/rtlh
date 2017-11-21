<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12 col-xs-12">
		<div class="box box-primary">
            <div class="box-header with-border">
              	<h3 class="box-title"><?php echo $title; ?> </h3>
            </div>

			<div class="box-body" style="margin-top: 10px;">
				<div class="col-md-10 col-md-offset-1">
						<section >
				        <div class="wizard">

				            <div class="wizard-inner">
				                <div class="connecting-line"></div>
				                <ul class="nav nav-tabs" role="tablist">

				                    <li role="presentation" class="active">
				                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Data Calon Penerima">
				                            <span class="round-tab">
				                                <i class="glyphicon glyphicon-user"></i>
				                            </span>
				                        </a>
				                    </li>

				                    <li role="presentation" class="disabled">
				                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Data Tanah">
				                            <span class="round-tab">
				                                <i class="glyphicon glyphicon-map-marker"></i>
				                            </span>
				                        </a>
				                    </li>
				                    <li role="presentation" class="disabled">
				                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Data Rumah">
				                            <span class="round-tab">
				                                <i class="glyphicon glyphicon-home"></i>
				                            </span>
				                        </a>
				                    </li>

				                    <li role="presentation" class="disabled">
				                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Data Fasilitas Rumah">
				                            <span class="round-tab">
				                                <i class="glyphicon glyphicon-th "></i>
				                            </span>
				                        </a>
				                    </li>
				                </ul>

				            </div>

				            <?php  
							/**
							 * Open Form
							 *
							 * @var string
							 **/
							echo form_open(site_url('data_candidate/ubah/'.$param), array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'));

							?>
				                <div class="tab-content">

				                    <div class="tab-pane active" role="tabpanel" id="step1">
				                        <h3 style="margin-top: -28px; color: #5BBFDD;"><i class="glyphicon glyphicon-user"></i> Data Calon Penerima <small>(Penduduk)</small></h3>
				                        <hr>

				                        <div class="box-body with-border">
				                        	<div class="form-group">
												<label for="nik" class="control-label col-md-3 col-xs-12">NIK : <strong class="text-red">*</strong></label>
												<div class="col-md-4">
													<input type="number" disabled  class="form-control" value="<?php echo $data_candidate->nik; ?>" >
													<input type="hidden" name="nik"  class="form-control" value="<?php echo $data_candidate->nik; ?>" >
												</div>
											</div>
											<div class="form-group">
												<label for="no_kk" class="control-label col-md-3 col-xs-12">No. KK : <strong class="text-blue">*</strong></label>
												<div class="col-md-4">
													<input type="number"  class="form-control" value="<?php echo $data_candidate->no_kk; ?>" disabled>
												</div>
											</div>
											<div class="form-group">
												<label for="name" class="control-label col-md-3 col-xs-12">Nama : <strong class="text-red">*</strong></label>
												<div class="col-md-8">
													<input id="inputError"type="text" class="form-control" value="<?php echo $data_candidate->nama_lengkap; ?>" disabled>
													<input id="inputError" name="nama_lengkap" type="hidden" class="form-control" value="<?php echo $data_candidate->nama_lengkap; ?>" >
												</div>
											</div>
											<div class="form-group">
												<label for="status_kk" class="control-label col-md-3">Status KK : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
											       	<div class="radio radio-inline radio-primary">
											           <input name="status_kk" type="radio" value="kepala keluarga" <?php if($data_candidate->status_kk=='kepala keluarga') echo "checked"; ?> disabled> <label for="status_kk"> Kepala Keluarga</label>
											       	</div>
											       	<div class="radio radio-inline radio-primary">
											           <input name="status_kk" type="radio" value="istri" <?php if($data_candidate->status_kk=='istri') echo "checked"; ?> disabled> <label for="status_kk"> Istri</label>
											       	</div>
											       	<div class="radio radio-inline radio-primary">
											           <input name="status_kk" type="radio" value="anak" <?php if($data_candidate->status_kk=='anak') echo "checked"; ?> disabled> <label for="status_kk"> Anak</label>
											       	</div>
											       	<div class="radio radio-inline radio-primary">
											           <input name="status_kk" type="radio" value="ayah" <?php if($data_candidate->status_kk=='ayah') echo "checked"; ?> disabled> <label for="status_kk"> Ayah</label>
											       	</div>
											       	<div class="radio radio-inline radio-primary">
											           <input name="status_kk" type="radio" value="ibu" <?php if($data_candidate->status_kk=='ibu') echo "checked"; ?> disabled> <label for="status_kk" > Ibu</label>
											       	</div>
											       	
												</div>
											</div>
											
											<div class="form-group">
												<label for="tmp_lahir" class="control-label col-md-3 col-xs-12">Tempat, Tanggal Lahir : <strong class="text-blue">*</strong></label>
												<div class="col-md-4">
													<input type="text" name="tmp_lahir" class="form-control" value="<?php echo $data_candidate->tmp_lahir ?>" disabled>
												</div>
												<div class="col-md-4">
												  	<div class="input-group">
												    	<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
												    	<input type="text" class="form-control" name="birts" id="datepicker" value="<?php echo$data_candidate->tgl_lahir; ?>" disabled>
												  	</div>
												</div>
											</div>
											<div class="form-group">
												<label for="gender" class="control-label col-md-3">Jenis Kelamin : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
											       	<div class="radio radio-inline radio-primary">
											           <input name="gender" type="radio" value="LAKI-LAKI" <?php if($data_candidate->jns_kelamin=='LAKI-LAKI') echo "checked"; ?> disabled> <label for="gender"> Laki-laki</label>
											       	</div>
											       	<div class="radio radio-inline radio-primary">
											           <input name="gender" type="radio" value="PEREMPUAN" <?php if($data_candidate->jns_kelamin=='PEREMPUAN') echo "checked"; ?> disabled> <label for="gender"> Perempuan</label>
											       	</div>
											       	<p class="help-block"><?php echo form_error('gender', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="agama" class="control-label col-md-3 col-xs-12">Agama : <strong class="text-blue">*</strong></label>
												<div class="col-md-4">
													<input type="text" name="agama" class="form-control" value="<?php echo ucwords( $data_candidate->agama) ?>" disabled>
												</div>
											</div>
											<div class="form-group">
												<label for="name" class="control-label col-md-3">Status Perkawinan : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
											       	<div class="radio radio-inline radio-primary">
											           <input name="status_kawin" type="radio" value="belum kawin" <?php if($data_candidate->status_kawin=='belum kawin') echo "checked"; ?> disabled> <label> Belum Kawin</label>
											       	</div>
											       	<div class="radio radio-inline radio-primary">
											           <input name="status_kawin" type="radio" value="kawin" <?php if($data_candidate->status_kawin=='kawin') echo "checked"; ?> disabled> <label> Kawin</label>
											       	</div>
											       	<div class="radio radio-inline radio-primary">
											           <input name="status_kawin" type="radio" value="cerai hidup" <?php if($data_candidate->status_kawin=='cerai hidup') echo "checked"; ?> disabled> <label> Cerai Hidup</label>
											       	</div>
											       	<div class="radio radio-inline radio-primary">
											           <input name="status_kawin" type="radio" value="cerai mati" <?php if($data_candidate->status_kawin=='cerai mati') echo "checked"; ?> disabled> <label> Cerai Mati</label>
											       	</div>
											       
												</div>
											</div>
											<div class="form-group">
												<label for="name" class="control-label col-md-3">Kewarganegaraaan : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
											       	<div class="radio radio-primary">
											           <input name="kewarganegaraan" type="radio" value="wni" <?php if($data_candidate->kewarganegaraan=='wni') echo "checked"; ?> disabled> <label for="kewarganegaraan"> WNI (Warga Negara Indonesia)</label>
											       	</div>
											       	<div class="radio radio-primary">
											           <input name="kewarganegaraan" type="radio" value="wna" <?php if($data_candidate->status_kawin=='wna') echo "checked"; ?> disabled> <label for="kewarganegaraan"> WNA (Warga Negara Asing)</label>
											       	</div>
											       
												</div>
											</div>
											<div class="form-group">
												<label for="pekerjaan" class="control-label col-md-3 col-xs-12">Pekerjaan : <strong class="text-blue">*</strong></label>
												<div class="col-md-8">
													<input type="text" name="pekerjaan" class="form-control" value="<?php echo $data_candidate->pekerjaan ?>" disabled>
													
												</div>
											</div>
											<div class="form-group">
												<label for="gol_darah" class="control-label col-md-3 col-xs-12">Golongan Darah : <strong class="text-blue">*</strong></label>
												<div class="col-md-3">
													<input type="text" name="gol_darah" class="form-control" value="<?php echo $data_candidate->gol_darah ?>" disabled>
												</div>
											</div>
											<div class="form-group">
												<label for="alamat" class="control-label col-md-3">Alamat : <strong class="text-blue">*</strong></label>
												<div class="col-md-8">
													<textarea disabled name="alamat" rows="3" class="form-control"><?php echo $data_candidate->alamat ?></textarea>
													
												</div>
											</div>
											<div class="form-group">
												<label for="name" class="control-label col-md-3">RT / RW : <strong class="text-blue">*</strong></label>
												<div class="col-md-2">
													<input type="number" name="rt" class="form-control" value="<?php echo $data_candidate->rt ?>" disabled>
													
												</div>
												<div class="col-md-2">
													<input type="number" name="rw" class="form-control" value="<?php echo $data_candidate->rw ?>" disabled>
													
												</div>
											</div>
											<div class="form-group">
												<label for="provinsi" class="control-label col-md-3 col-xs-12">Provinsi : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="provinsi" class="form-control" value="<?php echo $this->candidate->get_nama_provinsi($data_candidate->province)->name; ?>" disabled>
												</div>
											</div>
											<div class="form-group">
												<label for="kabupaten" class="control-label col-md-3 col-xs-12">Kabupaten/kota : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="kabupaten" class="form-control" value="<?php echo $this->candidate->get_nama_kabupaten($data_candidate->regency)->name; ?>" disabled>
												</div>
											</div>
											<div class="form-group">
												<label for="kecamatan" class="control-label col-md-3 col-xs-12">Kecamatan : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="kecamatan" class="form-control" value="<?php echo $this->candidate->get_nama_kecamatan($data_candidate->district)->name; ?>" disabled>
												</div>
											</div>
											<div class="form-group">
												<label for="kelurahan" class="control-label col-md-3 col-xs-12">Kelurahan/Desa : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="provinsi" class="form-control" value="<?php echo $this->candidate->get_nama_desa($data_candidate->village)->name; ?>" disabled>
												</div>
											</div>
											<div class="form-group">
												<label for="telepon" class="control-label col-md-3 col-xs-12">Telepon : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="telepon" class="form-control" value="<?php echo $data_candidate->telepon ?>" disabled>
													
												</div>
											</div>
											<div class="form-group">
												<label for="telepon" class="control-label col-md-3 col-xs-12">Kode Pos : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="number" name="kd_pos" class="form-control" value="<?php echo $data_candidate->kd_pos ?>" disabled>
													
												</div>
											</div>
											<div class="form-group">
												<label for="jml_keluarga" class="control-label col-md-3 col-xs-12">Jumlah KK dlm Keluarga : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="number" name="jml_keluarga" class="form-control" value="<?php echo $data_candidate->jml_keluarga; ?>" disabled>
													
												</div>
											</div>
											<div class="form-group">
												<label for="penghasilan" class="control-label col-md-3 col-xs-12">Penghasilan : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="penghasilan" class="form-control" value="<?php echo $data_candidate->penghasilan; ?>" disabled>
													
												</div>
											</div>

					                        
				                    	</div>

				                        

										<div class="box-footer with-border">
											<div class="col-md-4 col-xs-5">
												
											</div>
											<div class="col-md-6 col-xs-6">
												<button type="button" class="btn btn-app pull-right next-step">
													<i class="fa fa-arrow-right"></i> Selanjutnya
												</button>
											</div>
										</div>
										<div class="box-footer with-border">
												<small><strong class="text-red">*</strong>	Field wajib diisi!</small> <br>
												<small><strong class="text-blue">*</strong>	Field Optional</small> <br>

										</div>
				                    </div>


				                    <div class="tab-pane" role="tabpanel" id="step2">
				                        <h3 style="margin-top: -28px; color: #5BBFDD;"><i class="glyphicon glyphicon-map-marker"></i> Data Tanah</h3>
				                        <hr>

				                         <div class="box-body with-border">
				                        	<div class="form-group">
												<label for="no_sertifikat" class="control-label col-md-3 col-xs-12">No Sertifikat : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="no_sertifikat"  class="form-control" value="<?php echo $tanah->no_sertifikat; ?>">
													<p class="help-block"><?php echo form_error('no_sertifikat', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="panjang" class="control-label col-md-3 col-xs-12">Panjang : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<div class="input-group">
													<input type="number" name="panjang" id="panjang" class="form-control" value="<?php echo $tanah->panjang; ?>" onchange="total()"> <span class="input-group-addon">M<sup>2</sup></span> </div>
													<p class="help-block"><?php echo form_error('panjang', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="lebar" class="control-label col-md-3 col-xs-12">Lebar : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<div class="input-group">
													<input type="number" name="lebar" id="lebar" class="form-control" value="<?php echo $tanah->lebar; ?>" onchange="total()"> <span class="input-group-addon">M<sup>2</sup></span> </div>
													<p class="help-block"><?php echo form_error('lebar', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="luas" class="control-label col-md-3 col-xs-12">Luas : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<div class="input-group">
													<input type="number" name="luas" disabled id="luas" onchange="total()"  class="form-control" value=""> <span class="input-group-addon">M<sup>2</sup></span> </div>
													<p class="help-block"><?php echo form_error('luas', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="status_kepemilikan_tanah" class="control-label col-md-3 col-xs-12">Status Kepemilikan : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="status_kepemilikan_tanah"  class="form-control" value="<?php echo $tanah->status_kepemilikan_tanah ?>">
													<p class="help-block"><?php echo form_error('status_kepemilikan_tanah', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>

											<div class="form-group">
												<label for="latitude" class="control-label col-md-3 col-xs-12">	Latitude : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<div class="input-group">
													<input type="text" name="latitude" class="form-control" value="<?php echo $tanah->latitude ?>"> <span class="input-group-addon"><i class="fa fa-map-pin"></i></span> </div>
													<p class="help-block"><?php echo form_error('latitude', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>

											<div class="form-group">
												<label for="longitude" class="control-label col-md-3 col-xs-12">Longitude : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<div class="input-group">
													<input type="text" name="longitude"   class="form-control" value="<?php echo $tanah->longitude ?>"> <span class="input-group-addon"><i class="fa fa-map-pin"></i></span> </div>
													<p class="help-block"><?php echo form_error('longitude', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>


										</div>

										<div class="box-footer with-border">
											<div class="col-md-4 col-xs-5">
												<button type="button" class="btn btn-app pull-right prev-step">
													<i class="fa fa-arrow-left"></i> Sebelumnya
												</button>
											</div>
											<div class="col-md-6 col-xs-6">
												<button type="button" class="btn btn-app pull-right next-step">
													<i class="fa fa-arrow-right"></i> Selanjutnya
												</button>
											</div>
										</div>
										<div class="box-footer with-border">
												<small><strong class="text-red">*</strong>	Field wajib diisi!</small> <br>
												<small><strong class="text-blue">*</strong>	Field Optional</small>
										</div>

	
				                    </div>


				                    <div class="tab-pane" role="tabpanel" id="step3">
				                        <h3 style="margin-top: -28px; color: #5BBFDD;"><i class="glyphicon glyphicon-home"></i> Data Rumah</h3>
				                        <hr>

				                         <div class="box-body with-border">
				                         	<div class="form-group">
												<label for="luas_m2" class="control-label col-md-3 col-xs-12">Luas : <strong class="text-blue">*</strong></label>
												<div class="col-md-4">
													<div class="input-group">
													<input type="number" name="luas_m2"  class="form-control" value="<?php echo $rumah->luas_m2 ?>"> <span class="input-group-addon">M<sup>2</sup></span> </div>
													<p class="help-block"><?php echo form_error('luas_m2', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
				                        	<div class="form-group">
												<label for="status_kepemilikan_rumah" class="control-label col-md-3 col-xs-12">Status Kepemilikan : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="status_kepemilikan_rumah"  class="form-control" value="<?php echo $rumah->status_kepemilikan_rumah ?>">
													<p class="help-block"><?php echo form_error('status_kepemilikan_rumah', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>

											<div class="form-group">
												<label for="jml_penghuni" class="control-label col-md-3 col-xs-12">Jumlah Penguhuni : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="number" name="jml_penghuni"  class="form-control" value="<?php echo $rumah->jml_penghuni ?>">
													<p class="help-block"><?php echo form_error('jml_penghuni', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="pondasi" class="control-label col-md-3 col-xs-12">Pondasi : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="pondasi"  class="form-control" value="<?php echo $rumah->pondasi ?>">
													<p class="help-block"><?php echo form_error('pondasi', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="kolom_balok" class="control-label col-md-3 col-xs-12">Kolom Balok : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="kolom_balok"  class="form-control" value="<?php echo $rumah->kolom_balok ?>">
													<p class="help-block"><?php echo form_error('kolom_balok', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="kondisi_atap" class="control-label col-md-3 col-xs-12">Kondisi Atap : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="kondisi_atap"  class="form-control" value="<?php echo $rumah->kondisi_atap ?>">
													<p class="help-block"><?php echo form_error('kondisi_atap', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="foto" class="control-label col-md-3 col-xs-12">Foto Rumah : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="file" name="foto" class="form-control" >
												
												</div>
											</div>

										</div>

										<div class="box-footer with-border">
											<div class="col-md-4 col-xs-5">
												<button type="button" class="btn btn-app pull-right prev-step">
													<i class="fa fa-arrow-left"></i> Sebelumnya
												</button>
											</div>
											<div class="col-md-6 col-xs-6">
												<button type="button" class="btn btn-app pull-right next-step">
													<i class="fa fa-arrow-right"></i> Selanjutnya
												</button>
											</div>
										</div>
										<div class="box-footer with-border">
												<small><strong class="text-red">*</strong>	Field wajib diisi!</small> <br>
												<small><strong class="text-blue">*</strong>	Field Optional</small>
										</div>
				                    </div>

				                    <div class="tab-pane" role="tabpanel" id="complete">
				                        <h3 style="margin-top: -28px; color: #5BBFDD;"><i class="glyphicon glyphicon-th"></i> Data Fasilitas Rumah</h3>
				                        <hr>

				                         <div class="box-body with-border">
				                         	<div class="form-group">
												<label for="jendela_lubang_cahaya" class="control-label col-md-3 col-xs-12">Jendela Lubang Cahaya : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="jendela_lubang_cahaya"  class="form-control" value="<?php echo $fasilitas_rumah->jendela_lubang_cahaya ?>"> 
													<p class="help-block"><?php echo form_error('jendela_lubang_cahaya', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="fentilasi" class="control-label col-md-3 col-xs-12">Fentilasi : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="fentilasi"  class="form-control" value="<?php echo $fasilitas_rumah->fentilasi ?>"> 
													<p class="help-block"><?php echo form_error('fentilasi', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="kamar_mandi" class="control-label col-md-3 col-xs-12">Kamar Mandi : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="kamar_mandi"  class="form-control" value="<?php echo $fasilitas_rumah->kamar_mandi ?>"> 
													<p class="help-block"><?php echo form_error('kamar_mandi', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="sumber_air_minum" class="control-label col-md-3 col-xs-12">Sumber Air Minum : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="sumber_air_minum"  class="form-control" value="<?php echo $fasilitas_rumah->sumber_air_minum ?>"> 
													<p class="help-block"><?php echo form_error('sumber_air_minum', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="jarak_sumber_air_ke_wc" class="control-label col-md-3 col-xs-12">Jarak Sumber Air Ke WC : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="jarak_sumber_air_ke_wc"  class="form-control" value="<?php echo $fasilitas_rumah->jarak_sumber_air_ke_wc ?>"> 
													<p class="help-block"><?php echo form_error('jarak_sumber_air_ke_wc', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="sumber_utama_penerangan" class="control-label col-md-3 col-xs-12">Sumber Utama Penerangan : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="sumber_utama_penerangan"  class="form-control" value="<?php echo $fasilitas_rumah->sumber_utama_penerangan ?>"> 
													<p class="help-block"><?php echo form_error('sumber_utama_penerangan', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
				                        	
										</div>

										<div class="box-footer with-border">
											<div class="col-md-4 col-xs-5">
												<button type="button" class="btn btn-app pull-right prev-step">
													<i class="fa fa-arrow-left"></i> Sebelumnya
												</button>
											</div>
											<div class="col-md-6 col-xs-6">
												<button type="submit" class="btn btn-app bg-green pull-right">
													<i class="fa fa-save"></i> Simpan
												</button>
											</div>
										</div>
										<div class="box-footer with-border">
												<small><strong class="text-red">*</strong>	Field wajib diisi!</small> <br>
												<small><strong class="text-blue">*</strong>	Field Optional</small>
										</div>
				                    </div>

				                    <div class="clearfix"></div>
				                </div>
				            <?php  
							// End Form
							echo form_close();
							?>
				        </div>
				    </section>
				   </div>
			</div>

			

		</div>
	</div>
</div>