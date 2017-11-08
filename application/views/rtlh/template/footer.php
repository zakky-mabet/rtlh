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
 
     <footer class="main-footer navbar navbar-fixed-bottom">
    <div class="pull-right hidden-xs">
      <b>Versi</b> 1.0.0 (Pre Release)
    </div>
   <div class="container text-center">
      <small>Hak Cipta &copy; 2017 <?php if(date('Y')!=2017) echo "- ".date('Y'); ?> Dinas Perumahan Rakyat dan Kawasan Pemukiman Provinsi Kepuluan Bangka Belitung Develop By <a href="http://teitramega.co.id" target="_blank">Teitra Mega</a><small>
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

    <script>

        // fake JSON call
        function getJSONMarkers() {
          const markers = [
            {
              name:  "Rumah Adisuputra",
              location: [-2.106503, 106.0915548],
              icon:'green-dot.png'
            },
            {
              name: "Rumah Muhamad Zakky",
              location: [-2.106247,106.0915118],
              icon:'red-dot.png'
            },
            {
              name: "Rumah Rizal",
              location: [-2.10645, 106.0912808],
              icon:'blue-dot.png'
            }
          ];
          return markers;
        }

        function loadMap() {
          // Initialize Google Maps
          const mapOptions = {
            center:new google.maps.LatLng(-2.309189,106.7858913),
            zoom: 8
          }
          const map = new google.maps.Map(document.getElementById("map"), mapOptions);

          // Load JSON Data
          const RtlhMarker = getJSONMarkers();

          // Initialize Google Markers
          for(rtlh of RtlhMarker) {
            let marker = new google.maps.Marker({
              map: map,
              position: new google.maps.LatLng(rtlh.location[0], rtlh.location[1]),
              title: rtlh.name, icon: 'http://maps.google.com/mapfiles/ms/icons/'+rtlh.icon
            })
          }
        }
      </script>

      <script src = "https://maps.googleapis.com/maps/api/js"></script>
      <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqynIgDbVFyncgjL90JOJqCiUr2v13SX0&callback=loadMap">
      </script>


   
</body>
</html>
<?php

/* End of file footer.php */
/* Location: ./application/views/template/footer.php */