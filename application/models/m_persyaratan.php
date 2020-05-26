<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class m_persyaratan extends CI_Model {

	public function get_persyaratan(){
		return $this->db->get('persyaratan')
						->result();
	}

	public function get_data_persyaratan_by_id($id)
  {
    return $this->db->where('id_persyaratan', $id)
                    ->get('persyaratan')
                    ->row();
  }
	public function tambah()
	{
		$data = array(
                'cv' 	=> $this->input->post('cv'),
                'surat_izin' 	    => $this->input->post('surat_izin')
			);

		$this->db->insert('persyaratan', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function ubah()
	{
		$data = array(
                'cv' 		        => $this->input->post('edit_cv'),
                'surat_izin' 		=> $this->input->post('edit_surat_izin')
			);

		$this->db->where('id_persyaratan', $this->input->post('edit_id_persyartan'))
				 ->update('persyaratan', $data);
		
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function hapus($id){
		$this->db->where('id_persyartan', $id)
				 ->delete('persyaratan');
	  if ($this->db->affected_rows() > 0) {
		return TRUE; 
	  }else {
		return FALSE;
	  }
	  }
	

}

