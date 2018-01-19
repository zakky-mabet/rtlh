<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="col-md-7">
					<h3 class="box-title">Data Sub Kriteria</h3>
				</div>
			</div>
<?php  
/**
 * Start Form Pencarian
 *
 * @return string
 **/
echo form_open(current_url(), array('method' => 'get'));
?>
			<div class="box-body">
				<div class="col-md-4">
					Tampilkan 
					<select name="per_page" class="form-control input-sm" style="width:60px; display: inline-block;" onchange="window.location = '<?php echo site_url('sub_kriteria?per_page='); ?>' + this.value + '&query=<?php echo $this->input->get('query'); ?>';">
					<?php  
					/**
					 * Loop 10 to 100
					 * Guna untuk limit data yang ditampilkan
					 * 
					 * @var 10
					 **/
					$start = 20; 
					while($start <= 100) :
						$selected = ($start == $this->input->get('per_page')) ? 'selected' : '';
						echo "<option value='{$start}' " . $selected . ">{$start}</option>";

						$start += 10;
					endwhile;
					?>
					</select>
					per halaman
				</div>
				<div class="pull-right">
				
					<a href="<?php echo site_url('sub_kriteria/create') ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-plus"></i> Tambah Baru</a>
				
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-2">
				    <div class="form-group">
				        <label>Kriteria :</label>
				        <select name="kriteria" class="form-control input-sm">
				        	<option value="">-- PILIH --</option>
				        	<?php foreach ($this->sub_kriteria->get_all_kriteria() as $key => $value): ?>
				        		<option value="<?php echo $value->id ?>" <?php if($this->input->get('kriteria')== $value->id) echo 'selected'; ?>><?php echo $value->nama ?></option>
				        	<?php endforeach ?>
				        
				        </select>	
				    </div>
				</div>

				<div class="col-md-3">
				    <div class="form-group">
				        <label>Kata Kunci :</label>
				        <input type="text" name="query" class="form-control input-sm" value="<?php echo $this->input->get('query') ?>" placeholder=" Nama Sub Kriteria">
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="form-group">
                    <button type="submit" class="btn btn-warning hvr-shadow top"><i class="fa fa-filter"></i> Filter</button>
                    <a href="<?php echo site_url('sub_kriteria') ?>" class="btn btn-warning hvr-shadow top" style="margin-left: 10px;"><i class="fa fa-times"></i> Reset</a>
				    </div>
				</div>
			</div>
<?php  
// End form pencarian
echo form_close();
?>
			<div class="box-body">
<?php  
/**
 * Start Form Multiple Action
 *
 * @return string
 **/
echo form_open(site_url('sub_kriteria/bulk_action'));
?>
				<table class="table table-hover table-bordered  mini-tab" style="margin-top: 10px;">
					<thead class="bg-silver">
						<tr>
							<th width="40">
							
			                    <div class="checkbox checkbox-inline">
			                        <input id="checkbox1" type="checkbox"> <label for="checkbox1"></label>
			                    </div>
					
							</th>
							
							<th class="text-center">Nama Sub Kriteria</th>
							<th class="text-center">Nama Kriteria</th>
							<th class="text-center">Nilai</th>
			
							<th width="100"></th>
						</tr>
					</thead>
					<tbody>
				<?php  
				if (!$sub_kriteria) { ?>
				 	<td colspan="5" class="text-center text-blue">
				 		Maaf data tidak ditemukan !
				 	</td>
				<?php } else {
				/*
				* Loop data penduduk
				*/
				$number = ( ! $this->page ) ? 0 : $this->page;

				foreach($sub_kriteria as $row) :
				?>
						<tr>
							<td>
							
			                    <div class="checkbox checkbox-inline">
			                        <input id="checkbox1" type="checkbox" name="sub_kriterias[]" value="<?php echo $row->id; ?>"> <label for="checkbox1"></label>
			                    </div>
						
							</td>
							
							<td><?php echo $row->nama ?></td>
							<td><?php echo $this->sub_kriteria->get_kriteria($row->id_kriteria)->nama ?></td>
							<td class="text-center"><?php echo $row->nilai ?></td>
							
							<td class="text-center" style="font-size: 12px;" id="tombol-filter">
							
								<a href="<?php echo site_url("sub_kriteria/update/{$row->id}") ?>" class="icon-button text-blue" data-toggle="tooltip" data-placement="top" title="Sunting"><i class="fa fa-pencil"></i></a>
						
								<a class="icon-button text-red get-delete-sub-kriteria" data-id="<?php echo $row->id; ?>" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-trash-o"></i></a>
				
							</td>
						</tr>
				<?php  
				endforeach;
				}
				?>
					</tbody>
					<tfoot>
					
						<th>
		                    <div class="checkbox checkbox-inline">
		                        <input id="checkbox1" type="checkbox"> <label for="checkbox1"></label>
		                    </div>
						</th>
						<th colspan="9">
							<label style="font-size: 11px; margin-right: 10px;">Yang terpilih :</label>
							<a class="btn btn-xs btn-round btn-danger get-delete-sub-kriteria-multiple"><i class="fa fa-trash-o"></i> Hapus</a>
							<small class="pull-right"><?php echo count($sub_kriteria) . " dari " . $num_sub_kriteria . " data"; ?></small>
						</th>
					
					</tfoot>
				</table>

				<div class="modal animated fadeIn modal-danger" id="modal-delete-sub-kriteria-multiple" tabindex="-1" data-backdrop="static" data-keyboard="false">
				    <div class="modal-dialog modal-sm">
				        <div class="modal-content">
				           	<div class="modal-header">
				                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus!</h4>
				                <span>Hapus data sub kriteria yang terpilih dari sistem?</span>
				           	</div>
				           	<div class="modal-footer">
				                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
				                <button type="submit" name="action" value="delete" id="btn-delete" class="btn btn-outline"> Hapus </button>
				           	</div>
				        </div>
				    </div>
				</div>
<?php  
// End Form Multiple Action
echo form_close();
?>
			</div>
			<div class="box-footer text-center">
				<?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
	</div>
</div>



<div class="modal animated fadeIn modal-danger" id="modal-delete-sub-kriteria" tabindex="-1" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
           	<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Hapus!</h4>
                <span>Hapus data sub kriteria ini dari sistem?</span>
           	</div>
           	<div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                <a href="#" id="btn-delete" class="btn btn-outline"> Hapus </a>
           	</div>
        </div>
    </div>
</div>