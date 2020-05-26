<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller {

	public function __construct()
     {
        parent::__construct();
        $this->load->model('m_perusahaan');
		$this->load->library('form_validation');
		$this->load->helper('url');
     }

	public function index()
	{
		
			$data['content_view'] = 'v_perusahaan'; 
			$data['perusahaan'] = $this->m_perusahaan->get_perusahaan();
			
            $data['kategori'] = $this->m_perusahaan->get_kategori();
			$data['persyaratan'] = $this->m_perusahaan->get_persyaratan();
			
			foreach($data['perusahaan'] as $l){
				echo $l->kuota - 1;
			} 
			$this->load->view('template_user', $data);
	}
	public function add_perusahaan()
	{
		if($this->session->userdata('login_status') == TRUE){
			$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required');
			$this->form_validation->set_rules('kuota', 'Kuota', 'trim|required');
			$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
			
		if ($this->form_validation->run() == TRUE)
		{
			$config['upload_path'] = './assets/images/perusahaan/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2000000';
			$this->load->library('upload', $config);
			if($this->upload->do_upload('gambar')){
			if($this->m_perusahaan->tambah($this->upload->data()) == TRUE)
			{
				$this->session->set_flashdata('pesan', 'Tambah Perusahaan berhasil');
				redirect('perusahaan/index');
					} else {
						$this->session->set_flashdata('pesan', 'Tambah Perusahaan gagal');
						redirect('perusahaan/index');
					}
				} else {
					$this->session->set_flashdata('pesan', 'Tambah Perusahaan gagal upload');
					redirect('perusahaan/index');
				}
			} else {
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('perusahaan/index');
			} 
		} else {
			redirect('login_user/index');
		} 
	} 

	public function ubah()
	{
		if($this->session->userdata('login_status') == TRUE){

			$this->form_validation->set_rules('edit_nama_perusahaan', 'Nama Perusahaan', 'trim|required');
			$this->form_validation->set_rules('edit_gambar', 'Gambar', 'trim|required');
			$this->form_validation->set_rules('edit_kuota', 'Kuota', 'trim|required');
			$this->form_validation->set_rules('edit_deskripsi', 'Deskripsi', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				if($this->m_perusahaan->ubah() == TRUE)
				{
					$this->session->set_flashdata('pesan', 'Ubah perusahaan berhasil');
					redirect('perusahaan/index');
				} else {
					$this->session->set_flashdata('pesan', 'Ubah perusahaan gagal');
					redirect('perusahaan/index');
				}
			} else {
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('perusahaan/index');
			}
		} else {
			redirect('login_user/index'); 
		}
	}

function hapus(){
	if ($this->session->userdata('login_status') == TRUE) {
		$id_perusahaan = $this->uri->segment(3);

		if ($this->m_perusahaan->hapus_perusahaan($id_perusahaan)) {
			$this->session->set_flashdata('pesan', 'Hapus Perushaan Berhasil!');
			redirect('perusahaan');
		}else {
			$this->session->set_flashdata('pesan', 'Hapus Perusahaan Gagal!');
			redirect('perusahaan');		
		}
		}
	}
	public function json_perusahaan_by_id(){
		if ($this->session->userdata('login_status') == TRUE) {
			$id_perusahaan = $this->uri->segment(3);
	
			$data = $this->m_perusahaan->get_data_perusahaan_by_id($id_perusahaan);
			echo json_encode($data);
		}
	}
	}	


