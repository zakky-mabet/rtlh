<div class="row">
    <div class="col-md-3">
        <div class="box box-solid no-print" id="sticker">
            <div class="box-header with-border">
                <h3 class="box-title">Statistik PSU</h3>
            </div>
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                    <li class="<?php echo active_link_method('psu','statistik'); ?>">
                        <a href="<?php echo site_url('statistik/psu') ?>">Sumber Anggaran</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-md-9">
        <div class="col-md-12">
            <div class="box box-solid " >
            <div class="box-header with-border">
                <h3 class="box-title">Filter</h3>
            </div>
            <div class="box-body">
                <form action="" method="get" role="form">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kabupaten : </label>
                                <select name="kabupaten" class="form-control input-sm select2">
                                        <option value="">-- PILIH --</option>
                                    <?php foreach ($this->muniversal->get_all_kabupaten(19) as $key => $value): ?>
                                        <option value="<?php echo $value->id ?>" <?php if($this->input->get('kabupaten')==$value->id) echo 'selected'; ?>><?php echo $value->name_regencies ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tahun : </label>
                                <select name="tahun" class="form-control input-sm select2">
                                    <option value="">-- PILIH --</option>
                                   <?php foreach ($this->mstatistik->get_tahun_psu_distinct() as $key => $value): ?>
                                       <option value="<?php echo $value->tahun ?>" <?php if($this->input->get('tahun')==$value->tahun) echo 'selected'; ?>><?php echo $value->tahun ?></option>A
                                   <?php endforeach ?>
                                </select>
                            </div>
                        </div>
                
                        <div class="col-md-3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-warning hvr-shadow top"><i class="fa fa-filter"></i> Filter</button>
                                <a href="<?php echo site_url('statistik/psu') ?>" class="btn btn-warning hvr-shadow top" style="margin-left: 10px;"><i class="fa fa-times"></i> Reset</a>
                            </div>
                        </div>

                </form>
            </div>
        </div>
        </div>

        <div id="bars"></div>
        <p></p>
        <div id="sliders">        
            <div class="col-md-4">
                <h6>Alpha Angle</h6>
                <p><input id="alpha" type="range" min="0" max="45" value="15"/> <span id="alpha-value" class="value"></span></p>
            </div>
            <div class="col-md-4">
                <h6>Beta Angle</h6>
                <p><input id="beta" type="range" min="-45" max="45" value="15"/> <span id="beta-value" class="value"></span></p>
            </div>
            <div class="col-md-4">
                <h6>Depth</h6>
                <p><input id="depth" type="range" min="20" max="100" value="50"/> <span id="depth-value" class="value"></span></p>
            </div>
        </div>


    </div>

</div>

    <script>
  
// Set up the chart
var chart = new Highcharts.Chart({
    chart: {
        renderTo: 'bars',
        type: 'column',
        options3d: {
            enabled: true,
            alpha: 0,
            beta: 19,
            depth: 100,
            viewDistance: 25
        }
    },
    colors: ['#000D8D','#299617', '#E936A7', '#FFAA1D', ' #FD3A4A', '#87FF2A','#2243B6'],
    title: {
        text: 'Grafik Sumber Anggaran  Prasarana Sarana dan Utilitas'
    },
    subtitle: {
        text: '<p><?php if ($this->input->get('tahun') != '') { echo 'Tahun '.$this->input->get('tahun'); } ?> <?php if ($this->input->get('kabupaten') != '') 
        { echo ucfirst($this->muniversal->get_kabupaten($this->input->get('kabupaten'))->name_regencies); } ?></p>'
    },
    plotOptions: {
        column: {  
            depth: 29
        }
    },
    series: [
        <?php foreach ($this->mstatistik->get_sumber_anggaran_psu_distinct() as $key => $value) { ?>
            {  name:'<?php echo $value->sumber_dana ?>', data: [<?php echo $this->mstatistik->dana_by_sumber_anggaran_psu($value->sumber_dana) ?>] },
        <?php } ?>    
    ]

});

function showValues() {
    $('#alpha-value').html(chart.options.chart.options3d.alpha);
    $('#beta-value').html(chart.options.chart.options3d.beta);
    $('#depth-value').html(chart.options.chart.options3d.depth);
}

// Activate the sliders
$('#sliders input').on('input change', function () {
    chart.options.chart.options3d[this.id] = parseFloat(this.value);
    showValues();
    chart.redraw(true);
});

showValues();

</script>

