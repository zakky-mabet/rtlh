<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidate extends RTlh 
{
	public function __construct()
	{
		parent::__construct();

		$this->breadcrumbs->unshift(1, 'Calon Penerima RTLH', "candidate");

		$this->load->model('mcandidate','candidate');
	}

	public function index()

	{
		$this->load->js(base_url('assets/public/app/find-candidate.js'));
		
		$this->page_title->push('Calon Penerima RTLH', '');

		$this->breadcrumbs->unshift(2, 'Calon Penerima RTLH', "candidate");

		$this->data = array(
			'title' => "Calon Penerima RTLH", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			
		);

		$this->template->view('rtlh/candidate/create-candidate', $this->data);
	}

	public function entri($param = 0)
	{
		if(!$param){
			show_404();
		}

		$this->page_title->push('Calon Penerima RTLH', 'Entri Data');

		$this->breadcrumbs->unshift(2, 'Calon Penerima RTLH', "index/entri");

		$this->data = array(
			'title' => "Entri Data Calon Penerima RTLH", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'penduduk' => $this->candidate->get($param),
			
		);

		$this->template->view('rtlh/candidate/insert-candidate', $this->data);
	}


}

