<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_code extends CI_Model {

	public function kelas()
	{
	    $q = $this->db->query("SELECT MAX(RIGHT(kelas_kode,2)) AS kd_max FROM kelas");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%02s", $tmp);
            }
        }else{
            $kd = "01";
        }
        return 'KLS-'.$kd;
	}
	public function mapel()
	{
	    $q = $this->db->query("SELECT MAX(RIGHT(mapel_kode,5)) AS kd_max FROM mapel");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%05s", $tmp);
            }
        }else{
            $kd = "00001";
        }
        return 'MPL-'.$kd;
	}
	public function ta()
	{
	    $q = $this->db->query("SELECT MAX(RIGHT(tahunajaran_kode,4)) AS kd_max FROM tahunajaran");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        }else{
            $kd = "0001";
        }
        return 'TA'.$kd;
	}

}

/* End of file M_code.php */
/* Location: ./application/models/M_code.php */