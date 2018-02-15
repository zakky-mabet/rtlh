<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends Rtlh {

	public $data = array();

	public $per_page;

	public $page = 20;

	public $query;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('mkriteria','kriteria');

		$this->per_page = (!$this->input->get('per_page')) ? 20: $this->input->get('per_page');

		$this->page = $this->input->get('page');

		$this->query = $this->input->get('query');
	}

	public function index() 
	{
		$this->page_title->push('Master Data', 'Kriteria');

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("kriteria?per_page={$this->per_page}&query={$this->query}");

		$config['per_page'] = $this->per_page;
		$config['total_rows'] = $this->kriteria->get_all(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Kriteria", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'kriteria' => $this->kriteria->get_all($this->per_page, $this->page),
			'num_kriteria' => $config['total_rows']
		);

		$this->template->view('rtlh/kriteria/data-kriteria', $this->data);
	}

	public function print_out()
	{
		$this->data = array(
			'title' => "Data Kriteria", 
			'kriteria' => $this->kriteria->get_all($this->per_page, $this->page),
			'num_kriteria' => $this->kriteria->get_all(null, null, 'num'),
		);

		$this->load->view('rtlh/kriteria/print-kriteria', $this->data);
	}
	
	public function export()
	{
		$query = $this->kriteria->get_all($this->input->get('per_page'), $this->input->get('page'), 'export' );

		$this->excel_generator->set_query($query);
        $this->excel_generator->set_header(array(
        		'Nama Kriteria',
        		'Keterangan',
        	));
        $this->excel_generator->set_column(
        	array(
        		'nama',
        		'keterangan',
        	));
        $this->excel_generator->set_width(array(40, 23));
        
        $this->excel_generator->exportTo2007('DATA KRITERIA');
	}

}
