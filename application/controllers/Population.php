<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* RTLH
* Population Class 
*
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/

class Population extends Rtlh 
{
	public $data = array();

	public $per_page;

	public $page = 20;

	public $kabupaten;

	public $kecamatan;

	public $kelurahan;

	public $query;

	public function __construct()
	{
		parent::__construct();

		$this->breadcrumbs->unshift(1, 'Master Data', "population");

		$this->load->model('mpopulation','population');

		$this->load->model('mpopulation_excel', 'population_excel');

		$this->per_page = (!$this->input->get('per_page')) ? 20: $this->input->get('per_page');

		$this->page = $this->input->get('page');

		$this->kabupaten = $this->input->get('kabupaten');

		$this->kecamatan = $this->input->get('kecamatan');

		$this->kelurahan = $this->input->get('kelurahan');

		$this->query = $this->input->get('query');

		$this->load->js(base_url('assets/public/app/population.js'));

	}

	public function index()
	{
		$this->page_title->push('Master Data', 'Data Penduduk');

		$this->breadcrumbs->unshift(2, 'Data Penduduk', "population");

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("population?per_page={$this->per_page}&query={$this->query}&kelurahan={$this->kelurahan}&kabupaten={$this->kabupaten}&kecamatan={$this->kecamatan}");

		$config['per_page'] = $this->per_page;
		$config['total_rows'] = $this->population->get_all(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Penduduk", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'population' => $this->population->get_all($this->per_page, $this->page),
			'num_population' => $config['total_rows'],
			'provinsi' => $this->population->get_provinsi(),
		);

		$this->template->view('rtlh/population/data-population', $this->data);
	}

	public function print_out()
	{
		$this->data = array(
			'title' => "Data Penduduk", 
			'population' => $this->population->get_all($this->per_page, $this->page),
			'num_population' => $this->population->get_all(null, null, 'num')
		);

		$this->load->view('rtlh/population/print-population', $this->data);
	}

