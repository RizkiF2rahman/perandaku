<?php

class Lap_Pemasukan_model extends CI_Model
{

    public function tampil()
    {
        return $this->db->get('v_lapmas')->result_array();
    }

    public function laporan_pemasukan($tgl_mulai, $tgl_sampai)
    {
        $this->db->where('tanggal >=', $tgl_mulai);
        $this->db->where('tanggal <=', $tgl_sampai);
        return $this->db->get('v_lapmas')->result_array();
    }

    public function lap_pemasukan($tgl_mulai, $tgl_sampai)
    {
        $this->db->where('tanggal >=', $tgl_mulai);
        $this->db->where('tanggal <=', $tgl_sampai);
        return $this->db->get('v_masuk')->result_array();
    }

    public function total($tgl_awal, $tgl_akhir)
    {
        $this->db->select('SUM(total_bayar) as total');
        $this->db->where('tanggal >=', $tgl_awal);
        $this->db->where('tanggal <=', $tgl_akhir);
        return $this->db->get('pemasukan')->row()->total;
    }

    public function total_perhari()
    {
        $tgl = date('Ymd');
        $this->db->select('SUM(total_bayar) as total');
        return $this->db->get_where('pemasukan', ['tanggal' => $tgl])->row()->total;
    }

    public function total_perbulan()
    {
        $tgl = date('m');
        $this->db->select('SUM(total_bayar) as total_bayar');
        $this->db->where('MONTH(tanggal)', $tgl);
        return $this->db->get('pemasukan')->row()->total_bayar;
    }

    // menampilkan laporan L/B 
    public function total_masuk($tgl_awal, $tgl_akhir)
    {
        $this->db->select('SUM(total_bayar) as total_bayar');
        $this->db->where('tanggal <', $tgl_awal);
        $this->db->where('tanggal <', $tgl_akhir);
        return $this->db->get('pemasukan')->row()->total_bayar;
    }

    // menampilkan di home
    public function grand_total()
    {
        $this->db->select('SUM(total_bayar) as total_bayar');
        return $this->db->get('pemasukan')->row()->total_bayar;
    }
}
