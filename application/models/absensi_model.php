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
}

/* End of file absensi_model.php */

?>
