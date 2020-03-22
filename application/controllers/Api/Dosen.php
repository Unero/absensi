<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Dosen extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    // GET
    function index_get() {
        $data = $this->get('data');
        if ($data == '') {
            $dosen = $this->db->get('dosen')->result();
        } else {
            $this->db->where('nip', $data);
            $this->db->or_like('nama_dosen', $data);
            $dosen = $this->db->get('dosen')->result();
        }
        $this->response($dosen, 200);
    }

    // POST
    function index_post() {
        $data = array(
                    'nama_dosen' => $this->post('nama'));
        $insert = $this->db->insert('dosen', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // PUT
    function index_put() {
        $nip = $this->put('nip');
        $data = array(
                    'nip' => $this->put('nip'),
                    'nama_dosen' => $this->put('nama_dosen'));
        $this->db->where('nip', $nip);
        $update = $this->db->update('dosen', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // DELETE
    function index_delete() {
        $nip = $this->delete('nip');
        $this->db->where('nip', $nip);
        $delete = $this->db->delete('dosen');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>