<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <aside class="main-sidebar">
      <section class="sidebar">
      <div class="user-panel">
         <div class="pull-left">
            <p><strong>SKPD :</strong> <br> <?php echo strtoupper($this->session->userdata('SKPD')->nama) ?></p>
            <small><strong>E-Mail :</strong> <?php echo $this->session->userdata('SKPD')->email ?></small>
         </div>
         <div style="margin-bottom: 40px;"></div>
      </div>
      <ul class="sidebar-menu">
        <li class="<?php echo active_link_method('index','home'); ?>">
            <a href="<?php  echo site_url('skpd/home') ?>">
               <i class="fa fa-dashboard"></i> <span>Home</span>
            </a>
        </li>
        <li class="<?php echo active_link_method('cascading','home'); ?>">
            <a href="<?php  echo site_url('skpd/home/cascading') ?>">
               <i class="fa fa-edit"></i> <span>Cascading</span>
            </a>
        </li>
        <li class="treeview <?php echo active_link_multiple(array('visi','misi','tujuan','strategi', 'sasaran','kebijakan','program','kegiatan', 'formulasi', 'target')); ?>">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Rencana Strategis</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo active_link_method('index','visi'); ?>">
                <a href="<?php echo base_url("skpd/visi") ?>"> Visi</a>
            </li>
            <li class="<?php echo active_link_method('index','misi'); ?>">
                <a href="<?php echo base_url("skpd/misi") ?>"> Misi</a>
            </li>
            <li>
              <li class="treeview <?php  echo active_link_multiple(array('tujuan')); ?>">
                <a href="#">
                  <span>Tujuan</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="<?php echo active_link_method('index','tujuan'); ?>"><a href="<?php echo base_url("skpd/tujuan") ?>"> Tujuan</a></li>
                  <li class="<?php echo active_link_method('indikator_tujuan','tujuan'); ?>"><a href="<?php echo base_url("skpd/tujuan/indikator_tujuan") ?>">Indikator dan Target</a></li>
                </ul>
              </li>
            </li>
            <li>
              <li class="treeview <?php  echo active_link_multiple(array('sasaran','formulasi','target')); ?>">
                <a href="#">
                  <span>Sasaran</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="<?php echo active_link_method('index','sasaran'); ?>">
                    <a href="<?php echo base_url("skpd/sasaran") ?>"> Sasaran</a>
                  </li>
                  <li class="<?php echo active_link_method('indikator_sasaran','sasaran'); ?>">
                    <a href="<?php echo base_url("skpd/sasaran/indikator_sasaran") ?>">Indikator</a>
                  </li>
                  <li class="<?php echo active_link_method('index','target'); ?>">
                    <a href="<?php echo base_url('skpd/target'); ?>">Target</a>
                  </li>
                  <li class="<?php echo active_link_method('index','formulasi'); ?>">
                    <a href="<?php echo base_url("skpd/formulasi") ?>">Formulasi</a>
                  </li>
                </ul>
              </li>
            <li>
             <li class="<?php echo active_link_method('index','strategi'); ?>">
                <a href="<?php echo base_url("skpd/strategi") ?>"> Strategi</a>
             </li>
             <li class="<?php echo active_link_method('index','kebijakan'); ?>">
                <a href="<?php echo base_url("skpd/kebijakan") ?>"> Kebijakan</a>
             </li>
            <li>
              <li class="treeview <?php  echo active_link_multiple(array('program')); ?>">
                <a href="#">
                  <span>Program</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="<?php echo active_link_method('index','program'); ?>">
                    <a href="<?php echo base_url("skpd/program") ?>"> Program</a>
                  </li>
                  <li class="<?php echo active_link_method('anggaran','program'); ?>">
                    <a href="<?php echo base_url("skpd/program/anggaran/{$this->periode_awal}") ?>">Anggaran Program</a>
                  </li>
                  <li class="<?php echo active_link_method('indikator','program'); ?>">
                    <a href="<?php echo base_url('skpd/program/indikator'); ?>">Indikator Kinerja Program</a>
                  </li>
                  <li class="<?php echo active_link_method('target','program'); ?>">
                    <a href="<?php echo base_url("skpd/program/target/{$this->periode_awal}") ?>"><small>Target Indikator Kinerja Program</small></a>
                  </li>
                </ul>
              </li>
            <li>
              <li class="treeview <?php echo active_link_multiple(array('kegiatan')); ?>">
                <a href="#">
                  <span>Kegiatan</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li class="<?php echo active_link_method('index','kegiatan'); ?>">
                    <a href="<?php echo base_url("skpd/kegiatan"); ?>"> Kegiatan</a>
                  </li>
                  <li class="<?php echo active_link_method('penanggungjawab','kegiatan'); ?>">
                    <a href="<?php echo base_url("skpd/kegiatan/penanggungjawab/{$this->periode_awal}"); ?>"><small>Penanggung Jawab Kegiatan</small></a>
                  </li>
                  <li class="<?php echo active_link_method('anggaran','kegiatan'); ?>">
                    <a href="<?php echo base_url("skpd/kegiatan/anggaran/{$this->periode_awal}"); ?>">Anggaran Kegiatan</a>
                  </li>
                  <li class="<?php echo active_link_method('output','kegiatan'); ?>">
                    <a href="<?php echo base_url("skpd/kegiatan/output"); ?>">Output Kegiatan</a>
                  </li>
                  <li class="<?php echo active_link_method('target','kegiatan'); ?>">
                    <a href="<?php echo base_url("skpd/kegiatan/target/{$this->periode_awal}"); ?>">Target Output Kegiatan</a>
                  </li>
                </ul>
              </li>
            </li>
          </ul>
        </li>
        <li class="treeview <?php  echo active_link_multiple(array('rkt','rktprogram')); ?>">
          <a href="#">
            <i class="fa fa-files-o"></i> <span>RKT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo active_link_method('index','rkt'); ?>">
                <a href="<?php echo base_url("skpd/rkt"); ?>"> Target RKT Indikator Sasaran</a>
            </li>
            <li class="<?php echo active_link_method('index','rktprogram'); ?>">
                <a href="<?php echo base_url("skpd/rktprogram") ?>"> Target RKT Indikator Program</a>
            </li>
            <li class="<?php echo active_link_method('rktoutputkegiatan','rktprogram'); ?>">
                <a href="<?php echo base_url("skpd/rktprogram/rktoutputkegiatan"); ?>"> Target RKT Ouput Kegiatan</a>
            </li>
            <li class="<?php echo active_link_method('anggaranprogramrkt','rktprogram'); ?>">
                <a href="<?php echo base_url("skpd/rktprogram/anggaranprogramrkt"); ?>"> Anggaran Program RKT</a>
            </li>
            <li class="<?php echo active_link_method('anggarankegiatanrkt','rktprogram'); ?>">
                <a href="<?php echo base_url("skpd/rktprogram/anggarankegiatanrkt"); ?>"> Anggaran Kegiatan RKT</a>
            </li>
          </ul>
        </li>
        <li class="treeview <?php  echo active_link_multiple(array('pkprogram','pkkegiatan','pk_indikator_sasaran')); ?>">
          <a href="#">
            <i class="fa fa-file-text-o"></i>
            <span>Perjanjian Kinerja</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo active_link_controller('pk_indikator_sasaran'); ?>">
                <a href="<?php echo base_url("skpd/pk_indikator_sasaran"); ?>">
                  Target PK Indikator Sasaran
                </a>
            </li>
            <li class="<?php echo active_link_method('index','pkprogram').active_link_method('triwulan','pkprogram'); ?>">
                <a href="<?php echo base_url("skpd/pkprogram"); ?>">
                  Target PK Indikator Program
                </a>
            </li>
            <li class="<?php echo active_link_controller('pkkegiatan'); ?>">
                <a href="<?php echo base_url("skpd/pkkegiatan"); ?>">
                  Target PK Output Kegiatan
                </a>
            </li>
            <li class="<?php echo active_link_method('anggaranprogram','pkprogram'); ?>">
                <a href="<?php echo base_url("skpd/pkprogram/anggaranprogram") ?>"> Anggaran Program PK</a>
            </li>
            <li class="<?php echo active_link_method('anggarankegiatan','pkprogram'); ?>">
                <a href="<?php echo base_url("skpd/pkprogram/anggarankegiatan"); ?>"> Anggaran Kegiatan PK</a>
            </li>
          </ul>
        </li>
         <li class="treeview <?php  echo active_link_multiple(array('pkperubahanprogram','pkperubahankegiatan','pk_indikator_sasaran_perubahan')); ?>">
          <a href="#">
            <i class="fa fa-file-o"></i>
            <span>PK Perubahan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo active_link_method('index','pk_indikator_sasaran_perubahan'); ?>">
                <a href="<?php echo base_url("skpd/pk_indikator_sasaran_perubahan"); ?>"> Target PK Indikator Sasaran</a>
            </li>
            <li class="<?php echo active_link_method('index','pkperubahanprogram').active_link_method('triwulan','pkperubahanprogram'); ?>">
                <a href="<?php echo base_url("skpd/pkperubahanprogram"); ?>"><small>Target PK Perubahan Indikator Program</small></a>
            </li>
            <li class="<?php echo active_link_method('index','pkperubahankegiatan').active_link_method('triwulan','pkperubahankegiatan'); ?>">
                <a href="<?php echo base_url("skpd/pkperubahankegiatan"); ?>"> Target PK  Perubahan Output Kegiatan </a>
            </li>
            <li class="<?php echo active_link_method('anggaranprogram','pkperubahanprogram'); ?>">
                <a href="<?php echo base_url("skpd/pkperubahanprogram/anggaranprogram"); ?>"> Anggaran Program PK Perubahan </a>
            </li>
            <li class="<?php echo active_link_method('anggarankegiatan','pkperubahanprogram'); ?>">
                <a href="<?php echo base_url("skpd/pkperubahanprogram/anggarankegiatan"); ?>"> Anggaran Kegiatan PK Perubahan </a>
            </li>
          </ul>
        </li>
        <li class="treeview <?php  echo active_link_multiple(array('reindikatorprogram','rekegiatan','prestasi','panggarankegiatan','realisasi_sasaran')); ?>">
          <a href="#">
            <i class="fa fa-trophy"></i>
            <span>Kinerja</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo active_link_method('index','realisasi_sasaran'); ?>">
                <a href="<?php echo base_url("skpd/realisasi_sasaran"); ?>"> Realisasi Indikator Sasaran</a>
            </li>
            <li class="<?php echo active_link_method('index','reindikatorprogram').active_link_method('triwulan','reindikatorprogram'); ?>">
                <a href="<?php echo base_url('skpd/reindikatorprogram'); ?>"> Realisasi Indikator Program</a>
            </li>
            <li class="<?php echo active_link_method('index','rekegiatan').active_link_method('triwulan','rekegiatan'); ?>">
                <a href="<?php echo base_url("skpd/rekegiatan") ?>"> Realisasi Output Kegiatan</a>
            </li>
            <li class="<?php echo active_link_method('index','panggarankegiatan'); ?>">
                <a href="<?php echo base_url("skpd/panggarankegiatan") ?>"> Peneyerapan Anggaran</a>
            </li>
            <li class="<?php echo active_link_controller('prestasi'); ?>">
                <a href="<?php echo base_url("skpd/prestasi"); ?>"> Prestasi</a>
            </li>
          </ul>
        </li>
        <li class="treeview <?php  echo active_link_multiple(array('renstra','rrkt','iku','reanggaran','reaksi','efisiensi_kinerja','pk','tabulasi','sk_iku')); ?>">
          <a href="#">
            <i class="fa fa-line-chart"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php echo active_link_method('index','renstra'); ?>">
                <a href="<?php echo base_url("skpd/report/renstra"); ?>"> Rencana Strategis</a>
            </li>
            <li class="<?php echo active_link_method('index','rrkt'); ?>">
                <a href="<?php echo base_url("skpd/report/rrkt"); ?>"> Rencana Kinerja Tahunan</a>
            </li>
            <li class="<?php echo active_link_method('index','iku'); ?>">
                <a href="<?php echo base_url("skpd/report/iku"); ?>"> Indikator Kinerja Utama</a>
            </li>
            <li class="<?php echo active_link_method('index','pk'); ?>">
                <a href="<?php echo base_url('skpd/report/pk') ?>"> Perjanjian Kinerja</a>
            </li>
            <li class="<?php echo active_link_method('perubahan','pk'); ?>">
                <a href="<?php echo base_url('skpd/report/pk/perubahan'); ?>"> Perjanjian Kinerja Perubahan</a>
            </li>
            <li class="<?php echo active_link_method('capaian','iku'); ?>">
                <a href="<?php echo base_url("skpd/report/iku/capaian"); ?>"> Capaian Indikator Kinerja Utama</a>
            </li>
            <li class="<?php echo active_link_method('capaian_strategis','iku'); ?>">
                <a href="<?php echo base_url("skpd/report/iku/capaian_strategis"); ?>"> Capaian Indikator Kinerja Strategis</a>
            </li>
            <li class="<?php echo active_link_method('index','reanggaran'); ?>">
                <a href="<?php echo base_url('skpd/report/reanggaran'); ?>"> Pagu dan Realisasi Anggaran</a>
            </li>
            <li class="treeview <?php  echo active_link_multiple(array('sasarsan','forfsmulasi','tafsrget')); ?>" style="text-decoration: line-through;">
              <a href="#">
                <span>Analisis Pencapaian Sasaran</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php echo active_link_method('index','safsaran'); ?>">
                  <a href=""> Bulanan</a>
                </li>
                <li class="<?php echo active_link_method('indikator_sasfaran','sasarfan'); ?>">
                  <a href="">Triwulan</a>
                </li>
                <li class="<?php echo active_link_method('index','targeft'); ?>">
                   <a href="">Tahunan</a>
                </li>
              </ul>
            </li>
            <li class="<?php echo active_link_method('index','tabulasi'); ?>">
                <a href="<?php echo base_url('skpd/report/tabulasi'); ?>"> Tabulasi</a>
            </li>
            <li class="<?php echo active_link_method('index','sk_iku'); ?>">
                <a href="<?php echo base_url('skpd/report/sk_iku') ?>"> SK IKU</a>
            </li>
            <li class="<?php echo active_link_method('index','reaksi'); ?>">
                <a href="<?php echo base_url("skpd/report/reaksi") ?>"> Rencana Aksi</a>
            </li>
            <li class="<?php echo active_link_method('index','efisiensi_kinerja'); ?>">
                <a href="<?php echo base_url("skpd/report/efisiensi_kinerja") ?>"> Efisiensi dan Efektifitas Kinerja</a>
            </li>
          </ul>
        </li>
        <li class="<?php echo active_link_controller('satuan'); ?>">
            <a href="<?php  echo site_url('skpd/satuan') ?>">
                <i class="fa fa-hourglass-half"></i> <span>Master Satuan</span>
            </a>
        </li>
        <li class="<?php echo active_link_controller('account'); ?>">
            <a href="<?php  echo site_url('skpd/account') ?>">
               <i class="fa fa-wrench"></i> <span>Pengaturan Akun</span>
            </a>
        </li>
<!--         <li class="<?php echo active_link_controller('instansi'); ?>">
    <a href="">
       <i class="fa fa-info-circle"></i> <span>Panduan Pengguna</span>
    </a>
</li> -->
        </ul>
      </section>
   </aside>
   <div class="content-wrapper">
      <section class="content-header">
        <?php 
        /**
         * Generated Page Title
         *
         * @return stringsas
         **/
          echo $page_title;

        /**
         * Generate Breadcrumbs from library
         *
         * @var string
         **/
          echo $breadcrumbs; 
        ?>
      </section>
      <section class="content">

<?php  
/* End of file left_sidebar.php */
/* Location: ./application/views/template/left_sidebar.php */
?>
