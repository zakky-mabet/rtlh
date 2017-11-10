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
 
     <footer class="main-footer "> <!-- navbar navbar-fixed-bottom -->
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

    (function() {
     window.onload = function() {

    // Creating a new map
    var map = new google.maps.Map(document.getElementById("map"), {
          center: new google.maps.LatLng(-2.309189,106.7858913),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });


    // Creating the JSON data
    var json = [
        {"id": 1, "lat": -2.106503, "lng": 106.0915548, "icon":"green-dot.png", "description": "Rumah Adisuputra" },
        {"id": 2, "lat": -2.713925, "lng": 105.964067, "icon":"red-dot.png", "description": "Rumah Afrizal Liem" },
        
    ]

    // Creating a global infoWindow object that will be reused by all markers
    var infoWindow = new google.maps.InfoWindow();

    // Looping through the JSON data
    for (var i = 0, length = json.length; i < length; i++) {
      var data = json[i],
        latLng = new google.maps.LatLng(data.lat, data.lng);

      // Creating a marker and putting it on the map
      var marker = new google.maps.Marker({
        position: latLng,
        map: map,
        id: data.id,
        icon: 'http://maps.google.com/mapfiles/ms/icons/'+data.icon
      });

      // Creating a closure to retain the correct data, notice how I pass the current data in the loop into the closure (marker, data)
      (function(marker, data) {

        // Attaching a click event to the current marker
        google.maps.event.addListener(marker, "click", function(e) {
          infoWindow.setContent(data.description);
          infoWindow.open(map, marker);
        });


      })(marker, data);

    }

  }

})();




      </script>

      <script src = "https://maps.googleapis.com/maps/api/js"></script>
      <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2bG9GMVdY6droTYBhjR9TD2XgV2cZQd8">
      </script>


   
</body>
</html>
<?php

/* End of file footer.php */
/* Location: ./application/views/template/footer.php */