<div class="row">
    <!-- <div class="col-md-4">
        <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Calon </span>
                <span class="info-box-number"><?php echo $this->db->get_where('penduduk', array('status_rtlh' => 'Calon Penerima') )->num_rows(); ?> <small>calon</small></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-child"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Jumlah Penerima </span>
                <span class="info-box-number"><?php echo $this->db->get_where('penduduk', array('status_rtlh' => 'Penerima Bantuan') )->num_rows(); ?> <small>penerima</small></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="info-box bg-orange">
            <span class="info-box-icon"><i class="fa fa-dollar"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total Anggaran </span>
                <span class="info-box-number">Rp. <?php echo number_format( $this->muniversal->dana(),0,',','.' ) ?></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div> -->
    
    <div class="col-md-6">
        <div class="box box-solid">
            <div class="box-body">
              <div id="chart-bar"></div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box box-solid">
            <div class="box-body">
              <div id="chart-dana"></div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Peta Lokasi RTLH</h3>
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

      /* Bar Chart */
Highcharts.chart('chart-bar', {
    chart: {
        type: 'column'
    },
     colors: ['#FF2825','#30B725','#EFB803', '#C8C100'],

    title: {
        text: 'Grafik Penerima Bantuan Tahun <?php echo date('Y')-1 ?>'
    },
    xAxis: {
        categories: [' Bangka', ' Bangka Barat', ' Bangka Selatan', ' Bangka Tengah', 'Belitung ', ' Belitung Timur', ' Pangkalpinang'],
    },
    yAxis: {
        min: 0,
        allowDecimals: false,
        title: {
            text: 'Jumlah'
        }
    },

    credits: {
        enabled: false
    },
    series: [{
        name: 'Belum Terealisasi',
        data: [<?php echo $this->muniversal->count_penerima(1901,'Belum Terealisasi') ?>, 
              <?php echo $this->muniversal->count_penerima(1903,'Belum Terealisasi') ?>, 
              <?php echo $this->muniversal->count_penerima(1905,'Belum Terealisasi') ?>, 
              <?php echo $this->muniversal->count_penerima(1904,'Belum Terealisasi') ?>, 
              <?php echo $this->muniversal->count_penerima(1902,'Belum Terealisasi') ?>, 
              <?php echo $this->muniversal->count_penerima(1906,'Belum Terealisasi') ?>, 
              <?php echo $this->muniversal->count_penerima(1971,'Belum Terealisasi') ?>]
        },
        {
        name: 'Terealisasi',
        data: [<?php echo $this->muniversal->count_penerima(1901,'Terealisasi') ?>, 
              <?php echo $this->muniversal->count_penerima(1903,'Terealisasi') ?>, 
              <?php echo $this->muniversal->count_penerima(1905,'Terealisasi') ?>, 
              <?php echo $this->muniversal->count_penerima(1904,'Terealisasi') ?>, 
              <?php echo $this->muniversal->count_penerima(1902,'Terealisasi') ?>, 
              <?php echo $this->muniversal->count_penerima(1906,'Terealisasi') ?>, 
              <?php echo $this->muniversal->count_penerima(1971,'Terealisasi') ?>]
        },
        {
        name: 'Sedang dilaksanakan',
        data: [<?php echo $this->muniversal->count_penerima(1901,'Sedang dilaksanakan') ?>, 
              <?php echo $this->muniversal->count_penerima(1903,'Sedang dilaksanakan') ?>, 
              <?php echo $this->muniversal->count_penerima(1905,'Sedang dilaksanakan') ?>, 
              <?php echo $this->muniversal->count_penerima(1904,'Sedang dilaksanakan') ?>, 
              <?php echo $this->muniversal->count_penerima(1902,'Sedang dilaksanakan') ?>, 
              <?php echo $this->muniversal->count_penerima(1906,'Sedang dilaksanakan') ?>, 
              <?php echo $this->muniversal->count_penerima(1971,'Sedang dilaksanakan') ?>]
        },
        {
        name: 'Dibatalkan',
        data: [<?php echo $this->muniversal->count_penerima(1901,'Dibatalkan') ?>, 
              <?php echo $this->muniversal->count_penerima(1903,'Dibatalkan') ?>, 
              <?php echo $this->muniversal->count_penerima(1905,'Dibatalkan') ?>, 
              <?php echo $this->muniversal->count_penerima(1904,'Dibatalkan') ?>, 
              <?php echo $this->muniversal->count_penerima(1902,'Dibatalkan') ?>, 
              <?php echo $this->muniversal->count_penerima(1906,'Dibatalkan') ?>, 
              <?php echo $this->muniversal->count_penerima(1971,'Dibatalkan') ?>]
        }, 
     ]
});

  /* Dana Chart */
Highcharts.chart('chart-dana', {
     lang: {
        thousandsSep: ','
    },
    colors: ['#FF851B'],
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Per Sumber Anggaran Tahun <?php echo date('Y')-1 ?>'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '10px',
                fontFamily: 'Verdana, sans-serif',

            },
            formatter: function () {
                var label = this.axis.defaultLabelFormatter.call(this);

                // Use thousands separator for four-digit numbers too
                if (/^[0-9]{4}$/.test(label)) {
                    return Highcharts.numberFormat(this.value, 0);
                }
                return label;
            }
        }
    },
    yAxis: {
        title: {
            text: 'Rupiah'
        },
        allowDecimals: false,
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: "{point.y:,.0f}"
    },
    series: [{
        name: 'Sumber Dana',
        data: [
            ['APBN',<?php if (!$this->muniversal->dana_by('APBN')) { echo 0; } else { echo  $this->muniversal->dana_by('APBN'); } ?>],
            ['DAK',<?php if (!$this->muniversal->dana_by('DAK')) { echo 0; } else { echo  $this->muniversal->dana_by('DAK'); } ?>],
            ['APBD 1',<?php if (!$this->muniversal->dana_by('APBD1')) { echo 0; } else { echo  $this->muniversal->dana_by('APBD1'); } ?>],
            ['APBD 2',<?php if (!$this->muniversal->dana_by('APBD2')) { echo 0; } else { echo  $this->muniversal->dana_by('APBD2'); } ?>],
            ['CSR',<?php if (!$this->muniversal->dana_by('CSR')) { echo 0; } else { echo  $this->muniversal->dana_by('CSR'); } ?>],
            ['DABA',<?php if (!$this->muniversal->dana_by('DABA')) { echo 0; } else { echo  $this->muniversal->dana_by('DABA'); } ?>],
            ['Lainnya',<?php if (!$this->muniversal->dana_by('Lainnya')) { echo 0; } else { echo  $this->muniversal->dana_by('Lainnya'); } ?>],

        ],
        dataLabels: {
            enabled: false,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:,.0f}',
            y: 10, 
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});

function IDRFormatter(angka, prefix){
  var number_string = angka.toString().replace(/[^,\d]/g,''),
      split = number_string.split(','),
      sisa = split[0].length % 3,
      rupiah = split[0].substr(0,sisa),
      ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      if(ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');

      }

      rupiah =split[1] != undefined ? rupiah + ',' + split[1] :rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp.' + rupiah : '');
}

      </script>


      <script src = "https://maps.googleapis.com/maps/api/js"></script>
      <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2bG9GMVdY6droTYBhjR9TD2XgV2cZQd8">
      </script>
   