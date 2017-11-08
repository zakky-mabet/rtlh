<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Rtlh {

	public function __construct()
	{
		parent::__construct();

		//$this->load->js("https://maps.googleapis.com/maps/api/js?key=AIzaSyC35FYc77aLoM6omJQg0Rm268NtGKojGjs&callback=initMap");

	}

	public function index() 
	{
		$this->page_title->push('Home', 'Selamat datang di Administrator');

		$this->data = array(
			'title' => "Home - Rumah Tidak Layak Huni", 
			'breadcrumbs' => $this->breadcrumbs->show(),
			'page_title' => $this->page_title->show()
		);

		$this->template->view('rtlh/v_home', $this->data);
	}


}
