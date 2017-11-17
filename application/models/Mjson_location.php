<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* RTLH
* Json_location Model Class 
*
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/

class Mjson_location extends Rtlh_model 
{
	//public $user;
	
	public function __construct()
	{
		parent::__construct();
		
	}


	public function json_all_location()
	{
		$this->db->select('*');

		$this->db->from('penduduk');

		$this->db->join('tanah', 'tanah.nik = penduduk.nik');

		return $this->db->get()->result();

		// foreach ($collection as $key => $value) {
		// 	$this->data = array(
		// 		'id'  => $value->nik,
		// 		'lat' => $value->latitude,
		// 		'lng' => $value->longitude,
		// 		'icon' => 'green-home.png',
		// 		'description' => 'Rumah '.$value->nama_lengkap,

		// 	);
		// }

		

		$this->output->set_content_type('application/json')->set_output(json_encode($query));
	}


}

