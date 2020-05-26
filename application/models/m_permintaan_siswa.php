<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_permintaan_siswa extends CI_Model {
	
    public function tambah($cv){

			$data = array(

				'status_pilihan'			                => $this->input->post('status_pilihan'),
				'status_perusahaan'			                => "",
				'tanggal'			                        => date('Y-m-d'),
				'id_perusahaan'			                    => $this->input->post('id_perusahaan'),
				'id_siswa'			                        => $this->input->post('id_siswa'),
				'cv' 										=> $cv['file_name'],
			); 

	$this->db->insert('detil_transaksi', $data);
	
	if($this->db->affected_rows() > 0){
		return TRUE;
	} else {
		return FALSE;
	}
  }
  public function get_notif($id_siswa){
	return $this->db
	->join('siswa','siswa.id_siswa=detil_transaksi.id_siswa')
	->join('perusahaan','perusahaan.id_perusahaan=detil_transaksi.id_perusahaan')
	->where('status_perusahaan', 'diterima')
	->where('detil_transaksi.id_siswa', $id_siswa)
	->order_by('id_detil', 'DESC')
	->limit(1)
	->get('detil_transaksi')
	->row();
  }

}