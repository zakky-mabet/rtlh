<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/

class Msub_kriteria extends Rtlh_model 
{
	
	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{
		if($this->input->get('kriteria') != '')
			$this->db->where('id_kriteria', $this->input->get('kriteria'));
		
		if($this->input->get('query') != '')
			$this->db->like('nama', $this->input->get('query'));
		
		if($type == 'result')
		{
			return $this->db->get('sub_kriteria', $limit, $offset)->result();
		} else {
			return $this->db->get('sub_kriteria')->num_rows();
		}
	}

	public function get($param = 0)
	{
		return $this->db->get_where('sub_kriteria', array('id' => $param))->row();
	}

	public function get_kriteria($param = 0)
	{
		return $this->db->get_where('kriteria', array('id' => $param))->row();
	}

	public function get_all_kriteria()
	{
		return $this->db->get('kriteria')->result();
	}

	public function create()
	{
		$user = array(
			'nama' => $this->input->post('nama'),
			'id_kriteria' => $this->input->post('kriteria'),
			'nilai' => $this->input->post('nilai'),
		);

		$this->db->insert('sub_kriteria', $user);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Sub Kriteria ditambahkan.', 
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
			'id_kriteria' => $this->input->post('kriteria'),
			'nilai' => $this->input->post('nilai'),
		);

		$this->db->update('sub_kriteria', $user, array('id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Data sub kriteria telah di sunting', 
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
		$this->db->delete('sub_kriteria', array('id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Sub kriteria dihapus.', 
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
		if(is_array($this->input->post('sub_kriterias')))
		{
			foreach($this->input->post('sub_kriterias') as $value)
				$this->db->delete('sub_kriteria', array('id' => $value));

			$this->template->alert(
				' Data sub kriteria berhasil dihapus.', 
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

