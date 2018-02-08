<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* simpera
* Data_rkba Class 
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

		$this->load->model('mdata_rkba','data_rkba');	

		$this->load->model('mdata_penerima','data_penerima');

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
		$config['total_rows'] = $this->data_rkba->get_all(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Rumah Korban Bencana Alam", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'data_rkba' => $this->data_rkba->get_all($this->per_page, $this->page),
			'num_data_rkba' => $config['total_rows']
		);

		$this->template->view('rtlh/data_rkba/data_rkba', $this->data);
	}

	public function search()

	{
		$this->load->js(base_url('assets/public/app/find-rkba.js'));
		
		$this->page_title->push('Calon Penerima RKBA', 'Cari Calon');

		$this->breadcrumbs->unshift(2, 'Calon Penerima RKBA', "data_rkba/search");

		$this->data = array(
			'title' => "Calon Penerima RKBA", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			
		);

		$this->template->view('rtlh/data_rkba/search_rkba', $this->data);
	}

	public function entri($param = 0)
	{

		if (!$param) {
			show_404();
		}

		if ($this->data_rkba->get_penduduk($param, 'num_rows') == 0 ) {
			show_404();
		}	

		$this->form_validation->set_rules('id_daftar_bencana', 'Korban Bencana', 'trim|required');
		$this->form_validation->set_rules('jenis_kerusakan', 'Jenis Kerusakan', 'trim|required');
		$this->form_validation->set_rules('jenis_kegiatan', 'Jenis Kegiatan', 'trim|required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required|is_numeric');
		$this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
		$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');
		$this->form_validation->set_rules('jumlah_bantuan', 'Jumlah  Bantuan', 'trim|required|is_numeric');
		$this->form_validation->set_rules('sumber_anggaran', 'Sumber Anggaran', 'trim|required');

		if($this->form_validation->run() == TRUE)
		{
			$this->data_rkba->create($param);

			redirect(base_url('data_rkba'));
		}

		$this->page_title->push('Calon Penerima RKBA', 'Cari Calon');

		$this->breadcrumbs->unshift(2, 'Calon Penerima RKBA', "data_rkba/entri");

		$this->data = array(
			'title' => "Calon Penerima RKBA", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'param' => $param,
			
		);

		$this->template->view('rtlh/data_rkba/create_rkba', $this->data);
	}

	public function update($param = 0 )
	{
		if (!$param) {
			show_404();
		}

		if ($this->data_rkba->count_rkba($param) == 0 ) {
			show_404();
		}	

		$this->form_validation->set_rules('id_daftar_bencana', 'Korban Bencana', 'trim|required');
		$this->form_validation->set_rules('jenis_kerusakan', 'Jenis Kerusakan', 'trim|required');
		$this->form_validation->set_rules('jenis_kegiatan', 'Jenis Kegiatan', 'trim|required');
		$this->form_validation->set_rules('tahun', 'Tahun', 'trim|required|is_numeric');
		$this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
		$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');
		$this->form_validation->set_rules('jumlah_bantuan', 'Jumlah  Bantuan', 'trim|required|is_numeric');
		$this->form_validation->set_rules('sumber_anggaran', 'Sumber Anggaran', 'trim|required');

		if($this->form_validation->run() == TRUE)
		{
			$this->data_rkba->update($param);

			redirect(current_url());
		}

		$this->page_title->push('Penerima RKBA', 'Sunting');

		$this->breadcrumbs->unshift(2, 'Penerima RKBA', "data_rkba/update");

		$this->data = array(
			'title' => "Sunting Penerima RKBA", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'param' => $param,
			'get' => $this->data_rkba->get_data_rkba($param),
			
		);

		$this->template->view('rtlh/data_rkba/update_rkba', $this->data);
	}

	public function foto($param = 0)
	{	

		$this->page_title->push('Penerima RKBA', 'Foto Rumah');

		$this->breadcrumbs->unshift(2, 'Data Penerima', "data_rkba");

		$this->form_validation->set_rules('nama', 'Nama Foto', 'trim|required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');

		if($this->form_validation->run() == TRUE)
		{
			$this->data_rkba->upload_foto_rkba($param);

			redirect(site_url('data_rkba/foto/'.$param));

		}

		$this->data = array(
			'title' => "Foto Rumah Penerima RKBA", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'param' => $param,
		);

		$this->template->view('rtlh/data_rkba/foto-rumah', $this->data);
	}

	public function delete_foto($param = 0)
	{
		$this->data_rkba->delete_foto($param);

		redirect('data_rkba/foto/'.$this->input->get('back'));
	}
	
 }
