<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Call Header Print (KOP)
 *
 * @author Teitra Mega office@teitrmega.co.id
 **/
$this->load->view('rtlh/print/header');

?>

     <div class="box-body">
              <h5 class="box-heading text-center bold"> Data Penerima Bantuan</h5>
              <p> <br>  </p>
                <?php if (!$laporan): ?>
                   <p class="text-center text-red">Data tidak ditemukan !</p>    
                <?php else: ?>     
                <table class="mini-tab table table-striped" style="width: 100%">
                  
                    <?php  
                    foreach($laporan as $key => $value) :
                    ?>
                    <tr>  
                      <td width="500" colspan="3" class=" valign-middle"><b>Data Calon</b></td>
                      <td width="250" class="text-center"><b> Foto Rumah Setelah Rehabilitasi</b></td>
                    </tr>                     
                    <tr>  
                      <td class="valign-middle">NIK</td>
                      <td class="text-center valign-middle"> :</td>
                      <td class=" valign-middle"><?php echo $value->nik ?></td>
                      <td width="" class="text-center" colspan="4"  rowspan="9">
                          <div >
                        <?php
                          if ( !$this->laporan->gambar_rumah_setelah($value->nik) ) {
                           echo "Foto rumah belum di entri"; 
                          }else{
                        foreach ($this->laporan->gambar_rumah_setelah($value->nik)  as $key => $foto): ?>
                          
                        <div style="float: left; border-bottom:12px;   width: 49%;"> 
                            <img src="<?php echo base_url("assets/rtlh/img/rumah/".$foto->foto); ?>" width="87%" alt="Gambar Belum di entri">
                            <br>  <span><?php echo $foto->nama ?></span><br>
                        </div>
                        <?php endforeach; } ?>
                          <div style="clear: both;"></div>
                        </div>
                        <br>  
                        </td>
                        
                      </tr>
                    </tr> <tr>  
                      <td class=" valign-middle">Nama Lengkap</td>
                      <td class="text-center valign-middle"> :</td>
                      <td class="valign-middle"><?php echo $value->nama_lengkap ?></td>
                    </tr> <tr>  
                      <td class="valign-middle">Jenis Kelamin</td>
                      <td class="text-center valign-middle"> :</td>
                      <td class="valign-middle"><?php echo $value->jns_kelamin ?></td>
                    </tr> <tr>  
                      <td class=" valign-middle">Alamat</td>
                      <td class="text-center valign-middle"> :</td>
                      <td class="valign-middle"><?php echo $value->alamat ?></td>
                    </tr> <tr>  
                      <td class=" valign-middle">Umur</td>
                      <td class="text-center valign-middle"> :</td>
                      <td class="valign-middle"><?php echo date('Y')-substr($value->tgl_lahir,0,4); ?></td>
                    </tr> <tr>  
                      <td class=" valign-middle">Status RTLH</td>
                      <td class="text-center valign-middle"> :</td>
                      <td class="valign-middle"><?php echo $value->status_rtlh  ?></td>
                    </tr>
                    <tr>  
                      <td class=" valign-middle">Status Realisasi</td>
                      <td class="text-center valign-middle"> :</td>
                      <td class="valign-middle"><?php echo $value->status_realisasi  ?></td>
                    </tr>
                     <tr>  
                      <td class=" valign-middle">Keterangan Realisasi</td>
                      <td class="text-center valign-middle"> :</td>
                      <td class="valign-middle"><?php echo ucwords($value->ket_status_realisasi)  ?></td>
                    </tr>
                    <tr>
                        <td colspan="4" class="valign-middle">
                          <div style="border-bottom: 1pt solid black"></div>
                        </td>
                      </tr>
                    
                  <?php   endforeach ?>
                  <?php endif ?>
                </table>
            </div>
  
<?php

$this->load->view('rtlh/print/footer');

