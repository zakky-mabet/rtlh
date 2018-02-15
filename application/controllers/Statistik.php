<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistik extends Rtlh {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('mstatistik');
	}

	public function index() 
	{	
		$this->page_title->push('Statistik', 'Penerima Bantuan RTLH');

		$this->data = array(
			'title' => "Statistik Penerima Bantuan RTLH", 
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('rtlh/statistik/penerima-bantuan', $this->data);
	}

	public function sumber_anggaran() 
	{
		$this->page_title->push('Statistik', 'Sumber Anggaran RTLH');

		$this->data = array(
			'title' => "Statistik Sumber Dana Bantuan RTLH", 
			'page_title' => $this->page_title->show(),
		);
		$this->template->view('rtlh/statistik/sumber-dana', $this->data);
	}

	public function dana_per_kabupaten() 
	{
		$this->page_title->push('Statistik', 'Total Dana Per Kabupaten RTLH');

		$this->data = array(
			'title' => "Statistik Total Dana Per Kabupaten RTLH", 
			'page_title' => $this->page_title->show(),
		);
		$this->template->view('rtlh/statistik/dana-per-kabupaten', $this->data);
	}


	public function rkba() 
	{
		$this->page_title->push('Statistik', 'Rumah Korban Bencana Alam');

		$this->data = array(
			'title' => "Statistik Rumah Korban Bencana Alam", 
			'page_title' => $this->page_title->show(),
		);
		$this->template->view('rtlh/statistik/rkba-stats', $this->data);
	}

	public function rkba_sumber_anggaran() 
	{
		$this->page_title->push('Statistik', 'Rumah Korban Bencana Alam');

		$this->data = array(
			'title' => "Statistik Rumah Korban Bencana Alam", 
			'page_title' => $this->page_title->show(),
		);
		$this->template->view('rtlh/statistik/rkba-stats-sumber-anggaran', $this->data);
	}

	public function rtpp() 
	{
		$this->page_title->push('Statistik', 'Rumah Terkena Proyek Pemerintah');

		$this->data = array(
			'title' => "Statistik Rumah terkena Proyek Pemerintah", 
			'page_title' => $this->page_title->show(),
		);
		$this->template->view('rtlh/statistik/rtpp-stats', $this->data);
	}

	public function rtpp_sumber_anggaran() 
	{
		$this->page_title->push('Statistik', 'Rumah Terkena Proyek Pemerintah');

		$this->data = array(
			'title' => "Statistik Rumah Terkena Proyek Pemerintah", 
			'page_title' => $this->page_title->show(),
		);
		$this->template->view('rtlh/statistik/rtpp-stats-sumber-anggaran', $this->data);
	}

	public function psu() 
	{
		$this->page_title->push('Statistik', 'Prasarana Sarana dan Utilitas');

		$this->data = array(
			'title' => "Statistik Prasarana Sarana dan Utilitas", 
			'page_title' => $this->page_title->show(),
		);
		$this->template->view('rtlh/statistik/psu-stats-sumber-anggaran', $this->data);
	}

}
