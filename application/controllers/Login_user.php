<?php 
 class Login_user extends CI_Controller {

     public function __construct()
     {
        parent::__construct();
        $this->load->model('m_login_user');
        $this->load->library('form_validation');
     }

     public function index() //tampilan yang otomatis di load kerika memanggil controller 
     {
         if ($this->session->userdata('login_status') == TRUE) {
             redirect('Home');
         } else {
             $this->load->view('v_login_user');
         }
     } 
    
     public function forgot_password()
     {
         //parameter
         $email = $this->uri->segment(3);
         

         echo 'Saya Lupa Password, email saya : '. $email;
     }
     public function act_login()
     {
         $this->form_validation->set_rules('username', 'Username', 'trim|required');
         $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
 
        if ($this->form_validation->run() == TRUE) 
        {
            if ($this->m_login_user->user_check() == TRUE)
            {
                redirect('Dashboard');
            }
            else {
                $this->session->set_flashdata('notif', 'Password dan Username Tidak Benar!!');
                redirect('login_user');
            } 
        } else {
                $this->session->set_flashdata('notif', validation_errors());
                redirect('login_user');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login_user');
    }
    
 }