<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* RTLH
* Data_candidate Model Class 
*
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/

class Mdata_candidate extends Rtlh_model 
{
	
	
	public function __construct()
	{
		parent::__construct();
		

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

		$this->db->where('status_rtlh', 'Calon Penerima');

		if($type == 'result')
		{
			return $this->db->get('penduduk', $limit, $offset)->result();
		} else {
			return $this->db->get('penduduk')->num_rows();
		}
	}

	public function get($param = 0)
	{
		return $this->db->get_where('penduduk', array('nik' => $param, 'status_rtlh' => 'Calon Penerima'))->row();
	}
	

	public function update($param = 0)
	{
		// UPDATE TANAH
			$tanah = array(
				'status_kepemilikan_tanah' =>  $this->input->post('status_kepemilikan_tanah'),
				'no_sertifikat' =>  $this->input->post('no_sertifikat'),
				'panjang' =>  $this->input->post('panjang'),
				'lebar' =>  $this->input->post('lebar'),
				'luas' =>  $this->input->post('panjang')*$this->input->post('lebar'),
				'latitude' =>  $this->input->post('latitude'),
				'longitude' =>  $this->input->post('longitude'),
				'icon' => 'red-home.png'
			);

			$this->db->update('tanah', $tanah, array('nik' => $param ));

			// UPDATE RUMAH
			if (isset($_FILES['foto'])) 
	   		{
				$create_tgl = date('Y-m-d H:i:s'); 
			    $this->load->library('upload');
			    $nmfile = date('YmdHis'); 
			    $config['upload_path'] = './assets/rtlh/img/';
			    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
			    $config['max_size'] = '40480';
			    $config['file_name'] = $nmfile; 
		     	$this->upload->initialize($config);
		     	if ($this->upload->do_upload('foto'))
				{ 
			       	$foto = $this->upload->data();
		     	}
		     	@unlink('assets/rtlh/img/'.$this->get_rumah($param)->foto);
	    	}
	    	

			$rumah = array(
				'status_kepemilikan_rumah' =>  $this->input->post('status_kepemilikan_rumah'),
				'luas_m2' =>  $this->input->post('luas_m2'),
				'jml_penghuni' =>  $this->input->post('jml_penghuni'),
				'pondasi' =>  $this->input->post('pondasi'),
				'kolom_balok' =>  $this->input->post('kolom_balok'),
				'kondisi_atap' =>  $this->input->post('kondisi_atap'),
				'foto' => $foto['file_name'],
				'deskripsi' => '<img src="'.base_url('assets/rtlh/img/'.$foto['file_name']).'" alt="'.$this->input->post('nama_lengkap').'" width="110" style="float:left;"><div style="float:left; margin-left:10px;" ><p><b>Rumah '.$this->input->post('nama_lengkap').'</b></p><p> Status Calon Penerima</p><p><a href="'.base_url('#').'">Detail..</a></p></div>'

			);

			$this->db->update('rumah', $rumah, array('nik' => $param ));

		// UPDATE FASILITAS RUMAH
			$fasilitas_rumah = array(
				'jendela_lubang_cahaya' =>  $this->input->post('jendela_lubang_cahaya'),
				'fentilasi' =>  $this->input->post('fentilasi'),
				'kamar_mandi' =>  $this->input->post('kamar_mandi'),
				'sumber_air_minum' =>  $this->input->post('sumber_air_minum'),
				'jarak_sumber_air_ke_wc' =>  $this->input->post('jarak_sumber_air_ke_wc'),
				'sumber_utama_penerangan' =>  $this->input->post('sumber_utama_penerangan'),
			);

			$this->db->update('fasilitas_rumah', $fasilitas_rumah, array('nik' => $param ));
		

		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data berhasil diubah.', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				'Tidak ada Data yang diumah', 
				array('type' => 'warning','icon' => 'times')
			);
		}
	}

	public function delete($param = 0)
	{
		@unlink('assets/rtlh/img/'.$this->get_rumah($param)->foto);
		$this->db->delete('tanah', array('nik' => $param));
		$this->db->delete('rumah', array('nik' => $param));
		$this->db->delete('fasilitas_rumah', array('nik' => $param));
		$update = array(
			'status_rtlh' => 'Tidak diketahui',
		);
		$this->db->update('penduduk', $update, array('nik' => $param));


		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data berhasil dihapus Sebagai Calon Penerima.', 
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
		if(is_array($this->input->post('calon')))
		{
			foreach($this->input->post('calon') as $param)

				@unlink('assets/rtlh/img/'.$this->get_rumah($param)->foto);
				$this->db->delete('tanah', array('nik' => $param));
				$this->db->delete('rumah', array('nik' => $param));
				$this->db->delete('fasilitas_rumah', array('nik' => $param));
				$update = array(
					'status_rtlh' => 'Tidak diketahui',
				);
				$this->db->update('penduduk', $update, array('nik' => $param));

			$this->template->alert(
				' Data berhasil dihapus Sebagai Calon Penerima.', 
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

	public function get_tanah($param = 0)
	{
		return $this->db->get_where('tanah', array('nik' => $param))->row();
	}
	public function get_rumah($param = 0)
	{
		return $this->db->get_where('rumah', array('nik' => $param))->row();
	}
	public function get_fasilitas_rumah($param = 0)
	{
		return $this->db->get_where('fasilitas_rumah', array('nik' => $param))->row();
	}


	public function upload($param = 0)
	{
		if (isset($_FILES['foto'])) 
	   		{
				$create_tgl = date('Y-m-d H:i:s'); 
			    $this->load->library('upload');
			    $nmfile = date('YmdHis'); 
			    $config['upload_path'] = './assets/rtlh/img/rumah';
			    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; 
			    $config['max_size'] = '40480';
			    $config['file_name'] = $nmfile; 
		     	$this->upload->initialize($config);
		     	if ($this->upload->do_upload('foto'))
				{ 
			       	$foto = $this->upload->data();
		     	}
		     	
	    	}

	    $data = array(
	    		'nik' => $param,
	    		'nama' => $this->input->post('nama'),
	    		'kategori' => $this->input->post('kategori'),
	    		'foto' => $foto['file_name'],
	    			);
	   	$this->db->insert('foto_rumah', $data);

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

	public function foto_rumah($param = 0, $kategori = '')
	{
		return $this->db->get_where('foto_rumah', array('nik' => $param, 'kategori' => $kategori ))->result();
	}

}

