<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Call Header Print (KOP)
 *
 * @author Teitra Mega office@teitrmega.co.id
 **/
$this->load->view('rtlh/print/header');

?>
   <!--  <div class="content">
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
    </div> -->

   <div class="content">
                    <h5 class="upper text-center"><?php echo $title; ?></h5>
                    <br>
                    <table class="" style="width: 100%; font-size:9px;">
                    <?php  
                    foreach($data_candidate as $key => $value) :
                    ?>
                    <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td width="300" class="text-center" rowspan="12"><img src="<?php echo base_url("assets/rtlh/img/".$value->foto); ?>" width="60%" alt="<?php echo $value->nama_lengkap; ?>"></td>
                      </tr>    
                      <tr>
                          <td width="150">NIK</td>
                          <td width="10">:</td>
                          <td><?php echo $value->nik; ?></td>
                      </tr>
                      <tr>
                          <td width="150">Nama Lengkap</td>
                          <td width="10">:</td>
                          <td><?php echo $value->nama_lengkap; ?></td>
                      </tr>
                      <tr>
                          <td width="150">Jenis Kelamin</td>
                          <td width="10">:</td>
                          <td><?php echo $value->jns_kelamin; ?></td>
                      </tr>
                      <tr>
                          <td width="150">Pekerjaan</td>
                          <td width="10">:</td>
                          <td><?php echo $value->pekerjaan; ?></td>
                      </tr>
                      <tr>
                          <td width="150">Alamat</td>
                          <td width="10">:</td>
                          <td><?php echo $value->alamat; ?></td>
                      </tr>
                      <tr>
                          <td width="150">Umur</td>
                          <td width="10">:</td>
                          <td><?php echo date('Y')-substr($value->tgl_lahir,0,4); ?></td>
                      </tr>
                      <tr>
                          <td width="150">Status RTLH</td>
                          <td width="10">:</td>
                          <td><?php echo $value->status_rtlh; ?></td>
                      </tr>
                      <tr>
                          <td colspan="3" width="150"><b>Keadaan Rumah</b></td>
                      </tr>
                      <tr>
                          <td width="150">Pondasi</td>
                          <td width="10">:</td>
                          <td><?php if ($value->pondasi == NULL) {echo 'Belum di entri';} else {echo $value->pondasi; } ?></td>
                      </tr>
                      <tr>
                          <td width="150">Kolom Balok</td>
                          <td width="10">:</td>
                          <td><?php if ($value->kolom_balok == NULL) {echo 'Belum di entri';} else {echo $value->kolom_balok; } ?></td>
                      </tr>
                      <tr>
                          <td width="150">Kondisi Atap</td>
                          <td width="10">:</td>
                          <td><?php if ($value->kondisi_atap == NULL) {echo 'Belum di entri';} else {echo $value->kondisi_atap; } ?></td>
                      </tr>
                      <tr>
                          <td width="150">Koordinat</td>
                          <td width="10">:</td>
                          <td><?php echo $value->latitude.' , '.$value->longitude ?></td>
                      </tr>
                      <tr>
                          <td colspan="4">
                            <div style="border-bottom: 1pt solid #000;"></div>
                        </td>
                      </tr>

                      

                     <?php 
                        endforeach
                      ?>
                    </table>
                </div>
<?php

$this->load->view('rtlh/print/footer');

