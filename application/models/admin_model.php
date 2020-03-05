<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_Model {

	public function getUser(){
		$this->db->where('level', '1');
		return $this->db->get('user')->result_array();
	}

	public function activateUser($id){
		$this->db->set('status', 'aktif');
		$this->db->where('id', $id);
		$this->db->update('user');	
	}

	public function disableUser($id){
		$this->db->set('status', 'nonaktif');
		$this->db->where('id', $id);
		$this->db->update('user');	
	}
}

/* End of file admin_model.php */

?>