	public function create()
	{
		$this->page_title->push('Master Data', 'Tambah Data Penduduk');

		$this->breadcrumbs->unshift(2, 'Data Penduduk', "population");

		$this->form_validation->set_rules('nik', 'NIK', 'trim|callback_validate_nik|required');
		$this->form_validation->set_rules('kk', 'No. KK', 'trim|required');
		$this->form_validation->set_rules('status_kk', 'Status Hubungan KK', 'trim|required');
		$this->form_validation->set_rules('name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('birts', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('status_kawin', 'Status Perkawinan', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraaan', 'trim|required');

		$this->form_validation->set_rules('gol_darah', 'Golongan Darah', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('rt', 'RT', 'trim|is_numeric|required');
		$this->form_validation->set_rules('rw', 'RW', 'trim|is_numeric|required');

		//$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
		$this->form_validation->set_rules('kabupaten', 'Kabupaten/ Kota ', 'trim|required');
		$this->form_validation->set_rules('kecamatan', 'Kecamataan ', 'trim|required');
		$this->form_validation->set_rules('kelurahan', 'Kelurahan/ Desa ', 'trim|required');
		//$this->form_validation->set_rules('kd_pos', 'Kode Pos', 'trim|required');


		if ($this->form_validation->run() == TRUE)
		{
			$this->population->create();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Data Penduduk", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'provinsi' => $this->population->get_provinsi(),
		);

		$this->template->view('rtlh/population/create-population', $this->data);
	}

	public function update($param = 0)
	{
		$this->page_title->push('Master Data', 'Sunting Data Penduduk');

		$this->breadcrumbs->unshift(2, 'Data Penduduk', "population");

		
		$this->form_validation->set_rules('kk', 'No. KK', 'trim|required');
		$this->form_validation->set_rules('status_kk', 'Status Hubungan KK', 'trim|required');
		$this->form_validation->set_rules('name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('birts', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('status_kawin', 'Status Perkawinan', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraaan', 'trim|required');

		$this->form_validation->set_rules('gol_darah', 'Golongan Darah', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('rt', 'RT', 'trim|is_numeric|required');
		$this->form_validation->set_rules('rw', 'RW', 'trim|is_numeric|required');

		//$this->form_validation->set_rules('telepon', 'Telepon', 'trim|required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
		$this->form_validation->set_rules('kabupaten', 'Kabupaten/ Kota ', 'trim|required');
		$this->form_validation->set_rules('kecamatan', 'Kecamataan ', 'trim|required');
		$this->form_validation->set_rules('kelurahan', 'Kelurahan/ Desa ', 'trim|required');
		//$this->form_validation->set_rules('kd_pos', 'Kode Pos', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->population->update($param);

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Sunting Data Penduduk", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'population' => $this->population->get($param),
			'provinsi' => $this->population->get_provinsi(),
		);

		$this->template->view('rtlh/population/update-population', $this->data);
	}

	public function delete($param = 0)
	{
		$this->population->delete($param);

		redirect('population');
	}

	public function bulk_action()
	{
		switch ($this->input->post('action')) 
		{
			case 'delete':
				$this->population->delete_multiple();
				break;
			
			default:
				$this->template->alert(
					' Tidak ada data yang dipilih.', 
					array('type' => 'warning','icon' => 'warning')
				);
				break;
		}

		redirect('population');
	}

	public function import()
	{
		$this->page_title->push('Master Data', 'Impor Data Penduduk');

		$this->breadcrumbs->unshift(2, 'Data Penduduk', "population");

		$this->data = array(
			'title' => "Impor Data Penduduk", 
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('rtlh/population/import-population', $this->data);
	}

	public function set_upload()
	{
		$this->population_excel->upload();

		redirect('population/import');
	}

	public function export()
	{
		$query = $this->population->get_all($this->input->get('per_page'), $this->input->get('page'), 'export' );

		$this->excel_generator->set_query($query);
        $this->excel_generator->set_header(array(
        		'NIK',
        		'No. KK',
        		'Nama Lengkap',
        		'Status KK',
        		'Tempat Lahir',
        		'Tanggal Lahir',
        		'Jenis Kelamin',
        		'Status Perkawinan',
        		'Kewarganegaraaan',
        		'Golongan Darah',
        		'Alamat',
        		'RT',
        		'RW',
        		'Provinsi',
        		'Kabupaten/Kota',
        		'Kecamataan',
        		'Kelurahan/Desa',
        		'Telepon',
        		'Kode Pos'

        	));
        $this->excel_generator->set_column(
        	array(
        		'nik',
        		'no_kk',
        		'nama_lengkap',
        		'status_kk',
        		'tmp_lahir',
        		'tgl_lahir',
        		'jns_kelamin',
        		'status_kawin',
        		'kewarganegaraan',
        		'gol_darah',
        		'alamat',
        		'rt',
        		'rw',
        		'name_provinces',
        		'name_regencies',
        		'name_districts',
        		'name_villages',
        		'telepon',
        		'kd_pos'
        	));
        $this->excel_generator->set_width(array(20, 20, 20, 15, 15, 20, 20, 25, 20, 20, 50, 10, 10, 30, 30, 35, 30, 20, 11));
        
        $this->excel_generator->exportTo2007('DATA PENDUDUK');
	}
	/**
	 * Check Ketersediaan NIK
	 *
	 * @return string
	 **/
	public function validate_nik()
	{
		if($this->population->nik_check($this->input->post('ID')) == TRUE)
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
		echo $this->population->kabupaten($id);
		}
		else if($modul=="kecamatan"){
		echo $this->population->kecamatan($id);

		}
		else if($modul=="kelurahan"){
		echo $this->population->kelurahan($id);
		}
	}

	public function updateverifikasi($param = 0)
	{
		$this->population->statusverifikasi($param);

		redirect('population');
	}


 }

/* End of file Population.php */
/* Location: ./application/controllers/Population.php */