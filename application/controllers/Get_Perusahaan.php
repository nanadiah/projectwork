<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_perusahaan extends CI_Controller {

	public function __construct()
	{ 
		parent::__construct();
		$this->load->model('m_get_perusahaan');
	} 
	public function index()   
	{
		if ($this->session->userdata('login_status') == TRUE) {
		$perusahaan=$this->m_get_perusahaan->get_perusahaan();
		echo json_encode($perusahaan); 
	}else{
		redirect('login_siswa/index');
	}
} 
	public function cari()
	{
		$nama_perusahaan=$this->input->post('nama_perusahaan');
		$this->load->model('m_get_perusahaan');
		$insert['perusahaan'] =  $this->m_get_perusahaan->cari_perusahaan($nama_perusahaan);
		$insert['content_view'] = 'v_cari';
		$this->load->view('template', $insert);
	} 
	public function rpl()
	{
		$this->load->model('m_get_perusahaan');
		$insert['perusahaan'] =  $this->m_get_perusahaan->get_rpl();
		$insert['content_view'] = 'v_jurusan';
		$this->load->view('template', $insert);
	} 
	public function tkj()
	{
		$this->load->model('m_get_perusahaan');
		$insert['perusahaan'] =  $this->m_get_perusahaan->get_tkj();
		$insert['content_view'] = 'v_jurusan';
		$this->load->view('template', $insert);
	} 
	public function detail($id_perusahaan)
	{
		$perusahaan=$this->m_get_perusahaan->get_detail($id_perusahaan);
		echo json_encode($perusahaan);
	}

}