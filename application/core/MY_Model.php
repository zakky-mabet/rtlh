<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model 
{

}

class Rtlh_model extends MY_Model
{

	public function __construct()
	{
		parent::__construct();

	}

	public function get_akun($id = 0)
	{
		return $this->db->get_where('users', array('id_user' => $id))->row();
	}
	
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */

