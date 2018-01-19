<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/

class Muniversal extends Rtlh_model 
{
	
	public function __construct()
	{
		parent::__construct();

	}

	public function get_account_by_login($param=0)
    {
      return $this->db->get_where('users', array('id_user' => $param))->row();
    }

 	
 	public function count_penerima($id = 0, $status = '')
 	{
 			$this->db->from('penduduk');

  			$this->db->join('dana_bantuan', 'dana_bantuan.nik = penduduk.nik');

  			$this->db->where('regency', $id);

  			$this->db->where('status_realisasi', $status);

  			$this->db->where('tahun_anggaran', date('Y')-1 );

  			return $this->db->get()->num_rows();
 	}

 	public function dana()
 	{
 		$this->db->select('SUM(nilai) as total ');

		$this->db->from('dana_bantuan');

		return $this->db->get()->row()->total;
 	}

 	public function dana_by($param = '')
 	{
 		$this->db->select('SUM(nilai) as total ');

		$this->db->from('dana_bantuan');

		$this->db->where('sumber_anggaran', $param);

		$this->db->where('tahun_anggaran', date('Y')-1 );

		return $this->db->get()->row()->total;
 	}

}

