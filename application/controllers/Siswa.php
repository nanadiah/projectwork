

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
     {
        parent::__construct();
        $this->load->model('m_siswa');
        $this->load->library('form_validation');
     }


	public function index()
	{
		if ($this->session->userdata('login_status') == TRUE) {
            $data['content_view']="v_siswa";
			$this->load->model('m_siswa');
			$data['arr']=$this->m_siswa->get_siswa();
			$this->load->view('template_user', $data, FALSE);
         } else {
             redirect('login_user');
         }
	}
	public function add_siswa()
	{
		$this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'trim|required');
		$this->form_validation->set_rules('nis', 'Nomor Induk Siswa', 'trim|required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
        $this->form_validation->set_rules('telp', 'No Telp', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        
		if ($this->form_validation->run() == TRUE )
		{
			$this->load->model('m_siswa');
			$masuk=$this->m_siswa->add_siswa();
			if($masuk==true){
				$this->session->set_flashdata('pesan', 'Berhasil Tambah Siswa');
			} else{
				$this->session->set_flashdata('pesan', 'Gagal Tambah Siswa');
			}
			redirect(base_url('index.php/siswa'), 'refresh');
		}
		else{
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/siswa'), 'refresh');
		}
	}
	function hapus(){
		if ($this->session->userdata('login_status') == TRUE) {
			$id_siswa = $this->uri->segment(3);

			if ($this->m_siswa->hapus_siswa($id_siswa)) {
				$this->session->set_flashdata('pesan', 'Hapus siswa Berhasil!');
				redirect('siswa');
			}else {
				$this->session->set_flashdata('pesan', 'Hapus siswa Gagal!');
				redirect('siswa');		
			}
			}
		}
		
public function json_siswa_by_id(){
	if ($this->session->userdata('login_status') == TRUE) { //UNTUK MEMENTALKAN JIKA ORANG BELUM LOGIN
		$id_siswa = $this->uri->segment(3);

		$data = $this->m_siswa->get_data_siswa_by_id($id_siswa);
		echo json_encode($data);		
	} 
}

public function ubah()
{
	//validasi form dulu
    $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'trim|required');
    $this->form_validation->set_rules('nis', 'Nomor Induk Siswa', 'trim|required');
    $this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
    $this->form_validation->set_rules('telp', 'No Telp', 'trim|required');
	$this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('Password', 'Password', 'trim|required');
        
		if ($this->form_validation->run() == TRUE ) 
		{

			if ($this->m_siswa->edit() == TRUE) {
				
				$this->session->set_flashdata('pesan', 'Ubah siswa Berhasil');
				redirect('siswa');	
			} else {
				$this->session->set_flashdata('pesan', 'Ubah siswa Gagal!');
				redirect('siswa');	

			} 
		}else {

				$this->session->set_flashdata('pesan', validation_errors());	
				redirect('siswa');	
			}
	}
}
	


