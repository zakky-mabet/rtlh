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
                <th class="text-center">Nama Bencana</th>
                <th class="text-center">Nomor SK</th>
                <th>Jenis Bencana</th>
                <th>Tahun</th>
                <th>Lokasi</th>
                <th>Status Bencana</th>
              
                <th>Jumlah Rumah</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!$daftar_bencana) { ?>
            <td colspan="6" class="text-center text-blue">
                Maaf data tidak ditemukan !
            </td>
            <?php } else {
            $number = ( ! $this->page ) ? 0 : $this->page;
            foreach($daftar_bencana as $row) :
            ?>
            <tr>
                <td class="text-center"><?php echo ++$number ?></td>
                <td><?php echo ucwords($row->nama); ?></td>
                <td> <?php echo $row->no_sk ?> </td>
                <td class="text-left" style="font-size: 12px;">
                    <?php  if ($row->id_jenis_bencana!=0) {
                    echo ucwords($this->daftar_bencana->get_jenis_bencana($row->id_jenis_bencana)->nama );
                    } else { echo "<span class='text-blue'>Jenis bencana belum di entri.</span>";} ?>
                </td>
                <td><?php echo ucwords($row->tahun); ?></td>
                <td><?php echo ucwords($row->lokasi); ?></td>
                <td><?php echo ucwords($row->status_bencana); ?></td>
               
                <td><?php echo ucwords($row->jumlah); ?></td>
                
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