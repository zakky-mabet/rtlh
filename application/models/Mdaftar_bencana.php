<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/

class Mdaftar_bencana extends Rtlh_model 
{
	
	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_all($limit = 5, $offset = 0, $type = 'result')
	{
		
		if($this->input->get('jenis') != '')
			$this->db->where('jenis', $this->input->get('jenis'));

		if($this->input->get('query') != '')
			$this->db->like('nama', $this->input->get('query'));

		
		if($type == 'result')
		{
			return $this->db->get('daftar_bencana', $limit, $offset)->result();
		} else {
			return $this->db->get('daftar_bencana')->num_rows();
		}
	}

	

}

