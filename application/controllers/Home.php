<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Rtlh {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('mjson_location');

	}

	public function index() 
	{

		$this->page_title->push('Home', 'Selamat datang di Administrator');

		$this->data = array(
			'title' => "Home - Rumah Tidak Layak Huni", 
			'breadcrumbs' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'home'	=> $this->mjson_location->all_location(),
		);

		$this->template->view('rtlh/v_home', $this->data);
	}

	public function empty()
	{
		$tables = array(
			'dekonsentrasi',
			'foto_rtpp',
			'aspek_bantuan',
			'daftar_bencana',
			'daftar_proyek_rtpp',
			'dana_bantuan',
			'data_bantuan_rkba',
			'fasilitas_rumah',
			'foto_bencana',
			'foto_dekonsentrasi',
			'foto_psu',
			'foto_rkba',
			'foto_rumah',
			'jenis_kegiatan_dekon',
			'pelaksana_psu',
			'psu',
			'realisasi_bantuan',
			'rumah',
			'tanah',
			'nilai_kriteria'
		);

		foreach ($tables as $value) {
			$this->db->empty_table($value);
		}


	}

}
