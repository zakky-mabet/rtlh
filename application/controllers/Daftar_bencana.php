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

		$this->load->model('mdaftar_bencana','daftar_bencana');

		$this->per_page = (!$this->input->get('per_page')) ? 10: $this->input->get('per_page');

		$this->page = $this->input->get('page');

		$this->query = $this->input->get('query');

		$this->jenis = $this->input->get('jenis');
	}

	public function index() 
	{
		$this->page_title->push('Dafatar Bencana', 'Data Bencana');

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

	public function create()
	{
		$this->page_title->push('Daftar Bencana', 'Tambah Data Bencana');

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|callback_validate_email|required');
		$this->form_validation->set_rules('no_telp', 'No Handphone', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|callback_validate_username|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|max_length[12]|required');
		$this->form_validation->set_rules('repeat_pass', 'Ulangi Password', 'trim|matches[password]|required');
		$this->form_validation->set_rules('level', 'Level', 'trim|required');

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

		

}
