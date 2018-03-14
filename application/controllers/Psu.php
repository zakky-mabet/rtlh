<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Simpera
* PSU Class 
*
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/
class Psu extends Rtlh 
{
	public $data = array();

	public $per_page;

	public $page = 20;

	public $query;

	public $kabupaten;

	public $jenis;

	public function __construct()
	{
		parent::__construct();

		$this->load->model('mpsu','psu');

		$this->load->model('maccount','account');

		$this->per_page = (!$this->input->get('per_page')) ? 20 : $this->input->get('per_page');

		$this->page = $this->input->get('page');

		$this->query = $this->input->get('query');

		$this->kabupaten = $this->input->get('kabupaten');

		$this->jenis = $this->input->get('jenis');

		$this->load->js(base_url('assets/public/app/population.js'));

	}

	public function index()
	{
		$this->page_title->push('Prasarana Sarana dan Utilitas', 'Data Prasarana Sarana dan Utilitas');

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("psu?per_page={$this->per_page}&query={$this->query}&kabupaten={$this->kabupaten}&jenis={$this->jenis}");

		$config['per_page'] = $this->per_page;

		$config['total_rows'] = $this->psu->get_all(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Prasarana Sarana dan Utilitas", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'psu' => $this->psu->get_all($this->per_page, $this->page),
			'num_psu' => $config['total_rows']
		);

		$this->template->view('rtlh/psu/data-psu', $this->data);
	}

