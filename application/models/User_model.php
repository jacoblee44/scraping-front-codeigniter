<?php
class User_model extends CI_model{
 
	public function __construct()
	{
			parent::__construct();
			$this->load->database();
	}
 
public function register_user($user){
 
 
$this->db->insert('tbl_user', $user);
 
}
 
public function login_user($user_login){
 //$email,$pass
  $this->db->select('*');
	$this->db->where('username', $user_login['username']);
	$this->db->where('password', $user_login['password']);
  $this->db->from('tbl_user');
 // $this->db->where('user_email',$email);
 // $this->db->where('user_password',$pass);
	$query = $this->db->get();
  if(count($query->result()) == 1)
  {
      return true;
  }
  else{
    return false;
  }
 
 
}
public function name_check($name){
 
  $this->db->select('*');
  $this->db->where('username',$name);
  $query=$this->db->get('tbl_user');
 
  if($query->num_rows()>0){
    return false;
  }else{
    return true;
  }
 
}
 
 
}
 
?>
