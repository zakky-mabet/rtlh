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
              <a href="<?php echo site_url('data_candidate') ?>"><i class="fa fa-angle-double-right"></i> Data Calon Penerima</a>
            </li>

          </ul>
        </li>

        <li class="treeview <?php echo active_link_multiple(array('penerima','data_penerima')); ?>">
            <a href="#">
               <i class="fa fa-child"></i> <span> Penerima Bantuan RTLH</span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left spull-right"></i>
               </span>
            </a>
          <ul class="treeview-menu">

            <li class="<?php echo active_link_controller('penerima') ?>">
              <a href="<?php echo site_url('penerima') ?>"><i class="fa fa-angle-double-right"></i> Entri Penerima</a>
            </li>
            <li class="<?php echo active_link_controller('data_penerima') ?>">
              <a href="<?php echo site_url('data_penerima') ?>"><i class="fa fa-angle-double-right"></i> Data Penerima Bantuan</a>
            </li>

          </ul>
        </li>

         <li class="treeview <?php echo active_link_multiple(array('rkba')); ?>">
            <a href="#">
               <i class="fa fa-institution"></i> <span> <strike>RKBA</strike></span>
               <span class="pull-right-container">
                  <i class="fa fa-angle-left spull-right"></i>
               </span>
            </a>
          <ul class="treeview-menu">

            <li class="<?php echo active_link_controller('rkba') ?>">
              <a href="<?php echo site_url('#') ?>"><i class="fa fa-angle-double-right"></i> <strike>Entri</strike> </a>
            </li>
            <li class="<?php echo active_link_controller('data_rkba') ?>">
              <a href="<?php echo site_url('#') ?>"><i class="fa fa-angle-double-right"></i> <strike>Data RKBA</strike></a>
            </li>

          </ul>
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
/* End of file left_sidebar.php */
/* Location: ./application/views/template/left_sidebar.php */
?>
