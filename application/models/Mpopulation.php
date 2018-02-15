<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* RTLH
* Population Model Class 
*
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/

class Mpopulation extends Rtlh_model 
{
	//public $user;
	
	public function __construct()
	{
		parent::__construct();
		
		//$this->user = $this->session->userdata('ID'); 
		//$this->ADMIN = $this->session->userdata('ADMIN')->id_user;
	}

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{	

		if($this->input->get('kabupaten') != '')
			$this->db->where('penduduk.regency', $this->input->get('kabupaten'));

		if($this->input->get('kecamatan') != '')
			$this->db->where('penduduk.district', $this->input->get('kecamatan'));

		if($this->input->get('kelurahan') != '')
			$this->db->where('penduduk.village', $this->input->get('kelurahan'));

		if($this->input->get('query') != '')
			$this->db->like('penduduk.nik', $this->input->get('query'))
					 ->or_like('penduduk.nama_lengkap', $this->input->get('query'));

		$this->db->order_by('ID', 'desc');		

		if($type == 'result')
		{
			return $this->db->get('penduduk', $limit, $offset)->result();

		} elseif ($type == 'export') {

			$this->db->select('*');

			$this->db->from('penduduk');

			$this->db->join('provinces', 'penduduk.province = provinces.id', 'LEFT');

			$this->db->join('regencies', 'penduduk.regency = regencies.id', 'LEFT');

			$this->db->join('districts', 'penduduk.district = districts.id', 'LEFT');

			$this->db->join('villages', 'penduduk.village = villages.id', 'LEFT');

			$this->db->limit($limit, $offset);

			return $this->db->get();

		} else {
			return $this->db->get('penduduk')->num_rows();
		}
	}

	public function get($param = 0)
	{
		return $this->db->get_where('penduduk', array('ID' => $param))->row();
	}

