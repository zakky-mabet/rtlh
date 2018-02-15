<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/
class Mpsu extends Rtlh_model 
{	
	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{
		if($this->input->get('kabupaten') != '')
			$this->db->like('psu.kabupaten', $this->input->get('kabupaten'));

		if($this->input->get('jenis') != '')
			$this->db->like('psu.id_jenis_psu', $this->input->get('jenis'));

		if($this->input->get('query') != '')
			$this->db->like('psu.nama_kegiatan', $this->input->get('query'));
		
		if($type == 'result')
		{
			$this->db->select('*');

			$this->db->from('psu');

			$this->db->join('pelaksana_psu', 'pelaksana_psu.id_pelaksana_psu = psu.id_pelaksana', 'LEFT');

			return $this->db->get()->result();

		} elseif ($type == 'export') {
			
			$this->db->select('*');

			$this->db->from('psu');

			$this->db->join('pelaksana_psu', 'pelaksana_psu.id_pelaksana_psu = psu.id_pelaksana', 'LEFT');

			$this->db->join('jenis_psu', 'jenis_psu.id = psu.id_jenis_psu', 'LEFT');

			$this->db->join('regencies', 'psu.kabupaten = regencies.id', 'LEFT');

			return $this->db->get();

		} else {

			$this->db->select('*');

			$this->db->from('psu');

			$this->db->join('pelaksana_psu', 'pelaksana_psu.id_pelaksana_psu = psu.id_pelaksana' , 'LEFT');

			return $this->db->get()->num_rows();
		}
	}

	public function get_jenis($param = 0)
    {
      return $this->db->get_where('jenis_psu', array('id' => $param))->row();
    }

    public function get_psu($param = 0)
    {
      return $this->db->get_where('psu', array('id' => $param))->row();
    }

     public function count_psu($param = 0)
    {
      return $this->db->get_where('psu', array('id' => $param))->num_rows();
    }

    public function count_pelaksana($param = 0)
    {
      return $this->db->get_where('pelaksana_psu', array('id_pelaksana_psu' => $param))->num_rows();
    }

    public function get_all_jenis()
    {
      return $this->db->get('jenis_psu')->result();
    }

    public function get_kabupaten($param = 0)
    {
      return $this->db->get_where('regencies', array('id' => $param))->row();
    }

    public function get_all_kabupaten($param = 0)
    {
      return $this->db->get_where('regencies', array('province_id' => $param))->result(); 
    }

    public function get_pelaksana($param = 0)
    {
      return $this->db->get_where('pelaksana_psu', array('id_pelaksana_psu' => $param))->row();
    } 

    public function get_all_pelaksana()
    {
      return $this->db->get('pelaksana_psu')->result();
    }

