<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class absensi_model extends CI_Model {
	public function allAbsensi(){
		$this->db->select('mk.nama, d.nama_dosen, m.nama_mhs, m.nim, a.status, a.waktu_masuk');
		$this->db->from('absensi a');
		$this->db->join('dosen d', 'd.nip = a.dosen');
		$this->db->join('mahasiswa m', 'm.nim = a.mahasiswa');
		$this->db->join('matkul mk', 'mk.id = a.matkul');
		$query = $this->db->get();
		if ($query->num_rows() != 0) {
			return $query->result_array();
		} else {
			return "Data tidak ada";
		}
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

	public function clear(){
		$this->db->set('status', '-');
		$this->db->where('matkul', 3001);
		$this->db->update('absensi');	
	}

	public function absent($nim, $status){
		$this->db->set('status', $status);
		$this->db->where('mahasiswa', $nim);
		$this->db->update('absensi');	
	}

	public function insert_absensi(){
        $data = [
            "matkul" => $this->input->post('matkul',true),
            "dosen" => $this->input->post('dosen',true),
			"mahasiswa" => $this->input->post('mhs', true)
        ];
        $this->db->insert('absensi', $data);  
	}

	// Selection Data
	public function getDosen(){
		$this->db->select('*');
		$this->db->from('dosen');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getMatkul(){
		$this->db->select('*');
		$this->db->from('matkul');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getMahasiswa(){
		$query = $this->db->query("SELECT m.nim, m.nama_mhs FROM mahasiswa AS m LEFT JOIN absensi a ON m.nim = a.mahasiswa WHERE a.mahasiswa IS NULL");
		return $query->result_array();
	}
}

/* End of file absensi_model.php */

?>
