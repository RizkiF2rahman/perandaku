<?php
defined('BASEPATH') or exit('No direct script access allowed');

class laporan_pengeluaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Lap_Pengeluaran_model']);
        cek_not_login();
    }

    public function index()
    {
        $data['judul'] = "Laporan Pengeluaran";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $this->load->view('templates/header', $data);
        $this->load->view('laporan_pengeluaran/index', $data);
        $this->load->view('templates/footer');
    }

    public function lap_pengeluaran()
    {
        $data['judul'] = "Laporan Pengeluaran";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $tgl_mulai = str_replace('/', '_', $this->input->post('tgl_mulai'));
        $tgl_sampai = str_replace('/', '_', $this->input->post('tgl_sampai'));

        $data['tgl_awal'] = $tgl_mulai;
        $data['tgl_akhir'] = $tgl_sampai;

        $data['lap_pengeluaran'] = $this->Lap_Pengeluaran_model->Laporan_pengeluaran($tgl_mulai, $tgl_sampai);
        $data['total'] = $this->Lap_Pengeluaran_model->total($tgl_mulai, $tgl_sampai);

        $this->load->view('templates/header', $data);
        $this->load->view('laporan_pengeluaran/lap_pengeluaran', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_lap_pengeluaran()
    {
        $data['judul'] = "Laporan Pengeluaran";
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
        $data['lap_pengeluaran'] = $this->Lap_Pengeluaran_model->Laporan_pengeluaran($tgl_mulai, $tgl_sampai);
        $data['total'] = $this->Lap_Pengeluaran_model->total($tgl_awal, $tgl_akhir);

        $this->load->view('laporan_pengeluaran/cetak_lap_pengeluaran', $data);
    }
    
    public function cetak_semua()
    {
        $data['judul'] = "Laporan Pengeluaran";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $data['lap_pengeluaran'] = $this->Lap_Pengeluaran_model->tampil();
        $data['total'] = $this->Lap_Pengeluaran_model->total_tampil();

        $this->load->view('laporan_pengeluaran/cetak_laporan_pengeluaran', $data);
    }
}
