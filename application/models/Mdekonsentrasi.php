<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/
class Mdekonsentrasi extends Rtlh_model 
{	
	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{	
		if($this->input->get('jenis') != '')
			$this->db->like('id_jenis_kegiatan', $this->input->get('jenis'));

		if($this->input->get('tahun') != '')
			$this->db->like('tahun', $this->input->get('tahun'));

		if($this->input->get('query') != '')
			$this->db->like('nama_kegiatan', $this->input->get('query'));

		$this->db->order_by('id_dekonsentrasi', 'desc');
		
		if($type == 'result')
		{
			return $this->db->get('dekonsentrasi', $limit, $offset)->result();
		} else {
			return $this->db->get('dekonsentrasi')->num_rows();
		}
	}

	public function get($param = 0, $type = '')
	{
		if($type == 'num_rows')
		{
			return $this->db->get_where('dekonsentrasi', array('id_dekonsentrasi' => $param))->num_rows();
		} else {
			return $this->db->get_where('dekonsentrasi', array('id_dekonsentrasi' => $param))->row();
		}
	}

	public function get_jenis($param = 0)
	{
		return $this->db->get_where('jenis_kegiatan_dekon', array('id' => $param))->row();
	}

	public function get_all_jenis()
	{
		return $this->db->get('jenis_kegiatan_dekon')->result();
	}

	public function get_year($kondisi = '')
	{
		$this->db->order_by('tahun', $kondisi);

		return $this->db->get('dekonsentrasi')->row();
	}

	 public function create()
	{
		$data = array(
			'nama_kegiatan' => $this->input->post('nama_kegiatan'),
			'nilai_anggaran' => $this->input->post('nilai_anggaran'),
			'id_jenis_kegiatan' => $this->input->post('jenis'),
			'tahun' => $this->input->post('tahun'),
			'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan'),
			'date_create' => date('Y-m-d H:i:s'),
			'user' => $this->session->userdata('ID'),
		);

		$this->db->insert('dekonsentrasi', $data);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Data telah ditambahkan.', 
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
		$data = array(
			'nama_kegiatan' => $this->input->post('nama_kegiatan'),
			'nilai_anggaran' => $this->input->post('nilai_anggaran'),
			'id_jenis_kegiatan' => $this->input->post('jenis'),
			'tahun' => $this->input->post('tahun'),
			'tanggal_kegiatan' => $this->input->post('tanggal_kegiatan'),
			'date_create' => date('Y-m-d H:i:s'),
			'user' => $this->session->userdata('ID'),
		);

		$this->db->update('dekonsentrasi', $data, array('id_dekonsentrasi' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Data telah di sunting oleh '.$this->account->get_account($this->session->userdata('ID'))->nama, 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				'Tidak ada yang diubah.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function foto($param = 0)
	{
		return $this->db->get_where('foto_dekonsentrasi', array('id_dekonsentrasi' => $param))->result();
	}

	public function upload_foto($param = 0)
	{
		if (isset($_FILES['foto'])) 
	   		{
				$create_tgl = date('Y-m-d H:i:s'); 
			    $this->load->library('upload');
			    $nmfile = date('YmdHis'); 
			    $config['upload_path'] = './assets/rtlh/img/foto_dekon/';
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
	    		'id_dekonsentrasi' => $param,
	    		'nama' => $this->input->post('nama'),
	    		'foto' => $foto['file_name'],
	    		'date_create' => date('Y-m-d H:i:s'),
				'user' => $this->session->userdata('ID'),
	    			);
	   	$this->db->insert('foto_dekonsentrasi', $data);

	   	if($this->db->affected_rows())
		{
			$this->template->alert(
				'Data Foto berhasil disimpan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				'Gagal menyimpan data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function get_foto($param = 0)
	{
		return $this->db->get_where('foto_dekonsentrasi', array('id_foto' => $param))->row();
	}

	public function delete_foto($param = 0)
	{
		@unlink('assets/rtlh/img/foto_dekon/'.$this->get_foto($param)->foto);

		$this->db->delete('foto_dekonsentrasi', array('id_foto' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Foto berhasil dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				'Gagal menghapus foto.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function get_all_foto_dekon($param = 0)
	{
		return $this->db->get_where('foto_dekonsentrasi', array('id_dekonsentrasi' => $param ))->result();
	}

	public function delete_dekonsentrasi($param = 0)
	{
		foreach ($this->get_all_foto_dekon($param) as $value) {

			@unlink('assets/rtlh/img/foto_dekon/'.$value->foto);

			$this->db->delete('foto_dekonsentrasi', array('id_foto' => $value->id_foto));
		}

		$this->db->delete('dekonsentrasi', array('id_dekonsentrasi' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Data dan foto kegiatan berhasil dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				'Gagal menghapus data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function _get_all_jenis($limit = 20, $offset = 0, $type = 'result')
	{	
	
		if($this->input->get('query') != '')
			$this->db->like('nama_jenis', $this->input->get('query'));

		$this->db->order_by('id', 'desc');
		
		if($type == 'result')
		{
			return $this->db->get('jenis_kegiatan_dekon', $limit, $offset)->result();
		} else {
			return $this->db->get('jenis_kegiatan_dekon')->num_rows();
		}
	}

	public function create_jenis()
	{
		$data = array(
			'nama_jenis' => $this->input->post('nama_jenis'),
			'keterangan' => $this->input->post('keterangan'),
			'date_create' => date('Y-m-d H:i:s'),
			'user' => $this->session->userdata('ID'),
		);

		$this->db->insert('jenis_kegiatan_dekon', $data);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Data telah ditambahkan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal menyimpan data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function get_jenis_dekon($param = 0, $type = '')
	{
		if($type == 'num_rows')
		{
			return $this->db->get_where('jenis_kegiatan_dekon', array('id' => $param))->num_rows();
		} else {
			return $this->db->get_where('jenis_kegiatan_dekon', array('id' => $param))->row();
		}
	}

	public function update_jenis($param = 0)
	{
		$data = array(
			'nama_jenis' => $this->input->post('nama_jenis'),
			'keterangan' => $this->input->post('keterangan'),
			'date_create' => date('Y-m-d H:i:s'),
			'user' => $this->session->userdata('ID'),
		);

		$this->db->update('jenis_kegiatan_dekon', $data, array('id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Data telah di sunting oleh '.$this->account->get_account($this->session->userdata('ID'))->nama, 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				'Tidak ada yang diubah.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function delete_jenis_dekonsentrasi($param = 0)
	{
		$this->db->delete('jenis_kegiatan_dekon', array('id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Data berhasil dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				'Gagal menghapus data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}
 
}

