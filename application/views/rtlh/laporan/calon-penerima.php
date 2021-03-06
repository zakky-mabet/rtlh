<div class="row">

 <div class="col-md-3">
        <div class="box box-solid no-print" id="sticker">
            <div class="box-header with-border">
                <h3 class="box-title">Filter</h3>
            </div>
            <form action="" method="get">
            <div class="box-body">
               <!-- <div class="form-group">
                    <label class="control-label">Tahun :</label>
                    <select name="year" class="form-control">
                        <option value="">-- PILIH --</option>
                    <?php  
                    /**
                     * Loop Year start at develepment
                     *
                     * @var Integer
                     **/
                    for($year = 2015; $year <= date('Y-m-d', strtotime('+2 years')); $year++) :
                    ?>
                        <option value="<?php echo $year; ?>" <?php if($year==$this->input->get('year')) echo "selected"; ?>><?php echo $year; ?></option>
                    <?php  
                    endfor;
                    ?>
                    </select>
                </div> -->
                <div class="form-group">
                    <label class="control-label">NIK / Nama Lengkap :</label>
                    <input type="text" name="query" value="<?php echo $this->input->get('query') ?>"   class="form-control">
                </div>
                <!-- <div class="form-group">
                    <label class="control-label">Provinsi :</label>
                      <select  class="form-control">
                        <option value="">-- PILIH --</option>
                      </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Kabupaten / Kota :</label>
                      <select  class="form-control">
                        <option value="">-- PILIH --</option>
                      </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Kecamatan :</label>
                      <select  class="form-control">
                        <option value="">-- PILIH --</option>
                      </select>
                </div>
                <div class="form-group">
                    <label class="control-label">Kelurahan Desa :</label>
                      <select name="year" class="form-control">
                        <option value="">-- PILIH --</option>
                      </select>
                </div> -->
       
            </div>
            <div class="box-footer">
                <a href="<?php echo current_url() ?>" class="btn btn-primary hvr-shadow pull-left"><i class="fa fa-times"></i> Reset</a>
                <button type="submit" class="btn btn-primary hvr-shadow pull-right"><i class="fa fa-filter"></i> Filter</button>
            </div>
            </form>
        </div>
    </div>

<div class="col-md-9">
    <div class="box box-solid">
            <div class="box-header  with-border">
                <div class="col-md-3">
                  <h4 class="box-heading"> <i class="fa fa-files-o"></i> Calon Penerima   </h4>
                </div>
              
                <div class="col-md-9 top2x">

                  <a href="<?php echo site_url("laporan/print_out?{$this->input->server('QUERY_STRING')}") ?>" target="_blank" class="btn pull-right  btn-default btn-print"><i class="fa fa-print"></i> Cetak</a>          
  
                </div>
            </div>
         
            <div class="box-body">
              <h5 class="box-heading text-center bold"> Data Calon Penerima </h5>
              <p> <br>  </p>
                <?php if (!$laporan): ?>
                   <p class="text-center text-red">Data tidak ditemukan !</p>    
                <?php else: ?>     
                <table class="mini-tab table table-striped" style="width: 100%">
                  
                    <?php  
                    foreach($laporan as $key => $value) :
                    ?>
                    <tr>  
                      <td width="400" colspan="3" class=" valign-middle"><b>Data Calon</b></td>
                      <td width="400" class="text-center"><b> Foto Rumah Sebelum Rehabilitasi</b></td>
                    </tr>                     
                    <tr>  
                      <td class="valign-middle">NIK</td>
                      <td class="text-center valign-middle"> :</td>
                      <td class=" valign-middle"><?php echo $value->nik ?></td>
                      <td width="" class="text-center" colspan="4"  rowspan="11">
                          <div >
                        <?php
                          if ( !$this->laporan->gambar_rumah($value->nik) ) {
                           echo "Foto rumah belum di entri"; 
                          }else{
                        foreach ($this->laporan->gambar_rumah($value->nik)  as $key => $foto): ?>
                          
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
                      <td colspan="3" class=" valign-middle"><b>Keadaan Rumah</b></td>
                    </tr>
                    <tr>  
                      <td class=" valign-middle">Kondisi Atap</td>
                      <td class="text-center valign-middle"> :</td>
                      <td class="valign-middle"><?php echo $this->laporan->get_value_sub_kriteria($value->kondisi_atap)->nama; ?></td>
                    </tr>
                    <tr>  
                      <td class=" valign-middle">Kondisi Lantai</td>
                      <td class="text-center valign-middle"> :</td>
                      <td class="valign-middle"><?php echo $this->laporan->get_value_sub_kriteria($value->kondisi_lantai)->nama; ?></td>
                    </tr>
                    <tr>  
                      <td class=" valign-middle">Kondisi Dinding</td>
                      <td class="text-center valign-middle"> :</td>
                      <td class="valign-middle"><?php echo $this->laporan->get_value_sub_kriteria($value->kondisi_dinding)->nama;  ?></td>
                    </tr>

                     <tr>
                          <td width="150">Koordinat</td>
                          <td width="10">:</td>
                          <td><?php echo $value->latitude.' , '.$value->longitude ?></td>
                      </tr>
                  <?php   endforeach ?>
                  <?php endif ?>
                </table>
            </div>
            <div class="box-footer text-center"> 
                <?php echo $this->pagination->create_links(); ?>
            </div>
    </div>
</div>
</div>