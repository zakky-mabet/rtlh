<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		

	}
}

/**
* Extends Class Skpd
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/
class Skpd extends MY_Controller
{
	public $periode_awal;

	public $periode_akhir;

	public $SKPD;

	public $kepala;

	public function __construct()
	{
		parent::__construct();
		
		ini_set('max_execution_time', 3000);
		
		ini_set('memory_limit', '-1');

		$this->load->library( array('session', 'form_validation', 'session','template','pagination', 'page_title', 'breadcrumbs','pdf'));

		$this->load->helper(array('url','menus'));
		
		$this->breadcrumbs->unshift(0, 'Home', "skpd/home");

		if($this->session->has_userdata('SKPD')==FALSE) 
		{	
			redirect(site_url('login?from_url='.current_url()));
		}

		$this->load->js(base_url("assets/public/app/component.js"));

		$this->periode_awal = $this->session->userdata('SKPD')->periode_awal;

		$this->periode_akhir = $this->session->userdata('SKPD')->periode_akhir;

		$this->SKPD = $this->session->userdata('SKPD')->ID;

		$this->kepala = $this->session->userdata('SKPD')->kepala;

		$this->load->model(array('setting','bupati'));
	}

	public function get_satuan_json()
	{
		$query = $this->db->get('master_satuan')->result();
		return $this->output->set_content_type('application/json')->set_output(json_encode($query));
	}

	public function indikator_program_json()
	{
		$query = $this->db->get_where('master_indikator_sasaran', array('id_skpd' => $this->SKPD))->result();
		return $this->output->set_content_type('application/json')->set_output(json_encode($query));
	}

	public function get_sasaran_json()
	{
		$query = $this->db->get_where('master_sasaran', array('id_skpd' => $this->session->userdata('SKPD')->ID ))->result();
		return $this->output->set_content_type('application/json')->set_output(json_encode($query));
	}
}


/**
* Extends Class Admin
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/
class Admin_panel extends MY_Controller
{
	public $data = array();

	public $ID;

	public function __construct()
	{
		parent::__construct();

		$this->load->library( array('session', 'form_validation', 'session','template','pagination', 'page_title', 'breadcrumbs','pdf'));

		$this->load->helper(array('url','menus'));
		
		$this->breadcrumbs->unshift(0, 'Home', "admin/main");

		if($this->session->has_userdata('ADM')==FALSE) 
		{	
			redirect(site_url('admin/login?from_url='.current_url()));
		}

		$this->ID = $this->session->userdata('ADM')->ID;
	}
}



/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */