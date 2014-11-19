<?php
class login_model extends CI_Model{

	function user_exists($login_info) {
		$this->db->select('id, login, password');
		$this->db->from('customers');
		$this->db->where('login', $login_info->username);
		$this->db->where('password', $login_info->password);
		
		$query = $this->db->get();
		
		if($query->num_rows() == 1){
			return TRUE;
		}
		else{
			return FALSE;
		}		
	}
}