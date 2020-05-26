<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_siswa extends CI_Model {

  public function get_siswa()
  {
      $arr= $this->db->get('siswa')->result();
      return $arr;
  }
  public function add_siswa()
  {
    $arr['nama_siswa']  = $this->input->post('nama_siswa');
    $arr['nis']         = $this->input->post('nis');
    $arr['kelas']       = $this->input->post('kelas');
    $arr['telp']        = $this->input->post('telp');
    $arr['username']    = $this->input->post('username');
    $arr['password']    = $this->input->post('password');

    $ql_masuk=$this->db->insert('siswa', $arr);
    return $ql_masuk;
  }
  public function hapus_siswa($id){
    $this->db->where('id_siswa', $id)
            ->delete('siswa');
  if ($this->db->affected_rows() > 0) {
    return TRUE;
  }else {
    return FALSE;
  }
  }
  public function get_data_siswa_by_id($id_siswa)
  {
    return $this->db->where('id_siswa', $id_siswa)
                    ->get('siswa')
                    ->row();
  } 
  public function edit(){
    $siswa = array( 
                    'nama_siswa' => $this->input->post('nama_siswa_edit'),
                    'nis'        => $this->input->post('nis_edit'),
                    'kelas'      => $this->input->post('kelas_edit'),
                    'telp'       => $this->input->post('telp_edit'),
                    'username'   => $this->input->post('usernmae_edit'),
                    'password'     => $this->input->post('password_edit')
                    );

    $this->db->where('id_siswa', $this->input->post('id_siswa_edit'))
             ->update('siswa', $siswa);

             if ($this->db->affected_rows() > 0) {
               return TRUE;
             } else {
              return FALSE;
             }
  }
}