	public function create()
	{
		$this->page_title->push('Prasarana Sarana dan Utilitas', 'Tambah Data Prasarana Sarana dan Utilitas');

		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'trim|required');
		$this->form_validation->set_rules('sumber_dana', 'Sumber Dana', 'trim|required');
		$this->form_validation->set_rules('nilai_kontrak', 'Nilai Anggaran', 'trim|required');
		$this->form_validation->set_rules('item_pekerjaan', 'Item Pekerjaan', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi ', 'trim|required');
		$this->form_validation->set_rules('id_pelaksana', 'Pelaksana', 'trim|required');
		$this->form_validation->set_rules('id_jenis_psu', 'Jenis', 'trim|required');
		

		if ($this->form_validation->run() == TRUE)
		{
			$this->psu->create_psu();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Data Prasarana Sarana dan Utilitas", 
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('rtlh/psu/create-psu', $this->data);
	}

	public function update($param = 0)
	{
		if (!$param) {
			show_404();
		}
		if ($this->psu->count_psu($param) == 0 ) {
			show_404();
		}

		$this->page_title->push('Prasarana Sarana dan Utilitas', 'Sunting Data Prasarana Sarana dan Utilitas');

		$this->form_validation->set_rules('nama_kegiatan', 'Nama Kegiatan', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('kabupaten', 'Kabupaten', 'trim|required');
		$this->form_validation->set_rules('sumber_dana', 'Sumber Dana', 'trim|required');
		$this->form_validation->set_rules('nilai_kontrak', 'Nilai Anggaran', 'trim|required');
		$this->form_validation->set_rules('item_pekerjaan', 'Item Pekerjaan', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi ', 'trim|required');
		$this->form_validation->set_rules('id_pelaksana', 'Pelaksana', 'trim|required');
		$this->form_validation->set_rules('id_jenis_psu', 'Jenis', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->psu->update_psu($param);

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Sunting Data Prasarana Sarana dan Utilitas", 
			'page_title' => $this->page_title->show(),
			'get' => $this->psu->get_psu($param)
		);

		$this->template->view('rtlh/psu/update-psu', $this->data);
	}

	public function foto($param = 0)
	{	
		if (!$param) {
			show_404();
		}
		if ($this->psu->count_psu($param) == 0 ) {
			show_404();
		}

		$this->page_title->push('Prasarana Sarana dan Utilitas', 'Foto Data Prasarana Sarana dan Utilitas');

		$this->form_validation->set_rules('nama', 'Nama Foto', 'trim|required');

		if($this->form_validation->run() == TRUE)
		{
			$this->psu->upload_foto_psu($param);

			redirect(site_url('psu/foto/'.$param));
		}

		$this->data = array(
			'title' => "Foto Data Prasarana Sarana dan Utilitas", 
			'page_title' => $this->page_title->show(),
			'param' => $param,
		);

		$this->template->view('rtlh/psu/foto-psu', $this->data);
	}

	public function delete_foto_psu($param = 0)
	{
		$this->psu->delete_foto_psu($param);

		redirect(site_url('psu/foto/'.$this->input->get('back')));
	}

	public function daftar_pelaksana()
	{
		$this->page_title->push('Daftar Pelaksana ', 'Data Daftar Pelaksana');

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("psu/daftar_pelaksana?per_page={$this->per_page}&query={$this->query}");

		$config['per_page'] = $this->per_page;

		$config['total_rows'] = $this->psu->get_all_pelaksana_psu(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Daftar Pelaksana ", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'daftar_pelaksana' => $this->psu->get_all_pelaksana_psu($this->per_page, $this->page),
			'num_daftar_pelaksana' => $config['total_rows']
		);

		$this->template->view('rtlh/psu/data-pelaksana', $this->data);
	}

	public function create_pelaksana()
	{
		$this->page_title->push('Daftar Pelaksana', 'Tambah Data Pelaksana');

		$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required');
		$this->form_validation->set_rules('alamat_kantor', 'Alamat Kantor', 'trim|required');
		$this->form_validation->set_rules('direktur', 'Nama Direktur', 'trim|required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');		

		if ($this->form_validation->run() == TRUE)
		{
			$this->psu->create_pelaksana_psu();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Data Pelaksana ", 
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('rtlh/psu/create-pelaksana-psu', $this->data);
	}

	public function delete_pelaksana_psu($param = 0)
	{
		$this->psu->delete_pelaksana_psu($param);

		redirect(site_url('psu/daftar_pelaksana'));
	}

	public function update_pelaksana($param = 0)
	{
		if (!$param) {
			show_404();
		}
		if ($this->psu->count_pelaksana($param) == 0 ) {
			show_404();
		}

		$this->page_title->push('Daftar Pelaksana', 'Sunting Data Pelaksana ');

		$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required');
		$this->form_validation->set_rules('alamat_kantor', 'Alamat Kantor', 'trim|required');
		$this->form_validation->set_rules('direktur', 'Nama Direktur', 'trim|required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'trim|required');	

		if ($this->form_validation->run() == TRUE)
		{
			$this->psu->update_pelaksana_psu($param);

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Sunting Data Pelaksana ", 
			'page_title' => $this->page_title->show(),
			'get' => $this->psu->get_pelaksana($param)
		);

		$this->template->view('rtlh/psu/update-pelaksana-psu', $this->data);
	}

	public function master_jenis()
	{
		$this->page_title->push('Master Jenis PSU', 'Data Jenis PSU');

		$config = $this->template->pagination_list();

		$config['base_url'] = site_url("psu/master_jenis?per_page={$this->per_page}&query={$this->query}");

		$config['per_page'] = $this->per_page;

		$config['total_rows'] = $this->psu->get_all_master_jenis(null, null, 'num');

		$this->pagination->initialize($config);

		$this->data = array(
			'title' => "Data Jenis PSU", 
			'breadcrumb' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'master_jenis' => $this->psu->get_all_master_jenis($this->per_page, $this->page),
			'num_master_jenis' => $config['total_rows']
		);

		$this->template->view('rtlh/psu/data-jenis-psu', $this->data);
	}

	public function create_master_jenis()
	{
		$this->page_title->push('Master Jenis PSU', 'Tambah Data Jenis PSU');

		$this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->psu->create_master_jenis();

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Tambah Data Jenis PSU", 
			'page_title' => $this->page_title->show(),
		);

		$this->template->view('rtlh/psu/create-master-jenis', $this->data);
	}

	public function update_master_jenis($param = 0)
	{
		if (!$param) {
			show_404();
		}

		$this->page_title->push('Master Jenis PSU', 'Sunting Data Jenis PSU');

		$this->form_validation->set_rules('nama_jenis', 'Nama Jenis', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');


		if ($this->form_validation->run() == TRUE)
		{
			$this->psu->update_master_jenis($param);

			redirect(current_url());
		}

		$this->data = array(
			'title' => "Sunting Data Jenis PSU", 
			'page_title' => $this->page_title->show(),
			'get' => $this->psu->get_jenis($param)
		);

		$this->template->view('rtlh/psu/update-master-jenis', $this->data);
	}

	public function delete_jenis_psu($param = 0)
	{
		$this->psu->delete_jenis_psu($param);

		redirect(site_url('psu/master_jenis'));
	}

	public function print_out()
	{
		$this->data = array(
			'title' => "Data Prasarana Sarana dan Utilitas", 
			'psu' => $this->psu->get_all($this->per_page, $this->page),
			'num_psu' => $this->psu->get_all(null, null, 'num'),
		);

		$this->load->view('rtlh/psu/print-psu', $this->data);
	}
	
	public function export()
	{
		$query = $this->psu->get_all($this->input->get('per_page'), $this->input->get('page'), 'export' );
		
		$this->excel_generator->set_query($query);

        $this->excel_generator->set_header(array(
        		'NAMA KEGIATAN',
        		'JENIS',
        		'KABUPATEN',
        		'PELAKSANA',
        		'SUMBER DANA',
        		'NILAI KONTRAK',
        		'ALAMAT',
        		'TANGGAL MULAI',
        		'TANGGAL SELESAI',
        	));

        $this->excel_generator->set_column(
        	array(
        		'nama_kegiatan',
        		'nama_jenis',
        		'name_regencies',
        		'nama_perusahaan',
        		'sumber_dana',
        		'nilai_kontrak',
        		'alamat',
        		'tanggal_mulai',
        		'tanggal_selesai',
        	));
        $this->excel_generator->set_width(array(30, 20, 25, 20, 20, 20, 40, 20, 20));
        
        $this->excel_generator->exportTo2007('DATA SARANA PRASARANA DAN UTILITAS');	
	}

	public function print_out_pelaksana()
	{
		$this->data = array(
			'title' => "Data Daftar Pelaksana PSU", 
			'daftar_pelaksana' => $this->psu->get_all_pelaksana_psu($this->per_page, $this->page),
		);

		$this->load->view('rtlh/psu/print-pelaksana', $this->data);
	}
	
	public function export_pelaksana()
	{
		$query = $this->psu->get_all_pelaksana_psu($this->input->get('per_page'), $this->input->get('page'), 'export' );
		
		$this->excel_generator->set_query($query);

        $this->excel_generator->set_header(array(
        		'NAMA PERUSAHAAN',
        		'NAMA DIREKTUR',
        		'KATEGORI',
        		'ALAMAT KANTOR',
        		
        	));

        $this->excel_generator->set_column(
        	array(
        		'nama_perusahaan',
        		'direktur',
        		'kategori',
        		'alamat_kantor',
        		
        	));
        $this->excel_generator->set_width(array(30, 20, 15, 50));
        
        $this->excel_generator->exportTo2007('DATA DAFTAR PELAKSANA PSU');	
	}

	public function print_out_jenis_psu()
	{
		$this->data = array(
			'title' => "DATA JENIS SARANA PRASARANA DAN UTILITAS", 
			'master_jenis' => $this->psu->get_all_master_jenis($this->per_page, $this->page),
		);

		$this->load->view('rtlh/psu/print-jenis-psu', $this->data);
	}
	
	public function export_jenis_psu()
	{
		$query = $this->psu->get_all_master_jenis($this->input->get('per_page'), $this->input->get('page'), 'export' );
		
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
        $this->excel_generator->set_width(array(30, 20, 15, 50));
        
        $this->excel_generator->exportTo2007('DATA JENIS SARANA PRASARANA DAN UTILITAS');	
	}

 }
