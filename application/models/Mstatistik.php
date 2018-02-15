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


		if($this->input->get('year') != '')
			$this->db->where('tahun_anggaran', $this->input->get('year'));

		return $this->db->get()->row()->total;
 	}

 	public  function get_kab_rkba_distinct()
	{
			$this->db->distinct();

			$this->db->select('penduduk.regency');
			
			$this->db->from('data_bantuan_rkba');

			$this->db->join('penduduk', 'penduduk.nik = data_bantuan_rkba.nik');

			return $this->db->get()->result();
	}

	public  function get_tahun_rkba_distinct()
	{
			$this->db->distinct();

			$this->db->select('data_bantuan_rkba.tahun');
			
			$this->db->from('data_bantuan_rkba');

			$this->db->join('penduduk', 'penduduk.nik = data_bantuan_rkba.nik');

			$this->db->order_by('data_bantuan_rkba.tahun', 'desc');

			return $this->db->get()->result();
	}

	public  function get_kab_rkba_num_rows($param = 0)
	{
		if($this->input->get('tahun') != '')
			$this->db->where('data_bantuan_rkba.tahun', $this->input->get('tahun'));

		$this->db->select('penduduk.regency');

		$this->db->join('penduduk', 'penduduk.nik = data_bantuan_rkba.nik');

		return $this->db->get_where('data_bantuan_rkba', array('penduduk.regency' => $param ))->num_rows();
	}

	public  function get_kabupaten($param = 0)
	{
		return	$this->db->get_where('regencies', array('id' => $param))->row();
	}


	public  function get_sumber_anggaran_rkba_distinct()
	{
			$this->db->distinct();

			$this->db->select('data_bantuan_rkba.sumber_anggaran');
			
			$this->db->from('data_bantuan_rkba');

			$this->db->join('penduduk', 'penduduk.nik = data_bantuan_rkba.nik');

			return $this->db->get()->result();
	}

	public function dana_by_sumber_anggaran_rkba($param = '')
 	{
 		$this->db->select('SUM(data_bantuan_rkba.jumlah_bantuan) as total ');

		$this->db->from('data_bantuan_rkba');

		$this->db->join('penduduk', 'penduduk.nik = data_bantuan_rkba.nik');

		$this->db->where('data_bantuan_rkba.sumber_anggaran', $param);

		if($this->input->get('tahun') != '')
			$this->db->where('tahun', $this->input->get('tahun'));

		if($this->input->get('kabupaten') != '')
			$this->db->where('penduduk.regency', $this->input->get('kabupaten'));

		return $this->db->get()->row()->total;
 	}

 	public  function get_tahun_rtpp_distinct()
	{
			$this->db->distinct();

			$this->db->select('rtpp.tahun');
			
			$this->db->from('rtpp');

			$this->db->join('penduduk', 'penduduk.nik = rtpp.nik');

			$this->db->order_by('rtpp.tahun', 'desc');

			return $this->db->get()->result();
	}

	public  function get_kab_rtpp_distinct()
	{
			$this->db->distinct();

			$this->db->select('penduduk.regency');
			
			$this->db->from('rtpp');

			$this->db->join('penduduk', 'penduduk.nik = rtpp.nik');

			return $this->db->get()->result();
	}

	public  function get_kab_rtpp_num_rows($param = 0)
	{
		if($this->input->get('tahun') != '')
			$this->db->where('rtpp.tahun', $this->input->get('tahun'));

		$this->db->select('penduduk.regency');

		$this->db->join('penduduk', 'penduduk.nik = rtpp.nik');

		return $this->db->get_where('rtpp', array('penduduk.regency' => $param ))->num_rows();
	}


	public  function get_sumber_anggaran_rtpp_distinct()
	{
			$this->db->distinct();

			$this->db->select('rtpp.sumber_anggaran');
			
			$this->db->from('rtpp');

			$this->db->join('penduduk', 'penduduk.nik = rtpp.nik');

			return $this->db->get()->result();
	}

	public function dana_by_sumber_anggaran_rtpp($param = '')
 	{
 		$this->db->select('SUM(rtpp.jumlah_bantuan) as total ');

		$this->db->from('rtpp');

		$this->db->join('penduduk', 'penduduk.nik = rtpp.nik');

		$this->db->where('rtpp.sumber_anggaran', $param);

		if($this->input->get('tahun') != '')
			$this->db->where('tahun', $this->input->get('tahun'));

		if($this->input->get('kabupaten') != '')
			$this->db->where('penduduk.regency', $this->input->get('kabupaten'));

		return $this->db->get()->row()->total;
 	}

 	public  function get_tahun_psu_distinct()
	{
			$this->db->distinct();

			$this->db->select('tahun');
			
			$this->db->from('psu');

			$this->db->order_by('tahun', 'desc');

			return $this->db->get()->result();
	}

	public  function get_sumber_anggaran_psu_distinct()
	{
			$this->db->distinct();

			$this->db->select('sumber_dana');
			
			$this->db->from('psu');

			return $this->db->get()->result();
	}

	public function dana_by_sumber_anggaran_psu($param = '')
 	{
 		$this->db->select('SUM(nilai_kontrak) as total ');

		$this->db->from('psu');

		$this->db->where('sumber_dana', $param);

		if($this->input->get('tahun') != '')
			$this->db->where('tahun', $this->input->get('tahun'));

		if($this->input->get('kabupaten') != '')
			$this->db->where('kabupaten', $this->input->get('kabupaten'));

		return $this->db->get()->row()->total;
 	}
}

