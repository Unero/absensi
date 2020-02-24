<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class mahasiswa_model extends CI_Model {
	public function getAll(){
        return $this->db->get('mahasiswa')->result_array();
    }
}

/* End of file mahasiswa_model.php */

?>
