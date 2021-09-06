<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_aruskas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_not_login();
        $this->load->model(['Lap_Pemasukan_model', 'Lap_Pengeluaran_model']);
    }

    public function index()
    {
        $data['judul'] = "Laporan Rekapitulasi Dana Keuangan";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $this->load->view('templates/header', $data);
        $this->load->view('laporan_aruskas/index');
        $this->load->view('templates/footer');
    }

    public function laporan_aruskas()
    {
        $data['judul'] = "Laporan Rekapitulasi Dana Keuangan";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $tgl_mulai = str_replace('/', '-', $this->input->post('tgl_mulai'));
        $tgl_sampai = str_replace('/', '-', $this->input->post('tgl_sampai'));


        $data['tgl_awal'] = $tgl_mulai;
        $data['tgl_akhir'] = $tgl_sampai;
        $data['laporan_pemasukan'] = $this->Lap_Pemasukan_model->Lap_pemasukan($tgl_mulai, $tgl_sampai);
        $data['laporan_pengeluaran'] = $this->Lap_Pengeluaran_model->Laporan_pengeluaran($tgl_mulai, $tgl_sampai);
        $data['grand_total_masuk'] = $this->Lap_Pemasukan_model->total($tgl_mulai, $tgl_sampai);
        $data['grand_total_keluar'] = $this->Lap_Pengeluaran_model->total($tgl_mulai, $tgl_sampai);
        $data['saldoawal_masuk'] = $this->Lap_Pemasukan_model->total_masuk($tgl_mulai, $tgl_sampai);
        $data['saldoawal_keluar'] = $this->Lap_Pengeluaran_model->total_keluar($tgl_mulai, $tgl_sampai);

        $this->load->view('templates/header', $data);
        $this->load->view('laporan_aruskas/laporan_aruskas', $data);
        $this->load->view('templates/footer');
    }

    public function cetak_laporan_aruskas()
    {
        $data['judul'] = "Laporan Rekapitulasi Dana Keuangan";
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

        $data['tgl_awal'] = $tgl_mulai;
        $data['tgl_akhir'] = $tgl_sampai;
        $data['laporan_pemasukan'] = $this->Lap_Pemasukan_model->Laporan_pemasukan($tgl_mulai, $tgl_sampai);
        $data['laporan_pengeluaran'] = $this->Lap_Pengeluaran_model->Laporan_pengeluaran($tgl_mulai, $tgl_sampai);
        $data['grand_total_masuk'] = $this->Lap_Pemasukan_model->total($tgl_awal, $tgl_akhir);
        $data['grand_total_keluar'] = $this->Lap_Pengeluaran_model->total($tgl_awal, $tgl_akhir);
        $data['saldoawal_masuk'] = $this->Lap_Pemasukan_model->total_masuk($tgl_awal, $tgl_akhir);
        $data['saldoawal_keluar'] = $this->Lap_Pengeluaran_model->total_keluar($tgl_awal, $tgl_akhir);

        $this->load->view('laporan_aruskas/cetak_laporan_aruskas', $data);
    }

    public function cetak_semua()
    {
        $data['judul'] = "Laporan Rekapitulasi Dana Keuangan";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $data['laporan_pemasukan'] = $this->Lap_Pemasukan_model->Laporan_pemasukan();
        $data['laporan_pengeluaran'] = $this->Lap_Pengeluaran_model->Laporan_pengeluaran();
        $data['grand_total_masuk'] = $this->Lap_Pemasukan_model->total();
        $data['grand_total_keluar'] = $this->Lap_Pengeluaran_model->total();
        $data['saldoawal_masuk'] = $this->Lap_Pemasukan_model->total_masuk();
        $data['saldoawal_keluar'] = $this->Lap_Pengeluaran_model->total_keluar();

        $this->load->view('laporan_pemasukan/cetak_laporan_aruskas', $data);
    }
}
