<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class matkul_model extends CI_Model {
	public function getAll(){
        return $this->db->get('matkul')->result_array();
	}
	
	public function getDosenName(){
		$this->db->select('nama_dosen');
		return $this->db->get('dosen')->result_array();
	}

	public function ambil($id){
		$this->db->where('id', $id);
		return $this->db->get('matkul')->result_array();
	}

	public function add(){
		$data = [
            "nama" => $this->input->post('nama',true),
            "nama_dosen" => $this->input->post('dosen',true),
            "sks" => $this->input->post('sks',true),
            "jam" => $this->input->post('jam', true)
        ];
        $this->db->insert('matkul', $data);	}

	public function edit($id, $nama, $dosen, $sks, $jam){
		$this->db->set('nama', $nama);
		$this->db->set('nama_dosen', $dosen);
		$this->db->set('sks', $sks);
		$this->db->set('jam', $jam);
		$this->db->where('id', $id);
		return $this->db->update('matkul');
	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('matkul');
	}
}

/* End of file matkul_model.php */

?>
