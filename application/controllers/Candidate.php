<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate extends RTlh 
{
	public function __construct()
	{
		parent::__construct();

		$this->breadcrumbs->unshift(1, 'Calon Penerima RTLH', "candidate");

		$this->load->model('mpopulation','population');

		$this->load->model('mpopulation_excel', 'population_excel');

		$this->load->js(base_url('assets/public/app/find-candidate.js'));

	}

	public function index()
	{
		$this->page_title->push('Calon Penerima RTLH', '');

		$this->breadcrumbs->unshift(2, 'Data Penduduk', "population");

		$this->data = array(
			'title' => "Calon Penerima RTLH", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			
		);

		$this->template->view('rtlh/candidate/create-candidate', $this->data);
	}


}

