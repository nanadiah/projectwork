<?php
class m_login_siswa extends CI_Model {
    public function user_check()
    {
        $username = $this->input->post('username'); 
        $password = $this->input->post('password');

        $query = $this->db->where('username', $username)
                          ->where('password', $password)
                          ->get('siswa');

        if($this->db->affected_rows() > 0){

			$data_login = $query->row();

			$data_session = array(
                                    'username'  => $data_login->username,
                                    'id_siswa'  => $data_login->id_siswa,
									'login_status' => TRUE,
								);
			$this->session->set_userdata($data_session);

             return true;
        }
        else 
        {
            return false;
        }
    }
}