	public function create()
	{
		$population = array(
			'nik' => $this->input->post('nik'),
			'no_kk' => $this->input->post('kk'),
			'status_kk' => $this->input->post('status_kk'),
			'nama_lengkap' => $this->input->post('name'),
			'tmp_lahir' => $this->input->post('tmp_lahir'),
			'tgl_lahir' => $this->input->post('birts'),
			'jns_kelamin' => $this->input->post('gender'),
			'alamat' => $this->input->post('alamat'),
			'rt' => $this->input->post('rt'),
			'rw' => $this->input->post('rw'),
			'province' => $this->input->post('provinsi'),
			'regency' => $this->input->post('kabupaten'),
			'district' => $this->input->post('kecamatan'),
			'village' => $this->input->post('kelurahan'),
			'agama' => $this->input->post('agama'),
			'kewarganegaraan' => $this->input->post('kewarganegaraan'),
			'status_kawin' => $this->input->post('status_kawin'),
			'gol_darah' => $this->input->post('gol_darah'),
			'telepon' => $this->input->post('telepon'),
			'kd_pos' => $this->input->post('kd_pos'),
			'status_rtlh' => 'Tidak diketahui',
			'status_data' => 1,
			'user' => $this->session->userdata('ID'),
		);

		$this->db->insert('penduduk', $population);

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Penduduk ditambahkan.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal menyimpan data.', 
				array('type' => 'warning','icon' => 'times')
			);
		}
	}

	public function update($param = 0)
	{
		$population = array(
			'no_kk' => $this->input->post('kk'),
			'status_kk' => $this->input->post('status_kk'),
			'nama_lengkap' => $this->input->post('name'),
			'tmp_lahir' => $this->input->post('tmp_lahir'),
			'tgl_lahir' => $this->input->post('birts'),
			'jns_kelamin' => $this->input->post('gender'),
			'alamat' => $this->input->post('alamat'),
			'rt' => $this->input->post('rt'),
			'rw' => $this->input->post('rw'),
			'province' => $this->input->post('provinsi'),
			'regency' => $this->input->post('kabupaten'),
			'district' => $this->input->post('kecamatan'),
			'village' => $this->input->post('kelurahan'),
			'agama' => $this->input->post('agama'),
			'kewarganegaraan' => $this->input->post('kewarganegaraan'),
			'status_kawin' => $this->input->post('status_kawin'),
			'gol_darah' => $this->input->post('gol_darah'),
			'telepon' => $this->input->post('telepon'),
			'kd_pos' => $this->input->post('kd_pos'),
			'user' => $this->session->userdata('ID'),
			'status_data' => 1,
		);

		$this->db->update('penduduk', $population, array('ID' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Penduduk berhasil diubah.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang diubah.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function delete($param = 0)
	{
		$this->db->delete('penduduk', array('ID' => $param));

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data Penduduk berhasil dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal menghapus data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	public function delete_multiple()
	{
		if(is_array($this->input->post('populations')))
		{
			foreach($this->input->post('populations') as $value)
				$this->db->delete('penduduk', array('ID' => $value));

			$this->template->alert(
				' Data penduduk berhasil dihapus.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Tidak ada data yang dipilih.', 
				array('type' => 'warning','icon' => 'times')
			);
		}
	}

	/**
	 * Check Ketersediaan NIK
	 *
	 * @param Integer (user_id)
	 * @return string
	 **/
	public function nik_check($param = 0)
	{
		if($param == FALSE)
		{
			return $this->db->get_where('penduduk', array('nik' => $this->input->post('nik')))->num_rows();
		} else {
			return $this->db->query("SELECT nik FROM penduduk WHERE nik IN({$this->input->post('nik')}) AND ID != {$param}")->num_rows();
		}
	}

	function get_provinsi() 
	{
        $hasil=$this->db->query("SELECT * FROM provinces WHERE id=19");

        return $hasil->result();
    }

    function get_kabupaten($param = 0) 
	{
        $hasil=$this->db->query("SELECT * FROM regencies WHERE province_id={$param}");

        return $hasil->result();
    }

    function get_kecamatan($param = 0) 
	{
        $hasil=$this->db->query("SELECT * FROM districts WHERE regency_id={$param}");

        return $hasil->result();
    }

    function get_kelurahan($param = 0) 
	{
        $hasil=$this->db->query("SELECT * FROM villages WHERE district_id={$param}");

        return $hasil->result();
    }
 
    function kabupaten($provId){

		$kabupaten="<option value=''>-- PILIH KABUPATEN --</option>";

		$this->db->order_by('name_regencies','ASC');

		$kab= $this->db->get_where('regencies',array('province_id'=>$provId));

		foreach ($kab->result_array() as $data ){
			$kabupaten.= "<option value='$data[id]'>$data[name_regencies]</option>";
		}

		return $kabupaten;

	}

	function kecamatan($kabId){

		$kecamatan="<option value=''>-- PILIH KECAMATAN --</option>";

		$this->db->order_by('name_districts','ASC');

		$kec= $this->db->get_where('districts',array('regency_id'=>$kabId));

		foreach ($kec->result_array() as $data ){

			$kecamatan.= "<option value='$data[id]'>$data[name_districts]</option>";
		}

		return $kecamatan;
	}

	function kelurahan($kecId){

		$kelurahan="<option value=''>-- PILIH KELURAHAN/DESA --</option>";

		$this->db->order_by('name_villages','ASC');

		$kel= $this->db->get_where('villages',array('district_id'=>$kecId));

		foreach ($kel->result_array() as $data ){

			$kelurahan.= "<option value='$data[id]'>$data[name_villages]</option>";
		}

		return $kelurahan;
	}

	public function get_nama_desa($id = 0)
	{
		return $this->db->get_where('villages', array('id' => $id) )->row();
	}

	public function get_nama_kabupaten($id = 0)
	{
		return $this->db->get_where('regencies', array('id' => $id) )->row();
	}

	public function get_nama_kecamatan($id = 0)
	{
		return $this->db->get_where('districts', array('id' => $id) )->row();
	}

	function pengguna($param = 0)
	{
		return $this->db->get_where('users', array('id_user' => $param))->row();

	}

	public function statusverifikasi($param = 0)
	{
		$query =  $this->db->get_where('penduduk', array('ID' => $param))->row();

		if ($query->status_data == 1) {

			$statusverifikasi = array('status_data' => 2, 'user' => $this->session->userdata('ID'));

			$this->db->update('penduduk', $statusverifikasi, array('ID' => $param));
		}
		else{

			$statusverifikasi = array('status_data' => 1, 'user' => $this->session->userdata('ID'));

			$this->db->update('penduduk', $statusverifikasi, array('ID' => $param));
		}
		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Status Verifikasi berhasil diubah.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal Mengubah data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

}

/* End of file Mpopulation.php */
/* Location: ./application/models/Mpopulation.php */