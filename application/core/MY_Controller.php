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

	public function penduduk($param = 0)
	{
	
		ini_set('memory_limit', '256M');
		$this->db->get('penduduk');
		$this->db->where('status_rtlh !=', 'Calon Penerima');
		$this->db->where('status_rtlh !=', 'Penerima Bantuan');
		
		if($param == FALSE) 
		{
			foreach($this->db->get('penduduk')->result() as $row)
			{
				$this->data[] = array(
					'id' => $row->ID,
					'nik' => $row->nik,
					'nama' => $row->nama_lengkap,
					'jns_kelamin' => ucfirst($row->jns_kelamin),
					'alamat' => $row->alamat,
					'status_rtlh' => $row->status_rtlh,
				); 
			} 
		}
		else {
			$get = $this->db->get_where('penduduk', array('ID' => $param))->row();

			$date = new DateTime($get->tgl_lahir);

			$this->data = array(
				'id' => $get->ID,
				'nik' => $get->nik,
				'nama' => $get->nama_lengkap,
				'tgl_lahir' => $get->tmp_lahir.", ".$date->format('d M Y'),
				'jns_kelamin' => ucfirst($get->jns_kelamin),
				'alamat' => $get->alamat,
				'agama' => ucfirst($get->agama),
				'status_kawin' => strtoupper($get->status_kawin),
				'kewarganegaraan' => strtoupper($get->kewarganegaraan),
				'status_rtlh' => $get->status_rtlh,
			);

			$this->data['status'] = true;

		} 
		$this->output->set_content_type('application/json')->set_output(json_encode($this->data));
	}


	public function insert_penerima($param = 0)
	{
	
		ini_set('memory_limit', '256M');
		$this->db->get('penduduk');
		$this->db->where('status_rtlh', 'Calon Penerima');
		
		if($param == FALSE) 
		{
			foreach($this->db->get('penduduk')->result() as $row)
			{
				$this->data[] = array(
					'id' => $row->ID,
					'nik' => $row->nik,
					'nama' => $row->nama_lengkap,
					'jns_kelamin' => ucfirst($row->jns_kelamin),
					'alamat' => $row->alamat,
					'status_rtlh' => $row->status_rtlh,
				); 
			} 
		}
		else {
			$get = $this->db->get_where('penduduk', array('ID' => $param))->row();

			$date = new DateTime($get->tgl_lahir);

			$this->data = array(
				'id' => $get->ID,
				'nik' => $get->nik,
				'nama' => $get->nama_lengkap,
				'tgl_lahir' => $get->tmp_lahir.", ".$date->format('d M Y'),
				'jns_kelamin' => ucfirst($get->jns_kelamin),
				'alamat' => $get->alamat,
				'agama' => ucfirst($get->agama),
				'status_kawin' => strtoupper($get->status_kawin),
				'kewarganegaraan' => strtoupper($get->kewarganegaraan),
				'status_rtlh' => $get->status_rtlh,
			);

			$this->data['status'] = true;

		} 
		$this->output->set_content_type('application/json')->set_output(json_encode($this->data));
	}

	public function penduduk_rkba($param = 0)
	{
	
		ini_set('memory_limit', '256M');
		$this->db->get('penduduk');
		
		if($param == FALSE) 
		{
			foreach($this->db->get('penduduk')->result() as $row)
			{
				$this->data[] = array(
					'id' => $row->ID,
					'nik' => $row->nik,
					'nama' => $row->nama_lengkap,
					'jns_kelamin' => ucfirst($row->jns_kelamin),
					'alamat' => $row->alamat,
				); 
			} 
		}
		else {
			$get = $this->db->get_where('penduduk', array('ID' => $param))->row();

			$date = new DateTime($get->tgl_lahir);

			$this->data = array(
				'id' => $get->ID,
				'nik' => $get->nik,
				'nama' => $get->nama_lengkap,
				'tgl_lahir' => $get->tmp_lahir.", ".$date->format('d M Y'),
				'jns_kelamin' => ucfirst($get->jns_kelamin),
				'alamat' => $get->alamat,
				'agama' => ucfirst($get->agama),
				'status_kawin' => strtoupper($get->status_kawin),
				'kewarganegaraan' => strtoupper($get->kewarganegaraan),
			);

			$this->data['status'] = true;

		} 
		$this->output->set_content_type('application/json')->set_output(json_encode($this->data));
	}

	public function penduduk_rtpp($param = 0)
	{
	
		ini_set('memory_limit', '256M');
		$this->db->get('penduduk');
		
		if($param == FALSE) 
		{
			foreach($this->db->get('penduduk')->result() as $row)
			{
				$this->data[] = array(
					'id' => $row->ID,
					'nik' => $row->nik,
					'nama' => $row->nama_lengkap,
					'jns_kelamin' => ucfirst($row->jns_kelamin),
					'alamat' => $row->alamat,
				); 
			} 
		}
		else {
			$get = $this->db->get_where('penduduk', array('ID' => $param))->row();

			$date = new DateTime($get->tgl_lahir);

			$this->data = array(
				'id' => $get->ID,
				'nik' => $get->nik,
				'nama' => $get->nama_lengkap,
				'tgl_lahir' => $get->tmp_lahir.", ".$date->format('d M Y'),
				'jns_kelamin' => ucfirst($get->jns_kelamin),
				'alamat' => $get->alamat,
				'agama' => ucfirst($get->agama),
				'status_kawin' => strtoupper($get->status_kawin),
				'kewarganegaraan' => strtoupper($get->kewarganegaraan),
			);

			$this->data['status'] = true;

		} 
		$this->output->set_content_type('application/json')->set_output(json_encode($this->data));
	}

}



/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */