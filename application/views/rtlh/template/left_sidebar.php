<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <aside class="main-sidebar">
      <section class="sidebar">
      <div class="user-panel">
         <div class="pull-left">
            <p><strong>ADMIN :</strong> <br> <?php echo strtoupper($this->session->userdata('ADMIN')->nama) ?></p>
            <small><strong>E-Mail :</strong> <?php echo $this->session->userdata('ADMIN')->email ?></small>
         </div>
         <div style="margin-bottom: 40px;"></div>
      </div>
      <ul class="sidebar-menu">
        <li class="<?php echo active_link_method('index','home'); ?>">
            <a href="<?php  echo site_url('home') ?>">
               <i class="fa fa-dashboard"></i> <span>Home</span>
            </a>
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
          echo $breadcrumbs; 
        ?>
      </section>
      <section class="content">

<?php  
/* End of file left_sidebar.php */
/* Location: ./application/views/template/left_sidebar.php */
?>
