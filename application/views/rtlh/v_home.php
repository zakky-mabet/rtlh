<div class="row">
    <div class="col-md-3">
        <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Data Calon RTLH</span>
                <span class="info-box-number">9000 <small>Calon</small></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-blue">
            <span class="info-box-icon"><i class="fa fa-child"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Penerima RTLH</span>
                <span class="info-box-number">3000 <small>Penerima</small></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-dollar"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Anggaran RTLH</span>
                <span class="info-box-number">Rp. 900.000.000</span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-hourglass-end"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Realisasi RTLH</span>
                <span class="info-box-number">3000 <small>Realisasi</small></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>
     
    <div class="col-md-12">

          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Peta Lokasi RLTH</h3>
            </div>
    
              <div class="box-body">
                 <div id="map"></div>
              </div>
   
          </div>
    </div>

</div>
   
<script>        

    (function() {
     window.onload = function() {
          var map = new google.maps.Map(document.getElementById("map"), {
                center: new google.maps.LatLng(-2.309189,106.7858913),
                zoom: 8,
                mapTypeId: google.maps.MapTypeId.ROADMAP
              });

       
              var json = <?php echo json_encode($home) ?>
 
          var infoWindow = new google.maps.InfoWindow();

          for (var i = 0, length = json.length; i < length; i++) {
            var data = json[i],
              latLng = new google.maps.LatLng(data.lat, data.lng);

            var marker = new google.maps.Marker({
              position: latLng,
              map: map,
              id: data.id,
              animation: google.maps.Animation.DROP,
              icon: '<?php echo base_url('assets/rtlh/img/') ?>'+data.icon
            });

            (function(marker, data) {

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
   