<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12 col-xs-12">
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
echo form_open(site_url("#"), array('class' => 'form-horizontal', 'id' => 'form-insert-requirement'));

?>
			<div class="box-body" style="margin-top: 10px;" > 
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

					<div class="form-group text-center" style="padding-top: 90px; ">
						<a id="data-entri" href=""><input id="data-button" type="hidden" value="Lanjutkan Proses Entri" class="btn btn-lg btn-warning btn-flat animated bounce"></input></a>
					</div>

				</div>

				<div class="col-md-5">
					<table class="table table-bordered" id="table-pemohon">
						<tbody>
							<tr>
								<th width="160" class="bg-blue text-right">NIK :</th>
								<td id="data-nik"></td>
							</tr>
							<tr>
								<th class="bg-blue text-right">Nama :</th>
								<td id="data-nama"></td>
							</tr>
							<tr>
								<th class="bg-blue text-right">Tempat, Tanggal Lahir :</th>
								<td id="data-tgl-lahir"></td>
							</tr>
							<tr>
								<th class="bg-blue text-right">Jenis Kelamin :</th>
								<td id="data-jns-kelamin"></td>
							</tr>
							<tr>
								<th class="bg-blue text-right">Alamat :</th>
								<td id="data-alamat"></td>
							</tr>
							<tr>
								<th class="bg-blue text-right">Agama :</th>
								<td id="data-agama"></td>
							</tr>
							<tr>
								<th class="bg-blue text-right">Status Perkawinan :</th>
								<td id="data-status-kawin"></td>
							</tr>
							<tr>
								<th class="bg-blue text-right">Kewarganegaraan :</th>
								<td id="data-kewarganegaraan"></td>
							</tr>
							<tr>
								<th class="bg-blue text-right t">Status RTLH :</th>
								<td id="data-status-rtlh" class="text-red"></td>
							</tr>
						</tbody>
					</table>

	              	</ol>
				</div>
			</div>

	
		
<?php  
// End Form
echo form_close();
?>
		</div>
	</div>
</div>