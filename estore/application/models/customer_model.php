<?php
class Customer_model extends CI_Model
{

	function user_exists($customer)
	{
		// Authenticate the user
		$this->db->select('id, login, password');
		$this->db->from('customers');
		$this->db->where('login', $customer->login);
		$this->db->where('password', $customer->password);
		
		$query = $this->db->get();
		
		if($query->num_rows() == 1)
		{
			//echo "Found user!";
			return TRUE;
		}

		else
		{
			return FALSE;
		}
		// Make sure to check if user is an admin
	}

	function register_newuser($customer)
	{
		// Adds new user data to database
		return $this->db->insert("customers", 
				array('first' => $customer->first,
						'last' => $customer->last,
						'login' => $customer->login,
						'password' => $customer->password,
						'email' => $customer->email));
	}
	
	function get_id($username)
	{
		$query = $this->db->get_where('customers',array('login' => $username));
		return $query->row(0,'Customer');
	}

	function get_email($id)
	{
		$query = $this->db->get_where('customers',array('id' => $id));
		
		return $query->row(0,'Customer');
	}
}
?>