<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class absensi_model extends CI_Model {
	public function getMasuk(){
        return $this->db->get('absensi')->result_array();
	}

	public function getDosen(){
		$this->db->select('nama');
		$this->db->from('dosen');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getMatkul(){
		$this->db->select('nama');
		$this->db->from('matkul');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getMahasiswa(){
		$this->db->select('nama');
		$this->db->from('mahasiswa');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function absensi(){
        $data = [
            "matkul" => $this->input->post('matkul',true),
            "dosen" => $this->input->post('dosen',true),
			"mahasiswa" => $this->input->post('mhs', true),
			"status" => $this->input->post('status', true)
        ];
        $this->db->insert('absensi', $data);  
	}
}

/* End of file absensi_model.php */

?>
