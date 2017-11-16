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
							echo form_open(site_url("#"), array('class' => 'form-horizontal'));

							?>
				                <div class="tab-content">

				                    <div class="tab-pane active" role="tabpanel" id="step1">
				                        <h3 style="margin-top: -28px; color: #5BBFDD;"><i class="glyphicon glyphicon-user"></i> Data Calon Penerima <small>(Penduduk)</small></h3>
				                        <hr>

				                        <div class="box-body with-border">
				                        	<div class="form-group">
												<label for="nik" class="control-label col-md-3 col-xs-12">NIK : <strong class="text-red">*</strong></label>
												<div class="col-md-4">
													<input type="number"  class="form-control" value="<?php echo $penduduk->nik; ?>" disabled>
												</div>
											</div>
											<div class="form-group">
												<label for="no_kk" class="control-label col-md-3 col-xs-12">No. KK : <strong class="text-red">*</strong></label>
												<div class="col-md-4">
													<input type="number"  class="form-control" value="<?php echo $penduduk->no_kk; ?>" disabled>
												</div>
											</div>
											<div class="form-group">
												<label for="name" class="control-label col-md-3 col-xs-12">Nama : <strong class="text-red">*</strong></label>
												<div class="col-md-8">
													<input id="inputError" type="text" class="form-control" value="<?php echo $penduduk->nama_lengkap; ?>" disabled>
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
													<input type="text" name="provinsi" class="form-control" value="<?php echo $this->candidate->get_nama_provinsi($penduduk->province)->name; ?>" disabled>
												</div>
											</div>
											<div class="form-group">
												<label for="kabupaten" class="control-label col-md-3 col-xs-12">Kabupaten/kota : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="kabupaten" class="form-control" value="<?php echo $this->candidate->get_nama_kabupaten($penduduk->regency)->name; ?>" disabled>
												</div>
											</div>
											<div class="form-group">
												<label for="kecamatan" class="control-label col-md-3 col-xs-12">Kecamatan : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="kecamatan" class="form-control" value="<?php echo $this->candidate->get_nama_kecamatan($penduduk->district)->name; ?>" disabled>
												</div>
											</div>
											<div class="form-group">
												<label for="kelurahan" class="control-label col-md-3 col-xs-12">Kelurahan/Desa : <strong class="text-blue">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="provinsi" class="form-control" value="<?php echo $this->candidate->get_nama_desa($penduduk->village)->name; ?>" disabled>
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
				                        <h3 style="margin-top: -28px; color: #5BBFDD;"><i class="glyphicon glyphicon-user"></i> Data Tanah <small>(Penduduk)</small></h3>
				                        <hr>

				                         <div class="box-body with-border">
				                        	<div class="form-group">
												<label for="no_sertifikat" class="control-label col-md-3 col-xs-12">No Sertifikat : <strong class="text-red">*</strong></label>
												<div class="col-md-6">
													<input type="text" name="no_sertifikat"  class="form-control" value="<?php echo set_value('no_sertifikat'); ?>">
													<p class="help-block"><?php echo form_error('no_sertifikat', '<small class="text-blue">', '</small>'); ?></p>
												</div>
											</div>
											<div class="form-group">
												<label for="no_sertifikat" class="control-label col-md-3 col-xs-12">No Sertifikat : <strong class="text-red">*</strong></label>
												<div class="col-md-4">
													<input type="text" name="no_sertifikat"  class="form-control" value="<?php echo set_value('no_sertifikat'); ?>">
													<p class="help-block"><?php echo form_error('no_sertifikat', '<small class="text-blue">', '</small>'); ?></p>
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
				                        <h3>ASSIGN CLASSES</h3>
				                        
				                            				<table class="table table-striped table-bordered">
										<thead>
											<tr>
												<th>Class</th>
												<th>Assign to Exam</th>
				                                </tr>
										</thead>
										<tbody>
											<tr>
												<td>1 A</td>
												<td><input type="checkbox" name="email" value=""></td>
											</tr>
				    						<tr>
												<td>1 B</td>
												<td><input type="checkbox" name="email" value=""></td>
											</tr>
				                                						<tr>
												<td>1 C</td>
												<td><input type="checkbox" name="email" value=""></td>
											</tr>
				                                						<tr>
												<td>1 D</td>
												<td><input type="checkbox" name="email" value=""></td>
											</tr>


										</tbody>
										</table>
				                        <ul class="list-inline pull-right">
				                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
				                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>
				                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
				                        </ul>
				                    </div>

				                    <div class="tab-pane" role="tabpanel" id="complete">
				                        <h3>PUBLISH SCHEDULE</h3>
				                        <div class="form-horizontal">
											<fieldset>


											<div class="form-group">
											  <label class="col-md-4 control-label" for="singlebutton"></label>
											  <div class="col-md-4">
											    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Publish</button>
											  </div>
											</div>

											</fieldset>
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