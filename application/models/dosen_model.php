<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class dosen_model extends CI_Model {
	public function getAll(){
        return $this->db->get('dosen')->result_array();
    }
}

/* End of file dosen_model.php */

?>
