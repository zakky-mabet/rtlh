<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
?>
<body class="hold-transition skin-sakip sidebar-mini fixed">
   <div id="load"></div>
   <div class="wrapper">
      <header class="main-header">
         <a href="<?php echo site_url('skpd/home') ?>" class="logo">
            <img src="<?php echo base_url("assets/public/image/logo.png"); ?>" class="logo-head" alt="Logo">
         </a>
         <nav class="navbar navbar-static-top">
         <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
           
               <li class="dropdown user user-menu" data-toggle="tooltip" data-placement="bottom" title="Pengaturan Login">
                  <a href="<?php echo site_url('skpd/account'); ?>" style="font-size: 20px;">
                     <i class="glyphicon glyphicon-user" style="font-size: 16px;"></i>
                  </a>
               </li>
               
               <li>
                  <a href="#" style="font-size: 20px;" data-toggle="modal" data-target="#log-off" data-placement="bottom" title="Keluar dari Sistem">
                     <i class="fa fa-power-off"></i>
                  </a>
               </li>
            </ul>
         </div>
       </nav>
      </header>

<?php  
/* End of file navbar.php */
/* Location: ./application/modules/Akademik/views/template/navbar.php */
?>