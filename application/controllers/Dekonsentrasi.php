<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Simpera
* Dekonsentrasi Class 
*
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/
class Dekonsentrasi extends Rtlh 
{
	public $data = array();

	public $per_page;

	public $page = 20;

	public $query;

	public $jenis;

	public $tahun;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('mdekonsentrasi','dekonsentrasi');

		$this->load->model('maccount','account');

		$this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

		$this->page = $this->input->get('page');

		$this->query = $this->input->get('query');

		$this->jenis = $this->input->get('jenis');

		$this->tahun = $this->input->get('tahun');

		$this->load->js(base_url('assets/public/app/population.js'));
	}

	public function index()
	{
		$this->page_title->push('Dekonsentrasi', 'Data Dekonsentrasi');

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("dekonsentrasi?per_page={$this->per_page}&query={$this->query}&jenis={$this->jenis}&tahun={$this->tahun}");

		$config['per_page'] = $this->per_page;

		$config['total_rows'] = $this->dekonsentrasi->get_all(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Dekonsentrasi", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'dekonsentrasi' => $this->dekonsentrasi->get_all($this->per_page, $this->page),
			'num_dekonsentrasi' => $config['total_rows']
		);

		$this->template->view('rtlh/dekonsentrasi/data-dekonsentrasi', $this->data);
	}

	public function create()
	{
		$this->page_title->push('Dekonsentrasi', 'Tambah Data Dekonsentrasi');

		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|required');
		$this->form_validation->set_rules('nilai_anggaran', 'Nilai Anggaran', 'trim|required');
		$this->form_validation->set_rules('jenis', 'Jenis Kegiatan', 'trim|required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
		$this->form_validation->set_rules('tanggal_kegiatan', 'Tanggal Kegiatan', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->dekonsentrasi->create();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Data Dekonsentrasi", 
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('rtlh/dekonsentrasi/create-dekonsentrasi', $this->data);
	}

	public function update($param = 0)
	{
		if (!$param) {
			show_404();
		}

		if ($this->dekonsentrasi->get($param, 'num_rows') == 0)  {
			show_404();
		}
	
		$this->page_title->push('Dekonsentrasi', 'Sunting Data Dekonsentrasi');

		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|required');
		$this->form_validation->set_rules('nilai_anggaran', 'Nilai Anggaran', 'trim|required');
		$this->form_validation->set_rules('jenis', 'Jenis Kegiatan', 'trim|required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
		$this->form_validation->set_rules('tanggal_kegiatan', 'Tanggal Kegiatan', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->dekonsentrasi->update($param);

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Sunting Data Dekonsentrasi", 
			'page_title' => $this->page_title->show(),
			'get' => $this->dekonsentrasi->get($param)
		);

		$this->template->view('rtlh/dekonsentrasi/update-dekonsentrasi', $this->data);
	}

	public function foto($param = 0)
	{	
		if (!$param) {
			show_404();
		}
		
		if ($this->dekonsentrasi->get($param, 'num_rows') == 0)  {
			show_404();
		}

		$this->page_title->push('Dekonsentrasi', 'Foto Data Dekonsentrasi');

		$this->form_validation->set_rules('nama', 'Nama Foto', 'trim|required');

		if($this->form_validation->run() == TRUE)
		{
			$this->dekonsentrasi->upload_foto($param);

			redirect(site_url('dekonsentrasi/foto/'.$param));
		}

		$this->data = array(
			'title' => "Foto Data Dekonsentrasi", 
			'page_title' => $this->page_title->show(),
			'param' => $param,
		);

		$this->template->view('rtlh/dekonsentrasi/foto-dekonsentrasi', $this->data);
	}

	public function delete_foto($param = 0)
	{
		$this->dekonsentrasi->delete_foto($param);

		redirect(site_url('dekonsentrasi/foto/'.$this->input->get('back')));
	}

	public function delete_dekonsentrasi($param = 0)
	{
		$this->dekonsentrasi->delete_dekonsentrasi($param);

		redirect(site_url('dekonsentrasi'));
	}

	public function jenis()
	{
		$this->page_title->push('Jenis kegiatan Dekonsentrasi', 'Data Jenis kegiatan Dekonsentrasi');

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("dekonsentrasi/jenis?per_page={$this->per_page}&query={$this->query}");

		$config['per_page'] = $this->per_page;

		$config['total_rows'] = $this->dekonsentrasi->_get_all_jenis(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Jenis kegiatan Dekonsentrasi", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'jenis_dekonsentrasi' => $this->dekonsentrasi->_get_all_jenis($this->per_page, $this->page),
			'num_jenis_dekonsentrasi' => $config['total_rows']
		);

		$this->template->view('rtlh/dekonsentrasi/data-jenis-dekonsentrasi', $this->data);
	}

	public function create_jenis()
	{
		$this->page_title->push('Jenis kegiatan Dekonsentrasi', 'Tambah Data Jenis kegiatan Dekonsentrasi');

		$this->form_validation->set_rules('nama_jenis', 'Jenis Kegiatan', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');


		if ($this->form_validation->run() == TRUE)
		{
			$this->dekonsentrasi->create_jenis();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Data Jenis kegiatan Dekonsentrasi", 
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('rtlh/dekonsentrasi/create-jenis-dekonsentrasi', $this->data);
	}

	public function update_jenis($param = 0)
	{
		if (!$param) {
			show_404();
		}

		if ($this->dekonsentrasi->get_jenis_dekon($param, 'num_rows') == 0)  {
			show_404();
		}
	
		$this->page_title->push('Jenis kegiatan Dekonsentrasi', 'Sunting Data Jenis kegiatan Dekonsentrasi');

		$this->form_validation->set_rules('nama_jenis', 'Jenis Kegiatan', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');


		if ($this->form_validation->run() == TRUE)
		{
			$this->dekonsentrasi->update_jenis($param);

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Sunting Data Jenis kegiatan Dekonsentrasi", 
			'page_title' => $this->page_title->show(),
			'get' => $this->dekonsentrasi->get_jenis_dekon($param)
		);

		$this->template->view('rtlh/dekonsentrasi/update-jenis-dekonsentrasi', $this->data);
	}

	public function delete_jenis_dekonsentrasi($param = 0)
	{
		$this->dekonsentrasi->delete_jenis_dekonsentrasi($param);

		redirect(site_url('dekonsentrasi/jenis'));
	}

	public function print_out()
	{
		$this->data = array(
			'title' => "Data Dekonsentrasi", 
			'dekonsentrasi' => $this->dekonsentrasi->get_all($this->per_page, $this->page),
			'num_dekonsentrasi' => $this->dekonsentrasi->get_all(null, null, 'num'),
		);

		$this->load->view('rtlh/dekonsentrasi/print-dekonsentrasi', $this->data);
	}
	
	public function export()
	{
		$query = $this->dekonsentrasi->get_all($this->input->get('per_page'), $this->input->get('page'), 'export' );
		
		$this->excel_generator->set_query($query);

        $this->excel_generator->set_header(array(
        		'NAMA KEGIATAN',
        		'JENIS KEGIATAN',
        		'NILAI ANGGARAN',
        		'TAHUN',
        		'TANGGAL KEGIATAN',
        	));

        $this->excel_generator->set_column(
        	array(
        		'nama_kegiatan',
        		'nama_jenis',
        		'nilai_anggaran',
        		'tahun',
        		'tanggal_kegiatan',

        	));
        $this->excel_generator->set_width(array(34, 30, 25, 11, 20));
        
        $this->excel_generator->exportTo2007('DATA DEKONSENTRASI');	
	}

	public function print_out_jenis()
	{
		$this->data = array(
			'title' => "Data Jenis Kegiatan Dekonsentrasi", 
			'jenis_dekonsentrasi' => $this->dekonsentrasi->_get_all_jenis($this->per_page, $this->page),
		);

		$this->load->view('rtlh/dekonsentrasi/print-jenis-dekonsentrasi', $this->data);
	}
	
	public function export_jenis()
	{
		$query = $this->dekonsentrasi->_get_all_jenis($this->input->get('per_page'), $this->input->get('page'), 'export' );
		
		$this->excel_generator->set_query($query);

        $this->excel_generator->set_header(array(
        		'NAMA JENIS',
        		'KETERANGAN',
        	));

        $this->excel_generator->set_column(
        	array(
        		'nama_jenis',
        		'keterangan',
        	));
        $this->excel_generator->set_width(array(34, 60));
        
        $this->excel_generator->exportTo2007('DATA JENIS KEGIATAN DEKONSENTRASI');	
	}


}