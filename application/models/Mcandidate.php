<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* RTLH
* Candidate Model Class 
*
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/

class Mcandidate extends Rtlh_model 
{
	//public $user;
	
	public function __construct()
	{
		parent::__construct();
		
	}

	
	public function get($param = 0)
	{
		return $this->db->get_where('penduduk', array('nik' => $param))->row();
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

		// CREATE TANAH
		$check_nik_on_tanah = $this->db->get_where(
			'tanah', 
			array('nik' => $this->input->post('nik'))
		)->num_rows(); 

		if($check_nik_on_tanah == FALSE)
		{
			$tanah = array(
				'nik' =>  $this->input->post('nik'),
				'no_sertifikat' =>  $this->input->post('no_sertifikat'),
				'panjang' =>  $this->input->post('panjang'),
				'lebar' =>  $this->input->post('lebar'),
				'luas' =>  $this->input->post('panjang')*$this->input->post('lebar'),
				'latitude' =>  $this->input->post('latitude'),
				'longitude' =>  $this->input->post('longitude'),
				'icon' => 'red-home.png'
			);

			$this->db->insert('tanah', $tanah);

		}


		//CREATE RUMAH
		$check_nik_on_rumah = $this->db->get_where(
			'rumah', 
			array('nik' => $this->input->post('nik'))
		)->num_rows(); 

		if($check_nik_on_rumah == FALSE)
		{
			if (isset($_FILES['foto'])) 
	   		{
				$create_tgl = date('Y-m-d H:i:s'); 
			    $this->load->library('upload');
			    $nmfile = date('YmdHis'); 
			    $config['upload_path'] = './assets/rtlh/img/';
			    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
			    $config['max_size'] = '40480';
			    $config['file_name'] = $nmfile; 
		     	$this->upload->initialize($config);
		     	if ($this->upload->do_upload('foto'))
				{ 
			       	$foto = $this->upload->data();
		     	}
	    	}

			$rumah = array(
				'nik' =>  $this->input->post('nik'),
				'status_kepemilikan_rumah' =>  $this->input->post('status_kepemilikan_rumah'),
				'luas_m2' =>  $this->input->post('luas_m2'),
				'jml_penghuni' =>  $this->input->post('jml_penghuni'),
				'pondasi' =>  $this->input->post('pondasi'),
				'kolom_balok' =>  $this->input->post('kolom_balok'),
				'foto' => $foto['file_name'],
				'deskripsi' => '<img src="'.base_url('assets/rtlh/img/'.$foto['file_name']).'" alt="'.$this->input->post('nama_lengkap').'" width="110" style="float:left;"><div style="float:left; margin-left:10px;" ><p><b>Rumah '.$this->input->post('nama_lengkap').'</b></p><p> Status Calon Penerima</p><p><a href="'.base_url('data_candidate/update/'.$this->input->post('nik')).'">Detail..</a></p></div>'

			);
			$this->db->insert('rumah', $rumah);
		}



		// FASILITAS RUMAH
		$check_nik_on_fasilitas_rumah = $this->db->get_where(
			'fasilitas_rumah', 
			array('nik' => $this->input->post('nik'))
		)->num_rows(); 

		if($check_nik_on_fasilitas_rumah == FALSE)
		{
			$fasilitas_rumah = array(
				'nik' =>  $this->input->post('nik'),
				'jendela_lubang_cahaya' =>  $this->input->post('jendela_lubang_cahaya'),
				'fentilasi' =>  $this->input->post('fentilasi'),
				'kamar_mandi' =>  $this->input->post('kamar_mandi'),
				'jarak_sumber_air_ke_wc' =>  $this->input->post('jarak_sumber_air_ke_wc'),
			);

			$this->db->insert('fasilitas_rumah', $fasilitas_rumah);
		}

		// Kriteria
		$check_nik_on_nilai_kriteria = $this->db->get_where(
			'nilai_kriteria', 
			array('nik' => $this->input->post('nik'))
		)->num_rows(); 

		if($check_nik_on_nilai_kriteria == FALSE)
		{
			
			$total = $this->get_nilai($this->input->post('1'))->nilai + $this->get_nilai($this->input->post('2'))->nilai +$this->get_nilai($this->input->post('3'))->nilai +$this->get_nilai($this->input->post('4'))->nilai +$this->get_nilai($this->input->post('5'))->nilai +$this->get_nilai($this->input->post('6'))->nilai +$this->get_nilai($this->input->post('7'))->nilai +$this->get_nilai($this->input->post('8'))->nilai +$this->get_nilai($this->input->post('9'))->nilai +$this->get_nilai($this->input->post('10'))->nilai +$this->get_nilai($this->input->post('11'))->nilai +$this->get_nilai($this->input->post('12'))->nilai +$this->get_nilai($this->input->post('13'))->nilai +$this->get_nilai($this->input->post('14'))->nilai ;

			$nilai_kriteria = array(
				'nik' =>  $this->input->post('nik'),
				'penghasilan' =>  $this->input->post('1'),
				'pekerjaan' =>  $this->input->post('2'),
				'kondisi_dinding' =>  $this->input->post('3'),
				'kondisi_atap' =>  $this->input->post('4'),
				'kondisi_lantai' =>  $this->input->post('5'),
				'luas_lantai' =>  $this->input->post('6'),
				'kepemilikan_lahan' =>  $this->input->post('7'),
				'jumlah_anggota_keluarga' =>  $this->input->post('8'),
				'jumlah_tanggungan' =>  $this->input->post('9'),
				'sumber_penerangan' =>  $this->input->post('10'),
				'sumber_air' =>  $this->input->post('11'),
				'kepemilikan_mck' =>  $this->input->post('12'),
				'kemampuan_berobat' =>  $this->input->post('13'),
				'kemampuan_beli_pakaian' =>  $this->input->post('14'),
				'total' => $total,
			);

			$this->db->insert('nilai_kriteria', $nilai_kriteria);
		}

		$status = array(
				'status_rtlh' => 'Calon Penerima',
				'status_realisasi' => 'Belum Terealisasi',
		);

		$this->db->update('penduduk', $status, array('nik' => $this->input->post('nik')));

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

	public function get_all_kriteria()
	{
		return $this->db->get('kriteria')->result();
	}

	public function get_all_sub_kriteria($param)
	{
		return $this->db->get_where('sub_kriteria', array('id_kriteria' => $param))->result();
	}

	public function get_nilai($param)
	{
		return $this->db->get_where('sub_kriteria', array('id' => $param))->row();
	}
}