    public function create_psu()
	{
		$data = array(
			'nama_kegiatan' => $this->input->post('nama_kegiatan'),
			'alamat' => $this->input->post('alamat'),
			'kabupaten' => $this->input->post('kabupaten'),
			'sumber_dana' => $this->input->post('sumber_dana'),
			'nilai_kontrak' => $this->input->post('nilai_kontrak'),
			'tanggal_mulai' => $this->input->post('tanggal_mulai'),
			'tanggal_selesai' => $this->input->post('tanggal_selesai'),
			'id_pelaksana' => $this->input->post('id_pelaksana'),
			'id_jenis_psu' => $this->input->post('id_jenis_psu'),
			'date_create' => date('Y-m-d H:i:s'),
			'user' => $this->session->userdata('ID'),
		);

		$this->db->insert('psu', $data);

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

	public function update_psu($param = 0)
	{
		$data = array(
			'nama_kegiatan' => $this->input->post('nama_kegiatan'),
			'alamat' => $this->input->post('alamat'),
			'kabupaten' => $this->input->post('kabupaten'),
			'sumber_dana' => $this->input->post('sumber_dana'),
			'nilai_kontrak' => $this->input->post('nilai_kontrak'),
			'tanggal_mulai' => $this->input->post('tanggal_mulai'),
			'tanggal_selesai' => $this->input->post('tanggal_selesai'),
			'id_pelaksana' => $this->input->post('id_pelaksana'),
			'id_jenis_psu' => $this->input->post('id_jenis_psu'),
			'date_create' => date('Y-m-d H:i:s'),
			'user' => $this->session->userdata('ID'),
		);

		$this->db->update('psu', $data, array('id' => $param));

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
		return $this->db->get_where('foto_psu', array('id_data_psu' => $param))->result();
	}

	public function get_foto_psu($param = 0)
	{
		return $this->db->get_where('foto_psu', array('id' => $param))->row();
	}

	public function upload_foto_psu($param = 0)
	{
		if (isset($_FILES['foto'])) 
	   		{
				$create_tgl = date('Y-m-d H:i:s'); 
			    $this->load->library('upload');
			    $nmfile = date('YmdHis'); 
			    $config['upload_path'] = './assets/rtlh/img/foto_psu/';
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
	    		'id_data_psu' =>$param,
	    		'nama' => $this->input->post('nama'),
	    		'foto' => $foto['file_name'],
	    			);
	   	$this->db->insert('foto_psu', $data);

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

	public function delete_foto_psu($param = 0)
	{
		@unlink('assets/rtlh/img/foto_psu/'.$this->get_foto_psu($param)->foto);

		$this->db->delete('foto_psu', array('id' => $param));

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

	public function get_all_pelaksana_psu($limit = 20, $offset = 0, $type = 'result')
	{		
		if($this->input->get('query') != '')
			$this->db->like('nama_perusahaan', $this->input->get('query'));
		
		if($type == 'result')
		{
			return $this->db->get('pelaksana_psu', $limit, $offset)->result();

		} elseif ($type == 'export') {
			
			return $this->db->get('pelaksana_psu', $limit, $offset);

		}  else {
			return $this->db->get('pelaksana_psu')->num_rows();
		}
	}

	public function create_pelaksana_psu()
	{
		$data = array(
			'nama_perusahaan' => $this->input->post('nama_perusahaan'),
			'alamat_kantor' => $this->input->post('alamat_kantor'),
			'direktur' => $this->input->post('direktur'),
			'kategori' => $this->input->post('kategori'),
		);

		$this->db->insert('pelaksana_psu', $data);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Data Pelaksana PSU telah ditambahkan oleh '.$this->account->get_account($this->session->userdata('ID'))->nama, 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				'Gagal menyimpan data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function delete_pelaksana_psu($param = 0)
	{
		$this->db->delete('pelaksana_psu', array('id_pelaksana_psu' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Data berhasil dihapus oleh '.$this->account->get_account($this->session->userdata('ID'))->nama, 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				'Gagal menghapus data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function update_pelaksana_psu($param = 0)
	{
		$data = array(
			'nama_perusahaan' => $this->input->post('nama_perusahaan'),
			'alamat_kantor' => $this->input->post('alamat_kantor'),
			'direktur' => $this->input->post('direktur'),
			'kategori' => $this->input->post('kategori'),
		);

		$this->db->update('pelaksana_psu', $data, array('id_pelaksana_psu' => $param));

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

	public function get_all_master_jenis($limit = 20, $offset = 0, $type = 'result')
	{		
		if($this->input->get('query') != '')
			$this->db->like('nama_jenis', $this->input->get('query'));
		
		if($type == 'result')
		{
			return $this->db->get('jenis_psu', $limit, $offset)->result();

		} elseif ($type == 'export') {
			
			return $this->db->get('jenis_psu', $limit, $offset);

		} else {
			return $this->db->get('jenis_psu')->num_rows();
		}
	}
	
	public function create_master_jenis()
	{
		$data = array(
			'nama_jenis' => $this->input->post('nama_jenis'),
			'keterangan' => $this->input->post('keterangan'),
		);
		$this->db->insert('jenis_psu', $data);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Data Jenis PSU telah ditambahkan oleh '.$this->account->get_account($this->session->userdata('ID'))->nama, 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				'Gagal menyimpan data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function update_master_jenis($param = 0)
	{
		$data = array(
			'nama_jenis' => $this->input->post('nama_jenis'),
			'keterangan' => $this->input->post('keterangan'),
		);

		$this->db->update('jenis_psu', $data, array('id' => $param));

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

	public function delete_jenis_psu($param = 0)
	{
		$this->db->delete('jenis_psu', array('id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Data berhasil dihapus oleh '.$this->account->get_account($this->session->userdata('ID'))->nama, 
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

