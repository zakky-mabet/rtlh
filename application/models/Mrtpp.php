<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/
class Mrtpp extends Rtlh_model 
{	
	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{	
		if($this->input->get('proyek') != '')
			$this->db->like('rtpp.id_proyek_rtpp', $this->input->get('proyek'));

		if($this->input->get('tahun') != '')
			$this->db->like('rtpp.tahun', $this->input->get('tahun'));

		if($this->input->get('sumber_anggaran') != '')
			$this->db->like('rtpp.sumber_anggaran', $this->input->get('sumber_anggaran'));

		if($this->input->get('kabupaten') != '')
			$this->db->like('penduduk.regency', $this->input->get('kabupaten'));

		if($this->input->get('query') != '')
			$this->db->like('rtpp.nik', $this->input->get('query'))
				->or_like('penduduk.nama_lengkap', $this->input->get('query'));

		$this->db->order_by('id_rtpp', 'desc');
		
		if($type == 'result')
		{
			$this->db->select('*');

			$this->db->from('rtpp');

			$this->db->join('penduduk', 'penduduk.nik = rtpp.nik', 'LEFT');

			return $this->db->get()->result();

		} 
		elseif ($type == 'export') {

			$this->db->select('rtpp.nik, penduduk.nama_lengkap, rtpp.sumber_anggaran, rtpp.jumlah_bantuan, rtpp.tahun, rtpp.lokasi_rumah, rtpp.aksi, regencies.name_regencies, daftar_proyek_rtpp.nama_proyek ');
			
			$this->db->from('rtpp');

			$this->db->join('penduduk', 'penduduk.nik = rtpp.nik', 'LEFT');

			$this->db->join('daftar_proyek_rtpp', 'rtpp.id_rtpp =daftar_proyek_rtpp.id_proyek','LEFT');

			$this->db->join('provinces', 'penduduk.province = provinces.id', 'LEFT');

			$this->db->join('regencies', 'penduduk.regency = regencies.id', 'LEFT');

			$this->db->join('districts', 'penduduk.district = districts.id', 'LEFT');

			$this->db->join('villages', 'penduduk.village = villages.id', 'LEFT');

			return $this->db->get();

		} else {

			$this->db->select('*');

			$this->db->from('rtpp');

			$this->db->join('penduduk', 'penduduk.nik = rtpp.nik' , 'LEFT');

			return $this->db->get()->num_rows();
		}
	}

	public function get($param = 0, $type = '')
	{
		if($type == 'num_rows')
		{
			return $this->db->get_where('rtpp', array('id_rtpp' => $param))->num_rows();
		} else {
			return $this->db->get_where('rtpp', array('id_rtpp' => $param))->row();
		}
	}

	public function get_proyek($param = 0)
	{
		return $this->db->get_where('daftar_proyek_rtpp',array('id_proyek' => $param))->row();
	}

	public function get_all_proyek()
	{
		return $this->db->get('daftar_proyek_rtpp')->result();
	}
 	
 	public function get_year($kondisi = '')
	{
		$this->db->order_by('tahun', $kondisi);

		return $this->db->get('rtpp')->row();
	}

	public function get_year_proyek($kondisi = '')
	{
		$this->db->order_by('tahun', $kondisi);

		return $this->db->get('daftar_proyek_rtpp')->row();
	}

	public function get_all_sumber_anggaran ()
	{
		$this->db->select('sumber_anggaran');

		$this->db->distinct();

		return $this->db->get('rtpp')->result();
	}

	public function create($param = 0)
	{
		$data = array(

			'id_proyek_rtpp' =>  $this->input->post('id_proyek_rtpp'),
			'nik' =>  $param,
			'aksi'=>  $this->input->post('aksi'),
			'lokasi_rumah' =>  $this->input->post('lokasi_rumah'),
			'jumlah_bantuan' =>  $this->input->post('jumlah_bantuan'),
			'sumber_anggaran' =>  $this->input->post('sumber_anggaran'),
			'tahun' =>  $this->input->post('tahun'),
			'user' =>  $this->session->userdata('ID'),
			'date_create' =>  date('Y-m-d H:i:s'),
		);

		$this->db->insert('rtpp', $data);

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
			'id_proyek_rtpp' =>  $this->input->post('id_proyek_rtpp'),
			'aksi'=>  $this->input->post('aksi'),
			'lokasi_rumah' =>  $this->input->post('lokasi_rumah'),
			'jumlah_bantuan' =>  $this->input->post('jumlah_bantuan'),
			'sumber_anggaran' =>  $this->input->post('sumber_anggaran'),
			'tahun' =>  $this->input->post('tahun'),
			'user' =>  $this->session->userdata('ID'),
			'date_create' =>  date('Y-m-d H:i:s'),
		);

