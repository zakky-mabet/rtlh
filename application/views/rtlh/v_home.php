<div class="row">
    <div class="col-md-3">
        <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-files-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Misi</span>
                <span class="info-box-number"><?php echo $this->setting->countMisi(); ?></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-blue">
            <span class="info-box-icon"><i class="fa fa-files-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Tujuan</span>
                <span class="info-box-number"><?php echo $this->setting->countTujuan(); ?></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-files-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Sasaran</span>
                <span class="info-box-number"><?php echo $this->setting->countSasaran(); ?></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-files-o"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Indikator</span>
                <span class="info-box-number"><?php echo $this->setting->countIndikatorKinerja() ?></span>
                <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                </div>
            </div>
        </div>
    </div>
<!--     <div class="col-md-3">
    <div class="info-box bg-aqua">
        <span class="info-box-icon"><i class="fa fa-files-o"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Program</span>
            <span class="info-box-number"><?php echo $this->setting->countProgram() ?></span>
            <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
            </div>
        </div>
    </div>
</div> -->
    <div class="col-md-12">
        <div class="box box-default">
            <div class="box-header">
                <strong class="box-heading">STATUS PENGISIAN RENSTRA : </strong> 
            </div>
            <div class="box-body">
                <span class="badge" style="width: 100%; display: inline-block; padding: 10px; background-color: <?php echo $this->setting->statusWarna() ?>">Status Warna</span>
            </div>
        </div>
        <div class="box-default">
            <div id="grafik-status-entry" style="height: 500px;"></div>
        </div>
    </div>


</div>
<script type="text/javascript">
Highcharts.chart('grafik-status-entry', {
    chart: {
        type: 'column'
    },
    colors:['#000D8D'],
    title: {
        text: 'Persentase Pengentrian TEMAKIP'
    },
    subtitle: {
        text: 'Tahun: <strong><?php echo $this->periode_awal; ?></strong>'
    },
    xAxis: {
        categories: [<?php foreach($this->entry->getSkpd() as $row) echo "'".strtoupper($row->nama)."'," ?>],
        title: {
            text: null
        }
    },
    yAxis: {
        max:100,
        min: 0,
        title: {
            text: '',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' %'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: false
            }
        }
    },
    legend: {
        layout: 'column',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Presentase',
        data: [<?php foreach($this->entry->getSkpd() as $row){
            $entry = new Entry($row->ID); 
            echo $entry->percentage().",";
        } ?>]
    }]
});
</script>


