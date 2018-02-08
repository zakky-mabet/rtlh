<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_bencana extends Rtlh {

	public $data = array();

	public $per_page;

	public $page = 20;

	public $query;

	public $jenis;

	public function __construct()
	{
		parent::__construct();

		$this->load->js(base_url('assets/public/app/population.js'));

		$this->load->model('mdaftar_bencana','daftar_bencana');

		$this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

		$this->page = $this->input->get('page');

		$this->query = $this->input->get('query');

		$this->jenis = $this->input->get('jenis');
	}

	public function index() 
	{
		$this->page_title->push('Rumah Korban Bencana Alam', 'Data Bencana');

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("daftar_bencana?per_page={$this->per_page}&query={$this->query}&jenis={$this->jenis}");

		$config['per_page'] = $this->per_page;
		$config['total_rows'] = $this->daftar_bencana->get_all(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Daftar Bencana", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'daftar_bencana' => $this->daftar_bencana->get_all($this->per_page, $this->page),
			'num_daftar_bencana' => $config['total_rows']
		);

		$this->template->view('rtlh/daftar_bencana/v_daftar_bencana', $this->data);
	}

	public function jenis_bencana() 
	{
		$this->page_title->push('Rumah Korban Bencana Alam', 'Data Jenis Bencana');

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("daftar_bencana/jenis_bencana?per_page={$this->per_page}&query={$this->query}");

		$config['per_page'] = $this->per_page;
		$config['total_rows'] = $this->daftar_bencana->get_all_jenis_bencana(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Jenis Bencana", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'daftar_bencana' => $this->daftar_bencana->get_all_jenis_bencana($this->per_page, $this->page),
			'num_daftar_bencana' => $config['total_rows']
		);

		$this->template->view('rtlh/daftar_bencana/v_jenis_bencana', $this->data);
	}

	public function create_jenis()
	{
		$this->page_title->push('Rumah Korban Bencana Alam', 'Tambah Data Jenis Bencana');

		$this->form_validation->set_rules('nama', 'Nama Jenis Bencana', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');


		if ($this->form_validation->run() == TRUE)
		{
			$this->daftar_bencana->create_jenis();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Data Jenis Bencana", 
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('rtlh/daftar_bencana/create_jenis_bencana', $this->data);
	}

	public function update_jenis($param = 0)
	{
		if(!$param){
			show_404();
		}

		if (!$this->daftar_bencana->get_jenis_bencana($param)) {
			show_404();
		}

		$this->page_title->push('Rumah Korban Bencana Alam', 'Sunting Data Jenis Bencana');

		$this->form_validation->set_rules('nama', 'Nama Jenis Bencana', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');


		if ($this->form_validation->run() == TRUE)
		{
			$this->daftar_bencana->update_jenis($param);

			redirect(current_url());
		}

		$this->data = array(

			'title' => "Sunting Data Jenis Bencana",

			'page_title' => $this->page_title->show(),

			'get' => $this->daftar_bencana->get_jenis_bencana($param)
		);

		$this->template->view('rtlh/daftar_bencana/update_jenis_bencana', $this->data);
	}

	public function delete_jenis($param = 0)
	{
		$this->daftar_bencana->delete_jenis($param);

		redirect('daftar_bencana/jenis_bencana');
	}

	public function create()
	{
		$this->page_title->push('Rumah Korban Bencana Alam', 'Tambah Data Bencana');

		$this->form_validation->set_rules('nama', 'Nama Bencana', 'trim|required');
		$this->form_validation->set_rules('id_jenis_bencana', 'Jenis Bencana', 'trim|required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
		$this->form_validation->set_rules('status_bencana', 'Status Bencana', 'trim|required');
		$this->form_validation->set_rules('luas', 'Luas Bencana', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'Jumlah Korban', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->daftar_bencana->create();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Data Bencana", 
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('rtlh/daftar_bencana/create_bencana', $this->data);
	}	

	public function update($param = 0)
	{

		if(!$param){
			show_404();
		}
		if (!$this->daftar_bencana->get_bencana($param)) {
			show_404();
		}
		
		$this->page_title->push('Rumah Korban Bencana Alam', 'Sunting Data Bencana');

		$this->form_validation->set_rules('nama', 'Nama Bencana', 'trim|required');
		$this->form_validation->set_rules('id_jenis_bencana', 'Jenis Bencana', 'trim|required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
		$this->form_validation->set_rules('lokasi', 'Lokasi', 'trim|required');
		$this->form_validation->set_rules('status_bencana', 'Status Bencana', 'trim|required');
		$this->form_validation->set_rules('luas', 'Luas Bencana', 'trim|required');
		$this->form_validation->set_rules('jumlah', 'Jumlah Korban', 'trim|required');


		if ($this->form_validation->run() == TRUE)
		{
			$this->daftar_bencana->update($param);

			redirect(current_url());
		}

		$this->data = array(

			'title' => "Sunting Data Bencana",

			'page_title' => $this->page_title->show(),

			'get' => $this->daftar_bencana->get_bencana($param)
		);

		$this->template->view('rtlh/daftar_bencana/update_bencana', $this->data);
	}

	public function foto_bencana($param = 0)
	{	
		if (!$param) {
			show_404();
		}

		$sql = $this->db->get_where('daftar_bencana', array('id_bencana' => $param))->num_rows();

		if ($sql == 0) {
			show_404();
		}
	
		$this->page_title->push('Rumah Korban Bencana Alam', 'Foto-foto Bencana');

		$this->form_validation->set_rules('nama_foto', 'Nama Foto', 'trim|required');


		if($this->form_validation->run() == TRUE)
		{
			$this->daftar_bencana->upload_foto_bencana($param);

			redirect(site_url('daftar_bencana/foto_bencana/'.$param));
		}

		$this->data = array(
			'title' => "Foto Bencana-bencana", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'param' => $param,
		);

		$this->template->view('rtlh/daftar_bencana/foto_bencana', $this->data);
	}


	public function delete_foto_bencana($param = 0)
	{
		$this->daftar_bencana->delete_foto_bencana($param);

		redirect(site_url('daftar_bencana/foto_bencana/'.$this->daftar_bencana->get_foto_bencana($param)->id_daftar_bencana));
	}
}
