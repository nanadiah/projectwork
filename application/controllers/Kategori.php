<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kategori');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if($this->session->userdata('login_status') == TRUE){

			$data['content_view'] = 'v_kategori';
			$data['kategori'] = $this->m_kategori->get_kategori();
			$this->load->view('template_user', $data);

		} else {  
			redirect('login_user/index'); 
		}
	}
	public function tambah()
	{
		if($this->session->userdata('login_status') == TRUE){

            $this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');
            $this->form_validation->set_rules('kota', 'Kota', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->m_kategori->tambah() == TRUE)
				{
					$this->session->set_flashdata('pesan', 'Tambah kategori berhasil');
					redirect('kategori/index');
				} else {
					$this->session->set_flashdata('pesan', 'Tambah kategori gagal');
					redirect('kategori/index');
				}
			} else {
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('kategori/index');
			}


		} else {
			redirect('login_user/index');
		}
	}

	public function ubah()
	{
		if($this->session->userdata('login_status') == TRUE){

            $this->form_validation->set_rules('edit_jurusan', 'Jurusan', 'trim|required');
            $this->form_validation->set_rules('edit_kota', 'Kota', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->m_kategori->ubah() == TRUE)
				{
					$this->session->set_flashdata('pesan', 'Ubah kategori berhasil');
					redirect('kategori/index');
				} else {
					$this->session->set_flashdata('pesan', 'Ubah kategori gagal');
					redirect('kategori/index');
				}
			} else {
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('kategori/index');
			}


		} else {
			redirect('login_user/index');
		} 
	}

	function hapus(){
		if ($this->session->userdata('login_status') == TRUE) {
			$id_kat = $this->uri->segment(3);

			if ($this->m_kategori->hapus($id_kat)) {
				$this->session->set_flashdata('pesan', 'Hapus Barang Berhasil!');
				redirect('Kategori');
			}else {
				$this->session->set_flashdata('pesan', 'Hapus Barang Gagal!');
				redirect('Kategori');		
			}
			}
		}

	public function json_data_kategori_by_id()
	{
		if ($this->session->userdata('login_status') == TRUE) {
			$id_kat = $this->uri->segment(3);
	
			$data = $this->m_kategori->get_data_kategori_by_id($id_kat);
			echo json_encode($data);
		} else {
			redirect('login_user/index');
		}
	}

}

