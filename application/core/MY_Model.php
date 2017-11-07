<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model 
{

}

/**
* Extends Model Class
*
* @version 1.0.0
* @author Vicky Nitinegoro <pkpvicky@gmail.com>
*/
class Skpd_model extends MY_Model
{
	public $periode_awal;

	public $periode_akhir;

	public $SKPD;

	public $kepala;

	public function __construct()
	{
		parent::__construct();

		$this->periode_awal = $this->session->userdata('SKPD')->periode_awal;

		$this->periode_akhir = $this->session->userdata('SKPD')->periode_akhir;

		$this->SKPD = $this->session->userdata('SKPD')->ID;

		$this->kepala = $this->session->userdata('SKPD')->kepala;
	}

	public function getAllSatuan()
	{
		return $this->db->get('master_satuan')->result();
	}

	public function getPeriode()
	{
		$periode = array();

		for($tahun = $this->tjuan->periode_awal; $tahun <= $this->tjuan->periode_akhir; $tahun++)
		{
			$periode[] = $tahun;
		}

		return $periode;
	}

	public function getInodikatorSasaranBySasaran($sasaran = 0, $IKU = FALSE)
	{
		$this->db->select('indikator_sasaran.*, master_satuan.nama as nama_satuan');
		$this->db->join('master_satuan', 'master_satuan.id = indikator_sasaran.id_satuan', 'left');
		$this->db->where('id_sasaran' , $sasaran);
		if($IKU)
			$this->db->where('indikator_sasaran.IKU', $IKU);
		return $this->db->get('indikator_sasaran')->result();
	}

	public function getFormulasiByIndikatorSasaran($indikator = 0)
	{
		$this->db->where('id_indikator_sasaran' , $indikator);
		return $this->db->get('formulasi_sasaran')->row();
	}

	public function getTargetSasaranBySasaranTahun($indikator = 0, $tahun)
	{
		return $this->db->get_where('target_sasaran', array(
			'id_indikator_sasaran' => $indikator,
			'tahunan' => $tahun
		))->row();
	}

	public function getRealisasiIndikatorSasaran($target = 0, $tahun = 0)
	{
		$this->db->join('target_sasaran', 'target_sasaran.id_target_sasaran = realisasi_indikator_sasaran.id_target_sasaran', 'left');

		return $this->db->get_where('realisasi_indikator_sasaran', array(
			'realisasi_indikator_sasaran.id_target_sasaran' => $target,
			'target_sasaran.tahunan' => $tahun
		))->row();
	}

	public function getIndikatorSasaranPKPerubahan($indikator = 0, $tahun = 0)
	{
		$targetSasaran = $this->getTargetSasaranBySasaranTahun($indikator, $tahun);

		return $this->db->get_where('pk_indikator_target', array('id_indikator_target' => $targetSasaran->id_target_sasaran))->row();
	}

	public function getIndikatorTargetTriwulanByIndikatorSasaran($indikator = 0, $tahun = 0)
	{
		return 	$this->db->get_where('pk_indikator_target_triwulan', array(
					'id_indikator_sasaran' => $indikator,
					'tahun_triwulan' => $tahun
				))->row();
	}

	public function getSasaranByMisi($misi = 0)
	{
		$tujuan = $this->db->get_where('tujuan', array('id_misi'))->result();

		if( ! $tujuan )
			return array();

		$IDTujuan = array();
		foreach ($tujuan as $key => $value) 
			$IDTujuan[] = $value->id_tujuan;

		$this->db->where_in('id_tujuan', $IDTujuan);
		return $this->db->get('sasaran')->result();
	}

	public function countMisi()
	{
		return $this->db->get_where('misi', array('id_kepala' => $this->kepala))->num_rows();
	}

	public function countTujuan()
	{
		return $this->db->get_where('tujuan', array('id_kepala' => $this->kepala))->num_rows();
	}

