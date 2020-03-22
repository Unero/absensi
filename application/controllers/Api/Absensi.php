<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Absensi extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    // GET
    function index_get() {
        $data = $this->get('data');
        if ($data == '') {
            $absensi = $this->db->get('absensi')->result();
        } else {
            $this->db->where('id', $data);
            $this->db->or_where('mahasiswa', $data);
            $absensi = $this->db->get('absensi')->result();
        }
        $this->response($absensi, 200);
    }

    // POST
    function index_post() {
        $data = array(
                    'matkul'=> $this->post('matkul'),
                    'dosen' => $this->post('dosen'),
                    'mahasiswa' => $this->post('mahaiswa'));
        $insert = $this->db->insert('absensi', $data);
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
        $update = $this->db->update('absensi', $data);
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
        $delete = $this->db->delete('absensi');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>