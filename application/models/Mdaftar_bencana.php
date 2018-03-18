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

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{
		if($this->input->get('jenis') != '')
			$this->db->where('id_jenis_bencana', $this->input->get('jenis'));

		if($this->input->get('query') != '')
			$this->db->like('nama', $this->input->get('query'));

		
		if($type == 'result')
		{
			return $this->db->get('daftar_bencana', $limit, $offset)->result();
		}
		elseif ($type == 'export') {

			$this->db->select('daftar_bencana.nama AS nama_bencana, jenis_bencana.nama AS nama_jenis, daftar_bencana.tahun, daftar_bencana.lokasi, daftar_bencana.status_bencana, daftar_bencana.luas, daftar_bencana.jumlah');

			$this->db->from('daftar_bencana');

			$this->db->join('jenis_bencana', 'daftar_bencana.id_jenis_bencana = jenis_bencana.id', 'LEFT');

			$this->db->limit($limit, $offset);

			return $this->db->get();

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

		} 
		 else {
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

	public function get_bencana($param = 0)
	{
		return $this->db->get_where('daftar_bencana', array('id_bencana' => $param))->row();
	}

	public function all_jenis_bencana()
	{
		return $this->db->get('jenis_bencana')->result();
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

	public function create()
	{
		$value = array(
			'nama' => $this->input->post('nama'),
		);
		$query = $this->db->get_where('daftar_bencana', $value)->num_rows();

		if ($query == 1) {

			$this->template->alert(
					'<b>Terjadi Kesalahan</b>, Nama Bencana Telah di entri sebelumnya.', 
					array('type' => 'warning','icon' => 'warning')
				);
			
		} else {

			$data = array(
				'nama' => $this->input->post('nama'),
				'id_jenis_bencana' => $this->input->post('id_jenis_bencana'),
				'tahun' => $this->input->post('tahun'),
				'lokasi' => $this->input->post('lokasi'),
				'status_bencana' => $this->input->post('status_bencana'),
				'jumlah' => $this->input->post('jumlah'),
				'no_sk' => $this->input->post('no_sk'),
				'tanggal' => $this->input->post('tanggal'),
			);

			$this->db->insert('daftar_bencana', $data);

			if($this->db->affected_rows())
			{
				$this->template->alert(
					'Data Bencana ditambahkan.', 
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


	public function update($param = 0)
	{

		$data = array(
			'nama' => $this->input->post('nama'),
			'id_jenis_bencana' => $this->input->post('id_jenis_bencana'),
			'tahun' => $this->input->post('tahun'),
			'lokasi' => $this->input->post('lokasi'),
			'status_bencana' => $this->input->post('status_bencana'),
			'luas' => $this->input->post('luas'),
			'jumlah' => $this->input->post('jumlah'),
			'no_sk' => $this->input->post('no_sk'),
			'tanggal' => $this->input->post('tanggal'),
		);

		$this->db->update('daftar_bencana', $data, array('id_bencana' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Data Bencana telah di sunting', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada yang diubah.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}	
	}

	public function foto_bencana($param = 0)
	{
		return $this->db->get_where('foto_bencana', array('id_daftar_bencana' => $param))->result();
	}

	public function upload_foto_bencana($param = 0)
	{
		if (isset($_FILES['foto'])) 
	   		{
				$create_tgl = date('Y-m-d H:i:s'); 
			    $this->load->library('upload');
			    $nmfile = date('YmdHis'); 
			    $config['upload_path'] = './assets/rtlh/img/foto_bencana/';
			    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
			    $config['max_size'] = '40480';
			    $config['file_name'] = $nmfile; 
			    $config['encrypt_name'] = TRUE; 
		     	$this->upload->initialize($config);
		     	if ($this->upload->do_upload('foto'))
				{ 
			       	$foto = $this->upload->data();
		     	}
	    	}

	    $data = array(
	    		'id_daftar_bencana' =>$param,
	    		'nama_foto' => $this->input->post('nama_foto'),
	    		'foto' => $foto['file_name'],
	    			);
	   	$this->db->insert('foto_bencana', $data);

	   	if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Foto berhasil disimpan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				'Gagal menyimpan data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function get_foto_bencana($param = 0)
	{
		return $this->db->get_where('foto_bencana', array('id' => $param))->row();
	}

	public function delete_foto_bencana($param = 0)
	{
		@unlink('assets/rtlh/img/foto_bencana/'.$this->get_foto_bencana($param)->foto);

		$this->db->delete('foto_bencana', array('id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Foto berhasil dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal menghapus foto.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

}

