<?php
class register_model extends CI_Model{
	
	function register_newuser($new_user) {
		return $this->db->insert("customers", 
				array('first' => $new_user->firstname,
						'last' => $new_user->lastname,
						'login' => $new_user->username,
						'password' => $new_user->password,
						'email' => $new_user->email));						
	}
}