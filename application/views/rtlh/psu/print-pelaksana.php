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
                <th class="text-center" width="280">Nama Perusahaan</th>
                <th class="text-center" width="210">Nama Direktur </th>
                <th class="text-center" width="210">Kategori</th>
                <th class="text-center" width="290">Alamat Kantor</th>
            </tr>
        </thead>
        <tbody>
            <?php
            /*
            * Loop data
            */
            $number = ( ! $this->page ) ? 0 : $this->page;
            foreach($daftar_pelaksana as $row) :
            ?>
            <tr>
                <td class="text-center">
                    <?php echo ++$number ?>
                </td>
                <td><?php echo $row->nama_perusahaan ?></td>
                <td><?php echo $row->direktur; ?></td>
                <td><?php echo $row->kategori; ?></td>
                <td><?php echo $row->alamat_kantor; ?></td>
            </tr>
            <?php
            endforeach;
            ?>
        </tbody>
    </table>
</div>
<?php
$this->load->view('rtlh/print/footer');