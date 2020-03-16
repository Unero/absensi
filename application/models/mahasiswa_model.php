<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa_model extends CI_Model {
	public function getAll(){
        return $this->db->get('mahasiswa')->result_array();
	}

	public function get($nim){
		$this->db->where('nim', $nim);
        return $this->db->get('mahasiswa')->result_array();
	}
	
	public function add(){
		$data = [
            "nama_mhs" => $this->input->post('nama',true),
            "kelas" => $this->input->post('kelas', true)
        ];
        $this->db->insert('mahasiswa', $data);
	}

	public function update($nim, $nama, $kelas){
		$this->db->set('nama_mhs', $nama);
		$this->db->set('kelas', $kelas);
		$this->db->where('nim', $nim);
		return $this->db->update('mahasiswa');
	}

	public function delete($nim){
		$this->db->where('nim', $nim);
		$this->db->delete('mahasiswa');
	}
}

/* End of file mahasiswa_model.php */

?>
