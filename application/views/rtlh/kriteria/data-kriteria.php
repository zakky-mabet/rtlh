<div class="row">
	<div class="col-md-8 col-md-offset-2 col-xs-12"><?php echo $this->session->flashdata('alert'); ?></div>
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<div class="col-md-7">
					<h3 class="box-title">Data Kriteria</h3>
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
					<select name="per_page" class="form-control input-sm" style="width:60px; display: inline-block;" onchange="window.location = '<?php echo site_url('kriteria?per_page='); ?>' + this.value + '&query=<?php echo $this->input->get('query'); ?>';">
					<?php  
					/**
					 * Loop 10 to 100
					 * Guna untuk limit data yang ditampilkan
					 * 
					 * @var 10
					 **/
					$start = 5; 
					while($start <= 100) :
						$selected = ($start == $this->input->get('per_page')) ? 'selected' : '';
						echo "<option value='{$start}' " . $selected . ">{$start}</option>";

						$start += 10;
					endwhile;
					?>
					</select>
					per halaman
				</div>
				<!-- <div class="pull-right">
				
					<a href="<?php echo site_url('kriteria/create') ?>" class="btn btn-warning hvr-shadow btn-flat btn-sm"><i class="fa fa-plus"></i> Tambah Baru</a>
				
				</div> -->
			</div>
			<div class="box-body">
				

				<div class="col-md-3">
				    <div class="form-group">
				        <label>Kata Kunci :</label>
				        <input type="text" name="query" class="form-control input-sm" value="<?php echo $this->input->get('query') ?>" placeholder=" Nama Kriteria">
				    </div>
				</div>
				<div class="col-md-3">
				    <div class="form-group">
                    <button type="submit" class="btn btn-warning hvr-shadow top"><i class="fa fa-filter"></i> Filter</button>
                    <a href="<?php echo site_url('kriteria') ?>" class="btn btn-warning hvr-shadow top" style="margin-left: 10px;"><i class="fa fa-times"></i> Reset</a>
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
echo form_open(site_url('kriteria/bulk_action'));
?>
				<table class="table table-hover table-bordered mini-tab" style="margin-top: 10px;">
					<thead class="bg-silver">
						<tr>
							<th width="40">No</th>
							<th class="text-center">Nama Kriteria</th>							
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
				<?php 

				if (!$kriteria) { ?>
				 	<td colspan="3" class="text-center text-blue">
				 		Maaf data tidak ditemukan !
				 	</td>
				<?php } else {
				 					 
				/*
				* Loop data penduduk
				*/
				$number = ( ! $this->page ) ? 0 : $this->page;

				foreach($kriteria as $row) :
				?>
						<tr>
							<td class="text-center"><?php echo ++$number ?></td>
							<td><?php echo ucwords($row->nama); ?></td>
							<td class="text-center" style="font-size: 12px;">
								<?php echo ucwords($row->keterangan); ?>
							</td>
						</tr>
				<?php  
				endforeach;
			}
				?>
					</tbody>
					<tfoot>
					
				
						<th colspan="10">
							
							<small class="pull-right"><?php echo count($kriteria) . " dari " . $num_kriteria . " data"; ?></small>
						</th>
					
					</tfoot>
				</table>

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

