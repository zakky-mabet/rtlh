<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends Rtlh {

	public $data = array();

	public $per_page;

	public $page = 20;

	public $level;

	public $query;

	public function __construct()
	{
		parent::__construct();

		$this->load->js(base_url('assets/public/app/population.js'));

		$this->load->model('mpengguna','pengguna');

		$this->per_page = (!$this->input->get('per_page')) ? 20: $this->input->get('per_page');

		$this->page = $this->input->get('page');

		$this->level = $this->input->get('level');

		$this->query = $this->input->get('query');
	}

	public function index() 
	{
		$this->page_title->push('Pengaturan', 'Pengguna Sistem');

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("pengguna?per_page={$this->per_page}&query={$this->query}&level={$this->level}");

		$config['per_page'] = $this->per_page;
		$config['total_rows'] = $this->pengguna->get_all(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Pengguna Sistem", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'pengguna' => $this->pengguna->get_all($this->per_page, $this->page),
			'num_pengguna' => $config['total_rows']
		);

		$this->template->view('rtlh/pengguna/data-pengguna', $this->data);
	}

	public function create()
	{
		$this->page_title->push('Pengguna Sistem', 'Tambah Data Pengguna Sistem');

		$this->breadcrumbs->unshift(2, 'Data Pengguna Sistem', "pengguna");

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|callback_validate_email|required');
		$this->form_validation->set_rules('no_telp', 'No Handphone', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|callback_validate_username|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|min_length[8]|max_length[12]|required');
		$this->form_validation->set_rules('repeat_pass', 'Ulangi Password', 'trim|matches[password]|required');
		$this->form_validation->set_rules('level', 'Level', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->pengguna->create();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Data Pengguna Sistem", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('rtlh/pengguna/create-pengguna', $this->data);
	}

	public function update($param = 0)
	{
		$this->page_title->push('Pengguna Sistem', 'Sunting Data Pengguna Sistem');

		$this->breadcrumbs->unshift(2, 'Data Pengguna Sistem', "pengguna");

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|callback_validate_email|required');
		$this->form_validation->set_rules('no_telp', 'No Handphone', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|callback_validate_username|required');
		$this->form_validation->set_rules('level', 'Level', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->pengguna->update($param);

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Sunting Data Pengguna Sistem", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'get' => $this->pengguna->get($param)
		);

		$this->template->view('rtlh/pengguna/update-pengguna', $this->data);
	}

	public function validate_email()
	{
		if($this->pengguna->email_check($this->input->post('id')) == TRUE)
		{
			$this->form_validation->set_message('validate_email', 'Maaf Email ini telah digunakan.');
			return false;
		} else {
			return true;
		}
	}

	public function validate_username()
	{
		if($this->pengguna->username_check($this->input->post('id')) == TRUE)
		{
			$this->form_validation->set_message('validate_username', 'Maaf Username ini telah digunakan.');
			return false;
		} else {
			return true;
		}
	}

	public function delete($param = 0)
	{
		$this->pengguna->delete($param);

		redirect('pengguna');
	}

	public function bulk_action()
	{
		switch ($this->input->post('action')) 
		{
			case 'delete':
				$this->pengguna->delete_multiple();
				break;
			
			default:
				$this->template->alert(
					' Tidak ada data yang dipilih.', 
					array('type' => 'warning','icon' => 'warning')
				);
				break;
		}

		redirect('pengguna');
	}	

}
