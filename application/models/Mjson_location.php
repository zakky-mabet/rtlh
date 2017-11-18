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


	public function all_location()
	{
		$this->db->select('*');

		$this->db->from('penduduk');

		$this->db->join('tanah', 'tanah.nik = penduduk.nik');

		$this->db->join('rumah', 'rumah.nik = tanah.nik');

		foreach($this->db->get()->result() as $get)
		{
				$data[] = array(
				'id' => md5($get->nik),
				'lat' => $get->latitude,
				'lng' => $get->longitude,
				'icon' => $get->icon,
				'description'=>$get->deskripsi,
				
			);
		} 
		return $data;
	}


}

