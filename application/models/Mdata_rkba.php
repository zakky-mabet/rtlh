<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/
class Mdata_rkba extends Rtlh_model 
{	
	public function __construct()
	{
		parent::__construct();
	}

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{
		if($this->input->get('kabupaten') != '')
			$this->db->where('penduduk.regency', $this->input->get('kabupaten'));

		if($this->input->get('query') != '')
			$this->db->like('penduduk.nik', $this->input->get('query'))
					 ->or_like('nama_lengkap', $this->input->get('query'));

		if($type == 'result')
		{
			$this->db->select('*');

			$this->db->from('data_bantuan_rkba');

			$this->db->join('penduduk', 'penduduk.nik = data_bantuan_rkba.nik');

			return $this->db->get()->result();

		} elseif ($type == 'export') {

			$this->db->from('data_bantuan_rkba');

			$this->db->join('daftar_bencana', 'daftar_bencana.id_bencana = data_bantuan_rkba.id_daftar_bencana','LEFT');

			$this->db->join('penduduk', 'penduduk.nik = data_bantuan_rkba.nik','LEFT');

			$this->db->join('provinces', 'penduduk.province = provinces.id', 'LEFT');

			$this->db->join('regencies', 'penduduk.regency = regencies.id', 'LEFT');

			$this->db->join('districts', 'penduduk.district = districts.id', 'LEFT');

			$this->db->join('villages', 'penduduk.village = villages.id', 'LEFT');

			return $this->db->get();

		} else {

			$this->db->select('*');

			$this->db->from('data_bantuan_rkba');

			$this->db->join('penduduk', 'penduduk.nik = data_bantuan_rkba.nik');

			return $this->db->get()->num_rows();
		}
	}

	public function get_daftar_bencana($param = 0)
	{
		return $this->db->get_where('daftar_bencana', array('id_bencana' => $param ))->row();
	}

	public function count_rkba($param = 0)
	{
		return $this->db->get_where('data_bantuan_rkba', array('id' => $param ))->num_rows();
	}

	public function get_data_rkba($param = 0)
	{
		return $this->db->get_where('data_bantuan_rkba', array('id' => $param ))->row();
	}

	public function get_penduduk($param = 0, $type = 'num_rows')
	{
		if ($type == 'num_rows') {
			
			return $this->db->get_where('penduduk', array('nik' => $param ))->num_rows();
		
		}else{

			return $this->db->get_where('penduduk', array('nik' => $param ))->row();

		}
	}

	public function get_all_daftar_bencana($param = 0)
	{
		return $this->db->get('daftar_bencana')->result();
	}

	public function create($param = 0)
	{
		$data = array(

			'id_daftar_bencana' =>  $this->input->post('id_daftar_bencana'),
			'nik' =>  $param,
			'jenis_kerusakan' =>  $this->input->post('jenis_kerusakan'),
			'jenis_kegiatan' =>  $this->input->post('jenis_kegiatan'),
			'tahun' =>  $this->input->post('tahun'),
			'latitude' =>  $this->input->post('latitude'),
			'longitude' =>  $this->input->post('longitude'),
			'jumlah_bantuan' =>  $this->input->post('jumlah_bantuan'),
			'sumber_anggaran' =>  $this->input->post('sumber_anggaran'),
			'user' =>  $this->session->userdata('ID'),
			'upload_date' =>  date('Y-m-d H:i:s'),
		);

		$this->db->insert('data_bantuan_rkba', $data);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data berhasil disimpan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				'Terjadi Kesalahan menyimpan data.', 
				array('type' => 'warning','icon' => 'times')
			);
		}

	}


	public function update($param = 0)
	{
		$data = array(

			'id_daftar_bencana' =>  $this->input->post('id_daftar_bencana'),
			'jenis_kerusakan' =>  $this->input->post('jenis_kerusakan'),
			'jenis_kegiatan' =>  $this->input->post('jenis_kegiatan'),
			'tahun' =>  $this->input->post('tahun'),
			'latitude' =>  $this->input->post('latitude'),
			'longitude' =>  $this->input->post('longitude'),
			'jumlah_bantuan' =>  $this->input->post('jumlah_bantuan'),
			'sumber_anggaran' =>  $this->input->post('sumber_anggaran'),
			'user' =>  $this->session->userdata('ID'),
			'upload_date' =>  date('Y-m-d H:i:s'),
		);

		$this->db->update('data_bantuan_rkba', $data, array('id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Data telah di sunting, Oleh ' .$this->muniversal->get_account_by_login($this->ADMIN)->nama, 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				'Tidak ada yang diubah.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function foto_rkba($param = 0, $kategori = '')
	{
		return $this->db->get_where('foto_rkba', array('id_data_bantuan_rkba' => $param, 'kategori' => $kategori ))->result();
	}

	public function get_rumah_rkba($param = 0)
	{
		return $this->db->get_where('foto_rkba', array('id' => $param))->row();
	}

	public function delete_foto($param = 0)
	{
		@unlink('assets/rtlh/img/foto_rkba/'.$this->get_rumah_rkba($param)->foto);

		$this->db->delete('foto_rkba', array('id' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Foto berhasil dihapus', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				'Gagal menghapus data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function upload_foto_rkba($param = 0)
	{
		if (isset($_FILES['foto'])) 
	   		{
				$create_tgl = date('Y-m-d H:i:s'); 
			    $this->load->library('upload');
			    $nmfile = date('YmdHis'); 
			    $config['upload_path'] = './assets/rtlh/img/foto_rkba';
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
	    		'id_data_bantuan_rkba' => $param,
	    		'nama_foto' => $this->input->post('nama'),
	    		'kategori' => $this->input->post('kategori'),
	    		'foto' => $foto['file_name'],
	    			);
	   	$this->db->insert('foto_rkba', $data);

	   	if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data berhasil disimpan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				'Gagal menyimpan data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}


}

