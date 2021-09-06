<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pembayaran_model');
        cek_not_login();
    }

    public function index()
    {
        $data['judul'] = "Metode Pembayaran";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $data['pembayaran'] = $this->Pembayaran_model->tampil_data();

        $this->load->view('templates/header', $data);
        $this->load->view('pembayaran/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = "Metode Pembayaran";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $this->form_validation->set_rules(
            'tr',
            'Nama Pembayaran',
            'required|trim|is_unique[pembayaran.transaksi]',
            ['is_unique' => "Nama Transaksi Sudah Ada"]
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('pembayaran/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Pembayaran_model->simpan();
            redirect('pembayaran');
        }
    }

    public function hapus()
    {
        $id = $this->input->post('kd');
        $this->Pembayaran_model->hapus($id);
        redirect('pembayaran');
    }

    public function ubah($id)
    {
        $data['judul'] = "Metode Pembayaran";
        $data['title'] = "SIPERAN DAKU CV. DERWATI";

        $data['ubah_bayar'] = $this->Pembayaran_model->get_id($id);

        $this->form_validation->set_rules(
            'tr',
            'Nama Pembayaran',
            'required|trim'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('pembayaran/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Pembayaran_model->update();
            redirect('pembayaran');
        }
    }
}
