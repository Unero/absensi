<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class absensi_model extends CI_Model {
	public function allAbsensi(){
		$this->db->select('mk.nama, d.nama_dosen, m.nama_mhs, m.nim, a.status, a.tanggal');
		$this->db->from('absensi a');
		$this->db->join('dosen d', 'd.nip = a.dosen');
		$this->db->join('mahasiswa m', 'm.nim = a.mahasiswa');
		$this->db->join('matkul mk', 'mk.id = a.matkul');
		$this->db->where('a.tanggal', date("Y-m-d"));
		
		$query = $this->db->get();

		if ($query->num_rows() != 0) {
			return $query->result_array();
		} else {
			return "Data tidak ada";
		}
	}

	public function perTanggal($tanggal){
		$this->db->select('mk.nama, d.nama_dosen, m.nama_mhs, m.nim, a.status, a.tanggal');
		$this->db->from('absensi a');
		$this->db->join('dosen d', 'd.nip = a.dosen');
		$this->db->join('mahasiswa m', 'm.nim = a.mahasiswa');
		$this->db->join('matkul mk', 'mk.id = a.matkul');
		$this->db->where('a.tanggal', $tanggal);

		$query = $this->db->get();
		if ($query->num_rows() != 0) {
			return $query->result_array();
		} else {
			return "Data tidak ada";
		}
	}

	public function checkTanggal($tanggal){
		$this->db->select('mk.nama, d.nama_dosen, m.nama_mhs, m.nim, a.status, a.tanggal');
		$this->db->from('absensi a');
		$this->db->join('dosen d', 'd.nip = a.dosen');
		$this->db->join('mahasiswa m', 'm.nim = a.mahasiswa');
		$this->db->join('matkul mk', 'mk.id = a.matkul');
		$this->db->where('a.tanggal', $tanggal);
		
		return $this->db->get()->num_rows();
	}

	public function add($data){
		$this->db->insert('absensi', $data);
	}

	public function ambil($kelas){
		$this->db->select('nim');
		$this->db->where('kelas', $kelas);
        return $this->db->get('mahasiswa')->result_array();
	}

	public function clear(){
		$this->db->set('status', '-');
		$this->db->where('matkul', 3001);
		$this->db->update('absensi');	
	}

	public function absent($nim, $status){
		$this->db->set('status', $status);
		$this->db->where('mahasiswa', $nim);
		$this->db->update('absensi');	
	}


	// Selection Data
	public function getDosen(){
		$this->db->select('*');
		$this->db->from('dosen');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getMatkul(){
		$this->db->select('*');
		$this->db->from('matkul');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getMahasiswa(){
		$this->db->distinct();
		$this->db->select('kelas');
		$this->db->from('mahasiswa');
		return $this->db->get()->result_array();
	}
}

/* End of file absensi_model.php */

?>
