<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class register_model extends CI_Model {

	public function createUser($data){
		$this->db->insert('user', $data);
		return $this->db->insert_id();
	}

	public function getUsername($username){
		$this->db->select('username');
		$this->db->from('user');
		$this->db->where('username', $username);
		return $this->db->get();
	}

}

/* End of file register_model.php */

?>
