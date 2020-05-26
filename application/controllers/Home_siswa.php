<?php

class Home_siswa extends CI_Controller {
    public function index()
    {  if ($this->session->userdata('login_status') == TRUE) {
            $data['content_view'] = 'v_dashboard_siswa';
            $this->load->view('template', $data);
         }else{
             
             redirect('login_siswa');
             
         }
    }
}
       
    
       
