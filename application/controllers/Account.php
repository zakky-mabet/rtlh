<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends Rtlh {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('maccount');
	}

	public function index() 
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('email', 'E-Mail', 'trim|valid_email|required');
		$this->form_validation->set_rules('nama', 'Nama Pengguna', 'trim|required');
		$this->form_validation->set_rules('new_pass', 'Password Baru', 'trim|min_length[5]');
		$this->form_validation->set_rules('repeat_pass', 'Ini', 'trim|matches[new_pass]');
		$this->form_validation->set_rules('old_pass', 'Password Lama', 'trim|required|callback_validate_password');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim');
		$this->form_validation->set_rules('no_telp', 'Nomor Telepon', 'trim');
		
		if (empty($_FILES['file_foto']['name']))
		{
		    $this->form_validation->set_rules('file_foto', 'Foto', 'trim');
		}

		if ($this->form_validation->run() == TRUE)
		{
			$this->maccount->update($param);

			redirect(current_url());
		}

		$this->page_title->push('Pengaturan', 'Pengaturan Akun');

		$this->data = array(
			'title' => "Pengaturan Akun", 
			'breadcrumbs' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'get' => $this->maccount->get_account($this->ADMIN),
		);

		$this->template->view('rtlh/account/update-account', $this->data);
	}


	/**
	 * Cek kebenaran password
	 *
	 * @return Boolean
	 **/
	public function validate_password()
	{
		$get = $this->maccount->get_account($this->ADMIN);

		if(password_verify($this->input->post('old_pass'), $get->password))
		{
			return true;
		} else {
			$this->form_validation->set_message('validate_password', 'Password lama anda tidak cocok!');
			return false;
		}
	}


}
