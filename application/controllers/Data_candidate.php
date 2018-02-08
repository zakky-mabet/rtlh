<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* RTLH
* Data_candidate Class 
*
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/

class Data_candidate extends Rtlh 
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

		$this->breadcrumbs->unshift(1, 'Calon Penerima RTLH', "data_candidate");

		$this->load->model('mdata_candidate','data_candidate');

		$this->load->model('mcandidate','candidate');

		$this->load->model('mpopulation_excel', 'population_excel');

		$this->per_page = (!$this->input->get('per_page')) ? 20: $this->input->get('per_page');

		$this->page = $this->input->get('page');

		$this->desa = $this->input->get('village');

		$this->gender = $this->input->get('gender');

		$this->query = $this->input->get('query');

		$this->load->js(base_url('assets/public/app/population.js'));

	}

	public function index()
	{
		$this->page_title->push('Calon Penerima RTLH', 'Data Calon Penerima');

		$this->breadcrumbs->unshift(2, 'Data Penduduk', "data_candidate");

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("data_candidate?per_page={$this->per_page}&query={$this->query}&village={$this->desa}&gender={$this->gender}");

		$config['per_page'] = $this->per_page;
		$config['total_rows'] = $this->data_candidate->get_all(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Calon Penerima RTLH", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'data_candidate' => $this->data_candidate->get_all($this->per_page, $this->page),
			'num_data_candidate' => $config['total_rows']
		);

		$this->template->view('rtlh/data_candidate/data-candidate', $this->data);
	}

	public function print_out()
	{
		$this->data = array(
			'title' => "Data Calon Penerima", 
			'data_candidate' => $this->data_candidate->get_all($this->per_page, $this->page),
			'num_data_candidate' => $this->data_candidate->get_all(null, null, 'num')
		);

		$this->load->view('rtlh/data_candidate/print', $this->data);
	}

	public function print_out_landscape()
	{
		$this->data = array(
			'title' => "Data Calon Penerima", 
			'data_candidate' => $this->data_candidate->get_all($this->per_page, $this->page),
			'num_data_candidate' => $this->data_candidate->get_all(null, null, 'num')
		);

		$this->load->view('rtlh/data_candidate/print-landscape', $this->data);
	}		

	public function update($param = 0)

	{	
		$this->load->js(base_url('assets/public/app/arithmetic.js'));

		$this->page_title->push('Calon Penerima RTLH', 'Sunting Calon Penerima');

		$this->breadcrumbs->unshift(2, 'Data Calon Penerima', "data_candidate");

		$this->data = array(
			'title' => "Sunting Data Calon Penerima", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'data_candidate' => $this->data_candidate->get($param),
			'provinsi' => $this->data_candidate->get_provinsi(),
			'penduduk' => $this->candidate->get($param),
			'tanah' => $this->data_candidate->get_tanah($param),
			'rumah' => $this->data_candidate->get_rumah($param),
			'fasilitas_rumah' => $this->data_candidate->get_fasilitas_rumah($param),
			'nilai_kriteria' => $this->data_candidate->get_nilai_kriteria($param),
			'param' => $param,
		);

		$this->template->view('rtlh/data_candidate/update-candidate', $this->data);
	}

	public function foto($param = 0)
	{	
	
		$this->page_title->push('Calon Penerima RTLH', 'Foto Rumah');

		$this->breadcrumbs->unshift(2, 'Data Calon Penerima', "data_candidate");

		$this->form_validation->set_rules('nama', 'Nama Foto', 'trim|required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');

		if($this->form_validation->run() == TRUE)
		{
			$this->data_candidate->upload($param);

			redirect(site_url('data_candidate/foto/'.$param));

		}

		$this->data = array(
			'title' => "Foto Rumah Calon Penerima", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'param' => $param,
		);

		$this->template->view('rtlh/data_candidate/foto-rumah', $this->data);
	}

	public function ubah($param = 0)
	{
		$this->data_candidate->update($param);

		redirect(site_url('data_candidate/update/'.$param));
	}


	public function delete($param = 0)
	{
		$this->data_candidate->delete($param);

		redirect('data_candidate');
	}

	public function delete_foto($param = 0)
	{
		$this->data_candidate->delete_foto($param);

		redirect('data_candidate/foto/'.$this->input->get('nik'));
	}

	public function bulk_action()
	{
		
		switch ($this->input->post('action')) 
		{
			case 'delete':
				$this->data_candidate->delete_multiple();
				break;
			
			default:
				$this->template->alert(
					' Tidak ada data yang dipilih.', 
					array('type' => 'warning','icon' => 'warning')
				);
				break;
		}

		redirect('data_candidate');
	}

	public function import()
	{
		$this->page_title->push('Master Data', 'Impor Data Penduduk');

		$this->breadcrumbs->unshift(2, 'Data Penduduk', "data_candidate");

		$this->data = array(
			'title' => "Impor Data Penduduk", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('rtlh/data_candidate/import-data_candidate', $this->data);
	}

	public function set_upload()
	{
		$this->data_candidate_excel->upload();

		redirect('data_candidate/import');
	}

	public function export()
	{
		$this->data_candidate_excel->get($this->input->get('per_page'), $this->input->get('page'));
	}

	/**
	 * Check Ketersediaan NIK
	 *
	 * @return string
	 **/
	public function validate_nik()
	{
		if($this->data_candidate->nik_check($this->input->post('ID')) == TRUE)
		{
			$this->form_validation->set_message('validate_nik', 'Maaf NIK ini telah digunakan.');
			return false;
		} else {
			return true;
		}
	}



	function ambil_data(){

		$modul=$this->input->post('modul');

		$id=$this->input->post('id');

		if($modul=="kabupaten"){

			echo $this->data_candidate->kabupaten($id);
		}
		else if($modul=="kecamatan"){

			echo $this->data_candidate->kecamatan($id);

		}
		else if($modul=="kelurahan"){

			echo $this->data_candidate->kelurahan($id);
		}
	}

 }
