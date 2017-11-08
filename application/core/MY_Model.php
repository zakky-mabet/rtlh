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

		$this->ADMIN = $this->session->userdata('ADMIN')->ID;

	}

	
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */

