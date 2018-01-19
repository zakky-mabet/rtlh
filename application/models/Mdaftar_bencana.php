<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/

class Mdaftar_bencana extends Rtlh_model 
{
	
	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_all($limit = 5, $offset = 0, $type = 'result')
	{
		
		if($this->input->get('jenis') != '')
			$this->db->where('jenis', $this->input->get('jenis'));

		if($this->input->get('query') != '')
			$this->db->like('nama', $this->input->get('query'));

		
		if($type == 'result')
		{
			return $this->db->get('daftar_bencana', $limit, $offset)->result();
		} else {
			return $this->db->get('daftar_bencana')->num_rows();
		}
	}

	public function get_all_jenis_bencana($limit = 10, $offset = 0, $type = 'result')
	{
		
		if($this->input->get('query') != '')
			$this->db->like('nama', $this->input->get('query'));

		if($type == 'result')
		{
			return $this->db->get('jenis_bencana', $limit, $offset)->result();
		} else {
			return $this->db->get('jenis_bencana')->num_rows();
		}
	}

	public function create_jenis()
	{
		$value = array(
			'nama' => $this->input->post('nama'),
		);
		$query = $this->db->get_where('jenis_bencana', $value)->num_rows();

		if ($query == 1) {

			$this->template->alert(
					'<b>Terjadi Kesalahan</b>, Nama Jenis Bencana Telah di entri sebelumnya.', 
					array('type' => 'warning','icon' => 'warning')
				);
			
		} else {

			$data = array(
				'nama' => $this->input->post('nama'),
				'keterangan' => $this->input->post('keterangan'),
			);

			$this->db->insert('jenis_bencana', $data);

			if($this->db->affected_rows())
			{
				$this->template->alert(
					'Data Jenis Bencana ditambahkan.', 
					array('type' => 'success','icon' => 'check')
				);
			} else {
				$this->template->alert(
					' Gagal menyimpan data.', 
					array('type' => 'warning','icon' => 'warning')
				);
			}

		}
	}

	public function get_jenis_bencana($param = 0)
	{
		return $this->db->get_where('jenis_bencana', array('id' => $param))->row();
	}

	public function update_jenis($param = 0)
	{

		$data = array(
			'nama' => $this->input->post('nama'),
			'keterangan' => $this->input->post('keterangan'),
		);

		$this->db->update('jenis_bencana', $data, array('id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Data Jenis Bencana telah di sunting', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada yang diubah.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
		
	}

	public function delete_jenis($param = 0)
	{
		$this->db->delete('jenis_bencana', array('id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Jenis Bencana dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang dihapus.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

}

