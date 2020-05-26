<?php

class Home extends CI_Controller {
    public function index()
    { 
        if ($this->session->userdata('login_status') == TRUE) {
            $data['content_view'] = 'v_dashboard_user';
            $this->load->view('template_user', $data);
         } else {
             redirect('login_user');
         }
    }
       
    }
       
