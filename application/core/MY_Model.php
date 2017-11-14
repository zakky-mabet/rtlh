<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model 
{

}


class Rtlh_model extends MY_Model
{

	public $ADMIN;

	public function __construct()
	{
		parent::__construct();

		$this->ADMIN = $this->session->userdata('ADMIN')->id_user;

	}

	public function get_akun($id = 0)
	{
		return $this->db->get_where('users', array('id_user' => $id))->row();
	}

	// public function get_desa($param = 0)
	// {
	// 	if($param == FALSE)
	// 	{
	// 		return $this->db->get('villages')->result();
	// 	} else {
	// 		return $this->db->get_where('villages', array('id' => $param))->row();
	// 	}
	// }

	
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */

