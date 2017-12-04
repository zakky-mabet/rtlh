<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* RTLH
* Data_penerima Model Class 
*
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/
class Mdata_penerima extends Rtlh_model 
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

		$this->db->where('status_rtlh', 'Penerima Bantuan');

		if($type == 'result')
		{
			return $this->db->get('penduduk', $limit, $offset)->result();
		} else {
			return $this->db->get('penduduk')->num_rows();
		}
	}

	public function get($param = 0)
	{
		return $this->db->get_where('penduduk', array('nik' => $param, 'status_rtlh' => 'Penerima Bantuan'))->row();
	}
	

	public function update($param = 0)
	{

			// UPDATE DANA BANTUAN
			$dana_bantuan = array(
				'jenis' =>  $this->input->post('jenis'),
				'tahun_anggaran' =>  $this->input->post('tahun_anggaran'),
				'nilai' =>  $this->input->post('nilai'),
				'sumber_anggaran' =>  $this->input->post('sumber_anggaran'),
			);

			$this->db->update('dana_bantuan', $dana_bantuan, array('nik' => $param ));

			// UPDATE ASPEK BANTUAN
			$aspek_bantuan = array(
				'rehab_atap' =>  $this->input->post('rehab_atap'),
				'rehab_pondasi' =>  $this->input->post('rehab_pondasi'),
				'rehab_dinding' =>  $this->input->post('rehab_dinding'),
				'rehab_lantai' =>  $this->input->post('rehab_lantai'),
				'rehab_kamar_mandi' =>  $this->input->post('rehab_kamar_mandi'),
				'rehab_pintu' =>  $this->input->post('rehab_pintu'),
				'rehab_jendela' =>  $this->input->post('rehab_jendela'),
				'rehab_kolom_dan_balok' =>  $this->input->post('rehab_kolom_dan_balok'),
				'rehab_dapur' =>  $this->input->post('rehab_dapur'),
				'sumber_penerangan' =>  $this->input->post('sumber_penerangan'),
				'sumber_air_minum' =>  $this->input->post('sumber_air_minum'),
			);

			$this->db->update('aspek_bantuan', $aspek_bantuan, array('nik' => $param ));
			
			// UPDATE REALISASI BANTUAN
			$realisasi_bantuan = array(
				'tanggal_mulai' =>  $this->input->post('tanggal_mulai'),
				'tanggal_selesai' =>  $this->input->post('tanggal_selesai'),
				'deskripsi_aspek_bantuan' =>  $this->input->post('deskripsi'),
				'keterangan' =>  $this->input->post('keterangan'),
			);

			$this->db->update('realisasi_bantuan', $realisasi_bantuan, array('nik' => $param ));


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
		$this->db->delete('dana_bantuan', array('nik' => $param));
		$this->db->delete('aspek_bantuan', array('nik' => $param));
		$this->db->delete('realisasi_bantuan', array('nik' => $param));
		$update = array(
			'status_rtlh' => 'Calon Penerima',
		);
		$this->db->update('penduduk', $update, array('nik' => $param));

		$update_tanah = array(
			'icon' => 'red-home.png',
		);
		$this->db->update('tanah', $update_tanah, array('nik' => $param));

		$update_rumah = array(
				'deskripsi' => '<img src="'.base_url('assets/rtlh/img/'.$this->get_photo($param)->foto).'" alt="'.$this->get_penduduk($param)->nama_lengkap.'" width="110" style="float:left;"><div style="float:left; margin-left:10px;" ><p><b>Rumah '.$this->get_penduduk($param)->nama_lengkap.'</b></p><p> Status Calon Penerima</p><p><a href="'.base_url('data_penerima/update/'.$param).'">Detail..</a></p></div>',
		);

		$this->db->update('rumah', $update_rumah, array('nik' => $param));


		if($this->db->affected_rows())
		{
			$this->template->alert(
				' Data berhasil dihapus', 
				array('type' => 'success','icon' => 'check')
			);
		} else {
			$this->template->alert(
				' Gagal menghapus data.', 
				array('type' => 'warning','icon' => 'warning')
			);
		}
	}

	// public function delete_multiple()
	// {
	// 	if(is_array($this->input->post('calon')))
	// 	{
	// 		foreach($this->input->post('calon') as $param)


	// 			$this->db->delete('tanah', array('nik' => $param));
	// 			$this->db->delete('rumah', array('nik' => $param));
	// 			$this->db->delete('fasilitas_rumah', array('nik' => $param));
	// 			$update = array(
	// 				'status_rtlh' => 'Tidak diketahui',
	// 			);
	// 			$this->db->update('penduduk', $update, array('nik' => $param));

	// 		$this->template->alert(
	// 			' Data berhasil dihapus Sebagai Calon Penerima.', 
	// 			array('type' => 'success','icon' => 'check')
	// 		);
	// 	} else {
	// 		$this->template->alert(
	// 			' Tidak ada data yang dipilih.', 
	// 			array('type' => 'warning','icon' => 'times')
	// 		);
	// 	}
	// }

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
	public function get_nama_provinsi($id = 0)
	{
		return $this->db->get_where('provinces', array('id' => $id) )->row();
	}
	public function get_dana_bantuan($param = 0)
	{
		return $this->db->get_where('dana_bantuan', array('nik' => $param))->row();
	}
	public function get_aspek_bantuan($param = 0)
	{
		return $this->db->get_where('aspek_bantuan', array('nik' => $param))->row();
	}
	public function get_realisasi_bantuan($param = 0)
	{
		return $this->db->get_where('realisasi_bantuan', array('nik' => $param))->row();
	}
	public function get_photo($param = 0)
	{
		return $this->db->get_where('rumah', array('nik' => $param))->row();
	}
	public function get_penduduk($param = 0)
	{
		return $this->db->get_where('penduduk', array('nik' => $param))->row();
	}
}

