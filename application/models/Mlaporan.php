<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* RTLH
* Data_candidate Model Class 
*
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/

class Mlaporan extends Rtlh_model 
{
	
	
	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{

		if($this->input->get('query') != '')
			$this->db->like('penduduk.nik', $this->input->get('query'))
					 ->like('penduduk.nama_lengkap', $this->input->get('query'));

		$this->db->where('status_rtlh', 'Calon Penerima');

		if($type == 'result')
		{
			$this->db->from('penduduk');

  			$this->db->join('rumah', 'rumah.nik = penduduk.nik');

  			$this->db->join('tanah', 'tanah.nik = rumah.nik');

  			$this->db->join('nilai_kriteria', 'nilai_kriteria.nik = tanah.nik');

  			$this->db->order_by('nilai_kriteria.total', 'desc');

  			$this->db->limit($limit, $offset);

  			return $this->db->get()->result();

		} else {
			return $this->db->get('penduduk')->num_rows();
		}
	}

	public function get_all_penerima($limit = 20, $offset = 0, $type = 'result')
	{
		if($this->input->get('query') != '')
			$this->db->like('nik', $this->input->get('query'))
					 ->or_like('nama_lengkap', $this->input->get('query'));

		if($this->input->get('status_realisasi') != '')
			$this->db->where('status_realisasi', $this->input->get('status_realisasi'));

		$this->db->where('status_rtlh', 'Penerima Bantuan');

		if($type == 'result')
		{
			$this->db->from('penduduk');

  			$this->db->limit($limit, $offset);

  			return $this->db->get()->result();

		} else {
			return $this->db->get('penduduk')->num_rows();
		}
	}

	public function get_value_sub_kriteria($param= 0)
	{
		return $this->db->get_where('sub_kriteria', array('id' => $param))->row();
	
	}

	public function gambar_rumah($param = 0)
		{
			$this->db->limit(4);

			return $this->db->get_where('foto_rumah', array('nik' => $param, 'kategori' => 'sebelum' ))->result();
		}	

	public function gambar_rumah_setelah($param = 0)
		{
			$this->db->limit(4);

			return $this->db->get_where('foto_rumah', array('nik' => $param, 'kategori' => 'setelah' ))->result();
		}	

}

