<?php
header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");
?>
<style type="text/css" media="screen">
	table {
border-collapse: collapse;
	}
	table, th, td {
	border: 1px solid black;
	}
</style>
<table class="table table-bordered ">
	<thead>
		<tr>
			<th width="40">No</th>
			<th width="300" class="text-center">Nama Jenis Bencana</th>
			<th class="text-center">Keterangan </th>
		</tr>
	</thead>
	<tbody>
		<?php
		if (!$daftar_bencana) { ?>
		<td colspan="4" class="text-center text-blue">
			Maaf data tidak ditemukan !
		</td>
		<?php } else {
							
		$number = ( ! $this->page ) ? 0 : $this->page;
		foreach($daftar_bencana as $row) :
		?>
		<tr>
			<td class="text-center"><?php echo ++$number ?></td>
			<td><?php echo ucwords($row->nama); ?></td>
			<td><?php echo ucwords($row->keterangan); ?></td>
		</tr>
		<?php  endforeach;
		}
		?>
	</tbody>
</table>