<?php

defined('BASEPATH') OR exit('No direct script access allowed'); 

class Permintaan_siswa extends CI_Controller {

    public function __construct()
     {
        parent::__construct();
        $this->load->model('m_permintaan_siswa');
		$this->load->library('form_validation');
		$this->load->helper('url');
     }
	 public function index()
    {
		$data['content_view'] = 'v_permintaan_siswa';
        $this->load->view('template', $data);
    }
    public function card($id_perusahaan)
    {
		$data['content_view'] = 'v_permintaan_siswa';
		$data['id_perusahaan'] = $id_perusahaan;
        $this->load->view('template', $data);
    }
    public function create(){
		if ($this->session->userdata('login_status') == TRUE) {
		$this->form_validation->set_rules('status_pilihan', 'status_pilihan', 'trim|required', array('required' => 'Status Pilihan harus diisi'));
		if ($this->form_validation->run() == TRUE)
		{
       
			$config['upload_path'] = './assets/images/cv/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '2000000';
			$this->load->library('upload', $config);
			if($this->upload->do_upload('cv')){ 
			if($this->m_permintaan_siswa->tambah($this->upload->data()) == TRUE)
			{
				$this->session->set_flashdata('pesan', 'Tunggu Konfirmasi Admin');
				redirect('home_siswa/index');
					} else {
						$this->session->set_flashdata('pesan', 'Gagal Tamabah perusahaan');
						redirect('home_siswa/index');
					}
				} else {
					$this->session->set_flashdata('pesan', 'CV upload');
					redirect('home_siswa/index');
				}
			} else {
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('home_siswa/index');
			
			}
		}else{
				redirect('login_siswa/index');
			}
	}
	public function notif(){
		$id_siswa = $this->session->userdata('id_siswa');
		$data = $this->m_permintaan_siswa->get_notif($id_siswa);
		echo json_encode($data);
	}

		}

/* End of file Permintaan_siswa.php */