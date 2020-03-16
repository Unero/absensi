<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class admin_model extends CI_Model {

	public function getUser(){
		$this->db->where('level !=', '3');
		return $this->db->get('user')->result_array();
	}

	public function getMahasiswa(){
		return $this->db->get('mahasiswa')->result_array();
	}

	public function getAbsensi(){
		return $this->db->get('absensi')->result_array();
	}

	public function getDosen(){
		return $this->db->get('dosen')->result_array();
	}

	public function getMatkul(){
		return $this->db->get('matkul')->result_array();
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
