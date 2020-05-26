<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {

	public function __construct()
     {
        parent::__construct();
        $this->load->model('m_user');
        $this->load->library('form_validation');
     }


	public function index()
	{
		if ($this->session->userdata('login_status') == TRUE) {
            $data['content_view']="v_user";
			$this->load->model('m_user');
			$data['arr']=$this->m_user->get_user();
			$this->load->view('template_user', $data, FALSE);
         } else {
             redirect('login');
         }
	}
	public function add_user()
	{
	
		$this->form_validation->set_rules('nama_user', 'Nama user', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('level', 'level', 'trim|required');
        
		if ($this->form_validation->run() == TRUE )
		{
			$this->load->model('m_user');
			$masuk=$this->m_user->add_user();
			if($masuk==true){
				$this->session->set_flashdata('pesan', 'Berhasil Tambah User');
			} else{
				$this->session->set_flashdata('pesan', 'Gagal Tambah User');
			}
			redirect(base_url('index.php/user'), 'refresh');
		}
		else{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/user'), 'refresh');
		}
	}
	function hapus(){
		if ($this->session->userdata('login_status') == TRUE) {
			$id_user = $this->uri->segment(3);

			if ($this->m_user->hapus_user($id_user)) {
				$this->session->set_flashdata('pesan', 'Hapus user Berhasil!');
				redirect('user');
			}else {
				$this->session->set_flashdata('pesan', 'Hapus user Gagal!');
				redirect('user');		
			}
			}
		}
		
public function json_user_by_id(){
	if ($this->session->userdata('login_status') == TRUE) { //UNTUK MEMENTALKAN JIKA ORANG BELUM LOGIN
		$id_user = $this->uri->segment(3);

		$data = $this->m_user->get_data_user_by_id($id_user);
		echo json_encode($data);		
	} 
}

public function ubah()
{
	//validasi form dulu
		$this->form_validation->set_rules('nama_user_edit', 'Nama user', 'trim|required');
		$this->form_validation->set_rules('username_edit', 'Username', 'trim|required');
		$this->form_validation->set_rules('password_edit', 'Password', 'trim|required');
		$this->form_validation->set_rules('level_edit', 'level', 'trim|required');
        
		if ($this->form_validation->run() == TRUE )
		{

			if ($this->m_user->edit() == TRUE) {
				
				$this->session->set_flashdata('pesan', 'Ubah user Berhasil');
				redirect('user');	
			} else {
				$this->session->set_flashdata('pesan', 'Ubah user Gagal!');
				redirect('user');	

			} 
		}else {

				$this->session->set_flashdata('pesan', validation_errors());	
				redirect('user');	
			}
	}
}
	


