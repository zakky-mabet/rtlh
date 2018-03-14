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
                <th class="text-center">NIK</th>
                <th class="text-center">Nama Lengkap</th>
                <th class="text-center">Kabupaten</th>
                <th class="text-center">Kelurahan/ Desa</th>
                <th class="text-center">Alamat</th>
                <th class="text-center">Korban Bencana</th>
                <th class="text-center">Jenis Kerusakan</th>
                <th class="text-center">Jenis Kegiatan</th>
                <th class="text-center">Tahun</th>
                <th class="text-center">Sumber Dana</th>
                <th class="text-center">Jumlah Bantuan</th>
                <th class="text-center">Koordinat</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $number = ( ! $this->page ) ? 0 : $this->page;
            foreach($data_rkba as $row) :
            ?>
            <tr>
                <td class="text-center" rowspan="3">
                    <?php echo ++$number ?>
                </td>
                <td><?php echo $row->nik; ?></td>
                <td><?php echo ucwords($row->nama_lengkap); ?></td>
                <td class="text-left"><?php echo $this->data_penerima->get_nama_kabupaten($row->regency)->name_regencies;  ?></td>
                <td class="text-center"><?php echo $this->data_penerima->get_nama_desa($row->village)->name_villages;  ?></td>
                <td><?php echo ucwords($row->alamat); ?></td>
                <td><?php echo ucwords($this->data_rkba->get_daftar_bencana($row->id_daftar_bencana)->nama); ?> </td>
                <td><?php echo ucwords($row->jenis_kerusakan); ?> </td>
                <td><?php echo ucwords($row->jenis_kegiatan); ?> </td>
                <td class="text-center"><?php echo ucwords($row->tahun); ?> </td>
                <td class="text-center"><?php echo ucwords($row->sumber_anggaran); ?> </td>
                <td>Rp. <?php echo number_format($row->jumlah_bantuan,'0'); ?> </td>
                <td><?php echo ucwords($row->latitude.', '.$row->longitude ); ?> </td>
            </tr>
            <tr>
                <td colspan="2">Foto Rumah Sebelum Bantuan : </td>
                <td colspan="11" class="text-center">
                   <?php if (!$this->data_rkba->foto_rkba($row->id,'sebelum')): ?>
                    Foto belum di input !
                    <?php else: ?>
                    <?php foreach ($this->data_rkba->foto_rkba($row->id, 'sebelum') as $key => $value): ?>
                              <img style="padding: 5px" width="160" src="<?php echo base_url('assets/rtlh/img/foto_rkba/'.$value->foto) ?>"alt="<?php echo $value->nama_foto ?>">
                    <?php endforeach ?>
                    <?php endif ?>
                </tr>
                <tr>
                    <td colspan="2">Foto Rumah Setelah Bantuan : </td>
                    <td colspan="11" class="text-center">
                         <?php if (!$this->data_rkba->foto_rkba($row->id,'setelah')): ?>
                        Foto belum di input !
                        <?php else: ?>
                        <?php foreach ($this->data_rkba->foto_rkba($row->id, 'setelah') as $key => $value): ?>
                                  <img style="padding: 5px" width="160" src="<?php echo base_url('assets/rtlh/img/foto_rkba/'.$value->foto) ?>"alt="<?php echo $value->nama_foto ?>">
                        <?php endforeach ?>
                        <?php endif ?>
                    </td>
                </tr>
                <?php
                endforeach;
                ?>
        </tbody>
    </table>
</div>
<?php
$this->load->view('rtlh/print/footer');