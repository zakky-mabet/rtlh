<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		

	}
}


class Rtlh extends MY_Controller
{

	public $ADMIN;


	public function __construct()
	{
		parent::__construct();
		
		ini_set('max_execution_time', 3000);
		
		ini_set('memory_limit', '-1');

		$this->load->library( array('session', 'form_validation', 'session','template','pagination', 'page_title', 'breadcrumbs','pdf'));

		$this->load->helper(array('url','menus'));		
		
		$this->breadcrumbs->unshift(0, 'Home', "home");

		if($this->session->has_userdata('ADMIN')==FALSE) 
		{	
			redirect(site_url('login?from_url='.current_url()));
		}

		$this->ADMIN = $this->session->userdata('ADMIN')->id_user;


	}

}



/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */