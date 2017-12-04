<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_rtlh extends CI_Model 
{
	public function get_admin_login()
	{
		if (filter_var($this->input->post('username'), FILTER_VALIDATE_EMAIL)) 
		{
			$this->db->where('email', $this->input->post('username'));
		} else {
			$this->db->where('username', $this->input->post('username'));
		}

		return $this->db->get('users')->row();
	}

   	public function getUserInfo($id)  
   	{  

  		$this->db->where('id_user', $id);

  		$q = $this->db->get('users'); 

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

  		$this->db->where('email', $email);

     	$q = $this->db->get('users');  

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
       'role' => 'ADMIN' 
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
     	$this->db->where('id_user', $post['user_id']);  
     	$this->db->update('users', array('password' => $post['password']));      
     	return true;  
   	}

}

/* End of file Users_skpd.php */
/* Location: ./application/models/Users_skpd.php */