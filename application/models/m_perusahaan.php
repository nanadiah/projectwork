<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_perusahaan extends CI_Model {

  public function get_perusahaan()
  {
    return $this->db->join('kategori','kategori.id_kat = perusahaan.id_kat')
                    ->join('persyaratan','persyaratan.id_persyaratan = perusahaan.id_persyaratan')
					->get('perusahaan')
					->result();
} 
				
	public function get_kategori(){
		return $this->db->get('kategori')
						->result();
    }
    public function get_persyaratan(){
		return $this->db->get('persyaratan')
						->result();
	}
	public function hapus_perusahaan($id){
    $this->db->where('id_perusahaan', $id)
            ->delete('perusahaan');
  if ($this->db->affected_rows() > 0) {
    return TRUE;
  }else {
    return FALSE;
  }
  }
	public function get_data_perusahaan_by_id($id)
  {
    return $this->db->where('id_perusahaan', $id)
                    ->get('perusahaan')
                    ->row();
}
	
  public function tambah($gambar) 
	{
		$data = array(
                'nama_perusahaan' 							=> $this->input->post('nama_perusahaan'),
				'kuota'			                            => $this->input->post('kuota'),
				'deskripsi'			                        => $this->input->post('deskripsi'),
				'id_persyaratan'							=> $this->input->post('persyaratan'),
				'id_kat'								    => $this->input->post('kategori'),
				'gambar'									=> $gambar['file_name']
			);
			
	$this->db->insert('perusahaan', $data); 
	if($this->db->affected_rows() > 0){
		return TRUE;
	} else {
		return FALSE;
	}
  }

  public function ubah()
	{
		$data = array(
				'nama_perusahaan' 					=> $this->input->post('edit_nama_perusahaan'),
				'kuota' 							=> $this->input->post('edit_kuota'),
				'deskripsi' 						=> $this->input->post('edit_deskripsi'),
				'id_kat'							=> $this->input->post('edit_kategori'),
				'id_persyaratan'					=> $this->input->post('edit_persyaratan'),	
			); 

		$this->db->where('id_perusahaan', $this->input->post('id_perusahaan_edit'))
				 ->update('perusahaan', $data);
		
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
}