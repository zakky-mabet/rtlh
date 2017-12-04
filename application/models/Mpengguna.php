<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/

class Mpengguna extends Rtlh_model 
{
	
	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{
		if($this->input->get('level') != '')
			$this->db->where('level', $this->input->get('level'));
		
		if($this->input->get('query') != '')
			$this->db->like('nama', $this->input->get('query'))
					 ->or_like('username', $this->input->get('query'))
					 ->or_like('email', $this->input->get('query'));
		
		if($type == 'result')
		{
			return $this->db->get('users', $limit, $offset)->result();
		} else {
			return $this->db->get('users')->num_rows();
		}
	}

	public function get($param = 0)
	{
		return $this->db->get_where('users', array('id_user' => $param))->row();
	}

	public function email_check($param = 0)
	{
		if($param == FALSE)
		{
			return $this->db->get_where('users', array('email' => $this->input->post('email')))->num_rows();
		} else {
			return $this->db->query("SELECT email FROM users WHERE email IN({$this->input->post('email')}) AND id_user != {$param}")->num_rows();
		}
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

	public function create()
	{
		$user = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'alamat' => NULL,
			'no_telp' => $this->input->post('no_telp'),
			'photo' => NULL,
			'email' => $this->input->post('email'),
			'level' => $this->input->post('level'),
		);

		$this->db->insert('users', $user);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Pengguna ditambahkan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal menyimpan data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function update($param = 0)
	{
		$user = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'alamat' => NULL,
			'no_telp' => $this->input->post('no_telp'),
			'photo' => NULL,
			'email' => $this->input->post('email'),
			'level' => $this->input->post('level'),
		);

		$this->db->update('users', $user, array('id_user' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Data Pengguna telah di sunting', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada yang diubah.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function delete($param = 0)
	{
		$this->db->delete('users', array('id_user' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Pengguna dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang dihapus.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function delete_multiple()
	{
		if(is_array($this->input->post('penggunas')))
		{
			foreach($this->input->post('penggunas') as $value)
				$this->db->delete('users', array('id_user' => $value));

			$this->template->alert(
				' Data Pengguna berhasil dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang dipilih.', 
				array('type' => 'warning','icon' => 'times')
			);
		}
	}


}

