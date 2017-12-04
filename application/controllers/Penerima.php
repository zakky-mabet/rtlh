<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerima extends RTlh 
{
	public function __construct()
	{
		parent::__construct();

		$this->breadcrumbs->unshift(1, ' Penerima Bantuan RTLH', "penerima");

		$this->load->model('mpenerima','penerima');
	}

	public function index()

	{
		$this->load->js(base_url('assets/public/app/find-penerima.js'));
		
		$this->page_title->push('Penerima Bantuan RTLH', 'Cari ');

		$this->breadcrumbs->unshift(2, ' Penerima RTLH', "penerima");

		$this->data = array(
			'title' => "Penerima Bantuan RTLH", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			
		);

		$this->template->view('rtlh/penerima/create-penerima', $this->data);
	}

	public function entri($param = 0)
	{
		if(!$param){
			show_404();
		}

		if (count($this->penerima->get($param)) == 0) {
			show_404();
		}
		
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
		$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
		$this->form_validation->set_rules('tahun_anggaran', 'Tahun Anggaran', 'trim|required');
		$this->form_validation->set_rules('nilai', 'Nilai', 'trim|required');
		$this->form_validation->set_rules('sumber_anggaran', 'Sumber Anggaran', 'trim|required');

		if($this->form_validation->run() == TRUE)
		{
			$this->penerima->create();

			redirect(base_url('penerima'));
		}

		$this->page_title->push('Penerima Bantuan RTLH', 'Entri Data');

		$this->breadcrumbs->unshift(2, 'Penerima Bantuan RTLH', "index/entri");

		$this->data = array(
			'title' => "Entri Data Penerima Bantuan RTLH", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'penduduk' => $this->penerima->get($param),
			
		);

		$this->template->view('rtlh/penerima/insert-penerima', $this->data);
	}

	
	public function create()
	{
		
		echo 'Hayooo Mau ngapain, wkwkwk';
	}

}

