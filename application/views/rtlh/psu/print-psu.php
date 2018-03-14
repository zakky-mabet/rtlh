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
                <th width="40">NO</th>
                <th class="text-center">Nama Kegiatan</th>
                <th class="text-center">Jenis </th>
                <th class="text-center">Kabupaten</th>
                <th class="text-center">Pelaksana</th>
                <th class="text-center">Sumber Dana</th>
                <th class="text-center">Nilai Anggran</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Item Pekerjaan</th>
                <th class="text-center">Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            /*
            * Loop data
            */
            $number = ( ! $this->page ) ? 0 : $this->page;
            foreach($psu as $row) :
            ?>
            <tr>
                <td class="text-center">
                    <?php echo ++$number ?>
                </td>
                <td><?php echo $row->nama_kegiatan; ?></td>
                <td><?php echo $this->psu->get_jenis($row->id_jenis_psu)->nama_jenis; ?></td>
                <td><?php echo  $this->psu->get_kabupaten($row->kabupaten)->name_regencies; ?></td>
                <td class="text-center"><?php echo $this->psu->get_pelaksana($row->id_pelaksana)->nama_perusahaan; ?></td>
                <td class="text-center"><?php echo ucwords($row->sumber_dana) ?></td>
                <td class="text-center"><?php echo ucwords($row->nilai_kontrak) ?></td>
                <td><?php echo $row->alamat; ?></td>
                <td><?php echo ($row->item_pekerjaan); ?></td>
                <td><?php echo ($row->deskripsi); ?></td>
            </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>
<?php
$this->load->view('rtlh/print/footer');