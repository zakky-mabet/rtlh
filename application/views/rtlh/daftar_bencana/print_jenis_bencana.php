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
                <th width="40">No</th>
                <th width="300" class="text-center">Nama Jenis Bencana</th>
                <th class="text-center">Keterangan </th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!$daftar_bencana) { ?>
            <td colspan="4" class="text-center text-blue">
                Maaf data tidak ditemukan !
            </td>
            <?php } else {
            
            /*
            * Loop data
            */
            $number = ( ! $this->page ) ? 0 : $this->page;
            foreach($daftar_bencana as $row) :
            ?>
            <tr>
                <td class="text-center"><?php echo ++$number ?></td>
                <td><?php echo ucwords($row->nama); ?></td>
                <td><?php echo ucwords($row->keterangan); ?></td>
            </tr>
            <?php
            endforeach;
            }
            ?>
        </tbody>
    </table>
</div>
<?php
$this->load->view('rtlh/print/footer');