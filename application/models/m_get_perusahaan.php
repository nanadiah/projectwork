<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_get_perusahaan extends CI_Model {

	public function get_perusahaan()
	{
		return $this->db->get('perusahaan')
						->result();
	}
	public function cari_perusahaan($nama_perusahaan)
	{
		return $this->db  
						->join('kategori','kategori.id_kat=perusahaan.id_kat')
						->join('persyaratan','persyaratan.id_persyaratan=perusahaan.id_persyaratan')
						->where('perusahaan.nama_perusahaan', $nama_perusahaan)         
						->get('perusahaan')
						->result();
	}
	public function get_rpl()
	{
		return $this->db  
						->join('kategori','kategori.id_kat=perusahaan.id_kat')
						->join('persyaratan','persyaratan.id_persyaratan=perusahaan.id_persyaratan')
						->where('jurusan', 'rpl')         
						->get('perusahaan')
						->result();
	} 
	public function get_tkj()
	{
		return $this->db->join('kategori','kategori.id_kat=perusahaan.id_kat')
		->join('persyaratan','persyaratan.id_persyaratan=perusahaan.id_persyaratan')
		->where('jurusan', 'tkj')         
		->get('perusahaan')
		->result();
	}
	public function get_detail($id_perusahaan)
	{
		return $this->db
		->join('detil_transaksi','detil_transaksi.id_perusahaan = perusahaan.id_perusahaan')
		->where('perusahaan.id_perusahaan', $id_perusahaan)
		->get('perusahaan')
		->row();
	}
	
}