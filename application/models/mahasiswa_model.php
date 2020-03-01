<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa_model extends CI_Model {
	public function getAll(){
        return $this->db->get('mahasiswa')->result_array();
	}
	
	public function add(){
	$data = [
            "nim" => $this->input->post('nim',true),
            "nama" => $this->input->post('nama',true),
            "kelas" => $this->input->post('kelas', true),
            "jurusan" => $this->input->post('jurusan', true)
        ];
        $this->db->insert('mahasiswa', $data);
	}
}

/* End of file mahasiswa_model.php */

?>
