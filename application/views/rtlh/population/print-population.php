<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Call Header Print (KOP)
 *
 * @author Teitra Mega office@teitraega.co.id
 **/
$this->load->view('rtlh/print/header');

?>

    <div class="content">
        <h5 class="upper text-center"><?php echo $title; ?></h5>
        <table class="table-bordered" style="width: 100%; font-size: 10px;">
        	<tr>
        		<th width="30">No.</th>
        		<th class="text-center">NIK</th>
                <th class="text-center">Nama</th>
        		<th class="text-center">Jenis Kelamin</th>
                <th class="text-center">Desa / Kelurahan</th>
                <th class="text-center">Alamat</th>
        	</tr>
                <?php  
          
                foreach($population as $key => $value) :
                ?>
                <tr>
                	<td class="text-center"><?php echo ++$key; ?>.</td>
                    <td><?php echo $value->nik; ?></td>
                    <td><?php echo $value->nama_lengkap; ?></td>
                    <td><?php echo ucfirst($value->jns_kelamin) ?></td>
                    <td><?php echo $this->population->get_nama_desa($value->village)->name; ?></td>
                    <td><?php echo $value->alamat; ?></td>
                </tr>
                <?php  
                endforeach;
                ?>
        </table>
    </div>
<?php

$this->load->view('rtlh/print/footer');

