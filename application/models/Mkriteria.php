<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @version 1.0.0
* @author Teitra Mega <office@teitramega.co.id>
*/

class Mkriteria extends Rtlh_model 
{
	
	public function __construct()
	{
		parent::__construct();
		
	}

	public function get_all($limit = 20, $offset = 0, $type = 'result')
	{
		
		if($this->input->get('query') != '')
			$this->db->like('nama', $this->input->get('query'));

		
		if($type == 'result')
		{
			return $this->db->get('kriteria', $limit, $offset)->result();
			
		} elseif ($type == 'export') {

			return $this->db->get('kriteria', $limit, $offset);

		} else {
			return $this->db->get('kriteria')->num_rows();
		}
	}

	

}

