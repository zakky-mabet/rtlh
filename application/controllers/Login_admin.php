<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library( array('session', 'form_validation', 'session','template'));

		$this->load->model('users_admin', 'user');

		$this->load->helper(array('url'));
	}

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$user = $this->user->get_admin_login();

			if( $user != FALSE)
			{
				if ( password_verify($this->input->post('password'), $user->password) ) 
				{
			        $user_session = array(
			        	'admin_login' => TRUE,
			        	'ID' => $user->ID,
			        	'ADM' => $user
			        );	

			        $this->session->set_userdata( $user_session );

					if( $this->input->post('from_url') != '' )
					{
						redirect($this->input->post('from_url'));
					} else {
						redirect(base_url('admin/main'));
					}
				} else {
					$this->template->alert(
						' Maaf! Kombinasi Username / E-Mail dengan password anda tidak valid.', 
						array('type' => 'danger','icon' => 'warning')
					);
				}
			} else {
				$this->template->alert(
					' Maaf! Kombinasi Username / E-Mail dengan password anda tidak valid.', 
					array('type' => 'danger','icon' => 'warning')
				);
			}
		}

		$this->data = array(
			'title' => "Login Administrator E-SAKIP", 
		);

		$this->load->view('admin/login', $this->data);
	}

	public function signout()
	{
		$this->session->sess_destroy();

		redirect(base_url("admin/login?from_url=".$this->input->get('from_url')));
	}
}

/* End of file Login_admin.php */
/* Location: ./application/controllers/Login_admin.php */