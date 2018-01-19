    <div class="row">
    <div class="col-md-3">
        <div class="box box-solid no-print" id="sticker">
            <div class="box-header with-border">
                <h3 class="box-title">Filter</h3>
            </div>
            <form action="" method="get">
            <div class="box-body">
               <div class="form-group">
                    <label class="control-label">Tahun :</label>
                    <select name="year" class="form-control">
                        <option value="">-- PILIH --</option>
                    <?php  
                    /**
                     * Loop Year start at develepment
                     *
                     * @var Integer
                     **/
                    for($year = 2015; $year <= date('Y-m-d', strtotime('+2 years')); $year++) :
                    ?>
                        <option value="<?php echo $year; ?>" <?php if($year==$this->input->get('year')) echo "selected"; ?>><?php echo $year; ?></option>
                    <?php  
                    endfor;
                    ?>
                    </select>
                </div>
       
            </div>
            <div class="box-footer">
                <a href="<?php echo current_url() ?>" class="btn btn-primary hvr-shadow pull-left"><i class="fa fa-times"></i> Reset</a>
                <button type="submit" class="btn btn-primary hvr-shadow pull-right"><i class="fa fa-filter"></i> Filter</button>
            </div>
            </form>
        </div>
    </div>
    
     <div class="col-md-9">
        <div class="box box-solid">
            <div class="box-body">
              <div id="chart-pie"></div>
            </div>
        </div>
    </div>

    <div class="col-md-3"></div>

    <div class="col-md-9">
        <div class="box box-solid">
            <div class="box-body">
              <div id="chart-dana"></div>
            </div>
        </div>
    </div>

    </div>

    <script>
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
        text: 'Grafik Batang Total Dana Per Kabupaten <?php if ($this->input->get('year')) {echo 'Tahun '.$this->input->get('year'); } ?>'
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
        name: 'Total Dana Per Kabupaten',
        data: [
            ['Bangka',<?php if (!$this->mstatistik->dana_by_kabupaten(1901)) { echo 0; } else { echo  $this->mstatistik->dana_by_kabupaten(1901); } ?>],

            ['Bangka Barat',<?php if (!$this->mstatistik->dana_by_kabupaten(1903)) { echo 0; } else { echo  $this->mstatistik->dana_by_kabupaten(1903); } ?>],

            ['Bangka Selatan',<?php if (!$this->mstatistik->dana_by_kabupaten(1905)) { echo 0; } else { echo  $this->mstatistik->dana_by_kabupaten(1905); } ?>],

            ['Bangka Tengah',<?php if (!$this->mstatistik->dana_by_kabupaten(1904)) { echo 0; } else { echo  $this->mstatistik->dana_by_kabupaten(1904); } ?>],

            ['Belitung',<?php if (!$this->mstatistik->dana_by_kabupaten(1902)) { echo 0; } else { echo  $this->mstatistik->dana_by_kabupaten(1902); } ?>],

            ['Belitung Timur',<?php if (!$this->mstatistik->dana_by_kabupaten(1906)) { echo 0; } else { echo  $this->mstatistik->dana_by_kabupaten(1906); } ?>],

             ['Pangkalpinang',<?php if (!$this->mstatistik->dana_by_kabupaten(1971)) { echo 0; } else { echo  $this->mstatistik->dana_by_kabupaten(1971); } ?>],

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


Highcharts.chart('chart-pie', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    colors: ['#000D8D','#1741BB','#175CE4','#176FE4','#1780FA','#17ABFF','#17E2FF'],
    title: {
        text: 'Grafik Pie Total Dana Per Kabupaten  <?php if ($this->input->get('year')) {echo 'Tahun '.$this->input->get('year'); } ?>'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b><br> Jumlah : <b>{point.y}</b> Rupiah'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                }
            }
        }
    },
    series: [{
        name: 'Total',
        colorByPoint: true,
        data: [
                {
                name: 'Bangka',
                y:<?php if (!$this->mstatistik->dana_by_kabupaten(1901)) { echo 0; } else { echo  $this->mstatistik->dana_by_kabupaten(1901); } ?> },

                {
                name: 'Bangka Barat',
                y:<?php if (!$this->mstatistik->dana_by_kabupaten(1903)) { echo 0; } else { echo  $this->mstatistik->dana_by_kabupaten(1903); } ?> },

                {
                name: 'Bangka Selatan',
                y:<?php if (!$this->mstatistik->dana_by_kabupaten(1905)) { echo 0; } else { echo  $this->mstatistik->dana_by_kabupaten(1905); } ?> },

                {
                name: 'Bangka Tengah',
                y:<?php if (!$this->mstatistik->dana_by_kabupaten(1904)) { echo 0 ; } else { echo  $this->mstatistik->dana_by_kabupaten(1904); } ?> },

                 {
                name: 'Belitung',
                y:<?php if (!$this->mstatistik->dana_by_kabupaten(1902)) { echo 0; } else { echo  $this->mstatistik->dana_by_kabupaten(1902); } ?> },

                 {
                name: 'Belitung Timur',
                y:<?php if (!$this->mstatistik->dana_by_kabupaten(1906)) { echo 0; } else { echo  $this->mstatistik->dana_by_kabupaten(1906); } ?> },
                {
                name: 'Pangkalpinang',
                y:<?php if (!$this->mstatistik->dana_by_kabupaten(1971)) { echo 0; } else { echo  $this->mstatistik->dana_by_kabupaten(1971); } ?> },
                    

        ]
    }]
});


</script>