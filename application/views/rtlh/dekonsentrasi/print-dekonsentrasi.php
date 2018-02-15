<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Header Print (KOP)
*
* @author Teitra Mega office@teitraega.co.id
**/
$this->load->view('rtlh/print/header');
?>
<div class="content " style="margin-bottom: 7px;">
    <h5 class="upper text-center"><?php echo $title; ?></h5>
    <table class="table-bordered" style="width: 100%; font-size: 10px;">
        
        <thead class="bg-silver">
            <tr>
                <th width="40">NO </th>
                <th class="text-center" width="340">Nama Kegiatan</th>
                <th class="text-center" width="160">Jenis Kegiatan</th>
                <th class="text-center" width="160">Nilai Anggaran</th>
                <th class="text-center" width="100">Tahun</th>
                <th class="text-center" width="200">Tanggal Kegiatan</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
            /*
            * Loop data
            */
            $number = ( ! $this->page ) ? 0 : $this->page;
            
            foreach($dekonsentrasi as $key => $row) :
            ?>
            <tr>
                <td class="text-center">
                    <?php echo ++$number ?>
                </td>
                <td><?php echo $row->nama_kegiatan ?></td>
                <td class="text-center"><?php echo $this->dekonsentrasi->get_jenis($row->id_jenis_kegiatan)->nama_jenis; ?></td>
                <td class="text-center">Rp. <?php echo number_format($row->nilai_anggaran,'0'); ?></td>
                <td class="text-center"><?php echo $row->tahun ?></td>
                <td class="text-center"><?php echo date_id($row->tanggal_kegiatan); ?></td>
            </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>
<?php
$this->load->view('rtlh/print/footer');