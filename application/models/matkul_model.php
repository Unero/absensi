<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class matkul_model extends CI_Model {
	public function getAll(){
        return $this->db->get('matkul')->result_array();
    }
}

/* End of file matkul_model.php */

?>
