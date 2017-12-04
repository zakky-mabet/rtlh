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
				                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Data Penduduk">
				                            <span class="round-tab">
				                                <i class="glyphicon glyphicon-user"></i>
				                            </span>
				                        </a>
				                    </li>

				                    <li role="presentation" class="disabled">
				                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Data Dana Bantuan">
				                            <span class="round-tab">
				                                <i class="glyphicon glyphicon-usd"></i>
				                            </span>
				                        </a>
				                    </li>
				                    <li role="presentation" class="disabled">
				                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Data Aspek Bantuan">
				                            <span class="round-tab">
				                                <i class="glyphicon glyphicon-home"></i>
				                            </span>
				                        </a>
				                    </li>

				                    <li role="presentation" class="disabled">
				                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Data Realisasi Bantuan">
				                            <span class="round-tab">
				                                <i class="glyphicon glyphicon-retweet "></i>
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
							echo form_open(current_url(), array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'));

							?>
				                <div class="tab-content">

				                    <div class="tab-pane active" role="tabpanel" id="step1">
				                        <h3 style="margin-top: -28px; color: #5BBFDD;"><i class="glyphicon glyphicon-user"></i> Data Calon Penerima <small>(Penduduk)</small></h3>
				                        <hr>

				                        <div class="box-body with-border">
				                        	<div class="form-group">
												<label for="nik" class="control-label col-md-3 col-xs-12">NIK : <strong class="text-red">*</strong></label>
												<div class="col-md-4">
													<input type="number" disabled  class="form-control" value="<?php echo $penduduk->nik; ?>" >
													<input type="hidden" name="nik"  class="form-control" value="<?php echo $penduduk->nik; ?>" >
												</div>
											</div>
											<div class="form-group">
												<label for="no_kk" class="control-label col-md-3 col-xs-12">No. KK : <strong class="text-blue">*</strong></label>
												<div class="col-md-4">
													<input type="number"  class="form-control" value="<?php echo $penduduk->no_kk; ?>" disabled>
												</div>
											</div>
											<div class="form-group">
												<label for="name" class="control-label col-md-3 col-xs-12">Nama : <strong class="text-red">*</strong></label>
												<div class="col-md-8">
													<input id="inputError"type="text" class="form-control" value="<?php echo $penduduk->nama_lengkap; ?>" disabled>
													<input id="inputError" name="nama_lengkap" type="hidden" class="form-control" value="<?php echo $penduduk->nama_lengkap; ?>" >
												</div>
											</div>
											<div class="form-group">
												<label for="status_kk" class="control-label col-md-3">Status KK : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
											       	<div class="radio radio-inline radio-primary">
											           <input name="status_kk" type="radio" value="kepala keluarga" <?php if($penduduk->status_kk=='kepala keluarga') echo "checked"; ?> disabled> <label for="status_kk"> Kepala Keluarga</label>
											       	</div>
											       	<div class="radio radio-inline radio-primary">
											           <input name="status_kk" type="radio" value="istri" <?php if($penduduk->status_kk=='istri') echo "checked"; ?> disabled> <label for="status_kk"> Istri</label>
											       	</div>
											       	<div class="radio radio-inline radio-primary">
											           <input name="status_kk" type="radio" value="anak" <?php if($penduduk->status_kk=='anak') echo "checked"; ?> disabled> <label for="status_kk"> Anak</label>
											       	</div>
											       	<div class="radio radio-inline radio-primary">
											           <input name="status_kk" type="radio" value="ayah" <?php if($penduduk->status_kk=='ayah') echo "checked"; ?> disabled> <label for="status_kk"> Ayah</label>
											       	</div>
											       	<div class="radio radio-inline radio-primary">
											           <input name="status_kk" type="radio" value="ibu" <?php if($penduduk->status_kk=='ibu') echo "checked"; ?> disabled> <label for="status_kk" > Ibu</label>
											       	</div>
											       	
												</div>
											</div>
											
											<div class="form-group">
												<label for="tmp_lahir" class="control-label col-md-3 col-xs-12">Tempat, Tanggal Lahir : <strong class="text-blue">*</strong></label>
												<div class="col-md-4">
													<input type="text" name="tmp_lahir" class="form-control" value="<?php echo $penduduk->tmp_lahir ?>" disabled>
												</div>
												<div class="col-md-4">
												  	<div class="input-group">
												    	<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
												    	<input type="text" class="form-control" name="birts" id="datepicker" value="<?php echo$penduduk->tgl_lahir; ?>" disabled>
												  	</div>
												</div>
											</div>
											<div class="form-group">
												<label for="gender" class="control-label col-md-3">Jenis Kelamin : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
											       	<div class="radio radio-inline radio-primary">
											           <input name="gender" type="radio" value="LAKI-LAKI" <?php if($penduduk->jns_kelamin=='LAKI-LAKI') echo "checked"; ?> disabled> <label for="gender"> Laki-laki</label>
											       	</div>
											       	<div class="radio radio-inline radio-primary">
											           <input name="gender" type="radio" value="PEREMPUAN" <?php if($penduduk->jns_kelamin=='PEREMPUAN') echo "checked"; ?> disabled> <label for="gender"> Perempuan</label>
											       	</div>
											       	<p class="help-block"><?php echo form_error('gender', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="agama" class="control-label col-md-3 col-xs-12">Agama : <strong class="text-blue">*</strong></label>
												<div class="col-md-4">
													<input type="text" name="agama" class="form-control" value="<?php echo ucwords( $penduduk->agama) ?>" disabled>
												</div>
											</div>
											<div class="form-group">
												<label for="name" class="control-label col-md-3">Status Perkawinan : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
											       	<div class="radio radio-inline radio-primary">
											           <input name="status_kawin" type="radio" value="belum kawin" <?php if($penduduk->status_kawin=='belum kawin') echo "checked"; ?> disabled> <label> Belum Kawin</label>
											       	</div>
											       	<div class="radio radio-inline radio-primary">
											           <input name="status_kawin" type="radio" value="kawin" <?php if($penduduk->status_kawin=='kawin') echo "checked"; ?> disabled> <label> Kawin</label>
											       	</div>
											       	<div class="radio radio-inline radio-primary">
											           <input name="status_kawin" type="radio" value="cerai hidup" <?php if($penduduk->status_kawin=='cerai hidup') echo "checked"; ?> disabled> <label> Cerai Hidup</label>
											       	</div>
											       	<div class="radio radio-inline radio-primary">
											           <input name="status_kawin" type="radio" value="cerai mati" <?php if($penduduk->status_kawin=='cerai mati') echo "checked"; ?> disabled> <label> Cerai Mati</label>
											       	</div>
											       
												</div>
											</div>
											<div class="form-group">
												<label for="name" class="control-label col-md-3">Kewarganegaraaan : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
											       	<div class="radio radio-primary">
											           <input name="kewarganegaraan" type="radio" value="wni" <?php if($penduduk->kewarganegaraan=='wni') echo "checked"; ?> disabled> <label for="kewarganegaraan"> WNI (Warga Negara Indonesia)</label>
											       	</div>
											       	<div class="radio radio-primary">
											           <input name="kewarganegaraan" type="radio" value="wna" <?php if($penduduk->status_kawin=='wna') echo "checked"; ?> disabled> <label for="kewarganegaraan"> WNA (Warga Negara Asing)</label>
											       	</div>
											       
												</div>
											</div>
											<div class="form-group">
												<label for="pekerjaan" class="control-label col-md-3 col-xs-12">Pekerjaan : <strong class="text-blue">*</strong></label>
												<div class="col-md-8">
													<input type="text" name="pekerjaan" class="form-control" value="<?php echo $penduduk->pekerjaan ?>" disabled>
													
												</div>
											</div>
											<div class="form-group">
												<label for="gol_darah" class="control-label col-md-3 col-xs-12">Golongan Darah : <strong class="text-blue">*</strong></label>
												<div class="col-md-3">
													<input type="text" name="gol_darah" class="form-control" value="<?php echo $penduduk->gol_darah ?>" disabled>
												</div>
											</div>
											<div class="form-group">
												<label for="alamat" class="control-label col-md-3">Alamat : <strong class="text-blue">*</strong></label>
												<div class="col-md-8">
													<textarea disabled name="alamat" rows="3" class="form-control"><?php echo $penduduk->alamat ?></textarea>
													
												</div>
											</div>
											<div class="form-group">
												<label for="name" class="control-label col-md-3">RT / RW : <strong class="text-blue">*</strong></label>
												<div class="col-md-2">
													<input type="number" name="rt" class="form-control" value="<?php echo $penduduk->rt ?>" disabled>
													
												</div>
												<div class="col-md-2">
													<input type="number" name="rw" class="form-control" value="<?php echo $penduduk->rw ?>" disabled>
													
												</div>
											</div>
											<div class="form-group">
												<label for="provinsi" class="control-label col-md-3 col-xs-12">Provinsi : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="provinsi" class="form-control" value="<?php echo $this->penerima->get_nama_provinsi($penduduk->province)->name; ?>" disabled>
												</div>
											</div>
											<div class="form-group">
												<label for="kabupaten" class="control-label col-md-3 col-xs-12">Kabupaten/kota : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="kabupaten" class="form-control" value="<?php echo $this->penerima->get_nama_kabupaten($penduduk->regency)->name; ?>" disabled>
												</div>
											</div>
											<div class="form-group">
												<label for="kecamatan" class="control-label col-md-3 col-xs-12">Kecamatan : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="kecamatan" class="form-control" value="<?php echo $this->penerima->get_nama_kecamatan($penduduk->district)->name; ?>" disabled>
												</div>
											</div>
											<div class="form-group">
												<label for="kelurahan" class="control-label col-md-3 col-xs-12">Kelurahan/Desa : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="provinsi" class="form-control" value="<?php echo $this->penerima->get_nama_desa($penduduk->village)->name; ?>" disabled>
												</div>
											</div>
											<div class="form-group">
												<label for="telepon" class="control-label col-md-3 col-xs-12">Telepon : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="telepon" class="form-control" value="<?php echo $penduduk->telepon ?>" disabled>
													
												</div>
											</div>
											<div class="form-group">
												<label for="telepon" class="control-label col-md-3 col-xs-12">Kode Pos : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="number" name="kd_pos" class="form-control" value="<?php echo $penduduk->kd_pos ?>" disabled>
													
												</div>
											</div>
											<div class="form-group">
												<label for="jml_keluarga" class="control-label col-md-3 col-xs-12">Jumlah KK dlm Keluarga : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="number" name="jml_keluarga" class="form-control" value="<?php echo $penduduk->jml_keluarga; ?>" disabled>
													
												</div>
											</div>
											<div class="form-group">
												<label for="penghasilan" class="control-label col-md-3 col-xs-12">Penghasilan : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="penghasilan" class="form-control" value="<?php echo $penduduk->penghasilan; ?>" disabled>
													
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
				                        <h3 style="margin-top: -28px; color: #5BBFDD;"><i class="glyphicon glyphicon-usd"></i> Dana Bantuan</h3>
				                        <hr>

				                         <div class="box-body with-border">
				                        	<div class="form-group">
												<label for="jenis" class="control-label col-md-3 col-xs-12">Jenis : <strong class="text-red">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="jenis"  class="form-control" value="<?php echo set_value('jenis'); ?>">
													<p class="help-block"><?php echo form_error('jenis', '<small class="text-red">', '</small>'); ?></p>
												</div>
											</div>

											<div class="form-group">
												<label for="tahun_anggaran" class="control-label col-md-3 col-xs-12">Tahun Anggaran : <strong class="text-red">*</strong></label>
												<div class="col-md-6">
													<input type="number" name="tahun_anggaran" maxlength="4"  class="form-control" value="<?php echo set_value('tahun_anggaran'); ?>">
													<p class="help-block"><?php echo form_error('tahun_anggaran', '<small class="text-red">', '</small>'); ?></p>
												</div>
											</div>

											<div class="form-group">
												<label for="nilai" class="control-label col-md-3 col-xs-12">Nilai : <strong class="text-red">*</strong></label>
												<div class="col-md-6">
													<input type="number" name="nilai"  class="form-control" id="rupiah" value="<?php echo set_value('nilai'); ?>">
													<p class="help-block"><?php echo form_error('nilai', '<small class="text-red">', '</small>'); ?></p>
												</div>
											</div>

											<div class="form-group">
												<label for="sumber_anggaran" class="control-label col-md-3 col-xs-12">Sumber Anggaran : <strong class="text-red">*</strong></label>
												<div class="col-md-6">
													<select name="sumber_anggaran" class="form-control select2">
														<option value="">-- PILIH --</option>
														<option value="APBD">APBD
														<option value="APBD1">APBD 1
														<option value="CSR">CSR
														<option value="Lainnya">Lainnya
													</select>
													<p class="help-block"><?php echo form_error('sumber_anggaran', '<small class="text-red">', '</small>'); ?></p>
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
				                        <h3 style="margin-top: -28px; color: #5BBFDD;"><i class="glyphicon glyphicon-home"></i> Aspek Bantuan</h3>
				                        <hr>

				                         <div class="box-body with-border">
				                         	
				                        	<div class="form-group">
												<label for="rehab_atap" class="control-label col-md-3 col-xs-12">Rehab Atap : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="rehab_atap"  class="form-control" value="<?php echo set_value('rehab_atap'); ?>">
													<p class="help-block"><?php echo form_error('rehab_atap', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>

											<div class="form-group">
												<label for="rehab_pondasi" class="control-label col-md-3 col-xs-12">Rehab Pondasi : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="rehab_pondasi"  class="form-control" value="<?php echo set_value('rehab_pondasi'); ?>">
													<p class="help-block"><?php echo form_error('rehab_pondasi', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>

											<div class="form-group">
												<label for="rehab_dinding" class="control-label col-md-3 col-xs-12">Rehab Dinding : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="rehab_dinding"  class="form-control" value="<?php echo set_value('rehab_dinding'); ?>">
													<p class="help-block"><?php echo form_error('rehab_dinding', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>

											<div class="form-group">
												<label for="rehab_lantai" class="control-label col-md-3 col-xs-12">Rehab Lantai : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="rehab_lantai"  class="form-control" value="<?php echo set_value('rehab_lantai'); ?>">
													<p class="help-block"><?php echo form_error('rehab_lantai', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>

											<div class="form-group">
												<label for="rehab_kamar_mandi" class="control-label col-md-3 col-xs-12">Rehab Kamar Mandi : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="rehab_kamar_mandi"  class="form-control" value="<?php echo set_value('rehab_kamar_mandi'); ?>">
													<p class="help-block"><?php echo form_error('rehab_kamar_mandi', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="rehab_pintu" class="control-label col-md-3 col-xs-12">Rehab Pintu : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="rehab_pintu"  class="form-control" value="<?php echo set_value('rehab_pintu'); ?>">
													<p class="help-block"><?php echo form_error('rehab_pintu', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="rehab_jendela" class="control-label col-md-3 col-xs-12">Rehab Jendela : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="rehab_jendela"  class="form-control" value="<?php echo set_value('rehab_jendela'); ?>">
													<p class="help-block"><?php echo form_error('rehab_jendela', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="rehab_kolom_dan_balok" class="control-label col-md-3 col-xs-12">Rehab Kolom dan Balok : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="rehab_kolom_dan_balok"  class="form-control" value="<?php echo set_value('rehab_kolom_dan_balok'); ?>">
													<p class="help-block"><?php echo form_error('rehab_kolom_dan_balok', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="rehab_dapur" class="control-label col-md-3 col-xs-12">Rehab dapur : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="rehab_dapur"  class="form-control" value="<?php echo set_value('rehab_dapur'); ?>">
													<p class="help-block"><?php echo form_error('rehab_dapur', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="sumber_penerangan" class="control-label col-md-3 col-xs-12">Sumber Penerangan : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="sumber_penerangan"  class="form-control" value="<?php echo set_value('sumber_penerangan'); ?>">
													<p class="help-block"><?php echo form_error('sumber_penerangan', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="sumber_air_minum" class="control-label col-md-3 col-xs-12">Sumber Air Minum : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="sumber_air_minum"  class="form-control" value="<?php echo set_value('sumber_air_minum'); ?>">
													<p class="help-block"><?php echo form_error('sumber_air_minum', '<small class="text-blue">', '</small>'); ?></p>
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
				                        <h3 style="margin-top: -28px; color: #5BBFDD;"><i class="glyphicon glyphicon-retweet"></i> Realisasi Bantuan</h3>
				                        <hr>

				                         <div class="box-body with-border">
				                         	
											<div class="form-group">
												<label for="tanggal_mulai" class="control-label col-md-3 col-xs-12">Tanggal Mulai : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" id="datepicker" name="tanggal_mulai"  class="form-control" value="<?php echo set_value('tanggal_mulai'); ?>"> 
													<p class="help-block"><?php echo form_error('tanggal_mulai', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="tanggal_selesai" class="control-label col-md-3 col-xs-12">Tanggal Selesai : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" id="datepicker1" name="tanggal_selesai"  class="form-control" value="<?php echo set_value('tanggal_selesai'); ?>"> 
													<p class="help-block"><?php echo form_error('tanggal_selesai', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="deskripsi" class="control-label col-md-3 col-xs-12">Deskripsi Aspek Bantuan : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<textarea name="deskripsi" id="" cols="20" rows="10" class="form-control"></textarea>
													<p class="help-block"><?php echo form_error('deskripsi', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="keterangan" class="control-label col-md-3 col-xs-12">Keterangan : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="keterangan"  class="form-control" value="<?php echo set_value('keterangan'); ?>"> 
													<p class="help-block"><?php echo form_error('keterangan', '<small class="text-blue">', '</small>'); ?></p>
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