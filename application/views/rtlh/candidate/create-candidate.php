<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<dov class="col-md-12 col-xs-12">
		<div class="box box-primary">
            <div class="box-header with-border">
              	<h3 class="box-title">Pencarian <?php echo $title; ?> </h3>
            </div>
<?php  
/**
 * Open Form
 *
 * @var string
 **/
echo form_open(site_url("candidate/entri"), array('class' => 'form-horizontal', 'id' => 'form-insert-requirement'));

?>
			<div class="box-body" style="margin-top: 10px;">
				<div class="col-md-7" id="blok-cari-nik">
					<div class="form-group" style="padding-top: 10px;">
						<label for="nik" class="control-label col-md-3 col-xs-12">NIK / Nama : <strong class="text-red">*</strong></label>
						<div class="col-md-6">
							<input type="text" id="cari-nik" class="form-control" value=""> 

							
						</div>
						<div class="col-md-2">
							<button type="reset" class="btn btn-sm btn-warning btn-flat"><i class="fa fa-times"></i> Reset</button>
						</div>
					</div>

				</div>

				<div class="col-md-5">
					<table class="table table-bordered" id="table-pemohon">
						<tbody>
							<tr>
								<th width="160" class="bg-primary text-right">NIK :</th>
								<td id="data-nik"></td>
							</tr>
							<tr>
								<th class="bg-primary text-right">Nama :</th>
								<td id="data-nama"></td>
							</tr>
							<tr>
								<th class="bg-primary text-right">Tempat, Tanggal Lahir :</th>
								<td id="data-tgl-lahir"></td>
							</tr>
							<tr>
								<th class="bg-primary text-right">Jenis Kelamin :</th>
								<td id="data-jns-kelamin"></td>
							</tr>
							<tr>
								<th class="bg-primary text-right">Alamat :</th>
								<td id="data-alamat"></td>
							</tr>
							<tr>
								<th class="bg-primary text-right">Agama :</th>
								<td id="data-agama"></td>
							</tr>
							<tr>
								<th class="bg-primary text-right">Status Perkawinan :</th>
								<td id="data-status-kawin"></td>
							</tr>
							<tr>
								<th class="bg-primary text-right">Kewarganegaraan :</th>
								<td id="data-kewarganegaraan"></td>
							</tr>
						</tbody>
					</table>

	              	</ol>
				</div>
			</div>

	
			<!-- Modal Dialog Jadikan Histori -->
	        <div class="modal animated fadeIn modal-danger" id="dialog-delete-history" tabindex="-1" data-backdrop="static" data-keyboard="false">
	          	<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Reset Form?</h4>
			                <span>Hapus Rekaman Data ini menjadi dari histori pengajuan Surat</span>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
							<a id="button-delete-history" class="btn btn-outline pull-right">Oke</a>
						</div>
					</div>
				</div>
			</div>

			<!-- Modal Dialog Lanjutkan Proses -->
	        <div class="modal animated fadeIn modal-info" id="dialog-lanjutkan" tabindex="-1" data-backdrop="static" data-keyboard="false">
	          	<div class="modal-dialog modal-sm">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Lanjutkan proses ?</h4>
			                <span>Jika data syarat-syarat lanjutkan ke tahap pengisian dokumen.</span>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
							<a id="button-lanjutkan" class="btn btn-outline pull-right">Oke</a>
						</div>
					</div>
				</div>
			</div>
<?php  
// End Form
echo form_close();
?>
		</div>
	</dov>
</div>