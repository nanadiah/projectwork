<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_permintaan extends CI_Model {

	public function get_permintaan()
	{
		$permintaan = $this->db->join('perusahaan','perusahaan.id_perusahaan=detil_transaksi.id_perusahaan')
								->join('siswa','siswa.id_siswa=detil_transaksi.id_siswa')
								->where('status_perusahaan', '')
								->order_by('status_pilihan', 'asc')
								->order_by('tanggal', 'asc')
								->get('detil_transaksi')
								->result();
		return $permintaan;
	}
	public function selesai($id_user)
	{
		$permintaan = $this->db->join('perusahaan','perusahaan.id_perusahaan=detil_transaksi.id_perusahaan')
								->join('siswa','siswa.id_siswa=detil_transaksi.id_siswa')
								->where('siswa.id_siswa',$id_user)
								->where('status_perusahaan', 'diterima')
								->get('detil_transaksi')
								->result();

		if($this->db->affected_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}
	public function detail_permintaan($id_detil='') 
	{
        return $this->db
                    ->where('id_detil', $id_detil)
                    ->get('detil_transaksi')
                    ->row();
	}
	
	public function update_permintaan($id_detil, $status)
	{ 
        $data = array(
            'status_perusahaan'=> $status
        );
        $this->db->where('id_detil', $id_detil);
		$this->db->update('detil_transaksi', $data);

		if($status == 'diterima'){
			$getkuota = $this->db->select('kuota, perusahaan.id_perusahaan')->join('perusahaan','perusahaan.id_perusahaan=detil_transaksi.id_perusahaan')->where('id_detil',
			 $id_detil)->get('detil_transaksi')->row();
    		$data_kuota = array(
      		'kuota' => $getkuota->kuota - 1
    								);
    		$this->db->where('id_perusahaan', $getkuota->id_perusahaan)->update('perusahaan', $data_kuota);
		}
	}

	public function hapus_permintaan($id_detil)
	{
		$this->db->where('id_detil', $id_detil);
		return $this->db->delete('detil_transaksi');
	}
	public function get_notif(){
		return $this->db
		->join('siswa','siswa.id_siswa=detil_transaksi.id_siswa')
		->join('perusahaan','perusahaan.id_perusahaan=detil_transaksi.id_perusahaan')
		->where('status_perusahaan', '')
		->get('detil_transaksi')
		->result();
			
	}
	public function get_riwayat()
	{
		return $this->db->select('detil_transaksi.id_detil, perusahaan.nama_perusahaan, siswa.nama_siswa,  detil_transaksi.status_perusahaan,detil_transaksi.tanggal')
						->join('perusahaan','perusahaan.id_perusahaan = detil_transaksi.id_perusahaan')
						->join('siswa','siswa.id_siswa = detil_transaksi.id_siswa')
						->group_by('id_detil')
						->get('detil_transaksi')
						->result();
	}
	

}

/* End of file m_permintaan.php */
/* Location: ./application/models/Order_model.php */
