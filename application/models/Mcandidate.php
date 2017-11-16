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

}

/* End of file Mpopulation.php */
/* Location: ./application/models/Mpopulation.php */