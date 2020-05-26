<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persyaratan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_persyaratan');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if($this->session->userdata('login_status') == TRUE){

			$data['content_view'] = 'v_persyaratan';
			$data['persyaratan'] = $this->m_persyaratan->get_persyaratan();
			$this->load->view('template_user', $data);

		} else { 
			redirect('login_user/index'); 
		}
	}

	public function tambah()
	{
		if($this->session->userdata('login_status') == TRUE){

            $this->form_validation->set_rules('cv', 'CV', 'trim|required');
            $this->form_validation->set_rules('surat_izin', 'Surat Izin', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->m_persyaratan->tambah() == TRUE)
				{
					$this->session->set_flashdata('pesan', 'Tambah Persyaratan berhasil');
					redirect('persyaratan/index');
				} else {
					$this->session->set_flashdata('pesan', 'Tambah Persyaratan gagal');
					redirect('persyaratan/index');
				}
			} else {
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('persyaratan/index');
			}


		} else {
			redirect('login_user/index');
		}
	}

	public function ubah()
	{
		if($this->session->userdata('login_status') == TRUE){

            $this->form_validation->set_rules('edit_cv', 'CV', 'trim|required');
            $this->form_validation->set_rules('edit_surat_izin', 'Surat Izin', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->m_persyaratan->ubah() == TRUE)
				{
					$this->session->set_flashdata('pesan', 'Ubah Persyaratan berhasil');
					redirect('persyaratan/index');
				} else {
					$this->session->set_flashdata('pesan', 'Ubah Persyartan gagal');
					redirect('persyaratan/index');
				}
			} else {
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('persyaratan/index');
			}


		} else {
			redirect('login_user/index');
		}
	}

	function hapus(){
		if ($this->session->userdata('login_status') == TRUE) {
			$id_persyaratan = $this->uri->segment(3);

			if ($this->m_persyaratan->hapus($id_persyaratan)) {
				$this->session->set_flashdata('pesan', 'Hapus Barang Berhasil!');
				redirect('persyaratan');
			}else {
				$this->session->set_flashdata('pesan', 'Hapus Barang Gagal!');
				redirect('persyaratan');		
			}
			}
		}

	public function json_data_persyaratan_by_id()
	{
		if ($this->session->userdata('login_status') == TRUE) {
			$id_persyaratan = $this->uri->segment(3);
	
			$data = $this->m_persyaratan->get_data_persyaratan_by_id($id_persyaratan);
			echo json_encode($data);
		} else {
			redirect('login_user/index');
		} 
	}

}

