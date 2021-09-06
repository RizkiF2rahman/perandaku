<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_pemasukan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Lap_Pemasukan_model']);
        cek_not_login();
    }

    public function index()
    {
        $data['judul'] = "Laporan Pemasukan";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $this->load->view('templates/header', $data);
        $this->load->view('laporan_pemasukan/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function lap_pemasukan()
    {
        $data['judul'] = "Laporan Pemasukan";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $tgl_mulai = str_replace('/', '_', $this->input->post('tgl_mulai'));
        $tgl_sampai = str_replace('/', '_', $this->input->post('tgl_sampai'));

        $data['tgl_awal'] = $tgl_mulai;
        $data['tgl_akhir'] = $tgl_sampai;

        $data['lap_pemasukan'] = $this->Lap_Pemasukan_model->Laporan_pemasukan($tgl_mulai, $tgl_sampai);
        $data['total'] = $this->Lap_Pemasukan_model->total($tgl_mulai, $tgl_sampai);

        $this->load->view('templates/header', $data);
        $this->load->view('laporan_pemasukan/lap_pemasukan', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_lap_pemasukan()
    {
        $data['judul'] = "Laporan Pemasukan";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        if (!$this->uri->segment(3) && !$this->uri->segment(4)) {
            $tgl_mulai = str_replace('/', '-', $this->input->post('tgl_mulai'));
            $tgl_sampai = str_replace('/', '-', $this->input->post('tgl_sampai'));
        } else {
            $tgl_mulai = $this->uri->segment(3);
            $tgl_sampai = $this->uri->segment(4);
        }
        $tgl_awal = str_replace('-', '/', $tgl_mulai);
        $tgl_akhir = str_replace('-', '/', $tgl_sampai);

        $data['tgl_awal'] = $tgl_awal;
        $data['tgl_akhir'] = $tgl_akhir;
        $data['lap_pemasukan'] = $this->Lap_Pemasukan_model->Laporan_pemasukan($tgl_mulai, $tgl_sampai);
        $data['total_bayar'] = $this->Lap_Pemasukan_model->total($tgl_awal, $tgl_akhir);

        $this->load->view('laporan_pemasukan/cetak_lap_pemasukan', $data);
    }

    public function cetak_semua()
    {
        $data['judul'] = "Laporan Pemasukan";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $data['lap_pemasukan'] = $this->Lap_Pemasukan_model->tampil();
        $data['total'] = $this->Lap_Pemasukan_model->grand_total();

        $this->load->view('laporan_pemasukan/cetak_laporan_pemasukan', $data);
    }
}
