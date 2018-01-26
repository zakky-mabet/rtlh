<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* RTLH
* Data_penerima Class 
*
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/
class Data_rkba extends Rtlh 
{
	public $data = array();

	public $per_page;

	public $page = 20;

	public $desa;

	public $gender;

	public $query;

	public function __construct()
	{
		parent::__construct();

		$this->breadcrumbs->unshift(1, 'Da', "data_penerima");

		$this->load->model('mdata_penerima','data_penerima');

		$this->load->model('mcandidate','candidate');	

		$this->per_page = (!$this->input->get('per_page')) ? 20: $this->input->get('per_page');

		$this->page = $this->input->get('page');

		$this->desa = $this->input->get('village');

		$this->gender = $this->input->get('gender');

		$this->query = $this->input->get('query');

		$this->load->js(base_url('assets/public/app/population.js'));

	}

	public function index()
	{
		$this->page_title->push('Rumah Korban Bencana Alam', 'Data Rumah Korban Bencana Alam');

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("data_rkba?per_page={$this->per_page}&query={$this->query}&village={$this->desa}&gender={$this->gender}");

		$config['per_page'] = $this->per_page;
		$config['total_rows'] = $this->data_penerima->get_all(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Rumah Korban Bencana Alam", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'data_candidate' => $this->data_penerima->get_all($this->per_page, $this->page),
			'num_data_candidate' => $config['total_rows']
		);

		$this->template->view('rtlh/data_rkba/data_rkba', $this->data);
	}

 }
