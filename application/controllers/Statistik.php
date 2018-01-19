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
		$this->page_title->push('Statistik', 'Penerima Bantuan Rtlh');

		$this->data = array(
			'title' => "Statistik Penerima Bantuan Rtlh", 
			'breadcrumbs' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('rtlh/statistik/penerima-bantuan', $this->data);
	}

	public function sumber_anggaran() 
	{
		$this->page_title->push('Statistik', 'Sumber Anggaran');

		$this->data = array(
			'title' => "Statistik Sumber Dana Bantuan", 
			'breadcrumbs' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);
		$this->template->view('rtlh/statistik/sumber-dana', $this->data);
	}

	public function dana_per_kabupaten() 
	{
		$this->page_title->push('Statistik', 'Total Dana Per Kabupaten');

		$this->data = array(
			'title' => "Statistik Total Dana Per Kabupaten", 
			'breadcrumbs' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);
		$this->template->view('rtlh/statistik/dana-per-kabupaten', $this->data);
	}

}
