<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <aside class="main-sidebar">
      <section class="sidebar">

      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/public/image/avatar.jpg') ?>" class="img-circle" alt=" ">
        </div>
        <div class="pull-left info">
          <p><?php echo strtoupper($this->session->userdata('ADMIN')->nama) ?></p>
          <a href="#">muhamadzakky45@gmail.com</a>
        </div>
         <div style="margin-bottom: 40px;"></div>
      </div>

      <ul class="sidebar-menu">
        <li class="<?php echo active_link_method('index','home'); ?>">
            <a href="<?php  echo site_url('home') ?>">
               <i class="fa fa-home"></i> <span>Home</span>
            </a>
        </li>

        <li class="<?php echo active_link_controller('candidate'); ?>">
            <a href="<?php  echo site_url('candidate') ?>">
               <i class="fa fa-user"></i> <span>Calon Penerima RTLH</span>
            </a>
        </li>

        <li class="treeview <?php echo active_link_multiple(array('population','provinsi', 'kabupaten','kecamatan','desa')); ?>">
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
            <!-- <li class="<?php echo active_link_controller('provinsi') ?>">
              <a href="<?php echo site_url('provinsi') ?>"><i class="fa fa-angle-double-right"></i> Data Provinsi</a>
            </li>

            <li class="<?php echo active_link_controller('kabupaten') ?>">
              <a href="<?php echo site_url('kabupaten') ?>"><i class="fa fa-angle-double-right"></i> Data Kabupaten</a>
            </li>

            <li class="<?php echo active_link_controller('kecamatan') ?>">
              <a href="<?php echo site_url('kecamatan') ?>"><i class="fa fa-angle-double-right"></i> Data Kecamatan</a>
            </li>

             <li class="<?php echo active_link_controller('desa') ?>">
              <a href="<?php echo site_url('desa') ?>"><i class="fa fa-angle-double-right"></i> Data Desa</a>
            </li> -->

          </ul>
        </li>
       
        <li class="<?php echo active_link_controller('account'); ?>">
            <a href="<?php  echo site_url('account') ?>">
               <i class="fa fa-wrench"></i> <span>Pengaturan Akun</span>
            </a>
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
          //echo $breadcrumbs; 
        ?>
      </section>
      <section class="content">

<?php  
/* End of file left_sidebar.php */
/* Location: ./application/views/template/left_sidebar.php */
?>
