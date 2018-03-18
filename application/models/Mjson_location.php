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

	private function count_data (){
		$this->db->select('*');

		$this->db->from('penduduk');

		$this->db->join('tanah', 'tanah.nik = penduduk.nik');

		$this->db->join('rumah', 'rumah.nik = tanah.nik');

		return $this->db->get()->num_rows();
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
				'id' => md5(sha1($get->nik)),
				'lat' => $get->latitude,
				'lng' => $get->longitude,
				'icon' => $get->icon,
				'description'=>$get->deskripsi,
				
			);
		} 
		
		if ($this->count_data() != 0) {
			return $data;	
		}
		
		
	}


}

