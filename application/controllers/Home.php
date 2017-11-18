<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Rtlh {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('mjson_location');

	}

	public function index() 
	{

		$this->page_title->push('Home', 'Selamat datang di Administrator');

		$this->data = array(
			'title' => "Home - Rumah Tidak Layak Huni", 
			'breadcrumbs' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show(),
			'home'	=> $this->mjson_location->all_location(),
		);

		$this->template->view('rtlh/v_home', $this->data);
	}



}
