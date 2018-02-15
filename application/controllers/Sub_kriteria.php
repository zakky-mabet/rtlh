<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_kriteria extends Rtlh {

	public $data = array();

	public $per_page;

	public $page = 20;

	public $kriteria;

	public $query;

	public function __construct()
	{
		parent::__construct();

		$this->load->js(base_url('assets/public/app/population.js'));

		$this->load->model('msub_kriteria','sub_kriteria');

		$this->per_page = (!$this->input->get('per_page')) ? 20: $this->input->get('per_page');

		$this->page = $this->input->get('page');

		$this->kriteria = $this->input->get('kriteria');

		$this->query = $this->input->get('query');
	}

	public function index() 
	{
		$this->page_title->push('Master Data', 'Sub Kriteria');

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("sub_kriteria?per_page={$this->per_page}&query={$this->query}&kriteria={$this->kriteria}");

		$config['per_page'] = $this->per_page;
		$config['total_rows'] = $this->sub_kriteria->get_all(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Sub Kriteria", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'sub_kriteria' => $this->sub_kriteria->get_all($this->per_page, $this->page),
			'num_sub_kriteria' => $config['total_rows']
		);

		$this->template->view('rtlh/sub_kriteria/data-sub-kriteria', $this->data);
	}

	public function create()
	{
		$this->page_title->push('Sub Kriteria', 'Tambah Data Sub Kriteria');

		$this->breadcrumbs->unshift(2, 'Tambah Data Sub Kriteria', "sub_kriteria");

		$this->form_validation->set_rules('nama', 'Nama Sub Kriteria', 'trim|required');
		$this->form_validation->set_rules('kriteria', 'Nama Kriteria', 'trim|required');
		$this->form_validation->set_rules('nilai', 'Nilai', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->sub_kriteria->create();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Data Sub Kriteria", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('rtlh/sub_kriteria/create', $this->data);
	}

	public function update($param = 0)
	{
		$this->page_title->push('Sub Kriteria', 'Sunting Data Sub Kriteria');

		$this->breadcrumbs->unshift(2, 'Data Sub Kriteria', "sub_kriteria");

		$this->form_validation->set_rules('nama', 'Nama Sub Kriteria', 'trim|required');
		$this->form_validation->set_rules('kriteria', 'Nama Kriteria', 'trim|required');
		$this->form_validation->set_rules('nilai', 'Nilai', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->sub_kriteria->update($param);

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Sunting Data Pengguna Sistem", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'get' => $this->sub_kriteria->get($param)
		);

		$this->template->view('rtlh/sub_kriteria/update', $this->data);
	}

	public function delete($param = 0)
	{
		$this->sub_kriteria->delete($param);

		redirect('sub_kriteria');
	}

	public function bulk_action()
	{
		switch ($this->input->post('action')) 
		{
			case 'delete':
				$this->sub_kriteria->delete_multiple();
				break;
			
			default:
				$this->template->alert(
					' Tidak ada data yang dipilih.', 
					array('type' => 'warning','icon' => 'warning')
				);
				break;
		}

		redirect('sub_kriteria');
	}

	public function print_out()
	{
		$this->data = array(
			'title' => "Data Sub Kriteria", 
			'sub_kriteria' => $this->sub_kriteria->get_all($this->per_page, $this->page),
			'num_sub_kriteria' => $this->sub_kriteria->get_all(null, null, 'num'),
		);

		$this->load->view('rtlh/sub_kriteria/print-sub-kriteria', $this->data);
	}
	
	public function export()
	{
		$query = $this->sub_kriteria->get_all($this->input->get('per_page'), $this->input->get('page'), 'export' );


		$this->excel_generator->set_query($query);
        $this->excel_generator->set_header(array(
        		'Nama Sub Kriteria',
        		'Kriteria',
        		'Nilai',
        	));
        $this->excel_generator->set_column(
        	array(
        		'nama_sub_kriteria',
        		'nama_kriteria',
        		'nilai',
        	));
        $this->excel_generator->set_width(array(30, 33, 10));
        
        $this->excel_generator->exportTo2007('DATA SUB KRITERIA');
	}	

	
}
