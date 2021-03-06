<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Absensi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('absensi_model');
		if ($this->session->userdata('level') == "3") {
			redirect('login','refresh');
		}
    }

	public function index()
	{
		$data['title'] = "Absensi";

		if ($this->session->userdata('level') == "1") {
			$data['absensi'] = $this->absensi_model->allAbsensi();

			$this->load->view('template/header_mhs', $data);
			$this->load->view('absensi/mhs', $data);
			$this->load->view('template/footer');
		} else {
			$data['dosen'] = $this->absensi_model->getDosen();
			$data['mahasiswa'] = $this->absensi_model->getMahasiswa();
			$data['matkul'] = $this->absensi_model->getMatkul();
			$data['Sekarang'] = $this->session->userdata('tanggal');

			$this->load->view('template/header', $data);
			$this->load->view('absensi/index', $data);
			$this->load->view('template/footer');
		}
	}

	public function absent(){
		$matkul = htmlspecialchars($this->input->post('matkul'));
		$dosen = htmlspecialchars($this->input->post('dosen'));
		$kelas = htmlspecialchars($this->input->post('kelas'));
		$tanggal = $this->session->userdata('tanggal');

		$mhs = $this->absensi_model->ambil($kelas);

		if ($this->absensi_model->checkTanggal($tanggal) > 0) {
			$data['title'] = "Absensi";
			$data['absensi'] = $this->absensi_model->perTanggal($tanggal);
			$this->load->view('template/header', $data);
			$this->load->view('absensi/absent', $data);
			$this->load->view('template/footer');
		} else {
			foreach ($mhs as $mhs) {
				$data = array(
					'matkul' => $matkul,
					'dosen' => $dosen,
					'mahasiswa' => $mhs['nim'],
					'tanggal' => $tanggal
				);
				$this->absensi_model->add($data);
			}
	
			$data['title'] = "Absensi";
			$data['absensi'] = $this->absensi_model->perTanggal($tanggal);
			$this->load->view('template/header', $data);
			$this->load->view('absensi/absent', $data);
			$this->load->view('template/footer');
		}
	}

	public function add(){
		$data['title'] = "Form menambah data absensi";

		$data['dosen'] = $this->absensi_model->getDosen();
		$data['mahasiswa'] = $this->absensi_model->getMahasiswa();
		$data['matkul'] = $this->absensi_model->getMatkul();

		// rules
		$this->form_validation->set_rules('matkul', 'matkul', 'required');
        $this->form_validation->set_rules('dosen', 'dosen', 'required');
		$this->form_validation->set_rules('mhs', 'mhs', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('template/header', $data);
            $this->load->view('absensi/tambah', $data);
            $this->load->view('template/footer');    
        } else {
			$this->absensi_model->absensi();
			$this->session->set_flashdata('flash-data', 'absen');
			redirect('absensi','refresh');
		}
	}

	public function absen($nim, $status){
		$this->absensi_model->absent($nim, $status);
		redirect('absensi/absent','refresh');
	}

	public function delete(){
		$this->absensi_model->clear();
		redirect('absensi/absent','refresh');
	}
}
/* End of file Absensi.php */
?>
