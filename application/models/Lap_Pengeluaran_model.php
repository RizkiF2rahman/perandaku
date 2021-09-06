<?php

class Lap_Pengeluaran_model extends CI_Model
{

    public function laporan_pengeluaran($tgl_mulai, $tgl_sampai)
    {
        $this->db->where('tanggal >=', $tgl_mulai);
        $this->db->where('tanggal <=', $tgl_sampai);
        return $this->db->get('v_keluar')->result_array();
    }

    public function tampil()
    {
        return $this->db->get('v_keluar')->result_array();
    }

    public function total($tgl_awal, $tgl_akhir)
    {
        $this->db->select('SUM(total_bayar) as total');
        $this->db->where('tanggal >=', $tgl_awal);
        $this->db->where('tanggal <=', $tgl_akhir);
        return $this->db->get('pengeluaran')->row()->total;
    }

    public function total_perhari()
    {
        $tgl = date('Ymd');
        $this->db->select('SUM(total_bayar) as total');
        return $this->db->get_where('pengeluaran', ['tanggal' => $tgl])->row()->total;
    }

    public function total_perbulan()
    {
        $tgl = date('m');
        $this->db->select('SUM(total_bayar) as total');
        $this->db->where('MONTH(tanggal)', $tgl);
        return $this->db->get('pengeluaran')->row()->total;
    }

    // menampilkan laporan L/B
    public function total_keluar($tgl_awal, $tgl_akhir)
    {
        $this->db->select('SUM(total_bayar) as total');
        $this->db->where('tanggal <', $tgl_awal);
        $this->db->where('tanggal <', $tgl_akhir);
        return $this->db->get('pengeluaran')->row()->total;
    }

    // menampilkan di home
    public function total_tampil()
    {
        $this->db->select('SUM(total_bayar) as total');
        return $this->db->get('pengeluaran')->row()->total;
    }
}
