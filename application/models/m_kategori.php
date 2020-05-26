<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_kategori extends CI_Model {

	public function get_kategori(){
		return $this->db->get('kategori')
						->result();
	}

	public function get_data_kategori_by_id($id)
  {
    return $this->db->where('id_kat', $id)
                    ->get('kategori')
                    ->row();
  }
	public function tambah()
	{
		$data = array(
                'jurusan' 	=> $this->input->post('jurusan'),
                'kota' 	    => $this->input->post('kota')
			);

		$this->db->insert('kategori', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function ubah()
	{
		$data = array(
                'jurusan' 		=> $this->input->post('edit_jurusan'),
                'kota' 		=> $this->input->post('edit_kota')
			);

		$this->db->where('id_kat', $this->input->post('edit_id_kat'))
				 ->update('kategori', $data);
		
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function hapus($id){
		$this->db->where('id_kat', $id)
				 ->delete('kategori');
	  if ($this->db->affected_rows() > 0) {
		return TRUE; 
	  }else {
		return FALSE;
	  }
	  }
	

}

