<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class dosen_model extends CI_Model {
	public function getAll(){
        return $this->db->get('dosen')->result_array();
	}
	
	public function add(){
		$data = [
            "nama_dosen" => $this->input->post('nama',true)
        ];
        $this->db->insert('dosen', $data);
	}

	public function ambil($nip){
		$this->db->where('nip', $nip);
        return $this->db->get('dosen')->result_array();
	}

	public function update($nip, $nama){
		$this->db->set('nama_dosen', $nama);
		$this->db->where('nip', $nip);
		return $this->db->update('dosen');
	}

	public function delete($nip){
		$this->db->where('nip', $nip);
		$this->db->delete('dosen');
	}
}

/* End of file dosen_model.php */

?>
