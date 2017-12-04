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

 	public function count_calon_penerima($id = 0)
 	{
 		return $this->db->get_where('penduduk', array('regency' => $id, 'status_rtlh' => 'Calon Penerima'))->num_rows();
 	}

 	public function coun_penerima_bantuan($id = 0)
 	{
 		return $this->db->get_where('penduduk', array('regency' => $id, 'status_rtlh' => 'Penerima Bantuan'))->num_rows();
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

		return $this->db->get()->row()->total;
 	}

}

