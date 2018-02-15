<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/

class Mpenerima extends Rtlh_model 
{

	
	public function __construct()
	{
		parent::__construct();
		
	}

	
	public function get($param = 0)
	{
		return $this->db->get_where('penduduk', array('nik' => $param))->row();
	}

	public function num_rows_penduduk($param = 0)
	{
		return $this->db->get_where('penduduk', array('nik' => $param))->num_rows();
	}

	public function get_nama_desa($id = 0)
	{
		return $this->db->get_where('villages', array('id' => $id) )->row();
	}

	public function get_nama_kabupaten($id = 0)
	{
		return $this->db->get_where('regencies', array('id' => $id) )->row();
	}

	public function get_nama_kecamatan($id = 0)
	{
		return $this->db->get_where('districts', array('id' => $id) )->row();
	}

	public function get_nama_provinsi($id = 0)
	{
		return $this->db->get_where('provinces', array('id' => $id) )->row();
	}

	public function create()
	{

		// CREATE DANA BANTUAN
		$check_nik_on_dana_bantuan = $this->db->get_where(
			'dana_bantuan', 
			array('nik' => $this->input->post('nik'))
		)->num_rows(); 

		if($check_nik_on_dana_bantuan == FALSE)
		{
			$dana_bantuan = array(
				'nik' =>  $this->input->post('nik'),
				'jenis' =>  $this->input->post('jenis'),
				'tahun_anggaran' =>  $this->input->post('tahun_anggaran'),
				'nilai' =>  $this->input->post('nilai'),
				'sumber_anggaran' =>  $this->input->post('sumber_anggaran'),
			);

			$this->db->insert('dana_bantuan', $dana_bantuan);

		}

		////////////////END

		// CREATE ASPEK BANTUAN
		$check_nik_on_aspek_bantuan = $this->db->get_where(
			'aspek_bantuan', 
			array('nik' => $this->input->post('nik'))
		)->num_rows(); 

		if($check_nik_on_aspek_bantuan == FALSE)
		{
			$aspek_bantuan = array(
				'nik' =>  $this->input->post('nik'),
				'rehab_atap' =>  $this->input->post('rehab_atap'),
				'rehab_pondasi' =>  $this->input->post('rehab_pondasi'),
				'rehab_dinding' =>  $this->input->post('rehab_dinding'),
				'rehab_lantai' =>  $this->input->post('rehab_lantai'),
				'rehab_kamar_mandi' =>  $this->input->post('rehab_kamar_mandi'),
				'rehab_pintu' =>  $this->input->post('rehab_pintu'),
				'rehab_jendela' =>  $this->input->post('rehab_jendela'),
				'rehab_kolom_dan_balok' =>  $this->input->post('rehab_kolom_dan_balok'),
				'rehab_dapur' =>  $this->input->post('rehab_dapur'),
				'sumber_penerangan' =>  $this->input->post('sumber_penerangan'),
				'sumber_air_minum' =>  $this->input->post('sumber_air_minum'),
			);

			$this->db->insert('aspek_bantuan', $aspek_bantuan);
		}

		////////////END

		// CREATE ASPEK BANTUAN
		$check_nik_on_realisasi_bantuan = $this->db->get_where(
			'realisasi_bantuan', 
			array('nik' => $this->input->post('nik'))
		)->num_rows(); 

		if($check_nik_on_realisasi_bantuan == FALSE)
		{
			$realisasi_bantuan = array(
				'nik' =>  $this->input->post('nik'),
				'tanggal_mulai' =>  $this->input->post('tanggal_mulai'),
				'tanggal_selesai' =>  $this->input->post('tanggal_selesai'),
				'deskripsi_aspek_bantuan' =>  $this->input->post('deskripsi'),
				'keterangan' =>  $this->input->post('keterangan'),

			);

			$this->db->insert('realisasi_bantuan', $realisasi_bantuan);
		}

		////////////END

		$status = array(
				'status_rtlh' => 'Penerima Bantuan',
				'status_realisasi' => 'Belum Terealisasi' 

		);
		$this->db->update('penduduk', $status, array('nik' => $this->input->post('nik')));

		$update_rumah = array(
				'deskripsi' => '<img src="'.base_url('assets/rtlh/img/'.$this->get_photo($this->input->post('nik'))->foto).'" alt="'.$this->input->post('nama_lengkap').'" width="110" style="float:left;"><div style="float:left; margin-left:10px;" ><p><b>Rumah '.$this->input->post('nama_lengkap').'</b></p><p> Status Penerima Bantuan</p><p><a href="'.base_url('data_penerima/update/'.$this->input->post('nik')).'">Detail..</a></p></div>',
		);

		$this->db->update('rumah', $update_rumah, array('nik' => $this->input->post('nik')));

		$update_tanah = array(
				'icon' => 'green-home.png' 
		);
		$this->db->update('tanah', $update_tanah, array('nik' => $this->input->post('nik')));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data berhasil disimpan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				'NIK Ini telah di Entri Sebelumnya.', 
				array('type' => 'warning','icon' => 'times')
			);
		}

	}

	public function get_photo($nik = 0)
	{
		return $this->db->get_where('rumah', array('nik' => $nik))->row();
	}

}

