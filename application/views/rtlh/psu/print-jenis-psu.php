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
                <th width="50">NO</th>
                <th class="text-center" width="580">Nama Jenis</th>
                <th class="text-center" width="290">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $number = ( ! $this->page ) ? 0 : $this->page;
            foreach($master_jenis as $row) :
            ?>
            <tr>
                <td class="text-center">
                    <?php echo ++$number ?>
                </td>
                <td><?php echo highlight_phrase($row->nama_jenis, $this->input->get('query'),'<span style="color:red; font-weight: bold;">', '</span>');    ?></td>
                <td><?php echo $row->keterangan; ?></td>
                
            </tr>
            <?php
            endforeach;
            ?>
        </tbody>
        
    </table>
</div>
<?php
$this->load->view('rtlh/print/footer');