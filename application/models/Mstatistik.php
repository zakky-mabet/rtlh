<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/

class Mstatistik extends Rtlh_model 
{
	
	public function __construct()
	{
		parent::__construct();
		
	}

	public function statistik_penerima($id = 0, $status = '')
 	{
 			$this->db->from('penduduk');

  			$this->db->join('dana_bantuan', 'dana_bantuan.nik = penduduk.nik');

  			$this->db->where('regency', $id);

  			$this->db->where('status_realisasi', $status);

  			//$this->db->where('tahun_anggaran', date('Y')-1 );

  			if($this->input->get('year') != '')
			$this->db->where('tahun_anggaran', $this->input->get('year'));

  			return $this->db->get()->num_rows();
 	}

 	public function dana_by($param = '')
 	{
 		$this->db->select('SUM(nilai) as total ');

		$this->db->from('dana_bantuan');

		$this->db->where('sumber_anggaran', $param);

		//$this->db->where('tahun_anggaran', date('Y')-1 );

		if($this->input->get('year') != '')
			$this->db->where('tahun_anggaran', $this->input->get('year'));

		return $this->db->get()->row()->total;
 	}

 	public function dana_by_kabupaten($param = '')
 	{
 		$this->db->select('SUM(dana_bantuan.nilai) as total ');

		$this->db->from('dana_bantuan');

		$this->db->join('penduduk', 'penduduk.nik = dana_bantuan.nik');

		$this->db->where('penduduk.regency', $param);

		//$this->db->where('dana_bantuan.tahun_anggaran', date('Y')-1 );

		if($this->input->get('year') != '')
			$this->db->where('tahun_anggaran', $this->input->get('year'));

		return $this->db->get()->row()->total;
 	}

}

