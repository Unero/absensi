<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Mahasiswa extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data kontak
    function index_get() {
        $data = $this->get('data');
        if ($data == '') {
            $mahasiswa = $this->db->get('mahasiswa')->result();
        } else {
            $this->db->where('nim', $data);
            $this->db->or_like('nama_mhs', $data);
            $mahasiswa = $this->db->get('mahasiswa')->result();
        }
        $this->response($mahasiswa, 200);
    }

    // POST
    function index_post() {
        $data = array(
                    'nama_mhs' => $this->post('nama_mhs'),
                    'kelas' => $this->post('kelas'),
                    'jurusan' => $this->post('jurusan'));
        $insert = $this->db->insert('mahasiswa', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // PUT
    function index_put() {
        $nim = $this->put('nim');
        $data = array(
                    'nim' => $this->put('nim'),
                    'nama_mhs' => $this->put('nama_mhs'),
                    'kelas' => $this->put('kelas'),
                    'jurusan' => $this->put('jurusan'));
        $this->db->where('nim', $nim);
        $update = $this->db->update('mahasiswa', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    // DELETE
    function index_delete() {
        $nim = $this->delete('nim');
        $this->db->where('nim', $nim);
        $delete = $this->db->delete('mahasiswa');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>