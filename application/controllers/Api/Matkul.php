<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Matkul extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $id = $this->get('id');
        if ($id == '') {
            $matkul = $this->db->get('matkul')->result();
        } else {
            $this->db->where('id', $id);
            $matkul = $this->db->get('matkul')->result();
        }
        $this->response($matkul, 200);
    }

    // POST
    function index_post() {
        $data = array(
                    'nama' => $this->post('nama'),
                    'nama_dosen' => $this->post('nama_dosen'),
                    'sks' => $this->post('sks'),
                    'jam' => $this->post('jam'));
        $insert = $this->db->insert('matkul', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // PUT
    function index_put() {
        $id = $this->put('id');
        $data = array(
                    'id' => $this->put('id'),
                    'nama' => $this->put('nama'),
                    'nama_dosen' => $this->put('nama_dosen'),
                    'sks' => $this->put('sks'),
                    'jam' => $this->put('jam'));
        $this->db->where('id', $id);
        $update = $this->db->update('matkul', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // DELETE
    function index_delete() {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('matkul');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>