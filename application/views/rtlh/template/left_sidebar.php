<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <?php if ($this->muniversal->get_account_by_login($this->session->userdata('ID'))->photo == NULL): ?>
        <img src="<?php echo base_url('assets/public/image/avatar.jpg') ?>" class="img-circle" alt="<?php echo strtoupper($this->muniversal->get_account_by_login($this->session->userdata('ID'))->nama) ?>">
        <?php else: ?>
        <img src="<?php echo base_url('assets/public/image/'.$this->muniversal->get_account_by_login($this->session->userdata('ID'))->photo) ?>" class="img-circle" alt="<?php echo strtoupper($this->muniversal->get_account_by_login($this->session->userdata('ID'))->nama) ?>">
        <?php endif ?>
        
      </div>
      <div class="pull-left info">
        <p><?php echo strtoupper($this->muniversal->get_account_by_login($this->session->userdata('ID'))->nama) ?></p>
        <a href="#"><?php echo $this->muniversal->get_account_by_login($this->session->userdata('ID'))->level; ?> </a>
      </div>
      <div style="margin-bottom: 40px;"></div>
    </div>
    <ul class="sidebar-menu">
      <li class="<?php echo active_link_method('index','home'); ?>">
        <a href="<?php  echo site_url('home') ?>">
          <i class="fa fa-home"></i> <span>Home</span>
        </a>
      </li>
      <li class="treeview <?php echo active_link_multiple(array('candidate','data_candidate')); ?>">
        <a href="#">
          <i class="fa fa-user"></i> <span> Calon Penerima RTLH</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left spull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo active_link_controller('candidate') ?>">
            <a href="<?php echo site_url('candidate') ?>"><i class="fa fa-angle-double-right"></i> Entri Calon</a>
          </li>
          <li class="<?php echo active_link_controller('data_candidate') ?>">
            <a href="<?php echo site_url('data_candidate') ?>"><i class="fa fa-angle-double-right"></i> Calon Penerima</a>
          </li>
        </ul>
      </li>
      <li class="treeview <?php echo active_link_multiple(array('data_penerima')); ?>">
        <a href="<?php echo site_url('data_penerima') ?>">
          <i class="fa fa-child"></i> <span> Penerima Bantuan RTLH</span>
        </a>
      </li>
      <li class="treeview <?php echo active_link_multiple(array('daftar_bencana')); ?>">
        <a href="#">
          <i class="fa fa-circle-o"></i> <span> RKBA</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left spull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo active_link_controller('rkba') ?>">
            <a href="<?php echo site_url('#') ?>"><i class="fa fa-angle-double-right"></i> Entri </a>
          </li>
          <li class="<?php echo active_link_controller('data_rkba') ?>">
            <a href="<?php echo site_url('data_rkba') ?>"><i class="fa fa-angle-double-right"></i> Data RKBA</a>
          </li>
          <li class="<?php echo active_link_method('index') ?>">
            <a href="<?php echo site_url('daftar_bencana') ?>"><i class="fa fa-angle-double-right"></i> Daftar Bencana</a>
          </li>
          <li class="<?php echo active_link_method('jenis_bencana'); ?>">
            <a href="<?php echo site_url('daftar_bencana/jenis_bencana') ?>"><i class="fa fa-angle-double-right"></i> Jenis Bencana</a>
          </li>
        </ul>
      </li>
      <li  class="treeview <?php echo active_link_multiple(array('#')); ?>">
        <a href="#">
          <i class="fa fa-circle-o"></i> <span> RTPP</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left spull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li></li>
        </ul>
      </li>
      <li class="treeview <?php echo active_link_multiple(array('#')); ?>">
        <a href="#">
          <i class="fa fa-circle-o"></i> <span> PSU</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left spull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li></li>
        </ul>
      </li>
      <li class="treeview <?php echo active_link_multiple(array('#')); ?>">
        <a href="#">
          <i class="fa fa-circle-o"></i> <span> DAK</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left spull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li></li>
        </ul>
      </li>
      <li class="treeview <?php echo active_link_multiple(array('#')); ?>">
        <a href="#">
          <i class="fa fa-circle-o"></i> <span> Dekonsentrasi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left spull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li></li>
        </ul>
      </li>
      <li class="treeview <?php echo active_link_multiple(array('#')); ?>">
        <a href="#">
          <i class="fa fa-circle-o"></i> <span> FLPP</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left spull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li></li>
        </ul>
      </li>
      <li class="treeview <?php echo active_link_multiple(array('#')); ?>">
        <a href="#">
          <i class="fa fa-circle-o"></i> <span> BACK LOCK</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left spull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li></li>
        </ul>
      </li>
      
      <li class="treeview <?php echo active_link_multiple(array('statistik','sumber_anggaran')); ?>">
        <a href="#">
          <i class="fa fa-bar-chart"></i> <span> Statistik</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo active_link_method('index','statistik') ?>">
            <a href="<?php echo site_url('statistik') ?>"><i class="fa fa-angle-double-right"></i> Penerima Bantuan</a>
          </li>
          <li class="<?php echo active_link_method('sumber_anggaran','statistik'); ?>">
            <a href="<?php echo site_url('statistik/sumber_anggaran') ?>"><i class="fa fa-angle-double-right"></i> Sumber Anggaran</a>
          </li>
          <li class="<?php echo active_link_method('dana_per_kabupaten','statistik'); ?>">
            <a href="<?php echo site_url('statistik/dana_per_kabupaten') ?>"><i class="fa fa-angle-double-right"></i> Total Dana Per Kabupaten</a>
          </li>
        </ul>
      </li>
      <li class="treeview <?php echo active_link_multiple(array('laporan','penerima_bantuan')); ?>">
        <a href="#">
          <i class="fa fa-file-text-o"></i> <span> Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo active_link_method('index','laporan') ?>">
            <a href="<?php echo site_url('laporan') ?>"><i class="fa fa-angle-double-right"></i> Calon Penerima</a>
          </li>
          <li class="<?php echo active_link_method('penerima_bantuan','laporan') ?>">
            <a href="<?php echo site_url('laporan/penerima_bantuan') ?>"><i class="fa fa-angle-double-right"></i> Penerima Bantuan</a>
          </li>
        </ul>
      </li>
      
      <li class="treeview <?php echo active_link_multiple(array('population','kriteria','sub_kriteria')); ?>">
        <a href="#">
          <i class="fa fa-database"></i> <span> Master Data</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo active_link_controller('population') ?>">
            <a href="<?php echo site_url('population') ?>"><i class="fa fa-angle-double-right"></i> Data Penduduk</a>
          </li>
          <li class="<?php echo active_link_controller('kriteria') ?>">
            <a href="<?php echo site_url('kriteria') ?>"><i class="fa fa-angle-double-right"></i> Data Kriteria</a>
          </li>
          <li class="<?php echo active_link_controller('sub_kriteria') ?>">
            <a href="<?php echo site_url('sub_kriteria') ?>"><i class="fa fa-angle-double-right"></i> Data Sub Kriteria</a>
          </li>
        </ul>
      </li>
      <li class="treeview <?php echo active_link_multiple(array('account','pengguna')); ?>">
        <a href="#">
          <i class="fa fa-wrench"></i> <span> Pengaturan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo active_link_controller('pengguna') ?>">
            <a href="<?php echo site_url('pengguna') ?>"><i class="fa fa-angle-double-right"></i> Pengguna Sistem</a>
          </li>
          <li class="<?php echo active_link_controller('account') ?>">
            <a href="<?php echo site_url('account') ?>"><i class="fa fa-angle-double-right"></i> Akun</a>
          </li>
        </ul>
      </li>
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
    ?>
  </section>
  <section class="content">
    <?php

    ?>