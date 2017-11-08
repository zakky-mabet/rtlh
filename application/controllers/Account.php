<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends Rtlh {

	public function __construct()
	{
		parent::__construct();

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
