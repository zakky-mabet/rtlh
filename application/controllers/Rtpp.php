<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Simpera
* Rtpp Class 
*
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/
class Rtpp extends Rtlh 
{
	public $data = array();

	public $per_page;

	public $page = 20;

	public $query;

	public $proyek;

	public $status_proyek;

	public $tahun;

	public $sumber_anggaran;

	public $kabupaten;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('mrtpp','rtpp');

		$this->load->model('mdata_rkba','data_rkba');	

		$this->load->model('maccount','account');

		$this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

		$this->page = $this->input->get('page');

		$this->query = $this->input->get('query');

		$this->proyek = $this->input->get('proyek');

		$this->status_proyek = $this->input->get('status_proyek');

		$this->tahun = $this->input->get('tahun');

		$this->kabupaten = $this->input->get('kabupaten');

		$this->sumber_anggaran = $this->input->get('sumber_anggaran');

		$this->load->js(base_url('assets/public/app/population.js'));
	}

	public function index()
	{
		$this->page_title->push('Rumah Terkena Proyek Pemerintah', 'Data Rumah Terkena Proyek Pemerintah ');

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("rtpp?per_page={$this->per_page}&query={$this->query}&proyek={$this->proyek}&tahun={$this->tahun}&kabupaten={$this->kabupaten}&sumber_anggaran={$this->sumber_anggaran}");

		$config['per_page'] = $this->per_page;

		$config['total_rows'] = $this->rtpp->get_all(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Rumah Terkena Proyek Pemerintah", 
			'page_title' => $this->page_title->show(),
			'rtpp' => $this->rtpp->get_all($this->per_page, $this->page),
			'num_rtpp' => $config['total_rows']
		);

		$this->template->view('rtlh/rtpp/data-rtpp', $this->data);
	}

	public function search()
	{
		$this->load->js(base_url('assets/public/app/find-rtpp.js'));
		
		$this->page_title->push('Rumah Terkena Proyek Pemerintah', 'Cari Penerima');

		$this->data = array(
			'title' => "Penerima Bantuan Rumah Terkena Proyek Pemerintah", 
			'page_title' => $this->page_title->show(),	
		);

		$this->template->view('rtlh/rtpp/search_rtpp', $this->data);
	}

	public function entri($param = 0)
	{

		if (!$param) {
			show_404();
		}

		if ($this->data_rkba->get_penduduk($param, 'num_rows') == 0 ) {
			show_404();
		}	

		$this->form_validation->set_rules('id_proyek_rtpp', 'Terkena Proyek', 'trim|required');
		$this->form_validation->set_rules('aksi', 'Aksi', 'trim|required');
		$this->form_validation->set_rules('lokasi_rumah', 'Lokasi Rumah', 'trim|required');
		$this->form_validation->set_rules('jumlah_bantuan', 'Jumlah  Bantuan', 'trim|required|is_numeric');
		$this->form_validation->set_rules('sumber_anggaran', 'Sumber Anggaran', 'trim|required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');


		if($this->form_validation->run() == TRUE)
		{
			$this->rtpp->create($param);

			redirect(base_url('rtpp'));
		}

		$this->page_title->push('Rumah Terkena Proyek Pemerintah', 'Entri Data RTPP');

		$this->data = array(
			'title' => " Penerima Rumah", 
			'page_title' => $this->page_title->show(),
			'param' => $param,
		);

		$this->template->view('rtlh/rtpp/create_rtpp', $this->data);
	}

	public function update($param = 0 )
	{
		if (!$param) {
			show_404();
		}
		if (!$this->rtpp->get($param, 'num_rows')) {
			show_404();
		}

		$this->form_validation->set_rules('id_proyek_rtpp', 'Terkena Proyek', 'trim|required');
		$this->form_validation->set_rules('aksi', 'Aksi', 'trim|required');
		$this->form_validation->set_rules('lokasi_rumah', 'Lokasi Rumah', 'trim|required');
		$this->form_validation->set_rules('jumlah_bantuan', 'Jumlah  Bantuan', 'trim|required|is_numeric');
		$this->form_validation->set_rules('sumber_anggaran', 'Sumber Anggaran', 'trim|required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');

		if($this->form_validation->run() == TRUE)
		{
			$this->rtpp->update($param);

			redirect(current_url());
		}

		$this->page_title->push('Rumah Terkena Proyek Pemerintah', 'Sunting Data RTPP');
 
		$this->data = array(
			'title' => "Sunting Penerima RTPP", 
			'page_title' => $this->page_title->show(),
			'get' => $this->rtpp->get($param),
			
		);

		$this->template->view('rtlh/rtpp/update_rtpp', $this->data);
	}

	public function foto($param = 0)
	{	
		if (!$param) {
			show_404();
		}

		if (!$this->rtpp->get($param, 'num_rows')) {
			show_404();
		}

		$this->page_title->push('Rumah Terkena Proyek Pemerintah', 'Foto Rumah Terkena Proyek Pemerintah');

		$this->form_validation->set_rules('nama', 'Nama Foto', 'trim|required');

		if($this->form_validation->run() == TRUE)
		{
			$this->rtpp->upload_foto($param);

			redirect(site_url('rtpp/foto/'.$param));
		}

		$this->data = array(
			'title' => "Foto Data Prasarana Sarana dan Utilitas", 
			'page_title' => $this->page_title->show(),
			'param' => $param,
		);

		$this->template->view('rtlh/rtpp/foto-rtpp', $this->data);
	}

	public function delete_foto($param = 0)
	{
		$this->rtpp->delete_foto($param);

		redirect(site_url('rtpp/foto/'.$this->input->get('back')));
	}

	public function delete($param = 0)
	{
		$this->rtpp->delete($param);

		redirect(site_url('rtpp'));
	}

	public function proyek()
	{
		$this->page_title->push('Rumah Terkena Proyek Pemerintah', 'Data Proyek');

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("rtpp/proyek?per_page={$this->per_page}&query={$this->query}&tahun={$this->tahun}&status_proyek={$this->status_proyek}");

		$config['per_page'] = $this->per_page;

		$config['total_rows'] = $this->rtpp->get_all_daftar_proyek(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Proyek", 
			'page_title' => $this->page_title->show(),
			'proyek' => $this->rtpp->get_all_daftar_proyek($this->per_page, $this->page),
			'num_proyek' => $config['total_rows']
		);

		$this->template->view('rtlh/rtpp/data-proyek', $this->data);
	}


	public function create_proyek()
	{
		$this->page_title->push('Rumah Terkena Proyek Pemerintah', 'Tambah Data Proyek');

		$this->form_validation->set_rules('nama_proyek', 'Nama Proyek', 'trim|required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
		$this->form_validation->set_rules('lokasi_proyek', 'Lokasi Proyek', 'trim|required');
		$this->form_validation->set_rules('status_proyek', 'Status Proyek', 'trim|required');		

		if ($this->form_validation->run() == TRUE)
		{
			$this->rtpp->create_proyek();

			redirect(current_url());
		}

		$this->data = array(

			'title' => "Tambah Data Proyek",

			'page_title' => $this->page_title->show(),
		);

		$this->template->view('rtlh/rtpp/create-proyek', $this->data);
	}

	public function update_proyek($param = 0 )
	{
		if (!$param) {
			show_404();
		}
		if (!$this->rtpp->get_proyek($param)) {
			show_404();
		}

		$this->form_validation->set_rules('nama_proyek', 'Nama Proyek', 'trim|required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required');
		$this->form_validation->set_rules('lokasi_proyek', 'Lokasi Proyek', 'trim|required');
		$this->form_validation->set_rules('status_proyek', 'Status Proyek', 'trim|required');

		if($this->form_validation->run() == TRUE)
		{
			$this->rtpp->update_proyek($param);

			redirect(current_url());
		}

		$this->page_title->push('Rumah Terkena Proyek Pemerintah', 'Sunting Data Proyek');
 
		$this->data = array(
			'title' => "Sunting Data Proyek", 
			'page_title' => $this->page_title->show(),
			'get' => $this->rtpp->get_proyek($param),
			
		);

		$this->template->view('rtlh/rtpp/update-proyek', $this->data);
	}

	public function delete_proyek($param = 0)
	{
		$this->rtpp->delete_proyek($param);

		redirect(site_url('rtpp/proyek'));
	}

}