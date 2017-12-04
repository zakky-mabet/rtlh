<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/

class Maccount extends Rtlh_model 
{
	
	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_account($param = 0)
    {
      return $this->db->get_where('users', array('id_user' => $param))->row();
    } 


	public function username_check($param = 0)
	{
		if($param == FALSE)
		{
			return $this->db->get_where('users', array('username' => $this->input->post('username')))->num_rows();
		} else {
			return $this->db->query("SELECT username FROM users WHERE username IN({$this->input->post('username')}) AND id_user != {$param}")->num_rows();
		}
	}

	public function update()
	{
		$get = $this->get_account($this->ADMIN);

		$config['upload_path'] = './assets/public/image/';
		$config['allowed_types'] = 'gif|jpg|png';
		
		$this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload('file_foto')) 
		{

			$this->template->alert(
				$this->upload->display_errors('<span>','</span>'), 
				array('type' => 'success','icon' => 'check')
			);

			$gambar = $get->photo;
			
		} else {

			if($get->photo != '')
				unlink("assets/public/image/{$get->photo}");

			$gambar = $this->upload->file_name;
		}

		$data = array(
			'username' => $this->input->post('username'),
			'nama' => $this->input->post('nama'),  
			'alamat' => $this->input->post('alamat'),
			'no_telp' => $this->input->post('no_telp'),
			'photo' => $gambar,
			'email' => $this->input->post('email')
		);

		if($this->input->post('new_pass') != '')
			$data['password'] = password_hash($this->input->post('new_pass'), PASSWORD_DEFAULT);

		$this->db->update('users', $data, array('id_user' => $this->ADMIN));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Perubahan tersimpan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal melakukan perubahan.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

}