	public function countSasaran()
	{
		return $this->db->get_where('sasaran', array('id_kepala' => $this->kepala))->num_rows();
	}

	public function countIndikatorKinerja($result = FALSE)
	{
		$sasaran = $this->db->get_where('sasaran', array('id_kepala' => $this->kepala))->result();

		if(!$sasaran)
			return 0;

		$IDSasaran = array();
		foreach ($sasaran as $key => $value) 
			$IDSasaran[] = $value->id_sasaran;

		$this->db->where_in('id_sasaran', $IDSasaran);

		if($result)
			return $this->db->get_where('indikator_sasaran')->result();
				
		return $this->db->get_where('indikator_sasaran')->num_rows();
	}

	public function countProgram($result = FALSE)
	{
		$sasaran = $this->db->get_where('sasaran', array('id_kepala' => $this->kepala))->result();

		if(!$sasaran)
			return 0;

		$IDSasaran = array();
		foreach ($sasaran as $key => $value) 
			$IDSasaran[] = $value->id_sasaran;

		$this->db->where_in('id_sasaran', $IDSasaran);

		if($result)
			return $this->db->get_where('program')->result();

		return $this->db->get_where('program')->num_rows();
	}

	public function statusWarna()
	{
		if($this->checkPKPerubahanEntries())
			return '#347A31';

		if($this->checkPKPerubahanEntries())
			return '#DB8B0B';

		if($this->checkRKTEntries())
			return '#D94A38';

		if($this->checkRenstraEntries())
			return '#3C8DBC';

		return '#3C8DBC';
	}

	public function checkRenstraEntries($result = FALSE)
	{
		$sasaran = $this->db->get_where('sasaran', array('id_kepala' => $this->kepala))->result();

		if(!$sasaran)
			return FALSE;

		$IDSasaran = array();
		foreach ($sasaran as $key => $value) 
			$IDSasaran[] = $value->id_sasaran;

		$this->db->where_in('id_sasaran', $IDSasaran);
		$program = $this->db->get_where('program')->result();

		// PROGRAM
		$IDProgram = array();
		foreach ($program as $key => $value)
			$IDProgram[] = $value->id_program;
			
	    if(!$program)
	        return FALSE;

		$this->db->where_in('id_program', $IDProgram);
		if($result == FALSE) {
			return $this->db->get('kegiatan_program')->num_rows();
		} else {
			return $this->db->get('kegiatan_program')->result();
		}
	}

	private function checkRKTEntries()
	{
		if($this->checkRenstraEntries() == FALSE)
			return FALSE;

		$IDKegiatan = array();
		foreach ($this->checkRenstraEntries(TRUE) as $key => $value) 
			$IDKegiatan[] = $value->id_kegiatan;

		$this->db->where_in('id_kegiatan', $IDKegiatan);
		$this->db->where('anggaran_rkt !=', 0);

		return $this->db->get('rkt_anggaran_kegiatan')->num_rows();
	}

	private function checkPKPerubahanEntries()
	{
		if($this->checkRenstraEntries() == FALSE)
			return FALSE;

		$IDKegiatan = array();
		foreach ($this->checkRenstraEntries(TRUE) as $key => $value) 
			$IDKegiatan[] = $value->id_kegiatan;

		$this->db->where_in('id_kegiatan', $IDKegiatan);
		$this->db->where('nilai_anggaran !=', 0);

		return $this->db->get('pk_anggaran_kegiatan_perubahan')->num_rows();
	}

	private function checkPAnggaranKegiatan()
	{
		if($this->checkRenstraEntries() == FALSE)
			return FALSE;

		$IDKegiatan = array();
		foreach ($this->checkRenstraEntries(TRUE) as $key => $value) 
			$IDKegiatan[] = $value->id_kegiatan;

		$this->db->where_in('id_kegiatan', $IDKegiatan);
		$this->db->where('nilai_anggaran !=', 0);

		return $this->db->get('pk_anggaran_kegiatan_perubahan')->num_rows();
	}
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */

