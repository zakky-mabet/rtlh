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
              <div id="chart-bar"></div>
            </div>
        </div>
    </div>

    <script>
      /* Bar Chart */
Highcharts.chart('chart-bar', {
    chart: {
        type: 'column'
    },
     colors: ['#FF2825','#30B725','#EFB803', '#C8C100'],

    title: {
        text: 'Grafik Batang Penerima Bantuan RTLH <?php if ($this->input->get('year')) {echo 'Tahun '.$this->input->get('year'); } ?>'
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
        data: [<?php echo $this->mstatistik->statistik_penerima(1901,'Belum Terealisasi') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1903,'Belum Terealisasi') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1905,'Belum Terealisasi') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1904,'Belum Terealisasi') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1902,'Belum Terealisasi') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1906,'Belum Terealisasi') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1971,'Belum Terealisasi') ?>]
        },
        {
        name: 'Terealisasi',
        data: [<?php echo $this->mstatistik->statistik_penerima(1901,'Terealisasi') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1903,'Terealisasi') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1905,'Terealisasi') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1904,'Terealisasi') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1902,'Terealisasi') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1906,'Terealisasi') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1971,'Terealisasi') ?>]
        },
        {
        name: 'Sedang dilaksanakan',
        data: [<?php echo $this->mstatistik->statistik_penerima(1901,'Sedang dilaksanakan') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1903,'Sedang dilaksanakan') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1905,'Sedang dilaksanakan') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1904,'Sedang dilaksanakan') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1902,'Sedang dilaksanakan') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1906,'Sedang dilaksanakan') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1971,'Sedang dilaksanakan') ?>]
        },
        {
        name: 'Dibatalkan',
        data: [<?php echo $this->mstatistik->statistik_penerima(1901,'Dibatalkan') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1903,'Dibatalkan') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1905,'Dibatalkan') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1904,'Dibatalkan') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1902,'Dibatalkan') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1906,'Dibatalkan') ?>, 
              <?php echo $this->mstatistik->statistik_penerima(1971,'Dibatalkan') ?>]
        }, 
     ]
});

</script>