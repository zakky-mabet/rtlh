<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Header Print (KOP)
*
* @author Teitra Mega office@teitraega.co.id
**/
$this->load->view('rtlh/print/header');
?>
<div class="content" style="margin-bottom: 7px;">
        <h5 class="upper text-center"><?php echo $title; ?></h5>
       <table class="table-bordered" style="width: 100%; font-size: 10px;">
            <tr>
                <th class="text-center" width="40">NO</th>
                <th class="text-center">Nama Sub Kriteria</th>
                <th class="text-center">Nama Kriteria</th>
                <th class="text-center">Nilai</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!$sub_kriteria) { ?>
            <td colspan="4" class="text-center text-blue">
                Maaf data tidak ditemukan !
            </td>
            <?php } else {
            $number = ( ! $this->page ) ? 0 : $this->page;
            foreach($sub_kriteria as $row) :
            ?>
            <tr>
                <td class="text-center">
                    <?php echo ++$number  ?>
                </td>
                <td><?php echo $row->nama ?></td>
                <td><?php echo $this->sub_kriteria->get_kriteria($row->id_kriteria)->nama ?></td>
                <td class="text-center"><?php echo $row->nilai ?></td>
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