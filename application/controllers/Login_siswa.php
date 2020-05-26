<?php 
 class Login_siswa extends CI_Controller {

     public function __construct()
     {
        parent::__construct();
        $this->load->model('m_login_siswa');
        $this->load->model('m_permintaan');
        $this->load->library('form_validation');
     }

     public function index() //tampilan yang otomatis di load kerika memanggil controller 
     {
         if ($this->session->userdata('login_status') == TRUE) {
            $id_user = $this->session->userdata('id_siswa');
                if($this->m_permintaan->selesai($id_user) == TRUE){
                    redirect('permintaan/selesai');
                }
                else{
                    redirect('Dashboard');
                } 
         } else {
             $this->load->view('v_login_siswa');
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
         
            if ($this->m_login_siswa->user_check() == TRUE)
            {
                $id_user = $this->session->userdata('id_siswa');
                if($this->m_permintaan->selesai($id_user) == TRUE){
                    redirect('permintaan/selesai');
                }
                else{
                    redirect('Home_siswa');
                }
                
            }
            else {
                $this->session->set_flashdata('notif', 'Password dan Username Tidak Benar!!');
                redirect('login_siswa');
            } 
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login_siswa');
    }
    
 } 