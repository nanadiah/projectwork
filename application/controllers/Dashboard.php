<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_dashboard');
	}
	
	public function index()
	{

			$data['content_view'] = 'v_dashboard_user';
			$data['jml_user'] = $this->m_dashboard->get_jml_user();
			$data['jml_siswa'] = $this->m_dashboard->get_jml_siswa();
            $data['jml_perusahaan'] = $this->m_dashboard->get_jml_perusahaan();
            $data['jml_permintaan'] = $this->m_dashboard->get_jml_permintaan();
			$this->load->view('template_user', $data);
	}

}

