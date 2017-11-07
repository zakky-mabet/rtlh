<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_skpd extends CI_Model 
{
	public function get_admin_login()
	{
		if (filter_var($this->input->post('username'), FILTER_VALIDATE_EMAIL)) 
		{
			$this->db->where('email', $this->input->post('username'));
		} else {
			$this->db->where('username', $this->input->post('username'));
		}

		$this->db->join('skpd', 'kepala_skpd.id_kepala = skpd.ID', 'left');

		return $this->db->get('kepala_skpd')->row();
	}

   	public function getUserInfo($id)  
   	{  
  		$this->db->join('skpd', 'kepala_skpd.id_kepala = skpd.ID', 'left');
  		$this->db->where('ID', $id);

  		$q = $this->db->get('kepala_skpd'); 

     	if($this->db->affected_rows() > 0)
     	{  
       		$row = $q->row();  
       		return $row;  
     	} else {  
       		error_log('no user found getUserInfo('.$id.')');  
       		return false;  
     	}  
   	}  

  	public function getUserLoginByEmail($email)
  	{  
  		$this->db->join('skpd', 'kepala_skpd.id_kepala = skpd.ID', 'left');
  		$this->db->where('email', $email);

     	$q = $this->db->get('kepala_skpd');  

     	if($this->db->affected_rows() > 0)
     	{  
       		$row = $q->row(); 

       		return $row;  
     	}  
   	}  

   	public function insertToken($userID)  
   	{    
     	$token = substr(sha1(rand()), 0, 30);   
     	$date = date('Y-m-d');  
       
     	$string = array(  
         	'token'=> $token,  
         	'user_id'=> $userID,  
         	'created'=>$date,
          'role' => 'OPD'
       	);  
     	$query = $this->db->insert_string('passwordtokens',$string);  

     	$this->db->query($query);  

     	return $token . $user_id;  
   	}  
   
   	public function isTokenValid($token)  
   	{  
     	$tkn = substr($token,0,30);  
     	$uid = substr($token,30);     
       
     	$q = $this->db->get_where('passwordtokens', array(  
       'passwordtokens.token' => $tkn,  
       'role' => 'OPD' 
       ), 1);               
           
     	if($this->db->affected_rows() > 0)
     	{  
	       	$row = $q->row();         
	         
	       	$created = $row->created;  
	       	$createdTS = strtotime($created);  
	       	$today = date('Y-m-d');   
	       	$todayTS = strtotime($today);  
	         
	       	if($createdTS != $todayTS)
	       		return false;    
	       	
	       	$user_info = $this->getUserInfo($row->user_id);  
	       	
	       	return $user_info;  
         
     	} else {  
       		return false;  
     	}  
       
   	}   
   
   	public function updatePassword($post)  
   	{    
     	$this->db->where('ID', $post['user_id']);  
     	$this->db->update('skpd', array('password' => $post['password']));      
     	return true;  
   	} 
}

/* End of file Users_skpd.php */
/* Location: ./application/models/Users_skpd.php */