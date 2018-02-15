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
                <th class="text-center">NIK</th>
                <th class="text-center">Nama Lengkap </th>
                <th class="text-center">Kabupaten </th>
                <th class="text-center">Sumber Anggaran</th>
                <th class="text-center">Jumlah Bantuan</th>
                <th class="text-center">Tahun</th>
                <th class="text-center">Terkena Proyek</th>
                <th class="text-center">Lokasi Rumah</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!$rtpp): ?>
            
            <td colspan="11">
                <div class="col-md-8 col-md-offset-2">
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Maaf! </strong> Tidak ada data di database ...
                    </div>
                </div>
            </td>
            <?php else : ?>
            <?php
            /*
            * Loop
            */
            $number = ( ! $this->page ) ? 0 : $this->page;
            
            foreach($rtpp as $key => $row) :
            ?>
            <tr>
                <td class="text-center"> <?php echo ++$number ?> </td>
                <td><?php echo $row->nik ?></td>
                <td><?php echo $row->nama_lengkap ?></td>
                <td class="text-center" ><?php echo $this->muniversal->get_kabupaten($row->regency)->name_regencies; ?> </td>
                <td class="text-center"><?php echo $row->sumber_anggaran ?> </td>
                <td>Rp. <?php echo number_format($row->jumlah_bantuan,'0'); ?> </td>
                <td class="text-center"><?php echo $row->tahun ?> </td>
                <td class="text-left"><?php echo $this->rtpp->get_proyek($row->id_proyek_rtpp)->nama_proyek; ?> </td>
                <td><?php echo $row->lokasi_rumah; ?> </td>
                <td><?php echo $row->aksi; ?> </td>
            </tr>
            <?php
            endforeach;
            ?>
            <?php endif ?>
        </tbody>
    </table>
</div>
<?php 
$this->load->view('rtlh/print/footer');