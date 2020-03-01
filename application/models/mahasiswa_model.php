<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa_model extends CI_Model {
	public function getAll(){
        return $this->db->get('mahasiswa')->result_array();
	}
	
	public function add(){
	$data = [
            "nama_mhs" => $this->input->post('nama',true),
            "kelas" => $this->input->post('kelas', true)
        ];
        $this->db->insert('mahasiswa', $data);
	}
}

/* End of file mahasiswa_model.php */

?>