		$this->db->update('rtpp', $data, array('id_rtpp' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Data telah di sunting, Oleh '.$this->account->get_account($this->session->userdata('ID'))->nama, 
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
		$this->db->order_by('id_foto', 'desc');

		return $this->db->get_where('foto_rtpp', array('id_rtpp' => $param))->result();
	}

	public function get_foto($param = 0)
	{
		return $this->db->get_where('foto_rtpp', array('id_foto' => $param))->row();
	}

	public function upload_foto($param = 0)
	{
		if (isset($_FILES['foto'])) 
	   		{
				$create_tgl = date('Y-m-d H:i:s'); 
			    $this->load->library('upload');
			    $nmfile = date('YmdHis'); 
			    $config['upload_path'] = './assets/rtlh/img/foto_rtpp/';
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
	    		'id_rtpp' =>$param,
	    		'nama' => $this->input->post('nama'),
	    		'foto' => $foto['file_name'],
	    		'user' =>  $this->session->userdata('ID'),
				'date_create' =>  date('Y-m-d H:i:s'),
	    			);
	   	$this->db->insert('foto_rtpp', $data);

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

	public function delete_foto($param = 0)
	{
		@unlink('assets/rtlh/img/foto_rtpp/'.$this->get_foto($param)->foto);

		$this->db->delete('foto_rtpp', array('id_foto' => $param));

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

	public function get_all_foto($param = 0)
	{
		return $this->db->get_where('foto_rtpp', array('id_rtpp' => $param ))->result();
	}

	public function delete($param = 0)
	{
		foreach ($this->get_all_foto($param) as $value) {

			@unlink('assets/rtlh/img/foto_rtpp/'.$value->foto);

			$this->db->delete('foto_rtpp', array('id_rtpp' => $value->id_foto));
		}

		$this->db->delete('rtpp', array('id_rtpp' => $param));

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

	public function get_all_daftar_proyek($limit = 20, $offset = 0, $type = 'result')
	{	
		if($this->input->get('status_proyek') != '')
			$this->db->like('status_proyek', $this->input->get('status_proyek'));

		if($this->input->get('tahun') != '')
			$this->db->like('tahun', $this->input->get('tahun'));

		if($this->input->get('query') != '')
			$this->db->like('nama_proyek', $this->input->get('query'));
		
		if($type == 'result')
		{
			return $this->db->get('daftar_proyek_rtpp', $limit, $offset)->result();

		}	elseif ($type == 'export') {

			return $this->db->get('daftar_proyek_rtpp', $limit, $offset);

		} else 	{
			return $this->db->get('daftar_proyek_rtpp')->num_rows();
		}
	}

	public function create_proyek()
	{
		$data = array(
			'nama_proyek' => $this->input->post('nama_proyek'),
			'tahun' => $this->input->post('tahun'),
			'lokasi_proyek' => $this->input->post('lokasi_proyek'),
			'status_proyek' => $this->input->post('status_proyek'),
			'user' =>  $this->session->userdata('ID'),
			'date_create' =>  date('Y-m-d H:i:s'),
		);

		$this->db->insert('daftar_proyek_rtpp', $data);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Data Proyek telah ditambahkan oleh '.$this->account->get_account($this->session->userdata('ID'))->nama, 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				'Gagal menyimpan data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function update_proyek($param = 0)
	{
		$data = array(
			'nama_proyek' => $this->input->post('nama_proyek'),
			'tahun' => $this->input->post('tahun'),
			'lokasi_proyek' => $this->input->post('lokasi_proyek'),
			'status_proyek' => $this->input->post('status_proyek'),
			'user' =>  $this->session->userdata('ID'),
			'date_create' =>  date('Y-m-d H:i:s'),
		);

		$this->db->update('daftar_proyek_rtpp', $data, array('id_proyek' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Data telah di sunting, Oleh '.$this->account->get_account($this->session->userdata('ID'))->nama, 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				'Tidak ada yang diubah.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function get_all_status_proyek()
	{
		$this->db->select('status_proyek');

		$this->db->distinct();

		return $this->db->get('daftar_proyek_rtpp')->result();
	}

	public function delete_proyek($param = 0)
	{
		
		$this->db->delete('daftar_proyek_rtpp', array('id_proyek' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				'Data Proyek berhasil dihapus.', 
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

