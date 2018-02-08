<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
        <div class="modal animated fadeIn modal-danger" id="log-off" tabindex="-1" data-backdrop="static" data-keyboard="false">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><i class="fa fa-question-circle"></i> Keluar!</h4>
                <span>Yakin anda akan Keluar dari sistem?</span>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                <a href="<?php echo base_url("login/signout?from_url=".current_url()) ?>" type="button" class="btn btn-outline"> Iya </a>
              </div>
            </div>
          </div>
        </div> 

      </section>
     </div>
 
     <footer class="main-footer ">
    <div class="pull-right hidden-xs">
      <small> Page rendered in <strong>{elapsed_time}</strong> seconds. <b>Version</b> 1.0.0 (BETA)</small>
    </div>
   <div class="container">
      <small>&copy; 2017 <?php if(date('Y')!=2017) echo "- ".date('Y'); ?> Dinas Perumahan Rakyat dan Kawasan Pemukiman Provinsi Kepuluan Bangka Belitung Develop By <a href="http://teitramega.co.id" target="_blank">Teitra Mega</a><small>
   </div>
</footer>

   <?php 
   /**
    * Load js from loader core
    *
    * @return CI_OUTPUT
    **/
   if($this->load->get_js_files() != FALSE) : 
      foreach($this->load->get_js_files() as $file) :  
    ?>
         <script src="<?php echo $file; ?>?v=<?php echo date('YmdHis'); ?>"></script>
   <?php 
      endforeach; 
    endif; 
  ?>   
</body>
</html>
<?php

/* End of file footer.php */
/* Location: ./application/views/template/footer.php */