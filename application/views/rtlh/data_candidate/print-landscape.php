<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Call Header Print (KOP)
 *
 * @author Teitra Mega office@teitrmega.co.id
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
                <th class="text-center">Pekerjaan</th>
                <th class="text-center">Umur</th>
                <th class="text-center">Status RTLH</th>
                <th class="text-center">Pondasi</th>
                <th class="text-center">Kolom Balok</th>
                <th class="text-center">Atap</th>
                <th class="text-center">Koordinat</th>
                 <th class="text-center">Foto </th>
        	</tr>
                <?php  
                foreach($data_candidate as $key => $value) :
                ?>
                <tr>
                	<td class="text-center"><?php echo ++$key; ?>.</td>
                    <td><?php echo $value->nik; ?></td>
                    <td><?php echo $value->nama_lengkap; ?></td>
                    <td><?php echo ucfirst($value->jns_kelamin) ?></td>
                    <td><?php echo $this->data_candidate->get_nama_desa($value->village)->name; ?></td>
                    <td><?php echo $value->alamat; ?></td>
                    <td><?php echo $value->pekerjaan; ?></td>
                    <td><?php echo date('Y')-substr($value->tgl_lahir,0,4); ?></td>
                    <td><?php echo $value->status_rtlh; ?></td>
                    <td><?php if ($value->pondasi == NULL) {echo 'Belum di entri';} else {echo $value->pondasi; } ?></td>
                    <td><?php if ($value->kolom_balok == NULL) {echo 'Belum di entri';}else {echo $value->kolom_balok; } ?></td>
                    <td><?php if ($value->kondisi_atap == NULL) {echo 'Belum di entri';}else {echo $value->kondisi_atap; } ?></td>
                     <td><?php echo $value->latitude.' , '.$value->longitude ?></td>
                    <td><img src="<?php echo base_url("assets/rtlh/img/".$value->foto); ?>" width="200" alt="<?php echo $value->nama_lengkap; ?>"></td>   
                </tr>
                <?php  
                endforeach;
                ?>
        </table>
    </div> 

   <?php

$this->load->view('rtlh/print/footer');

