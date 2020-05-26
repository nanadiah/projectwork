<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permintaan extends CI_Controller {

	public function __construct()
     {
        parent::__construct();
        $this->load->model('m_permintaan');
		$this->load->library('form_validation');
		$this->load->helper('url');
     } 
	public function index() 
	{
		if ($this->session->userdata('login_status') == TRUE) {
		$data['content_view']="v_permintaan";
		$this->load->model('m_permintaan');
		$data['permintaan']= $this->m_permintaan->get_permintaan();
		$this->load->view('template_user', $data, FALSE);
	} else{
		redirect('login_siswa/index');
	}
}
	function terima($id_detil){
		$this->load->model('m_permintaan');
		$status = 'diterima';
		if($this->m_permintaan->update_permintaan($id_detil, $status) == TRUE)
				{
					$this->session->set_flashdata('pesan', 'Berhasil Terima');
					redirect('permintaan/index');
				} else {
					$this->session->set_flashdata('pesan', 'Berhasil Terima');
					redirect('permintaan/index');
				}
}
function tolak($id_detil){
	$this->load->model('m_permintaan');
	$status = 'ditolak';
		if($this->m_permintaan->update_permintaan($id_detil, $status) == TRUE)
				{
					$this->session->set_flashdata('pesan', 'Berhasil Ditolak');
					redirect('permintaan/index');
				} else {
					$this->session->set_flashdata('pesan', 'Gagal Ditolak');
					redirect('permintaan/index');
}
} 
public function get_detail_permintaan(){
		$id_detil = $this->uri->segment(3);
		$data = $this->m_permintaan->detail_permintaan($id_detil);
		echo json_encode($data);		
	
}

	public function hapus_permintaan($id_detil)
	{
		$this->load->model('m_permintaan');
		$this->m_permintaan->hapus_permintaan($id_detil);
		redirect(base_url('index.php/permintaan'),'refresh');
	}
	public function notif_admin(){
		$data = $this->m_permintaan->get_notif();
		echo json_encode($data);
	}
	public function riwayat()
	{
			$data['content_view'] = 'v_riwayat';
			$data['riwayat'] = $this->m_permintaan->get_riwayat();

			$this->load->view('template_user', $data);
	}
	public function selesai()
	{
			$data['content_view'] = 'v_selesai';
			$this->load->view('template', $data);
	}

}

/* End of file Permintaan.php */
/* Location: ./application/controllers/Order.php */
