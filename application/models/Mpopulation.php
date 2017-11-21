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
		if($this->input->get('village') != '')
			$this->db->where('village', $this->input->get('village'));

		if($this->input->get('gender') != '')
			$this->db->where('jns_kelamin', $this->input->get('gender'));

		if($this->input->get('query') != '')
			$this->db->like('nik', $this->input->get('query'))
					 ->or_like('nama_lengkap', $this->input->get('query'));
		

		if($type == 'result')
		{
			return $this->db->get('penduduk', $limit, $offset)->result();
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
			'pekerjaan' => $this->input->post('pekerjaan'),
			'kewarganegaraan' => $this->input->post('kewarganegaraan'),
			'status_kawin' => $this->input->post('status_kawin'),
			'gol_darah' => $this->input->post('gol_darah'),
			'telepon' => $this->input->post('telepon'),
			'kd_pos' => $this->input->post('kd_pos'),
			'jml_keluarga' => $this->input->post('jml_keluarga'),
			'penghasilan' => $this->input->post('penghasilan'),
			'status_rtlh' => 'Tidak diketahui',
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
			'pekerjaan' => $this->input->post('pekerjaan'),
			'kewarganegaraan' => $this->input->post('kewarganegaraan'),
			'status_kawin' => $this->input->post('status_kawin'),
			'gol_darah' => $this->input->post('gol_darah'),
			'telepon' => $this->input->post('telepon'),
			'kd_pos' => $this->input->post('kd_pos'),
			'jml_keluarga' => $this->input->post('jml_keluarga'),
			'penghasilan' => $this->input->post('penghasilan'),
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
 
    function kabupaten($provId){

	$kabupaten="<option value='0'>-- PILIH --</option>";

	$this->db->order_by('name','ASC');
	$kab= $this->db->get_where('regencies',array('province_id'=>$provId));

	foreach ($kab->result_array() as $data ){
	$kabupaten.= "<option value='$data[id]'>$data[name]</option>";
	}

	return $kabupaten;

	}

	function kecamatan($kabId){
	$kecamatan="<option value='0'>-- PILIH --</option>";

	$this->db->order_by('name','ASC');
	$kec= $this->db->get_where('districts',array('regency_id'=>$kabId));

	foreach ($kec->result_array() as $data ){
	$kecamatan.= "<option value='$data[id]'>$data[name]</option>";
	}

	return $kecamatan;
	}

	function kelurahan($kecId){
	$kelurahan="<option value='0'>-- PILIH --</option>";

	$this->db->order_by('name','ASC');
	$kel= $this->db->get_where('villages',array('district_id'=>$kecId));

	foreach ($kel->result_array() as $data ){
	$kelurahan.= "<option value='$data[id]'>$data[name]</option>";
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

}

/* End of file Mpopulation.php */
/* Location: ./application/models/Mpopulation.php */