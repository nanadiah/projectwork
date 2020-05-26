<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_dashboard extends CI_Model {

	public function get_jml_user(){
		return $this->db->select('count(*) as jml_user')
					    ->get('user')
					    ->row();
	}

	public function get_jml_siswa(){
		return $this->db->select('count(*) as jml_siswa')
					    ->get('siswa')
					    ->row();
	}

	public function get_jml_perusahaan(){
		return $this->db->select('count(*) as jml_perusahaan')
					    ->get('perusahaan')
					    ->row();
    }
    public function get_jml_permintaan(){
		return $this->db->select('count(*) as jml_permintaan')
					    ->get('detil_transaksi')
					    ->row();
	}

}
