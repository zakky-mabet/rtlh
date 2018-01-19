<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* RTLH
* Laporan Class 
*
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/

class Laporan extends Rtlh 
{
	public $data = array();

	public $per_page;

	public $page = 20;

	public $query;

	public $status_realisasi;

	public function __construct()
	{
		parent::__construct();

		$this->breadcrumbs->unshift(1, 'Laporan', "laporan");

		$this->load->model('mlaporan','laporan');

		$this->per_page = (!$this->input->get('per_page')) ? 20: $this->input->get('per_page');

		$this->page = $this->input->get('page');

		$this->query = $this->input->get('query');

	}

	public function index()
	{
		$this->page_title->push('Laporan', 'Data Calon Penerima');

		$this->breadcrumbs->unshift(2, 'Data Penduduk', "laporan");

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("laporan?per_page={$this->per_page}&query={$this->query}");

		$config['per_page'] = $this->per_page;

		$config['total_rows'] = $this->laporan->get_all(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Calon Penerima RTLH", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'laporan' => $this->laporan->get_all($this->per_page, $this->page),
			'num_laporan' => $config['total_rows']
		);

		$this->template->view('rtlh/laporan/calon-penerima', $this->data);
	}

	public function penerima_bantuan()
	{
		$this->page_title->push('Laporan', 'Data Penerima Bantuan');

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("laporan/penerima_bantuan?per_page={$this->per_page}&query={$this->query}&status_realisasi={$this->status_realisasi}");

		$config['per_page'] = $this->per_page;
		
		$config['total_rows'] = $this->laporan->get_all(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Penerima Bantuan", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'laporan' => $this->laporan->get_all_penerima($this->per_page, $this->page),
			'num_laporan' => $config['total_rows']
		);

		$this->template->view('rtlh/laporan/penerima-bantuan', $this->data);
	}

	public function print_out()
	{
		$this->data = array(
			'title' => "Data Calon Penerima", 
			'laporan' => $this->laporan->get_all($this->per_page, $this->page),
			'num_laporan' => $this->laporan->get_all(null, null, 'num')
		);

		$this->load->view('rtlh/laporan/print/calon-penerima-print', $this->data);
	}

	public function print_out_penerima()
	{
		$this->data = array(
			'title' => "Data Penerima Bantuan", 
			'laporan' => $this->laporan->get_all_penerima($this->per_page, $this->page),
			'num_laporan' => $this->laporan->get_all_penerima(null, null, 'num')
		);

		$this->load->view('rtlh/laporan/print/penerima-bantuan-print', $this->data);
	}


 }
